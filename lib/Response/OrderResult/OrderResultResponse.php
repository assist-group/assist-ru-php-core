<?php

namespace Assist\Response\OrderResult;

use Assist\Model\Order;
use Assist\Response\Response;

class OrderResultResponse extends Response implements OrderResultResponseInterface
{
    /**
     * @var Order[]
     */
    private array $orders;

    /**
     * @param array $responseData
     */
    public function __construct(array $responseData)
    {
        $this->responseData = $responseData['orderresult'];
        $this->setPropsFromArray($this->responseData);
    }

    /**
     * @param array $responseData
     * @return void
     */
    private function setPropsFromArray(array $responseData): void
    {
        foreach ($responseData['orders'] as $orderData) {
            $this->orders[] = new Order($orderData);
        }
    }

    /**
     * Возвращает заказы
     *
     * @return Order[]
     */
    public function getOrders(): array
    {
        return $this->orders;
    }
}
