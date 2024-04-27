<?php

use Assist\Client\HttpClient;
use GuzzleHttp\Client;

use function Pest\Faker\fake;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;

it('config test', function () {
    $client = new HttpClient();
    $url = fake()->url();
    $config = [
        'url' => $url,
    ];

    $client->setConfig($config);

    assertEquals($config, getProperty($client, 'config'));
});

it('http client init test', function () {
    $client = new HttpClient();
    $initClientMethod = getMethod($client, 'initHttpClient');

    $initClientMethod->invoke($client);

    assertInstanceOf(Client::class, getProperty($client, 'client'));
});
