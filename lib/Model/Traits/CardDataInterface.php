<?php

namespace Assist\AssistRuPhpCore\Model\Traits;

/**
 * Интерфейс для предоставления данных о карте клиента.
 */
interface CardDataInterface
{
    /**
     * Возвращает номер карты
     *
     * @return string
     */
    public function getCardNumber(): string;

    /**
     * Возвращает держателя карты
     *
     * @return string
     */
    public function getCardHolder(): string;

    /**
     * Возвращает месяц истечения срока действия карты
     *
     * @return int
     */
    public function getExpireMonth(): int;

    /**
     * Возвращает год истечения срока действия карты
     *
     * @return int
     */
    public function getExpireYear(): int;

    /**
     * Возвращает тип карта
     *
     * @return int
     */
    public function getCardType(): int;

    /**
     * Возвращает код проверки подлинности карты
     *
     * @return int
     */
    public function getCvc2(): int;
}
