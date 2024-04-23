<?php

namespace Assist\Model\Traits;

interface OrderInterface
{
    /**
     * Получает уникальный номер заказа в системе.
     *
     * @return string
     */
    public function getBillNumber(): string;

    /**
     * Получает номер заказа.
     *
     * @return string
     */
    public function getOrderNumber(): string;

    /**
     * Возвращает признак тестового режима
     *
     * @return bool
     */
    public function getTestMode(): bool;

    /**
     * Возвращает комментарий к заказу
     *
     * @return string
     */
    public function getOrderComment(): string;

    /**
     * Возвращает оригинальную сумму заказа
     *
     * @return string
     */
    public function getOrderAmount(): string;

    /**
     * Возвращает оригинальную валюту заказа
     *
     * @return string
     */
    public function getOrderCurrency(): string;

    /**
     * Возвращает курс валют
     *
     * @return string
     */
    public function getRate(): string;

    /**
     * Возвращает дату заказа по Гринвичу (GMT)
     *
     * @return string
     */
    public function getOrderDate(): string;

    /**
     * Возвращает статус заказа
     *
     * @return string
     */
    public function getOrderState(): string;
}
