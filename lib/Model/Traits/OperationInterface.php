<?php

namespace Assist\Model\Traits;

interface OperationInterface
{
    /**
     * Возвращает тип операции
     *
     * @return string
     */
    public function getOperationType(): string;

    /**
     * Возвращает сумму операции
     *
     * @return string
     */
    public function getAmount(): string;

    /**
     * Возвращает валюту операции
     *
     * @return string
     */
    public function getCurrency(): string;

    /**
     * Возвращает IP-адрес плательщика
     *
     * @return string
     */
    public function getIpAddress(): string;

    /**
     * Возвращает тип платежного средства
     *
     * @return string
     */
    public function getMeanTypeName(): string;

    /**
     * Возвращает подтип платежного средства
     *
     * @return string
     */
    public function getMeanSubType(): string;

    /**
     * Возвращает номер платежного средства
     *
     * @return string
     */
    public function getMeanNumber(): string;

    /**
     * Возвращает держателя платежного средства
     *
     * @return string
     */
    public function getCardholder(): string;

    /**
     * Возвращает срок действия карты
     *
     * @return string
     */
    public function getCardExpirationDate(): string;

    /**
     * Возвращает название банка-эмитента
     *
     * @return string
     */
    public function getIssueBank(): string;

    /**
     * Возвращает страну банка-эмитента
     *
     * @return string
     */
    public function getBankCountry(): string;

    /**
     * Возвращает код ответа
     *
     * @return string
     */
    public function getResponseCode(): string;

    /**
     * Возвращает сообщение о результате операции
     *
     * @return string
     */
    public function getMessage(): string;
    /**
     * Возвращает сообщение о результате для покупателя
     *
     * @return string
     */
    public function getCustomerMessage(): string;

    /**
     * Возвращает рекомендацию
     *
     * @return string
     */
    public function getRecommendation(): string;

    /**
     * Возвращает код авторизации
     *
     * @return string
     */
    public function getApprovalCode(): string;

    /**
     * Возвращает протокол
     *
     * @return string
     */
    public function getProtocolTypeName(): string;

    /**
     * Возвращает процессинг
     *
     * @return string
     */
    public function getProcessingName(): string;
}
