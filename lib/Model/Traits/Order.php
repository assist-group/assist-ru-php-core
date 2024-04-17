<?php

namespace Assist\AssistRuPhpCore\Model\Traits;

trait Order
{
    /**
     * Дата заказа по Гринвичу (GMT)
     */
    private $orderDate;

    /**
     * Статус заказа
     */
    private $orderState;

    /**
     * Код возврата
     */
    private $responseCode;

    /**
     * Сообщение
     */
    private $message;

    /**
     * Сообщение о результате для покупателя
     */
    private $customerMessage;

    /**
     * Рекомендации
     */
    private $recommendation;

    /**
     * Код авторизации
     */
    private $approvalCode;

    /**
     * Протокол
     */
    private $protocolTypeName;

    /**
     * Процессинг
     */
    private $processingName;

    /**
     * Тип операции
     */
    private $operationType;

    /**
     * Дата формирования запроса по Гринвичу (GMT)
     */
    private $packetDate;

    /**
     * Подпись. Создается по следующему алгоритму:
     *
     * 1. Формируется объединённая строка из параметров (в их строковом представлении, в формате как они переданы в ответе): billnumber, ordernumber, responsecode, orderamount, ordercurrency, meannumber, approvalcode, orderstate, packetdate (без разделителей)
     * 2. Полученная строка подписывается закрытым ключом АПК Ассист.
     * 3. Итоговая последовательность байт кодируется в BASE64.
     */
    private $signature;

    /**
     * Пакет запроса по 3D-Secure авторизации
     */
    private $pareq;

    /**
     * Адрес для переадресации плательщика для прохождения 3D-Secure авторизации
     */
    private $ascurl;

    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
    }

    public function getOrderDate()
    {
        return $this->orderDate;
    }

    public function setOrderState($orderState)
    {
        $this->orderState = $orderState;
    }

    public function getOrderState()
    {
        return $this->orderState;
    }

    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;
    }

    public function getResponseCode()
    {
        return $this->responseCode;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setCustomerMessage($customerMessage)
    {
        $this->customerMessage = $customerMessage;
    }

    public function getCustomerMessage()
    {
        return $this->customerMessage;
    }

    public function setRecommendation($recommendation)
    {
        $this->recommendation = $recommendation;
    }

    public function getRecommendation()
    {
        return $this->recommendation;
    }

    public function setApprovalCode($approvalCode)
    {
        $this->approvalCode = $approvalCode;
    }

    public function getApprovalCode()
    {
        return $this->approvalCode;
    }

    public function setProtocolTypeName($protocolTypeName)
    {
        $this->protocolTypeName = $protocolTypeName;
    }

    public function getProtocolTypeName()
    {
        return $this->protocolTypeName;
    }

    public function setProcessingName($processingName)
    {
        $this->processingName = $processingName;
    }

    public function getProcessingName()
    {
        return $this->processingName;
    }

    public function setOperationType($operationType)
    {
        $this->operationType = $operationType;
    }

    public function getOperationType()
    {
        return $this->operationType;
    }

    public function setPacketDate($packetDate)
    {
        $this->packetDate = $packetDate;
    }

    public function getPacketDate()
    {
        return $this->packetDate;
    }

    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function setPareq($pareq)
    {
        $this->pareq = $pareq;
    }

    public function getPareq()
    {
        return $this->pareq;
    }

    public function setAscurl($ascurl)
    {
        $this->ascurl = $ascurl;
    }

    public function getAsccurl()
    {
        return $this->ascurl;
    }
}
