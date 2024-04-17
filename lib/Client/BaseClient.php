<?php

namespace Assist\AssistRuPhpCore\Client;

use Assist\AssistRuPhpCore\Config\ApiConfigLoaderInterface;
use Assist\AssistRuPhpCore\Config\Config;
use Assist\AssistRuPhpCore\Config\HttpClientConfigLoader;
use Assist\AssistRuPhpCore\Exceptions\AuthException;
use Assist\AssistRuPhpCore\Exceptions\BadRequestException;
use Assist\AssistRuPhpCore\Exceptions\ForbiddenException;
use Assist\AssistRuPhpCore\Exceptions\HttpException;
use Assist\AssistRuPhpCore\Exceptions\InternalServerErrorException;
use Assist\AssistRuPhpCore\Exceptions\UnauthorizedException;
use Assist\AssistRuPhpCore\Helpers\HttpHelper;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class BaseClient
{
    private HttpClientInterface $httpClient;

    private int $attempts;
    private LoggerInterface|null $logger;
    private string|null $bearerToken = null;
    private int $timeout;


    public function __construct(HttpClientInterface $httpClient = null, ApiConfigLoaderInterface $configLoader = null)
    {
        if ($httpClient === null) {
            $httpClient = new HttpClient();
        }

        if ($configLoader === null) {
            $configLoader = new HttpClientConfigLoader();
        }

        $config = $configLoader->loadConfig()->getConfig();
        $httpClient->setConfig($config);

        $this->attempts = Config::DEFAULT_ATTEMPTS_COUNT;
        $this->timeout = Config::DEFAULT_REQUEST_TIMEOUT_BETWEEN_ATTEMPTS;
        $this->httpClient = $httpClient;
    }

    /**
     * Устанавливает конфиг для Http клиента
     *
     * @param array $config
     * @return void
     */
    public function setHttpClientConfig(array $config): void
    {
        $this->httpClient->setConfig($config);
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

        $this->httpClient->setLogger($this->logger);
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
     * @throws AuthException
     */
    public function execute(
        string $method,
        string $path,
        string $body = null,
        array $headers = array()
    ): ResponseInterface {
        $headers = $this->prepareHeaders($headers);
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
            $delay = Config::DEFAULT_REQUEST_TIMEOUT_BETWEEN_ATTEMPTS;
        }

        usleep($delay * 1000);
    }

    /**
     * Подготовка заголовков
     *
     * @param array $headers
     * @return array
     * @throws AuthException
     */
    private function prepareHeaders(array $headers): array
    {
        if (!$this->bearerToken) {
            throw new AuthException();
        }

        $headers['Authorization'] = $this->bearerToken;

        return $headers;
    }

    /**
     * Обработчик ошибок запроса
     *
     * @param ResponseInterface $response
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws InternalServerErrorException
     * @throws UnauthorizedException
     * @throws HttpException
     */
    protected function handleError(ResponseInterface $response)
    {
        throw match ($response->getStatusCode()) {
            HttpHelper::CODE_BAD_REQUEST => new BadRequestException(
                responseHeaders: $response->getHeaders(),
                responseBody: $response->getBody()
            ),
            HttpHelper::CODE_FORBIDDEN => new ForbiddenException(
                responseHeaders: $response->getHeaders(), responseBody: $response->getBody()
            ),
            HttpHelper::CODE_UNAUTHORIZED => new UnauthorizedException(
                responseHeaders: $response->getHeaders(),
                responseBody: $response->getBody()
            ),
            HttpHelper::CODE_INTERNAL_SERVER_ERROR => new InternalServerErrorException(
                responseHeaders: $response->getHeaders(),
                responseBody: $response->getBody()
            ),
            default => new HttpException(
                'Unexpected response status code',
                $response->getStatusCode(),
                $response->getHeaders(),
                $response->getBody()
            ),
        };
    }
}
