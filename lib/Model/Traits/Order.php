<?php

namespace Assist\AssistRuPhpCore\Model\Traits;

trait Order
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
    private int $rate;

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
     * @return string
     */
    public function getRate(): string
    {
        return $this->rate;
    }

    /**
     * @param string $rate
     * @return void
     */
    protected function setRate(string $rate): void
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
}
