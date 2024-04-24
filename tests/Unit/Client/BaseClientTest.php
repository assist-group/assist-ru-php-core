<?php

use Assist\Client\BaseClient;

use Assist\Client\HttpClient;
use Assist\Config\Config;

use Assist\Exceptions\AuthException;
use Assist\Helpers\HttpHelper;

use GuzzleHttp\Psr7\Response;

use function Pest\Faker\fake;
use function PHPUnit\Framework\assertEquals;

it('should set config', function () {
    $config = Mockery::mock(Config::class);
    $clientConfig = ['test', 2];
    $httpClient = Mockery::mock(HttpClient::class);
    $httpClient->shouldReceive('setConfig')->times(2);
    $baseClient = new BaseClient($config, $httpClient);

    $baseClient->setHttpClientConfig($clientConfig);
});

it('should set logger', function () {
    $config = Mockery::mock(Config::class);
    $logger = new Psr\Log\NullLogger();
    $baseClient = new BaseClient($config);

    $baseClient->setLogger($logger);

    assertEquals($logger, getProperty($baseClient, 'logger'));
});

it('should set timeout', function () {
    $config = Mockery::mock(Config::class);
    $sleep = 1000;
    $baseClient = new BaseClient($config);

    $baseClient->setTimeout($sleep);

    assertEquals($sleep, getProperty($baseClient, 'timeout'));
});

it('should set attempts', function () {
    $config = Mockery::mock(Config::class);
    $attempts = 3;
    $baseClient = new BaseClient($config);

    $baseClient->setAttempts($attempts);

    assertEquals($attempts, getProperty($baseClient, 'attempts'));
});

it('should set to the default timeout', function () {
    $config = Mockery::mock(Config::class);
    $defaultTimeout = Config::DEFAULT_REQUEST_TIMEOUT_BETWEEN_ATTEMPTS;

    $baseClient = new BaseClient($config);

    assertEquals($defaultTimeout, getProperty($baseClient, 'timeout'));
});

it('should return an object implement the ResponseInterface', function () {
    $config = Mockery::mock(Config::class);
    $config->shouldReceive('getUrl')->once()->andReturn(fake()->url());
    $response = new Response(HttpHelper::CODE_OK);
    $httpClient = Mockery::mock(HttpClient::class);
    $httpClient->shouldReceive('setConfig');
    $httpClient->shouldReceive('request')->once()->andReturn($response);
    $baseClient = new BaseClient($config, $httpClient);
    $executeMethod = getMethod($baseClient, 'execute');

    $result = $executeMethod->invoke($baseClient, fake()->filePath(), [], HttpHelper::METHOD_GET);

    assertEquals($response, $result);
});

it('the count of requests must be equal to the set attempts', function () {
    $config = Mockery::mock(Config::class);
    $config->shouldReceive('getUrl')->once()->andReturn(fake()->url());
    $response = new Response(HttpHelper::CODE_INTERNAL_SERVER_ERROR);
    $attempts = Config::DEFAULT_ATTEMPTS_COUNT + 2;
    $httpClient = Mockery::mock(HttpClient::class);
    $httpClient->shouldReceive('setConfig');
    $httpClient->shouldReceive('request')->times($attempts)->andReturn($response);
    $baseClient = new BaseClient($config, $httpClient);
    $baseClient->setAttempts($attempts);
    $executeMethod = getMethod($baseClient, 'execute');

    $result = $executeMethod->invoke($baseClient, fake()->filePath(), [], HttpHelper::METHOD_GET);

    assertEquals($response, $result);
});

it('the count of requests must be equal to the default attempts, if the attempts have not been set manually', function () {
    $config = Mockery::mock(Config::class);
    $config->shouldReceive('getUrl')->once()->andReturn(fake()->url());
    $response = new Response(HttpHelper::CODE_INTERNAL_SERVER_ERROR);
    $attempts = Config::DEFAULT_ATTEMPTS_COUNT;
    $httpClient = Mockery::mock(HttpClient::class);
    $httpClient->shouldReceive('setConfig');
    $httpClient->shouldReceive('request')->times($attempts)->andReturn($response);
    $baseClient = new BaseClient($config, $httpClient);
    $executeMethod = getMethod($baseClient, 'execute');

    $result = $executeMethod->invoke($baseClient, fake()->filePath(), [], HttpHelper::METHOD_GET);

    assertEquals($response, $result);
});
