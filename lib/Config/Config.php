<?php

namespace Assist\AssistRuPhpCore\Config;

class Config
{
    public const DEFAULT_API_URL = '';
    public const DEFAULT_TEST_API_URL = '';
    public const DEFAULT_ATTEMPTS_COUNT = 3;
    public const DEFAULT_REQUEST_TIMEOUT_BETWEEN_ATTEMPTS = 90;
    public const DEFAULT_LANGUAGE = 'RU';

    private string $paymentType;
    private bool $isEnableTestMode = false;

    private string $apiUrl;
    private string $testApiUrl;

    private string $successPaymentPageUrl;
    private string $errorPaymentPageUrl;
    private string $lang;

    private string $signSecretWord;
    private string $shopId;

    private string $login;
    private string $password;

    private bool $idRecurrentPayment = false;
    private bool $isEnablePaymentConfirmation = false;
    private bool $isEnableSaveCardDetails = false;
    private int $nds;
    private string $taxSystem;
    private string $calculationMethod;


    public function __construct()
    {
        $this->apiUrl = Config::DEFAULT_API_URL;
        $this->testApiUrl = Config::DEFAULT_TEST_API_URL;
    }
}
