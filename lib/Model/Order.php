<?php

namespace Assist\Model;

use Assist\Helpers\ResponseHelper;

class Order
{
    private string $billNumber;
    private string $orderNumber;
    private int $testMode;
    private string $orderComment;
    private string $orderAmount;
    private string $orderCurrency;
    private string $orderDate;
    private string $orderState;
    private ?int $rate;
    private ?string $errorCode;
    private ?Customer $customer;

    /**
     * @var Operation[]
     */
    private array $operations;

    /**
     * @var CheckData|null
     */
    private ?CheckData $checkData;

    public function __construct(array $data)
    {
        $this->billNumber = $data[ResponseHelper::BILL_NUMBER];
        $this->orderNumber = $data[ResponseHelper::ORDER_NUMBER];
        $this->testMode = $data[ResponseHelper::TEST_MODE];
        $this->orderComment = $data[ResponseHelper::ORDER_COMMENT];
        $this->orderAmount = $data[ResponseHelper::ORDER_AMOUNT];
        $this->orderCurrency = $data[ResponseHelper::ORDER_CURRENCY];
        $this->orderDate = $data[ResponseHelper::ORDER_DATE];
        $this->orderState = $data[ResponseHelper::ORDER_STATE];
        $this->rate = $data[ResponseHelper::RATE] ?? null;
        $this->errorCode = $data[ResponseHelper::ERROR_CODE] ?? null;

        $customerData = $data[ResponseHelper::CUSTOMER] ?? null;
        $this->customer = $customerData ? new Customer($customerData) : null;

        $checkDataArray = $data[ResponseHelper::CHECK_DATA] ?? null;
        $this->checkData = $checkDataArray ? new CheckData($checkDataArray) : null;

        $operations = $data[ResponseHelper::OPERATIONS] ?? [];
        $operationsResult = [];

        foreach ($operations as $operation) {
            $operationsResult[] = new Operation($operation);
        }

        $this->operations = $operationsResult;
    }

    /**
     * Получает уникальный номер заказа в системе.
     *
     * @return string
     */
    public function getBillNumber(): string
    {
        return $this->billNumber;
    }

    /**
     * Получает номер заказа.
     *
     * @return string
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    /**
     * Возвращает признак тестового режима
     *
     * @return bool
     */
    public function getTestMode(): bool
    {
        return $this->testMode;
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
     * Возвращает оригинальную сумму заказа
     *
     * @return string
     */
    public function getOrderAmount(): string
    {
        return $this->orderAmount;
    }

    /**
     * Возвращает оригинальную валюту заказа
     *
     * @return string
     */
    public function getOrderCurrency(): string
    {
        return $this->orderCurrency;
    }

    /**
     * Возвращает курс валют
     *
     * @return string|null
     */
    public function getRate(): string|null
    {
        return $this->rate;
    }

    /**
     * Возвращает дату заказа по Гринвичу (GMT)
     *
     * @return string
     */
    public function getOrderDate(): string
    {
        return $this->orderDate;
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
     * Возвращает код ошибки
     *
     * @return string|null
     */
    public function getErrorCode(): string|null
    {
        return $this->errorCode;
    }

    /**
     * Возвращает данные покупателя
     *
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @return Operation[]
     */
    public function getOperations(): array
    {
        return $this->operations;
    }

    /**
     * @return CheckData
     */
    public function getCheckData(): CheckData
    {
        return $this->checkData;
    }
}
