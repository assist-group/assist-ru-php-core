<?php

namespace Assist\Client;

use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

interface HttpClientInterface
{
    public function request(
        string $method,
        string $uri,
        ?array $params = null,
        array $headers = array()
    ): ResponseInterface;

    /**
     * @param array $clientConfig
     * @return void
     */
    public function setConfig(array $clientConfig): void;

    /**
     * @param LoggerInterface|null $logger
     * @return void
     */
    public function setLogger(LoggerInterface|null $logger): void;
}
