<?php

namespace Assist\Model;

use Assist\Model\Traits\Order;

class OrderResult implements OrderResultInterface
{
    use Order;

    /**
     * @var Customer
     */
    private Customer $customer;

    /**
     * @var Operation[]
     */
    private array $operations;

    /**
     * @var CheckData
     */
    private CheckData $checkData;

    /**
     * Код ошибки
     */
    private string $errorCode;

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
     * Возвращает данные покупателя
     *
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return void
     */
    protected function setCustomer(Customer $customer): void
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
     * @param CheckData $checkData
     * @return void
     */
    protected function setCheckData(CheckData $checkData): void
    {
        $this->checkData = $checkData;
    }
}
