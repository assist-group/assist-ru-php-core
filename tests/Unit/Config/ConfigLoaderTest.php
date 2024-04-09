<?php

use Assist\AssistRuPhpCore\Config\HttpClientConfigLoader;

use function PHPUnit\Framework\assertEquals;

it('config load test', function () {
    $configLoader = new HttpClientConfigLoader();
    $path = __DIR__ . DIRECTORY_SEPARATOR . 'test_conf.json';
    $configData = file_get_contents($path);

    $configLoader->loadConfig($path);

    assertEquals(json_decode($configData, true), $configLoader->getConfig());
});
