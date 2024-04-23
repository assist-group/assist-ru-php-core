<?php

namespace Assist\Response\CreatePayment;

use Assist\Helpers\ResponseHelper;
use Assist\Response\ResponseTrait;

class CreatePaymentResponse
{
    use ResponseTrait;

    private string $url;
    private string $expirationTime;
    private string $orderState;

    /**
     * @param array $responseData
     */
    public function __construct(array $responseData)
    {
        $this->responseData = $responseData;
        $this->url = $responseData[ResponseHelper::URL];
        $this->orderState = $responseData[ResponseHelper::ORDER_STATE];
        $this->expirationTime = $responseData[ResponseHelper::EXPIRATION_TIME];
    }

    /**
     * Возвращает ссылку для оплаты
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Возвращает время, отведенное на оплату (time out)
     *
     * @return string
     */
    public function getExpirationTime(): string
    {
        return $this->expirationTime;
    }

    /**
     * Возвращает состояние запроса на создание заказа в АПК Ассист (In Process или Decline)
     *
     * @return string
     */
    public function getOrderState(): string
    {
        return $this->orderState;
    }
}
