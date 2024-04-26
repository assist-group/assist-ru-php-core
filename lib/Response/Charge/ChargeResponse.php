<?php

namespace Assist\Response\Charge;

use Assist\Helpers\ResponseHelper;
use Assist\Model\Customer;
use Assist\Response\Response;

class ChargeResponse extends Response implements ChargeResponseInterface
{
    private string $customerMessage;
    private string $message;
    private int $testMode;
    private int $operationType;
    private string $orderDate;
    private string $packetDate;
    private int|float $orderAmount;
    private string $orderComment;
    private string $cardExpirationDate;
    private string $orderCurrency;
    private string $recommendation;
    private string $processingName;
    private string $meanNumber;
    private string $orderState;
    private int $rate;
    private int|float $amount;
    private string $responseCode;
    private string $meanTypeName;
    private string $protocolTypeName;
    private string $bankCountry;
    private string $cardHolder;
    private string $approvalCode;
    private string $slipno;
    private string $signature;
    private string $billNumber;
    private string $issueBank;
    private string $currency;
    private string $orderNumber;
    private string $meanSubType;
    private ?Customer $customer;

    /**
     * @param array $responseData
     */
    public function __construct(array $responseData)
    {
        $this->responseData = $responseData['charge'];
        $this->setPropsFromArray($this->responseData);
    }

    /**
     * @param array $responseData
     * @return void
     */
    private function setPropsFromArray(array $responseData): void
    {
        $this->customerMessage = $responseData[ResponseHelper::CUSTOMER_MESSAGE];
        $this->message = $responseData[ResponseHelper::MESSAGE];
        $this->testMode = $responseData[ResponseHelper::TEST_MODE];
        $this->operationType = $responseData[ResponseHelper::OPERATION_TYPE];
        $this->orderDate = $responseData[ResponseHelper::ORDER_DATE];
        $this->packetDate = $responseData[ResponseHelper::PACKET_DATE];
        $this->orderAmount = $responseData[ResponseHelper::ORDER_AMOUNT];
        $this->orderComment = $responseData[ResponseHelper::ORDER_COMMENT];
        $this->cardExpirationDate = $responseData[ResponseHelper::CARD_EXPIRATION_DATE];
        $this->orderCurrency = $responseData[ResponseHelper::ORDER_CURRENCY];
        $this->recommendation = $responseData[ResponseHelper::RECOMMENDATION];
        $this->processingName = $responseData[ResponseHelper::PROCESSING_NAME];
        $this->meanNumber = $responseData[ResponseHelper::MEAN_NUMBER];
        $this->orderState = $responseData[ResponseHelper::ORDER_STATE];
        $this->rate = $responseData[ResponseHelper::RATE];
        $this->amount = $responseData[ResponseHelper::AMOUNT];
        $this->responseCode = $responseData[ResponseHelper::RESPONSE_CODE];
        $this->meanTypeName = $responseData[ResponseHelper::MEAN_TYPE_NAME];
        $this->protocolTypeName = $responseData[ResponseHelper::PROTOCOL_TYPE_NAME];
        $this->bankCountry = $responseData[ResponseHelper::BANK_COUNTRY];
        $this->cardHolder = $responseData[ResponseHelper::CARD_HOLDER];
        $this->approvalCode = $responseData[ResponseHelper::APPROVAL_CODE];
        $this->slipno = $responseData[ResponseHelper::SLIPNO];
        $this->signature = $responseData[ResponseHelper::SIGNATURE];
        $this->billNumber = $responseData[ResponseHelper::BILL_NUMBER];
        $this->issueBank = $responseData[ResponseHelper::ISSUE_BANK];
        $this->currency = $responseData[ResponseHelper::CURRENCY];
        $this->orderNumber = $responseData[ResponseHelper::ORDER_NUMBER];
        $this->meanSubType = $responseData[ResponseHelper::MEAN_SUB_TYPE];

        $customerData = $responseData[ResponseHelper::CUSTOMER] ?? null;
        $this->customer = $customerData ? new Customer($customerData) : null;
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
     * Возвращает сообщение
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
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
     * Возвращает тип операции
     *
     * @return int
     */
    public function getOperationType(): int
    {
        return $this->operationType;
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
     * Возвращает дату ответа
     *
     * @return string
     */
    public function getPacketDate(): string
    {
        return $this->packetDate;
    }

    /**
     * Возвращает сумму
     *
     * @return int|float
     */
    public function getOrderAmount(): int|float
    {
        return $this->orderAmount;
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
     * Возвращает дату окончания действия карты
     *
     * @return string
     */
    public function getCardExpirationDate(): string
    {
        return $this->cardExpirationDate;
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
     * Возвращает рекомендацию
     *
     * @return string
     */
    public function getRecommendation(): string
    {
        return $this->recommendation;
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
     * Возвращает номер платёжного средства
     *
     * @return string
     */
    public function getMeanNumber(): string
    {
        return $this->meanNumber;
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
     * Возвращает курс валют
     *
     * @return int|float
     */
    public function getRate(): int|float
    {
        return $this->rate;
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
     * Возвращает код ответа
     *
     * @return string
     */
    public function getResponseCode(): string
    {
        return $this->responseCode;
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
     * Возвращает тип протокола
     *
     * @return string
     */
    public function getProtocolTypeName(): string
    {
        return $this->protocolTypeName;
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
     * Возвращает держателя карты
     *
     * @return string
     */
    public function getCardHolder(): string
    {
        return $this->cardHolder;
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
     * @return string
     */
    public function getSlipno(): string
    {
        return $this->slipno;
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
     * Возвращает номер billnumber
     *
     * @return string
     */
    public function getBillNumber(): string
    {
        return $this->billNumber;
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
     * Возвращает валюту
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
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
     * Возвращает подтип платёжного средства
     *
     * @return string
     */
    public function getMeanSubType(): string
    {
        return $this->meanSubType;
    }

    /**
     * Возвращает покупателя
     *
     * @return Customer|null
     */
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }
}
