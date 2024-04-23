<?php

namespace Assist\Config;

class Config
{
    public const DEFAULT_API_URL = 'https://payments.paysecure.ru';
    public const DEFAULT_TEST_API_URL = 'https://payments.demo.paysecure.ru';
    public const DEFAULT_TEST_MODE_VALUE = false;
    public const DEFAULT_SAVE_CARD_DETAILS_VALUE = false;
    public const DEFAULT_PAYMENT_CONFIRMATION_VALUE = false;
    public const DEFAULT_ATTEMPTS_COUNT = 3;
    public const DEFAULT_REQUEST_TIMEOUT_BETWEEN_ATTEMPTS = 90;
    public const DEFAULT_LANGUAGE = 'RU';

    private array $configProps;
    private ?string $paymentType;
    private bool $isTestMode;

    private string $apiUrl;
    private string $testApiUrl;

    private ?string $successPaymentPageUrl;
    private ?string $errorPaymentPageUrl;
    private string $lang;

    private ?string $signSecretWord;
    private string $shopId;

    private ?string $login;
    private ?string $password;

    private bool $isRecurrentPayment = false;
    private bool $isEnablePaymentConfirmation = false;
    private bool $isEnableSaveCardDetails = false;
    private ?int $nds;
    private ?string $taxSystem;
    private ?string $calculationMethod;


    public function __construct(array $configParams)
    {
        $this->configProps = $configParams;
        $this->setProps();
    }

    private function setProps()
    {
        $this->apiUrl = $this->getPropValue('api_url', self::DEFAULT_API_URL);
        $this->testApiUrl = $this->getPropValue('test_api_url', self::DEFAULT_TEST_API_URL);
        $this->isTestMode = $this->getPropValue('test_mode', self::DEFAULT_TEST_MODE_VALUE);
        $this->successPaymentPageUrl = $this->getPropValue('success_payment_page_url');
        $this->errorPaymentPageUrl = $this->getPropValue('error_payment_page_url');
        $this->lang = $this->getPropValue('lang', self::DEFAULT_LANGUAGE);
        $this->signSecretWord = $this->getPropValue('sign_secret_word');
        $this->shopId = $this->getPropValue('shop_id');
        $this->login = $this->getPropValue('login');
        $this->password = $this->getPropValue('password');
        $this->isEnablePaymentConfirmation = $this->getPropValue('payment_confirmation', self::DEFAULT_PAYMENT_CONFIRMATION_VALUE);
        $this->isEnableSaveCardDetails = $this->getPropValue('save_card_details', self::DEFAULT_SAVE_CARD_DETAILS_VALUE);
        $this->paymentType = $this->getPropValue('payment_type');
        $this->nds = $this->getPropValue('nds');
        $this->taxSystem = $this->getPropValue('tax_system');
        $this->calculationMethod = $this->getPropValue('calculation_method');
    }

    private function getPropValue(string $propName, string $defaultValue = null)
    {
        return array_key_exists($propName, $this->configProps)
            ? $this->configProps[$propName]
            : $defaultValue;
    }

    public function getUrl()
    {
        return $this->isTestMode ? $this->testApiUrl : $this->apiUrl;
    }
}
