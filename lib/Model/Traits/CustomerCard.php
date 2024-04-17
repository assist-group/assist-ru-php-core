<?php

namespace Assist\AssistRuPhpCore\Model\Traits;

trait CustomerCard
{
    /**
     * Подтип платежного средства
     */
    private $meanSubType;

    /**
     * Номер платежного средства
     */
    private $meanNumber;

    /**
     * Держатель платежного средства
     */
    private $cardHolder;

    /**
     * Срок действия карты
     */
    private $cardExpirationDate;

    /**
     * Название банка-эмитента
     */
    private $issueBank;

    /**
     * Страна банка-эмитента
     */
    private $bankCountry;

    public function getMeanSubType()
    {
        return $this->meanSubType;
    }

    public function setMeanSubType($meanSubType)
    {
        $this->meanSubType = $meanSubType;
    }

    public function getMeanNumber()
    {
        return $this->meanNumber;
    }

    public function setMeanNumber($meanNumber)
    {
        $this->meanNumber = $meanNumber;
    }

    public function getCardHolder()
    {
        return $this->cardHolder;
    }

    public function setCardHolder($cardHolder)
    {
        $this->cardHolder = $cardHolder;
    }

    public function getCardExpirationDate()
    {
        return $this->cardExpirationDate;
    }

    public function setCardExpirationDate($cardExpirationDate)
    {
        $this->cardExpirationDate = $cardExpirationDate;
    }

    public function getIssueBank()
    {
        return $this->issueBank;
    }

    public function setIssueBank($issueBank)
    {
        $this->issueBank = $issueBank;
    }

    public function getBankCountry()
    {
        return $this->bankCountry;
    }

    public function setBankCountry($bankCountry)
    {
        $this->bankCountry = $bankCountry;
    }
}
