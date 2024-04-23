<?php

namespace Assist\Model;

use Assist\Model\Traits\OrderInterface;

interface OrderResultInterface extends OrderInterface
{
    /**
     * @return string
     */
    public function getErrorCode(): string;

    /**
     * @return Customer
     */
    public function getCustomer(): Customer;

    /**
     * @return CheckData
     */
    public function getCheckData(): CheckData;

    /**
     * @return Operation[]
     */
    public function getOperations(): array;
}
