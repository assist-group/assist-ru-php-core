<?php

namespace Assist\AssistRuPhpCore\Client;

use Assist\AssistRuPhpCore\Config\HttpClientConfigLoader;
use Assist\AssistRuPhpCore\Config\Config;
use Assist\AssistRuPhpCore\Exceptions\AuthException;
use Assist\AssistRuPhpCore\Helpers\HttpHelper;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class BaseClient
{
    private HttpClientInterface $httpClient;

    private int $attempts;
    private array|null $httpClientConfig;
    private LoggerInterface|null $logger;
    private string $bearerToken;
    private int $timeout;


    public function __construct(HttpClientInterface $httpClient = null, ConfigLoaderInterfase $configLoader = null)
    {
        if ($httpClient === null) {
            $httpClient = new HttpClient();
        }

        if ($configLoader === null) {
            $configLoader = new HttpClientConfigLoader();
        }

        $config = $configLoader->loadConfig()->getConfig();
        $this->setConfig($config);
        $httpClient->setConfig($config);

        $this->attempts = Config::ATTEMPTS_COUNT;
        $this->timeout = Config::REQUEST_TIMEOUT_BETWEEN_ATTEMPTS;
        $this->httpClient = $httpClient;
    }

    /**
     * Устанавливает конфиг для Http клиента
     *
     * @param array $config
     * @return void
     */
    public function setConfig(array $config): void
    {
        $this->httpClientConfig = $config;
    }

    /**
     * Устанавливает логгер приложения
     *
     * @param LoggerInterface|null $value Инстанс логгера
     */
    public function setLogger(?LoggerInterface $value): void
    {
        if ($value instanceof LoggerInterface) {
            $this->logger = $value;
        }

        if ($this->httpClient) {
            $this->httpClient->setLogger($this->logger);
        }
    }

    /**
     * Устанавливает время для таймаута между попытками запросов
     *
     * @param int $value
     *
     * @return void
     */
    public function setTimeout(int $value): void
    {
        $this->timeout = $value;
    }

    /**
     * Устанавливает количество попыток запросов
     *
     * @param int $value
     * @return void
     */
    public function setAttempts(int $value): void
    {
        $this->attempts = $value;
    }

    /**
     * Устанавливает токен авторизации
     *
     * @param string $value
     * @return void
     */
    public function setBearerToken(string $value): void
    {
        $this->bearerToken = $value;
    }

    /**
     * Выполнение запроса
     *
     * @param string $method
     * @param string $path
     * @param string|null $body
     * @param array $headers
     *
     * @return ResponseInterface
     *
     * @throws GuzzleException
     */
    public function execute(string $method, string $path, string $body = null, array $headers = array()): ResponseInterface
    {
        $response = $this->httpClient->request($method, $path, $body, $headers);
        $attempts = $this->attempts - 1;

        while ($response->getStatusCode() !== HttpHelper::CODE_OK && $attempts > 0) {
            $this->sleep();
            $response = $this->httpClient->request($method, $path, $body, $headers);
            $attempts--;
        }

        return $response;
    }

    /**
     * Задержка перед следующей попыткой запроса
     *
     * @return void
     */
    private function sleep(): void
    {
        if ($this->timeout) {
            $delay = $this->timeout;
        } else {
            $delay = Config::REQUEST_TIMEOUT_BETWEEN_ATTEMPTS;
        }

        usleep($delay * 1000);
    }

    /**
     * Преобразование данных из JSON в массив
     */
    private function decodeData(ResponseObject $response)
    {
        $resultArray = json_decode($response->getBody(), true);
        if ($resultArray === null) {
            throw new JsonException('Failed to decode response', json_last_error());
        }

        return $resultArray;
    }

    /**
     * Преобразование данных из массива в JSON
     *
     * @return void
     */
    private function encodeData($serializedData)
    {
        if ($serializedData === array()) {
            return '{}';
        }

        if (defined('JSON_UNESCAPED_UNICODE') && defined('JSON_UNESCAPED_SLASHES')) {
            $encoded = json_encode($serializedData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } else {
            $encoded = self::_unescaped(json_encode($serializedData));
        }

        if ($encoded === false) {
            $errorCode = json_last_error();
            throw new JsonException("Failed serialize json.", $errorCode);
        }

        return $encoded;
    }

    /**
     * Подготовка заголовков
     *
     * @throws AuthException
     */
    private function prepareHeaders(array $headers)
    {
        if (!$this->bearerToken) {
            throw new AuthException();
        }

        $headers['Authorization'] = $this->bearerToken;

        return $headers;
    }

    /**
     * Выбрасывает исключение по коду ошибки
     *
     * @param ResponseObject $response
     *
     * @throws ApiException
     * @throws BadApiRequestException
     * @throws ForbiddenException
     * @throws InternalServerError
     * @throws NotFoundException
     * @throws ResponseProcessingException
     * @throws TooManyRequestsException
     * @throws UnauthorizedException
     */
    protected function handleError(ResponseObject $response)
    {
        switch ($response->getCode()) {
            case BadApiRequestException::HTTP_CODE:
                throw new BadApiRequestException($response->getHeaders(), $response->getBody());
                break;
            case ForbiddenException::HTTP_CODE:
                throw new ForbiddenException($response->getHeaders(), $response->getBody());
                break;
            case UnauthorizedException::HTTP_CODE:
                throw new UnauthorizedException($response->getHeaders(), $response->getBody());
                break;
            case InternalServerError::HTTP_CODE:
                throw new InternalServerError($response->getHeaders(), $response->getBody());
                break;
            case NotFoundException::HTTP_CODE:
                throw new NotFoundException($response->getHeaders(), $response->getBody());
                break;
            case TooManyRequestsException::HTTP_CODE:
                throw new TooManyRequestsException($response->getHeaders(), $response->getBody());
                break;
            case ResponseProcessingException::HTTP_CODE:
                throw new ResponseProcessingException($response->getHeaders(), $response->getBody());
                break;
            default:
                if ($response->getCode() > 399) {
                    throw new ApiException(
                        'Unexpected response error code',
                        $response->getCode(),
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
        }
    }
}
