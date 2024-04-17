<?php

namespace Assist\AssistRuPhpCore\Model\Traits;

use DateTime;

trait SbpSystem
{
    /**
     * Ссылка с QR-кодом для оплаты.
     * @var string
     */
    private string $fastPayUrl;

    /**
     * Срок действия ссылки для оплаты (дата и время).
     * @var DateTime
     */
    private DateTime $fastPayTimeout;

    /**
     * Тип ссылки, qrdynamic – динамическая.
     * @var string
     */
    private string $fastPayType;

    /**
     * Получить ссылку с QR-кодом для оплаты.
     *
     * @return string ссылка с QR-кодом.
     */
    public function getFastPayUrl(): string
    {
        return $this->fastPayUrl;
    }

    /**
     * Установить ссылку с QR-кодом для оплаты.
     *
     * @param string $fastPayUrl Ссылка с QR-кодом.
     */
    public function setFastPayUrl(string $fastPayUrl): void
    {
        $this->fastPayUrl = $fastPayUrl;
    }

    /**
     * Получить срок действия ссылки для оплаты.
     *
     * @return DateTime Срок действия ссылки.
     */
    public function getFastPayTimeout(): DateTime
    {
        return $this->fastPayTimeout;
    }

    /**
     * Установить срок действия ссылки для оплаты.
     *
     * @param DateTime|string $fastPayTimeout
     * @throws \Exception
     */
    public function setFastPayTimeout(DateTime|string $fastPayTimeout): void
    {
        if (!$fastPayTimeout instanceof DateTime) {
            $fastPayTimeout = new DateTime($fastPayTimeout);
        }

        $this->fastPayTimeout = $fastPayTimeout;
    }

    /**
     * Получить тип ссылки для оплаты.
     *
     * @return string Тип ссылки.
     */
    public function getFastPayType(): string
    {
        return $this->fastPayType;
    }

    /**
     * Установить тип ссылки для оплаты.
     *
     * @param string $fastPayType Тип ссылки.
     */
    public function setFastPayType(string $fastPayType): void
    {
        $this->fastPayType = $fastPayType;
    }
}
