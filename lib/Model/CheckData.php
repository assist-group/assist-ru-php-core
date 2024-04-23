<?php

namespace Assist\Model;

Class CheckData
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

    public function __construct(string $packetDate, string $signature, string $checkValue)
    {
        $this->packetDate = $packetDate;
        $this->signature = $signature;
        $this->checkValue = $checkValue;
    }

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
     * Возвращает проверочное значение
     *
     * @return string
     */
    public function getCheckValue(): string
    {
        return $this->checkValue;
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
}
