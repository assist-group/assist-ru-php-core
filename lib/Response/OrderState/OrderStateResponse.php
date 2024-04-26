<?php

namespace Assist\Response\OrderState;

use Assist\Helpers\ResponseHelper;
use Assist\Model\CheckData;
use Assist\Response\Response;

class OrderStateResponse extends Response implements OrderStateResponseInterface
{
    private string $orderNumber;
    private string $billNumber;
    private int $orderAmount;
    private string $orderCurrency;
    private string $orderState;
    private ?CheckData $checkData;

    /**
     * @param array $responseData
     */
    public function __construct(array $responseData)
    {
        $this->responseData = $responseData['orderstate'];
        $this->setPropsFromArray($this->responseData);
    }

    /**
     * @param array $responseData
     * @return void
     */
    private function setPropsFromArray(array $responseData): void
    {
        $this->orderNumber = $responseData[ResponseHelper::ORDER_NUMBER];
        $this->billNumber = $responseData[ResponseHelper::BILL_NUMBER];
        $this->orderAmount = $responseData[ResponseHelper::ORDER_AMOUNT];
        $this->orderCurrency = $responseData[ResponseHelper::ORDER_CURRENCY];
        $this->orderState = $responseData[ResponseHelper::ORDER_STATE];

        $checkDataArray = $responseData[ResponseHelper::CHECK_DATA] ?? null;
        $this->checkData = $checkDataArray ? new CheckData($checkDataArray) : null;
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
     * Возвращает billnumber
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
     * Возвращает статус заказа
     *
     * @return string
     */
    public function getOrderState(): string
    {
        return $this->orderState;
    }

    /**
     * Возвращает CheckData
     *
     * @return CheckData|null
     */
    public function getCheckData(): ?CheckData
    {
        return $this->checkData;
    }
}
