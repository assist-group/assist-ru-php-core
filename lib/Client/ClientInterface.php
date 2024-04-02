<?php

namespace Assist\AssistRuPhpCore\Client;

interface ClientInterface
{
    public function request(
        string $path,
        string $method,
        array $queryParams,
        string|null $httpBody = null,
        array $headers = array()
    );

    public function setBearerToken($bearerToken);

    public function setConfig(array $config);
}
