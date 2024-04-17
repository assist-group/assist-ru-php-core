<?php

namespace Assist\AssistRuPhpCore\Model;

interface PaymentInterface
{
    /**
     * Возвращает номер заказа.
     * @return string
     */
    public function getOrderNumber();

    /**
     * Возвращает уникальный номер операции.
     * @return string
     */
    public function getBillNumber();

    /**
     * Возвращает флаг тестового режима.
     * @return bool
     */
    public function getTestMode();

    /**
     * Возвращает комментарий к заказу.
     * @return string
     */
    public function getOrderComment();

    /**
     * Возвращает оригинальную сумму заказа.
     * @return float
     */
    public function getOrderAmount();

    /**
     * Возвращает оригинальную валюту заказа.
     * @return string
     */
    public function getOrderCurrency();

    /**
     * Возвращает сумму операции.
     * @return float
     */
    public function getAmount();

    /**
     * Возвращает валюту операции.
     * @return string
     */
    public function getCurrency();

    /**
     * Возвращает курс валюты.
     * @return float
     */
    public function getRate();

    /**
     * Возвращает имя плательщика.
     * @return string
     */
    public function getFirstName();

    /**
     * Возвращает фамилию плательщика.
     * @return string
     */
    public function getLastName();

    /**
     * Возвращает отчество плательщика.
     * @return string
     */
    public function getMiddleName();

    /**
     * Возвращает email плательщика.
     * @return string
     */
    public function getEmail();

    /**
     * Возвращает IP-адрес плательщика.
     * @return string
     */
    public function getIpAddress();

    /**
     * Возвращает тип платежного средства.
     * @return string
     */
    public function getMeanTypeName();

    /**
     * Устанавливает номер заказа.
     * @param string $orderNumber Номер заказа.
     */
    public function setOrderNumber($orderNumber);

    /**
     * Устанавливает уникальный номер операции.
     * @param string $billNumber Номер операции.
     */
    public function setBillNumber($billNumber);

    /**
     * Устанавливает флаг тестового режима.
     * @param bool $testMode Тестовый режим.
     */
    public function setTestMode($testMode);

    /**
     * Устанавливает комментарий к заказу.
     * @param string $orderComment Комментарий.
     */
    public function setOrderComment($orderComment);

    /**
     * Устанавливает оригинальную сумму заказа.
     * @param float $orderAmount Сумма заказа.
     */
    public function setOrderAmount($orderAmount);

    /**
     * Устанавливает оригинальную валюту заказа.
     * @param string $orderCurrency Валюта заказа.
     */
    public function setOrderCurrency($orderCurrency);

    /**
     * Устанавливает сумму операции.
     * @param float $amount Сумма.
     */
    public function setAmount($amount);

    /**
     * Устанавливает валюту операции.
     * @param string $currency Валюта.
     */
    public function setCurrency($currency);

    /**
     * Устанавливает курс валюты.
     * @param float $rate Курс.
     */
    public function setRate($rate);

    /**
     * Устанавливает имя плательщика.
     * @param string $firstName Имя.
     */
    public function setFirstName($firstName);

    /**
     * Устанавливает фамилию плательщика.
     * @param string $lastName Фамилия.
     */
    public function setLastName($lastName);

    /**
     * Устанавливает отчество плательщика.
     * @param string $middleName Отчество.
     */
    public function setMiddleName($middleName);

    /**
     * Устанавливает email плательщика.
     * @param string $email Email.
     */
    public function setEmail($email);

    /**
     * Устанавливает IP-адрес плательщика.
     * @param string $ipAddress IP-адрес.
     */
    public function setIpAddress($ipAddress);

    /**
     * Устанавливает тип платежного средства.
     * @param string $meanTypeName Тип средства.
     */
    public function setMeanTypeName($meanTypeName);
}
