<?php

namespace Assist\AssistRuPhpCore\Client;

use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

interface HttpClientInterface
{
    public function request(
        string $method,
        string $path,
        ?string $body = null,
        array $headers = array()
    ): ResponseInterface;

    public function setConfig(array $clientConfig);

    public function setLogger(LoggerInterface|null $logger);
}
