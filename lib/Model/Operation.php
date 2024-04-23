<?php

namespace Assist\Model;

use Assist\Helpers\ResponseHelper;
use http\Env\Response;

class Operation
{
    use Traits\Operation;


    /**
     * Результат авторизации по 3DSecure (Y - успешно, N - неуспешно, A - Attempt, U – неизвестно, R- отказ, C – не завершено по каким-либо причинам, E - ошибка)
     */
    private string $authResult;

    /**
     * Результат проверки вовлеченности карты (1 – вовлечена, 0 – не вовлечена, -1 – неизвестно, null – ошибка при определении вовлеченности)
     */
    private string $authRequired;

    /**
     * Код ошибки
     */
    private string $errorCode;

    /**
     * @var ThreeDSData
     */
    private ThreeDSData $threeDSData;

    /**
     * @var ChequeItem
     */
    private ChequeItem $chequeItem;

    public function __construct(array $operationData)
    {
        $this->authResult = $operationData[ResponseHelper::AUTH_RESULT];
        $this->authRequired = $operationData[ResponseHelper::AUTH_REQUIRED];

        $threeDSData = $operationData[ResponseHelper::THREEDS_DATA];
        $this->threeDSData = new ThreeDSData(
            $threeDSData[ResponseHelper::VERSION],
            $threeDSData[ResponseHelper::ALPHA_AUTH_RESULT],
            $threeDSData[ResponseHelper::CHALLENGE],
            $threeDSData[ResponseHelper::ECI],
        );

        $chequeItemData = $operationData[ResponseHelper::CHEQUE_ITEM];
        $this->chequeItem = new ChequeItem($chequeItemData);
    }

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

    /**
     * @return ThreeDSData
     */
    public function getThreeDSData(): ThreeDSData
    {
        return $this->threeDSData;
    }

    /**
     * @param ThreeDSData $threeDSData
     * @return void
     */
    protected function setThreeDSData(ThreeDSData $threeDSData): void
    {
        $this->threeDSData = $threeDSData;
    }

    /**
     * @return ChequeItem
     */
    public function getChequeItem(): ChequeItem
    {
        return $this->chequeItem;
    }

    /**
     * @param ChequeItem $chequeItem
     * @return void
     */
    protected function setChequeItem(ChequeItem $chequeItem): void
    {
        $this->chequeItem = $chequeItem;
    }


    /**
     * Возвращает тип операции
     *
     * @return string
     */
    public function getOperationType(): string
    {
        return $this->operationType;
    }

    /**
     * @param string $operationType
     * @return void
     */
    protected function setOperationType(string $operationType): void
    {
        $this->operationType = $operationType;
    }

    /**
     * Возвращает сумму операции
     *
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     * @return void
     */
    protected function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Возвращает валюту операции
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return void
     */
    protected function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * Возвращает IP-адрес плательщика
     *
     * @return string
     */
    public function getIpaddress(): string
    {
        return $this->ipaddress;
    }

    /**
     * @param string $ipaddress
     * @return void
     */
    protected function setIpaddress(string $ipaddress): void
    {
        $this->ipaddress = $ipaddress;
    }

    /**
     * Возвращает тип платежного средства
     *
     * @return string
     */
    public function getMeanTypeName(): string
    {
        return $this->meanTypeName;
    }

    /**
     * @param string $meanTypeName
     * @return void
     */
    protected function setMeanTypeName(string $meanTypeName): void
    {
        $this->meanTypeName = $meanTypeName;
    }

    /**
     * Возвращает подтип платежного средства
     *
     * @return string
     */
    public function getMeanSubType(): string
    {
        return $this->meanSubType;
    }

    /**
     * @param string $meanSubSype
     * @return void
     */
    protected function setMeanSubType(string $meanSubSype): void
    {
        $this->meanSubType = $meanSubSype;
    }

    /**
     * Возвращает номер платежного средства
     *
     * @return string
     */
    public function getMeanNumber(): string
    {
        return $this->meanNumber;
    }

    /**
     * @param string $meanNumber
     * @return void
     */
    protected function setMeanNumber(string $meanNumber): void
    {
        $this->meanNumber = $meanNumber;
    }

    /**
     * Возвращает держателя платежного средства
     *
     * @return string
     */
    public function getCardHolder(): string
    {
        return $this->cardHolder;
    }

    /**
     * @param string $cardHolder
     * @return void
     */
    protected function setCardHolder(string $cardHolder): void
    {
        $this->cardHolder = $cardHolder;
    }

    /**
     * Возвращает срок действия карты
     *
     * @return string
     */
    public function getCardExpirationDate(): string
    {
        return $this->cardExpirationDate;
    }

    /**
     * @param string $cardExpirationDate
     * @return void
     */
    protected function setCardExpirationDate(string $cardExpirationDate): void
    {
        $this->cardExpirationDate = $cardExpirationDate;
    }

    /**
     * Возвращает название банка-эмитента
     *
     * @return string
     */
    public function getIssueBank(): string
    {
        return $this->issueBank;
    }

    /**
     * @param string $issueBank
     * @return void
     */
    protected function setIssueBank(string $issueBank): void
    {
        $this->issueBank = $issueBank;
    }

    /**
     * Возвращает страну банка-эмитента
     *
     * @return string
     */
    public function getBankCountry(): string
    {
        return $this->bankCountry;
    }

    /**
     * @param string $bankCountry
     * @return void
     */
    protected function setBankCountry(string $bankCountry): void
    {
        $this->bankCountry = $bankCountry;
    }

    /**
     * Возвращает код ответа
     *
     * @return string
     */
    public function getResponseCode(): string
    {
        return $this->responseCode;
    }

    /**
     * @param string $responseCode
     * @return void
     */
    protected function setResponseCode(string $responseCode): void
    {
        $this->responseCode = $responseCode;
    }

    /**
     * Возвращает сообщение о результате операции
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return void
     */
    protected function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * Возвращает сообщение о результате для покупателя
     *
     * @return string
     */
    public function getCustomerMessage(): string
    {
        return $this->customerMessage;
    }

    /**
     * @param string $customerMessage
     * @return void
     */
    protected function setCustomerMessage(string $customerMessage): void
    {
        $this->customerMessage = $customerMessage;
    }

    /**
     * Возвращает рекомендацию
     *
     * @return string
     */
    public function getRecommendation(): string
    {
        return $this->recommendation;
    }

    /**
     * @param string $recommendation
     * @return void
     */
    protected function setRecommendation(string $recommendation): void
    {
        $this->recommendation = $recommendation;
    }

    /**
     * Возвращает код авторизации
     *
     * @return string
     */
    public function getApprovalCode(): string
    {
        return $this->approvalCode;
    }

    /**
     * @param string $approvalCode
     * @return void
     */
    protected function setApprovalCode(string $approvalCode): void
    {
        $this->approvalCode = $approvalCode;
    }

    /**
     * Возвращает протокол
     *
     * @return string
     */
    public function getProtocolTypeName(): string
    {
        return $this->protocolTypeName;
    }

    /**
     * @param string $protocolTypeName
     * @return void
     */
    protected function setProtocolTypeName(string $protocolTypeName): void
    {
        $this->protocolTypeName = $protocolTypeName;
    }

    /**
     * Возвращает процессинг
     *
     * @return string
     */
    public function getProcessingName(): string
    {
        return $this->processingName;
    }

    /**
     * @param string $processingName
     * @return void
     */
    public function setProcessingName(string $processingName): void
    {
        $this->processingName = $processingName;
    }

    /**
     * @param string $slipno
     * @return void
     */
    public function setSlipno(string $slipno): void
    {
        $this->slipno = $slipno;
    }
}
