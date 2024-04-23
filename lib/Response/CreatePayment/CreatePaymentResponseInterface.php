<?php

namespace Assist\Response\CreatePayment;

use Assist\Response\ResponseInterface;

interface CreatePaymentResponseInterface extends ResponseInterface
{
    /**
     * Возвращает ссылку для оплаты
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * Возвращает время, отведенное на оплату (time out)
     *
     * @return string
     */
    public function getExpirationTime(): string;

    /**
     * Возвращает состояние запроса на создание заказа в АПК Ассист (In Process или Decline)
     *
     * @return string
     */
    public function getOrderState(): string;
}
