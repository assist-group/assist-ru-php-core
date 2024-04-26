<?php

namespace Assist\Model;

use Assist\Helpers\ResponseHelper;

class Operation
{
    private int $operationType;
    private int|float $amount;
    private string $currency;
    private string $ipAddress;
    private ?string $meanTypeName;
    private string $meanSubType;
    private string $meanNumber;
    private string $cardHolder;
    private ?string $cardExpirationDate;
    private string $issueBank;
    private string $bankCountry;
    private string $responseCode;
    private string $message;
    private string $customerMessage;
    private string $recommendation;
    private string $approvalCode;
    private string $protocolTypeName;
    private string $processingName;
    private ?string $slipno;
    private ?string $authResult;
    private ?string $authRequired;
    private ?string $errorCode;
    private ?ThreeDSData $threeDSData;
    private ?ChequeItem $chequeItem;

    public function __construct(array $operationData)
    {
        $this->authResult = $operationData[ResponseHelper::AUTH_RESULT] ?? null;
        $this->authRequired = $operationData[ResponseHelper::AUTH_REQUIRED] ?? null;

        $threeDSData = $operationData[ResponseHelper::THREEDS_DATA] ?? null;
        $this->threeDSData = $threeDSData ? new ThreeDSData($threeDSData) : null;

        $chequeItemData = $operationData[ResponseHelper::CHEQUE_ITEM] ?? null;
        $this->chequeItem = $chequeItemData ? new ChequeItem($chequeItemData) : null;

        $this->operationType = $operationData[ResponseHelper::OPERATION_TYPE];
        $this->amount = $operationData[ResponseHelper::AMOUNT];
        $this->currency = $operationData[ResponseHelper::CURRENCY];
        $this->ipAddress = $operationData[ResponseHelper::IP_ADDRESS];
        $this->meanTypeName = $operationData[ResponseHelper::MEAN_TYPE_NAME] ?? null;
        $this->meanSubType = $operationData[ResponseHelper::MEAN_SUB_TYPE];
        $this->meanNumber = $operationData[ResponseHelper::MEAN_NUMBER];
        $this->cardHolder = $operationData[ResponseHelper::CARD_EXPIRATION_DATE];
        $this->issueBank = $operationData[ResponseHelper::ISSUE_BANK];
        $this->bankCountry = $operationData[ResponseHelper::BANK_COUNTRY];
        $this->responseCode = $operationData[ResponseHelper::RESPONSE_CODE];
        $this->message = $operationData[ResponseHelper::MESSAGE];
        $this->customerMessage = $operationData[ResponseHelper::CUSTOMER_MESSAGE];
        $this->recommendation = $operationData[ResponseHelper::RECOMMENDATION];
        $this->approvalCode = $operationData[ResponseHelper::APPROVAL_CODE] ?? null;
        $this->protocolTypeName = $operationData[ResponseHelper::PROTOCOL_TYPE_NAME];
        $this->processingName = $operationData[ResponseHelper::PROCESSING_NAME];
        $this->cardExpirationDate = $operationData[ResponseHelper::CARD_EXPIRATION_DATE] ?? null;
        $this->errorCode = $operationData[ResponseHelper::ERROR_CODE] ?? null;
        $this->slipno = $operationData[ResponseHelper::SLIPNO] ?? null;
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
     * Возвращает сумму операции
     *
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
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
     * Возвращает IP-адрес плательщика
     *
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * Возвращает тип платежного средства
     *
     * @return string|null
     */
    public function getMeanTypeName(): string|null
    {
        return $this->meanTypeName;
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
     * Возвращает номер платежного средства
     *
     * @return string
     */
    public function getMeanNumber(): string
    {
        return $this->meanNumber;
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
     * Возвращает срок действия карты
     *
     * @return string|null
     */
    public function getCardExpirationDate(): ?string
    {
        return $this->cardExpirationDate;
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
     * Возвращает страну банка-эмитента
     *
     * @return string
     */
    public function getBankCountry(): string
    {
        return $this->bankCountry;
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
     * Возвращает сообщение о результате операции
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
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
     * Возвращает рекомендацию
     *
     * @return string
     */
    public function getRecommendation(): string
    {
        return $this->recommendation;
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
     * Возвращает протокол
     *
     * @return string
     */
    public function getProtocolTypeName(): string
    {
        return $this->protocolTypeName;
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
     * Возвращает номер финансовой транзакции, отправляемый в процессинг
     *
     * @return string
     */
    public function getSlipno(): string
    {
        return $this->slipno;
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
     * Возвращает результат авторизации по 3DSecure
     *
     * @return string
     */
    public function getAuthResult(): string
    {
        return $this->authResult;
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
     * Возвращает ThreeDSData
     *
     * @return ThreeDSData
     */
    public function getThreeDSData(): ThreeDSData
    {
        return $this->threeDSData;
    }

    /**
     * Возвращает чек
     *
     * @return ChequeItem
     */
    public function getChequeItem(): ChequeItem
    {
        return $this->chequeItem;
    }
}
