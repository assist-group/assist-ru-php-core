<?php

namespace Assist\Response\OrderResult;

use Assist\Model\Order;
use Assist\Response\ResponseInterface;

interface OrderResultResponseInterface extends ResponseInterface
{
    /**
     * @return Order[]
     */
    public function getOrders(): array;
}
