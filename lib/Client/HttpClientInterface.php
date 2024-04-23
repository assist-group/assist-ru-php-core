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

    public function setConfig(array $clientConfig);

    public function setLogger(LoggerInterface|null $logger);
}
