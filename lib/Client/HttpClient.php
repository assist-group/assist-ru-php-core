<?php

namespace Assist\Client;

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
     * @param string $uri
     * @param string $method
     * @param array|null $params
     * @param array $headers
     *
     * @return ResponseInterface
     *
     * @throws GuzzleException
     */
    public function request(
        string $method,
        string $uri,
        ?array $params = null,
        array $headers = array()
    ): ResponseInterface {
        $this->requestLog($method, $uri, $params, $headers);
        $this->initHttpClient();
        $response = $this->client->request($method, $uri, ['headers' => $headers, 'form_params' => $params, 'http_errors' => false]);
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
     * @param array $params
     * @param array $headers
     * @return void
     */
    private function requestLog(string $method, string $path, array $params, array $headers): void
    {
        if ($this->logger !== null) {
            $message = 'Send request: ' . $method . ' ' . $path;
            $context = [];

            if ($headers) {
                $context['headers'] = $headers;
            }

            if ($params) {
                $context['body'] = $params;
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
