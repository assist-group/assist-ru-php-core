<?php

namespace Assist\Model;

use Assist\Helpers\ResponseHelper;

class RecurrentPayment extends Order
{
    private int $operationType;
    private int|float $amount;
    private string $currency;
    private string $meanTypeName;
    private string $meanSubType;
    private string $cardHolder;
    private string $cardExpirationDate;
    private string $issueBank;
    private string $bankCountry;
    private string $responseCode;
    private string $message;
    private string $customerMessage;
    private string $recommendation;
    private string $approvalCode;
    private string $protocolTypeName;
    private string $processingName;
    private string $packetDate;
    private string $signature;
    private ?string $pareq;
    private ?string $acsurl;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->operationType = $data[ResponseHelper::OPERATION_TYPE];
        $this->amount = $data[ResponseHelper::AMOUNT];
        $this->currency = $data[ResponseHelper::CURRENCY];
        $this->meanTypeName = $data[ResponseHelper::MEAN_TYPE_NAME];
        $this->meanSubType = $data[ResponseHelper::MEAN_SUB_TYPE];
        $this->cardHolder = $data[ResponseHelper::CARD_HOLDER];
        $this->cardExpirationDate = $data[ResponseHelper::CARD_EXPIRATION_DATE];
        $this->issueBank = $data[ResponseHelper::ISSUE_BANK];
        $this->bankCountry = $data[ResponseHelper::BANK_COUNTRY];
        $this->responseCode = $data[ResponseHelper::RESPONSE_CODE];
        $this->message = $data[ResponseHelper::MESSAGE];
        $this->customerMessage = $data[ResponseHelper::CUSTOMER_MESSAGE];
        $this->recommendation = $data[ResponseHelper::RECOMMENDATION];
        $this->approvalCode = $data[ResponseHelper::APPROVAL_CODE];
        $this->protocolTypeName = $data[ResponseHelper::PROTOCOL_TYPE_NAME];
        $this->processingName = $data[ResponseHelper::PROCESSING_NAME];
        $this->packetDate = $data[ResponseHelper::PACKET_DATE];
        $this->signature = $data[ResponseHelper::SIGNATURE];
        $this->pareq = $data[ResponseHelper::PAREQ] ?? null;
        $this->acsurl = $data[ResponseHelper::ACSURL] ?? null;
    }

    /**
     * Возвращает тип операции
     *
     * @return int
     */
    public function getOperationType(): int
    {
        return $this->operationType;
    }

    /**
     * Возвращает сумму
     *
     * @return int|float
     */
    public function getAmount(): int|float
    {
        return $this->amount;
    }

    /**
     * Возвращает валюту
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Возвращает тип платёжного средства
     *
     * @return string
     */
    public function getMeanTypeName(): string
    {
        return $this->meanTypeName;
    }

    /**
     * Возвращает подтип платёжного средства
     *
     * @return string
     */
    public function getMeanSubType(): string
    {
        return $this->meanSubType;
    }

    /**
     * Возвращает держателя карты
     *
     * @return string
     */
    public function getCardHolder(): string
    {
        return $this->cardHolder;
    }

    /**
     * Возвращает дату окончания действия карты
     *
     * @return string
     */
    public function getCardExpirationDate(): string
    {
        return $this->cardExpirationDate;
    }

    /**
     * Возвращает банк-эмитент
     *
     * @return string
     */
    public function getIssueBank(): string
    {
        return $this->issueBank;
    }

    /**
     * Возвращает страну банка
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
     * Возвращает сообщение
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Возвращает клиентское сообщение
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
     * Возвращает код подтверждения транзакции
     *
     * @return string
     */
    public function getApprovalCode(): string
    {
        return $this->approvalCode;
    }

    /**
     * Возвращает тип протокола
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
     * Возвращает дату ответа
     *
     * @return string
     */
    public function getPacketDate(): string
    {
        return $this->packetDate;
    }

    /**
     * Возвращает подпись заказа
     *
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @return string
     */
    public function getPareq(): string
    {
        return $this->pareq;
    }

    /**
     * @return string
     */
    public function getAcsurl(): string
    {
        return $this->acsurl;
    }
}
