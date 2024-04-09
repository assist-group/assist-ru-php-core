<?php

use Assist\AssistRuPhpCore\Client\BaseClient;

use Assist\AssistRuPhpCore\Client\HttpClient;
use Assist\AssistRuPhpCore\Config\Config;

use Assist\AssistRuPhpCore\Helpers\HttpHelper;

use GuzzleHttp\Psr7\Response;

use function Pest\Faker\fake;
use function PHPUnit\Framework\assertEquals;

it('should set config', function () {
    $config = ['test', 2];
    $baseClient = new BaseClient();

    $baseClient->setConfig($config);

    assertEquals($config, getProperty($baseClient, 'httpClientConfig'));
});

it('should set logger', function () {
    $logger = new Psr\Log\NullLogger();
    $baseClient = new BaseClient();

    $baseClient->setLogger($logger);

    assertEquals($logger, getProperty($baseClient, 'logger'));
});

it('should set timeout', function () {
    $sleep = 1000;
    $baseClient = new BaseClient();

    $baseClient->setTimeout($sleep);

    assertEquals($sleep, getProperty($baseClient, 'timeout'));
});

it('should set attempts', function () {
    $attempts = 3;
    $baseClient = new BaseClient();

    $baseClient->setAttempts($attempts);

    assertEquals($attempts, getProperty($baseClient, 'attempts'));
});

it('should set to the default timeout', function () {
    $defaultTimeout = Config::REQUEST_TIMEOUT_BETWEEN_ATTEMPTS;

    $baseClient = new BaseClient();

    assertEquals($defaultTimeout, getProperty($baseClient, 'timeout'));
});

it('should return an object implement the ResponseInterface', function () {
    $response = new Response(HttpHelper::CODE_OK);
    $httpClient = Mockery::mock(HttpClient::class);
    $httpClient->shouldReceive('setConfig');
    $httpClient->shouldReceive('request')->once()->andReturn($response);
    $baseClient = new BaseClient($httpClient);

    $result = $baseClient->execute(HttpHelper::METHOD_GET, fake()->url());

    assertEquals($response, $result);
});

it('the count of requests must be equal to the set attempts', function () {
    $response = new Response(HttpHelper::CODE_ETERNAL_SERVER_ERROR);
    $attempts = Config::ATTEMPTS_COUNT + 2;
    $httpClient = Mockery::mock(HttpClient::class);
    $httpClient->shouldReceive('setConfig');
    $httpClient->shouldReceive('request')->times($attempts)->andReturn($response);
    $baseClient = new BaseClient($httpClient);
    $baseClient->setAttempts($attempts);

    $result = $baseClient->execute(HttpHelper::METHOD_GET, fake()->url());

    assertEquals($response, $result);
});

it('the count of requests must be equal to the default attempts, if the attempts have not been set manually', function () {
    $response = new Response(HttpHelper::CODE_ETERNAL_SERVER_ERROR);
    $attempts = Config::ATTEMPTS_COUNT;
    $httpClient = Mockery::mock(HttpClient::class);
    $httpClient->shouldReceive('setConfig');
    $httpClient->shouldReceive('request')->times($attempts)->andReturn($response);
    $baseClient = new BaseClient($httpClient);

    $result = $baseClient->execute(HttpHelper::METHOD_GET, fake()->url());

    assertEquals($response, $result);
});

it('should set auth token in headers', function () {
    $token = fake()->sha256();
    $headers = [];
    $baseClient = new BaseClient();
    $baseClient->setBearerToken($token);
    $prepareHeaders = getMethod($baseClient, 'prepareHeaders');

    $result = $prepareHeaders->invoke($baseClient, $headers);

    assertEquals($token, $result['Authorization']);
});
