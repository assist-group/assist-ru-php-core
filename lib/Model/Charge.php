<?php

namespace Assist\Model;

use Assist\Helpers\ResponseHelper;

class Charge
{
    private string $orderNumber;
    private string $responseCode;
    private string $recommendation;
    private string $message;
    private string $orderComment;
    private string $orderDate;
    private int|float $amount;
    private string $currency;
    private string $meanTypeName;
    private string $meanNumber;
    private string $issueBank;
    private string $bankCountry;
    private int $rate;
    private string $approvalCode;
    private string $meanSubType;
    private string $cardHolder;
    private string $cardExpirationDate;
    private string $protocolTypeName;
    private int $testMode;
    private string $customerMessage;
    private string $orderState;
    private string $processingName;
    private int $operationType;
    private string $billNumber;
    private int $orderAmount;
    private string $orderCurrency;
    private string $packetDate;
    private string $signature;
    private string $slipno;
    private ?Customer $customer;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->orderNumber = $data[ResponseHelper::ORDER_NUMBER];
        $this->responseCode = $data[ResponseHelper::RESPONSE_CODE];
        $this->recommendation = $data[ResponseHelper::RECOMMENDATION];
        $this->message = $data[ResponseHelper::MESSAGE];
        $this->orderComment = $data[ResponseHelper::ORDER_COMMENT];
        $this->orderDate = $data[ResponseHelper::ORDER_DATE];
        $this->amount = $data[ResponseHelper::AMOUNT];
        $this->currency = $data[ResponseHelper::CURRENCY];
        $this->meanTypeName = $data[ResponseHelper::MEAN_TYPE_NAME];
        $this->meanNumber = $data[ResponseHelper::MEAN_NUMBER];
        $this->issueBank = $data[ResponseHelper::ISSUE_BANK];
        $this->bankCountry = $data[ResponseHelper::BANK_COUNTRY];
        $this->rate = $data[ResponseHelper::RATE];
        $this->approvalCode = $data[ResponseHelper::APPROVAL_CODE];
        $this->meanSubType = $data[ResponseHelper::MEAN_SUB_TYPE];
        $this->cardHolder = $data[ResponseHelper::CARD_HOLDER];
        $this->cardExpirationDate = $data[ResponseHelper::CARD_EXPIRATION_DATE];
        $this->protocolTypeName = $data[ResponseHelper::PROTOCOL_TYPE_NAME];
        $this->testMode = $data[ResponseHelper::TEST_MODE];
        $this->customerMessage = $data[ResponseHelper::CUSTOMER_MESSAGE];
        $this->orderState = $data[ResponseHelper::ORDER_STATE];
        $this->processingName = $data[ResponseHelper::PROCESSING_NAME];
        $this->operationType = $data[ResponseHelper::OPERATION_TYPE];
        $this->billNumber = $data[ResponseHelper::BILL_NUMBER];
        $this->orderAmount = $data[ResponseHelper::ORDER_AMOUNT];
        $this->orderCurrency = $data[ResponseHelper::CURRENCY];
        $this->packetDate = $data[ResponseHelper::PACKET_DATE];
        $this->signature = $data[ResponseHelper::SIGNATURE];
        $this->slipno = $data[ResponseHelper::SLIPNO];

        $customerData = $data[ResponseHelper::CUSTOMER] ?? null;
        $this->customer = $customerData ? new Customer($customerData) : null;
    }

    /**
     * Возвращает номер заказа
     *
     * @return string
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
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
     * Возвращает рекомендацию
     *
     * @return string
     */
    public function getRecommendation(): string
    {
        return $this->recommendation;
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
     * Возвращает комментарий к заказу
     *
     * @return string
     */
    public function getOrderComment(): string
    {
        return $this->orderComment;
    }

    /**
     * Возвращает дату заказа
     *
     * @return string
     */
    public function getOrderDate(): string
    {
        return $this->orderDate;
    }

    /**
     * Возвращает сумму
     *
     * @return float
     */
    public function getAmount(): float
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
     * Возвращает номер платёжного средства
     *
     * @return string
     */
    public function getMeanNumber(): string
    {
        return $this->meanNumber;
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
     * Возвращает курс валют
     *
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
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
     * Возвращает тип протокола
     *
     * @return string
     */
    public function getProtocolTypeName(): string
    {
        return $this->protocolTypeName;
    }

    /**
     * Возвращает признак тестовый режим
     *
     * @return int
     */
    public function getTestMode(): int
    {
        return $this->testMode;
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
     * Возвращает статус заказа
     *
     * @return string
     */
    public function getOrderState(): string
    {
        return $this->orderState;
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
     * Возвращает тип операции
     *
     * @return int
     */
    public function getOperationType(): int
    {
        return $this->operationType;
    }

    /**
     * Возвращает номер billnumber
     *
     * @return string
     */
    public function getBillNumber(): string
    {
        return $this->billNumber;
    }

    /**
     * Возвращает сумму
     *
     * @return int
     */
    public function getOrderAmount(): int
    {
        return $this->orderAmount;
    }

    /**
     * Возвращает валюту
     *
     * @return string
     */
    public function getOrderCurrency(): string
    {
        return $this->orderCurrency;
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
    public function getSlipno(): string
    {
        return $this->slipno;
    }

    /**
     * Возвращает покупателя
     *
     * @return Customer|null
     */
    public function getCustomer(): Customer|null
    {
        return $this->customer;
    }
}
