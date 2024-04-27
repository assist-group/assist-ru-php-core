<?php

namespace Assist\Config;

use Assist\Helpers\ConfigHelper;

class Config
{
    public const DEFAULT_API_URL = 'https://payments.paysecure.ru';
    public const DEFAULT_TEST_API_URL = 'https://payments.demo.paysecure.ru';
    public const DEFAULT_TEST_MODE_VALUE = false;
    public const DEFAULT_ATTEMPTS_COUNT = 3;
    public const DEFAULT_REQUEST_TIMEOUT_BETWEEN_ATTEMPTS = 90;
    public const DEFAULT_LANGUAGE = 'RU';

    private array $configProps;
    private bool $isTestMode;
    private string $apiUrl;
    private string $testApiUrl;
    private string $lang;
    private string $merchantId;
    private ?string $login;
    private ?string $password;

    /**
     * @param array $configParams
     */
    public function __construct(array $configParams)
    {
        $this->configProps = $configParams;
        $this->setProps();
    }

    /**
     * @return void
     */
    private function setProps(): void
    {
        $this->apiUrl = $this->getPropValue(
            ConfigHelper::PARAM_API_URL,
            self::DEFAULT_API_URL
        );
        $this->testApiUrl = $this->getPropValue(
            ConfigHelper::PARAM_TEST_API_URL,
            self::DEFAULT_TEST_API_URL
        );
        $this->isTestMode = $this->getPropValue(
            ConfigHelper::PARAM_TEST_MODE,
            self::DEFAULT_TEST_MODE_VALUE
        );
        $this->lang = $this->getPropValue(ConfigHelper::PARAM_LANG, self::DEFAULT_LANGUAGE);
        $this->merchantId = $this->getPropValue(ConfigHelper::PARAM_MERCHANT_ID);
        $this->login = $this->getPropValue(ConfigHelper::PARAM_LOGIN);
        $this->password = $this->getPropValue(ConfigHelper::PARAM_PASSWORD);
    }

    /**
     * @param string $propName
     * @param string|null $defaultValue
     * @return mixed|string|null
     */
    private function getPropValue(string $propName, string $defaultValue = null): mixed
    {
        return array_key_exists($propName, $this->configProps)
            ? $this->configProps[$propName]
            : $defaultValue;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->isTestMode ? $this->testApiUrl : $this->apiUrl;
    }

    /**
     * @return string|null
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * @return string|null
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->lang;
    }
}
