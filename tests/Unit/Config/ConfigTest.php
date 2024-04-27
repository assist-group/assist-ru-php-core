<?php

use Assist\Config\Config;

use function Pest\Faker\fake;
use function PHPUnit\Framework\assertEquals;

it('should set default values if params not exists', function () {
    $configParams = [
        'merchant_id' => fake()->randomNumber(),
    ];

    $config = new Config($configParams);

    assertEquals(Config::DEFAULT_API_URL, getProperty($config, 'apiUrl'));
    assertEquals(Config::DEFAULT_TEST_MODE_VALUE, getProperty($config, 'isTestMode'));
});

it('should getUrl() return test api url if set test mode', function () {
    $configParams = [
        'merchant_id' => fake()->randomNumber(),
        'test_mode' => true,
    ];

    $config = new Config($configParams);

    assertEquals(Config::DEFAULT_TEST_API_URL, $config->getUrl());
    assertEquals(true, getProperty($config, 'isTestMode'));
});

it('should getUrl() return prod api url if dont set test mode', function () {
    $configParams = [
        'merchant_id' => fake()->randomNumber(),
        'test_mode' => false,
    ];

    $config = new Config($configParams);

    assertEquals(Config::DEFAULT_API_URL, $config->getUrl());
    assertEquals(false, getProperty($config, 'isTestMode'));
});

it('should getPropValue() return default value if prop is not exist', function () {
    $configParams = [
        'merchant_id' => fake()->randomNumber(),
    ];
    $url = fake()->url();
    $config = new Config($configParams);
    $getPropValueMethod = getMethod($config, 'getPropValue');

    $value = $getPropValueMethod->invoke($config, 'api_url', $url);

    assertEquals($url, $value);
});

it('should getPropValue() return null value if prop is not exist and default value is not exist', function () {
    $configParams = [
        'merchant_id' => fake()->randomNumber(),
    ];
    $config = new Config($configParams);
    $getPropValueMethod = getMethod($config, 'getPropValue');

    $value = $getPropValueMethod->invoke($config, 'api_url');

    assertEquals(null, $value);
});
