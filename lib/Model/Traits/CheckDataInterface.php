<?php

namespace Assist\Model\Traits;

interface CheckDataInterface
{
    /**
     * Возвращает Значение X без разделителей, подписанное закрытым ключом АПК Ассист, закодированное в BASE64,
     * где X - billnumber,ordernumber,responsecode,orderamount,ordercurrency,meannumber,approvalcode,orderstate,packetdate
     *
     * @return string
     */
    public function getSignature(): string;

    /**
     * Возвращает проверочное значение
     *
     * @return string
     */
    public function getCheckValue(): string;

    /**
     * Возвращает дату формирования запроса по Гринвичу (GMT)
     *
     * @return string
     */
    public function getPacketDate(): string;

}
