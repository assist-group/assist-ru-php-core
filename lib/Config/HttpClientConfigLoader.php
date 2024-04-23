<?php

namespace Assist\Config;

class HttpClientConfigLoader implements ApiConfigLoaderInterface
{
    private array|null $config;

    public function getConfig(): array
    {
        return $this->config ?: [];
    }

    public function loadConfig(string $path = null): static
    {
        if ($path) {
            $data = file_get_contents($path);
        } else {
            $data = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.json");
        }

        $params = json_decode($data, true);

        $this->config = $params;

        return $this;
    }
}
