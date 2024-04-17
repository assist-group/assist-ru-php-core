<?php

namespace Assist\AssistRuPhpCore\Model\Traits;

trait Payment
{
    /**
     * Номер заказа.
     * @var string
     */
    private $orderNumber;

    /**
     * Полный уникальный номер операции в системе.
     * @var string
     */
    private $billNumber;

    /**
     * Флаг тестового режима.
     * @var bool
     */
    private $testMode;

    /**
     * Комментарий к заказу.
     * @var string
     */
    private $orderComment;

    /**
     * Оригинальная сумма заказа.
     * @var float
     */
    private $orderAmount;

    /**
     * Оригинальная валюта заказа.
     * @var string
     */
    private $orderCurrency;

    /**
     * Сумма операции.
     * @var float
     */
    private $amount;

    /**
     * Валюта операции.
     * @var string
     */
    private $currency;

    /**
     * Курс валюты.
     * @var float
     */
    private $rate;

    /**
     * Имя плательщика.
     * @var string
     */
    private $firstName;

    /**
     * Фамилия плательщика.
     * @var string
     */
    private $lastName;

    /**
     * Отчество плательщика.
     * @var string
     */
    private $middleName;

    /**
     * Email плательщика.
     * @var string
     */
    private $email;

    /**
     * IP-адрес плательщика.
     * @var string
     */
    private $ipAddress;

    /**
     * Тип платежного средства.
     * @var string
     */
    private $meanTypeName;

    /**
     * Возвращает номер заказа.
     *
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * Устанавливает номер заказа.
     *
     * @param string $orderNumber Номер заказа.
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * Возвращает уникальный номер операции.
     *
     * @return string
     */
    public function getBillNumber()
    {
        return $this->billNumber;
    }

    /**
     * Устанавливает уникальный номер операции.
     *
     * @param string $billNumber Номер операции.
     */
    public function setBillNumber($billNumber)
    {
        $this->billNumber = $billNumber;
    }

    /**
     * Возвращает флаг тестового режима.
     *
     * @return bool
     */
    public function getTestMode()
    {
        return $this->testMode;
    }

    /**
     * Устанавливает флаг тестового режима.
     *
     * @param bool $testMode Тестовый режим.
     */
    public function setTestMode($testMode)
    {
        $this->testMode = $testMode;
    }

    /**
     * Возвращает комментарий к заказу.
     *
     * @return string
     */
    public function getOrderComment()
    {
        return $this->orderComment;
    }

    /**
     * Устанавливает комментарий к заказу.
     *
     * @param string $orderComment Комментарий.
     */
    public function setOrderComment($orderComment)
    {
        $this->orderComment = $orderComment;
    }

    /**
     * Возвращает оригинальную сумму заказа.
     *
     * @return float
     */
    public function getOrderAmount()
    {
        return $this->orderAmount;
    }

    /**
     * Устанавливает оригинальную сумму заказа.
     *
     * @param float $orderAmount Сумма заказа.
     */
    public function setOrderAmount($orderAmount)
    {
        $this->orderAmount = $orderAmount;
    }

    /**
     * Возвращает оригинальную валюту заказа.
     *
     * @return string
     */
    public function getOrderCurrency()
    {
        return $this->orderCurrency;
    }

    /**
     * Устанавливает оригинальную валюту заказа.
     *
     * @param string $orderCurrency Валюта заказа.
     */
    public function setOrderCurrency($orderCurrency)
    {
        $this->orderCurrency = $orderCurrency;
    }

    /**
     * Возвращает сумму операции.
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Устанавливает сумму операции.
     *
     * @param float $amount Сумма.
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Возвращает валюту операции.
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Устанавливает валюту операции.
     *
     * @param string $currency Валюта.
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * Возвращает курс валюты.
     *
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Устанавливает курс валюты.
     *
     * @param float $rate Курс.
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * Возвращает имя плательщика.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Устанавливает имя плательщика.
     *
     * @param string $firstName Имя.
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Возвращает фамилию плательщика.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Устанавливает фамилию плательщика.
     *
     * @param string $lastName Фамилия.
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Возвращает отчество плательщика.
     *
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Устанавливает отчество плательщика.
     *
     * @param string $middleName Отчество.
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * Возвращает email плательщика.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Устанавливает email плательщика.
     *
     * @param string $email Email.
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Возвращает IP-адрес плательщика.
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Устанавливает IP-адрес плательщика.
     *
     * @param string $ipAddress IP-адрес.
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * Возвращает тип платежного средства.
     *
     * @return string
     */
    public function getMeanTypeName()
    {
        return $this->meanTypeName;
    }

    /**
     * Устанавливает тип платежного средства.
     *
     * @param string $meanTypeName Тип средства.
     */
    public function setMeanTypeName($meanTypeName)
    {
        $this->meanTypeName = $meanTypeName;
    }
}
