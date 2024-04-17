<?php

namespace Assist\AssistRuPhpCore\Model;

/**
 * Интерфейс для предоставления данных о карте клиента.
 */
interface CustomerCardInterface
{
    /**
     * Получает подтип платежного средства.
     *
     * @return string|null
     */
    public function getMeanSubType();

    /**
     * Устанавливает подтип платежного средства.
     *
     * @param string|null $meansubType Подтип платежного средства.
     */
    public function setMeanSubType($meansubType);

    /**
     * Получает номер платежного средства.
     *
     * @return string|null
     */
    public function getMeanNumber();

    /**
     * Устанавливает номер платежного средства.
     *
     * @param string|null $meanNumber Номер платежного средства.
     */
    public function setMeanNumber($meanNumber);

    /**
     * Получает имя держателя карты.
     *
     * @return string|null
     */
    public function getCardHolder();

    /**
     * Устанавливает имя держателя карты.
     *
     * @param string|null $cardHolder Имя держателя карты.
     */
    public function setCardHolder($cardHolder);

    /**
     * Получает срок действия карты.
     *
     * @return string|null
     */
    public function getCardExpirationDate();

    /**
     * Устанавливает срок действия карты.
     *
     * @param string|null $cardExpirationDate Срок действия карты.
     */
    public function setCardExpirationDate($cardExpirationDate);

    /**
     * Получает название банка-эмитента.
     *
     * @return string|null
     */
    public function getIssueBank();

    /**
     * Устанавливает название банка-эмитента.
     *
     * @param string|null $issueBank Название банка-эмитента.
     */
    public function setIssueBank($issueBank);

    /**
     * Получает страну банка-эмитента.
     *
     * @return string|null
     */
    public function getBankCountry();

    /**
     * Устанавливает страну банка-эмитента.
     *
     * @param string|null $bankCountry Страна банка-эмитента.
     */
    public function setBankCountry($bankCountry);
}
