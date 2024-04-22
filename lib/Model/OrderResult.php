<?php

namespace Assist\AssistRuPhpCore\Model;

use Assist\AssistRuPhpCore\Model\Traits\CheckData;
use Assist\AssistRuPhpCore\Model\Traits\Customer;
use Assist\AssistRuPhpCore\Model\Traits\ThreeDSData;

class OrderResult implements OrderResultInterface
{
    use ThreeDSData, CheckData, Customer;

    /**
     * Код ошибки
     */
    private string $errorCode;

    /**
     * Категория ответов при неуспешных оплатах, полученная от VISA
     */
    private string $errorCategory;

    /**
     * Код уведомления покупателя, полученный от Mastercard
     */
    private string $merchantAdviceCode;

    /**
     * Результат авторизации по 3DSecure (Y - успешно, N - неуспешно, A - Attempt, U – неизвестно, R- отказ, C – не завершено по каким-либо причинам, E - ошибка)
     */
    private string $authResult;

    /**
     * Результат проверки вовлеченности карты (1 – вовлечена, 0 – не вовлечена, -1 – неизвестно, null – ошибка при определении вовлеченности)
     */
    private string $authRequired;

    /**
     * Возвращает код ошибки
     *
     * @return string
     */
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    /**
     * @param string $errorCode
     * @return void
     */
    protected function setErrorCode(string $errorCode): void
    {
        $this->errorCode = $errorCode;
    }

    /**
     * Возвращает категорию ответов при неуспешных оплатах, полученную от VISA
     *
     * @return string
     */
    public function getErrorCategory(): string
    {
        return $this->errorCategory;
    }

    /**
     * @param string $errorCategory
     * @return void
     */
    protected function setErrorCategory(string $errorCategory): void
    {
        $this->errorCategory = $errorCategory;
    }

    /**
     * Возвращает код уведомления покупателя, полученный от Mastercard
     *
     * @return string
     */
    public function getMerchantAdviceCode(): string
    {
        return $this->merchantAdviceCode;
    }

    /**
     * @param string $merchantAdviceCode
     * @return void
     */
    protected function setMerchantAdviceCode(string $merchantAdviceCode): void
    {
        $this->merchantAdviceCode = $merchantAdviceCode;
    }

    /**
     * Возвращает результат авторизации по 3DSecure
     *
     * @return string
     */
    public function getAuthResult(): string
    {
        return $this->authResult;
    }

    /**
     * @param string $authResult
     * @return void
     */
    protected function setAuthResult(string $authResult): void
    {
        $this->authResult = $authResult;
    }

    /**
     * Возвращает результат проверки вовлеченности карты
     *
     * @return string
     */
    public function getAuthRequired(): string
    {
        return $this->authRequired;
    }

    /**
     * @param string $authRequired
     * @return void
     */
    protected function setAuthRequired(string $authRequired): void
    {
        $this->authRequired = $authRequired;
    }
}
