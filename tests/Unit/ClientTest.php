<?php

use Assist\Client;
use Assist\Config\Config;
use Assist\Helpers\ConfigHelper;
use Assist\Helpers\RequestHelper;
use Assist\Request\CreatePayment\CreatePaymentRequest;

use function PHPUnit\Framework\assertEquals;

it('should set auth params from base config if auth params dont set in request config', function () {
    $createPaymentRequest = new CreatePaymentRequest([]);
    $login = 'login';
    $password = 'password';
    $config = new Config([
        ConfigHelper::PARAM_MERCHANT_ID => '1234',
        ConfigHelper::PARAM_LOGIN => $login,
        ConfigHelper::PARAM_PASSWORD => $password,
    ]);
    $client = new Client($config);
    $prepareRequestAuthParamsMethod = getMethod($client, 'prepareRequestAuthParams');

    $prepareRequestAuthParamsMethod->invoke($client, $createPaymentRequest);

    assertEquals($login, $createPaymentRequest->getLoginParam());
    assertEquals($password, $createPaymentRequest->getPasswordParam());
});

it('should set auth params from request config if auth params set in request config', function () {
    $requestLogin = 'requestLogin';
    $requestPassword = 'requestPassword';
    $createPaymentRequest = new CreatePaymentRequest([
        RequestHelper::PARAM_LOGIN => $requestLogin,
        RequestHelper::PARAM_PASSWORD => $requestPassword,
    ]);
    $config = new Config([
        ConfigHelper::PARAM_MERCHANT_ID => '1234',
        ConfigHelper::PARAM_LOGIN => 'baseConfigLogin',
        ConfigHelper::PARAM_PASSWORD => 'baseConfigLogin',
    ]);
    $client = new Client($config);
    $prepareRequestAuthParamsMethod = getMethod($client, 'prepareRequestAuthParams');

    $prepareRequestAuthParamsMethod->invoke($client, $createPaymentRequest);

    assertEquals($requestLogin, $createPaymentRequest->getLoginParam());
    assertEquals($requestPassword, $createPaymentRequest->getPasswordParam());
});

it('should set language param from base config if language param dont set in request config', function () {
    $createPaymentRequest = new CreatePaymentRequest([]);
    $language = 'ENG';
    $config = new Config([
        ConfigHelper::PARAM_MERCHANT_ID => '1234',
        ConfigHelper::PARAM_LANG => $language,
    ]);
    $client = new Client($config);
    $prepareRequestLanguageParamMethod = getMethod($client, 'prepareRequestLanguageParam');

    $prepareRequestLanguageParamMethod->invoke($client, $createPaymentRequest);

    assertEquals($language, $createPaymentRequest->getLanguageParam());
});

it('should set language param from request config if language param set in request config', function () {
    $languageRequest = 'ENG';
    $createPaymentRequest = new CreatePaymentRequest([
        RequestHelper::PARAM_LANGUAGE => $languageRequest,
    ]);
    $config = new Config([
        ConfigHelper::PARAM_MERCHANT_ID => '1234',
        ConfigHelper::PARAM_LANG => 'RUS',
    ]);
    $client = new Client($config);
    $prepareRequestLanguageParamMethod = getMethod($client, 'prepareRequestLanguageParam');

    $prepareRequestLanguageParamMethod->invoke($client, $createPaymentRequest);

    assertEquals($languageRequest, $createPaymentRequest->getLanguageParam());
});

it('should set merchant id param from base config if merchant id param dont set in request config', function () {
    $createPaymentRequest = new CreatePaymentRequest([]);
    $merchantId = '1234';
    $config = new Config([
        ConfigHelper::PARAM_MERCHANT_ID => $merchantId,
    ]);
    $client = new Client($config);
    $prepareRequestLanguageParamMethod = getMethod($client, 'prepareRequestMerchantParam');

    $prepareRequestLanguageParamMethod->invoke($client, $createPaymentRequest);

    assertEquals($merchantId, $createPaymentRequest->getMerchantId());
});

it('should set merchant id param from request config if merchant id param set in request config', function () {
    $requestMerchantId = '4321';
    $createPaymentRequest = new CreatePaymentRequest([
        RequestHelper::PARAM_MERCHANT_ID => $requestMerchantId,
    ]);
    $baseMerchantId = '1234';
    $config = new Config([
        ConfigHelper::PARAM_MERCHANT_ID => $baseMerchantId,
    ]);
    $client = new Client($config);
    $prepareRequestLanguageParamMethod = getMethod($client, 'prepareRequestMerchantParam');

    $prepareRequestLanguageParamMethod->invoke($client, $createPaymentRequest);

    assertEquals($requestMerchantId, $createPaymentRequest->getMerchantId());
});
