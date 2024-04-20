<?php

namespace Assist\AssistRuPhpCore\Model\Traits;

trait CheckData
{
    /**
     * Дата формирования запроса по Гринвичу (GMT).
     */
    private string $packetDate;

    /**
     * Значение X без разделителей, подписанное закрытым ключом АПК Ассист, закодированное в BASE64,
     * где X - billnumber,ordernumber,responsecode,orderamount,ordercurrency,meannumber,approvalcode,orderstate,packetdate
     */
    private string $signature;

    /**
     * Проверочное значение
     */
    private string $checkValue;

    /**
     * Возвращает Значение X без разделителей, подписанное закрытым ключом АПК Ассист, закодированное в BASE64,
     * где X - billnumber,ordernumber,responsecode,orderamount,ordercurrency,meannumber,approvalcode,orderstate,packetdate
     *
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     * @return void
     */
    protected function setSignature(string $signature): void
    {
        $this->signature = $signature;
    }

    /**
     * Возвращает проверочное значение
     *
     * @return string
     */
    public function getCheckValue(): string
    {
        return $this->checkValue;
    }

    /**
     * @param string $checkValue
     * @return void
     */
    protected function setCheckValue(string $checkValue): void
    {
        $this->signature = $checkValue;
    }

    /**
     * Возвращает дату формирования запроса по Гринвичу (GMT)
     *
     * @return string
     */
    public function getPacketDate(): string
    {
        return $this->packetDate;
    }

    /**
     * @param string $packetDate
     * @return void
     */
    protected function setPacketDate(string $packetDate): void
    {
        $this->packetDate = $packetDate;
    }
}
