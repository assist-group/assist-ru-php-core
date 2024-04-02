<?php

namespace Assist\AssistRuPhpCore\Client;

class CurlClient implements ClientInterface
{

    public function request(
        string $path,
        string $method,
        array $queryParams,
        ?string $httpBody = null,
        array $headers = array()
    ) {
        // TODO: Implement request() method.
    }

    public function setBearerToken($bearerToken)
    {
        // TODO: Implement setBearerToken() method.
    }

    public function setConfig(array $config)
    {
        // TODO: Implement setConfig() method.
    }
}
