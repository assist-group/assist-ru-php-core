<?php

namespace Assist\Model;

use Assist\Helpers\ResponseHelper;

class Order
{
    /**
     * Уникальный номер заказа в системе АПК Ассист, расширенный формат.
     */
    private string $billNumber;

    /**
     * Номер заказа.
     */
    private string $orderNumber;

    /**
     * Тестовый режим.
     */
    private int $testMode;

    /**
     * Комментарий к заказу.
     */
    private string $orderComment;

    /**
     * Оригинальная сумма заказа.
     */
    private string $orderAmount;

    /**
     * Оригинальная валюта заказа.
     */
    private string $orderCurrency;

    /**
     * Дата заказа по Гринвичу (GMT)
     */
    private string $orderDate;

    /**
     * Статус заказа.
     */
    private string $orderState;

    /**
     * Курс валюты.
     */
    private ?int $rate;

    /**
     * @var Customer|null
     */
    private ?Customer $customer;

    /**
     * @var Operation[]
     */
    private array $operations;

    /**
     * @var CheckData|null
     */
    private ?CheckData $checkData;

    /**
     * Код ошибки
     */
    private ?string $errorCode;

    public function __construct(array $data)
    {
        $this->setBillNumber($data[ResponseHelper::BILL_NUMBER]);
        $this->setOrderNumber($data[ResponseHelper::ORDER_NUMBER]);
        $this->setTestMode($data[ResponseHelper::TEST_MODE]);
        $this->setOrderComment($data[ResponseHelper::ORDER_COMMENT]);
        $this->setOrderAmount($data[ResponseHelper::ORDER_AMOUNT]);
        $this->setOrderCurrency($data[ResponseHelper::ORDER_CURRENCY]);
        $this->setOrderDate($data[ResponseHelper::ORDER_DATE]);
        $this->setOrderState($data[ResponseHelper::ORDER_STATE]);
        $this->setRate($data[ResponseHelper::RATE] ?? null);
        $this->setErrorCode($data[ResponseHelper::ERROR_CODE] ?? null);

        $customerData = $data[ResponseHelper::CUSTOMER] ?? null;
        $customer = $customerData ? new Customer($customerData) : null;
        $this->setCustomer($customer);

        $checkDataArray = $data[ResponseHelper::CHECK_DATA] ?? null;
        $checkData = $checkDataArray ? new CheckData($checkDataArray) : null;
        $this->setCheckData($checkData);

        $operations = $data[ResponseHelper::OPERATIONS];
        $operationsResult = [];

        foreach ($operations as $operation) {
            $operationsResult[] = new Operation($operation);
        }

        $this->setOperations($operationsResult);
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
     * Устанавливает уникальный номер заказа в системе.
     *
     * @param string $billNumber Уникальный номер заказа в системе АПК Ассист, расширенный формат.
     */
    protected function setBillNumber(string $billNumber): void
    {
        $this->billNumber = $billNumber;
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
     * Устанавливает номер заказа.
     *
     * @param string $orderNumber Номер заказа.
     */
    protected function setOrderNumber(string $orderNumber): void
    {
        $this->orderNumber = $orderNumber;
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
     * @param bool $testMode
     * @return void
     */
    protected function setTestMode(bool $testMode): void
    {
        $this->testMode = $testMode;
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
     * @param string $orderComment
     * @return void
     */
    protected function setOrderComment(string $orderComment): void
    {
        $this->orderComment = $orderComment;
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
     * @param string $orderAmount
     * @return void
     */
    protected function setOrderAmount(string $orderAmount): void
    {
        $this->orderAmount = $orderAmount;
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
     * @param string $orderCurrency
     * @return void
     */
    protected function setOrderCurrency(string $orderCurrency): void
    {
        $this->orderCurrency = $orderCurrency;
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
     * @param string|null $rate
     * @return void
     */
    protected function setRate(string|null $rate): void
    {
        $this->rate = $rate;
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
     * @param string $orderDate
     * @return void
     */
    protected function setOrderDate(string $orderDate): void
    {
        $this->orderDate = $orderDate;
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
     * @param string $orderState
     * @return void
     */
    protected function setOrderState(string $orderState): void
    {
        $this->orderState = $orderState;
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
     * @param string|null $errorCode
     * @return void
     */
    protected function setErrorCode(?string $errorCode): void
    {
        $this->errorCode = $errorCode;
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
     * @param Customer|null $customer
     * @return void
     */
    protected function setCustomer(?Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return Operation[]
     */
    public function getOperations(): array
    {
        return $this->operations;
    }

    /**
     * @param array $operations
     * @return void
     */
    protected function setOperations(array $operations): void
    {
        $this->operations = $operations;
    }

    /**
     * @return CheckData
     */
    public function getCheckData(): CheckData
    {
        return $this->checkData;
    }

    /**
     * @param CheckData|null $checkData
     * @return void
     */
    protected function setCheckData(CheckData|null $checkData): void
    {
        $this->checkData = $checkData;
    }
}
