<?php

namespace Assist\Model;

Class CardData
{
    /**
     * Номер карты
     */
    private string $cardNumber;

    /**
     * Держатель платежного средства
     */
    private string $cardHolder;

    /**
     * Месяц истечения срока действия карты
     */
    private int $expireMonth;

    /**
     * Год истечения срока действия карты
     */
    private int $expireYear;

    /**
     * Тип карты
     */
    private int $cardType;

    /**
     * Код проверки подлинности карты
     */
    private int $cvc2;

    /**
     * Возвращает номер карты
     *
     * @return string
     */
    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     * @return void
     */
    private function setCardNumber(string $cardNumber): void
    {
        $this->cardNumber = $cardNumber;
    }

    /**
     * Возвращает держателя карты
     *
     * @return string
     */
    public function getCardHolder(): string
    {
        return $this->cardHolder;
    }

    /**
     * @param $cardHolder
     * @return void
     */
    protected function setCardHolder($cardHolder): void
    {
        $this->cardHolder = $cardHolder;
    }

    /**
     * Возвращает месяц истечения срока действия карты
     *
     * @return int
     */
    public function getExpireMonth(): int
    {
        return $this->expireMonth;
    }

    /**
     * @param int $expireMonth
     * @return void
     */
    protected function setExpireMonth(int $expireMonth): void
    {
        $this->expireMonth = $expireMonth;
    }

    /**
     * Возвращает год истечения срока действия карты
     *
     * @return int
     */
    public function getExpireYear(): int
    {
        return $this->expireYear;
    }

    /**
     * @param int $expireYear
     * @return void
     */
    protected function setExpireYear(int $expireYear): void
    {
        $this->expireYear = $expireYear;
    }

    /**
     * Возвращает тип карта
     *
     * @return int
     */
    public function getCardType(): int
    {
        return $this->cardType;
    }

    /**
     * @param int $cardType
     * @return void
     */
    protected function setCardType(int $cardType): void
    {
        $this->cardType = $cardType;
    }

    /**
     * Возвращает код проверки подлинности карты
     *
     * @return int
     */
    public function getCvc2(): int
    {
        return $this->cvc2;
    }

    /**
     * @param int $cvc2
     * @return void
     */
    protected function setCvc2(int $cvc2): void
    {
        $this->cvc2 = $cvc2;
    }
}
