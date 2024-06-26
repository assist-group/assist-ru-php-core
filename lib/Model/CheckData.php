<?php

namespace Assist\Model;

Class CheckData
{
    private string $packetDate;
    private ?string $signature;
    private ?string $checkValue;

    public function __construct(array $data)
    {
        $this->packetDate = $data['packetdate'];
        $this->signature = $data['signature'] ?? null;
        $this->checkValue = $data['checkvalue'] ?? null;
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
