<?php

namespace Assist\AssistRuPhpCore\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class HttpClient implements HttpClientInterface
{
    private Client $client;
    private array $config = [];
    private LoggerInterface|null $logger = null;

    /**
     * Выполнение запроса
     *
     * @param string $path
     * @param string $method
     * @param string|null $body
     * @param array $headers
     *
     * @return ResponseInterface
     *
     * @throws GuzzleException
     */
    public function request(
        string $method,
        string $path,
        ?string $body = null,
        array $headers = array()
    ): ResponseInterface {
        $this->requestLog($method, $path, $body, $headers);
        $this->initHttpClient();
        $response = $this->client->request($method, $path, ['headers' => $headers]);
        $this->responseLog($response->getBody(), $response->getStatusCode(), $response->getHeaders());

        return $response;
    }

    /**
     * Инициализация HTTP клиента
     *
     * @return void
     */
    private function initHttpClient(): void
    {
        $this->client = new Client($this->config);
    }

    /**
     * Установка конфига Http клиента
     *
     * @param array $clientConfig
     * @return void
     */
    public function setConfig(array $clientConfig): void
    {
        $this->config = $clientConfig;
    }

    /**
     * Устанавливает логер
     *
     * Если логер не установлен, запись логов не производится
     *
     * @param LoggerInterface|null $logger
     * @return void
     */
    public function setLogger(LoggerInterface|null $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * Логирование запроса
     *
     * @param string $method
     * @param string $path
     * @param string|null $body
     * @param array $headers
     * @return void
     */
    private function requestLog(string $method, string $path, string|null $body, array $headers): void
    {
        if ($this->logger !== null) {
            $message = 'Send request: ' . $method . ' ' . $path;
            $context = [];

            if ($headers) {
                $context['headers'] = $headers;
            }

            if ($body) {
                $data = json_decode($body, true);

                if (JSON_ERROR_NONE !== json_last_error()) {
                    $data = $body;
                }

                $context['body'] = $data;
            }

            $this->logger->info($message, $context);
        }
    }

    /**
     * Логирование ответа
     *
     * @param string $body
     * @param int $statusCode
     * @param array $headers
     * @return void
     */
    private function responseLog(string $body, int $statusCode, array $headers): void
    {
        if ($this->logger) {
            $message = 'Response code: ' . $statusCode;
            $context = [];

            if ($body) {
                $data = json_decode($body, true);

                if (JSON_ERROR_NONE !== json_last_error()) {
                    $data = $body;
                }

                $context['body'] = $data;
            }

            if ($headers) {
                $context['headers'] = $headers;
            }

            $this->logger->info($message, $context);
        }
    }
}