<?php

namespace Assist\AssistRuPhpCore\Model;

use DateTime;

/**
 * Интерфейс для системы оплаты с использованием QR-кода.
 */
interface SbpSystemInterface
{
    /**
     * Получает URL с QR-кодом для оплаты.
     *
     * @return string URL с QR-кодом.
     */
    public function getFastPayUrl(): string;

    /**
     * Устанавливает URL с QR-кодом для оплаты.
     *
     * @param string $fastPayUrl URL QR-кода.
     */
    public function setFastPayUrl(string $fastPayUrl);

    /**
     * Получает срок действия URL для оплаты.
     *
     * @return DateTime Срок действия URL.
     */
    public function getFastPayTimeout(): DateTime;

    /**
     * Устанавливает срок действия URL для оплаты.
     *
     * @param DateTime|string $fastPayTimeout Срок действия URL.
     * @throws \Exception Если передаваемое значение не является объектом DateTime или строкой.
     */
    public function setFastPayTimeout(DateTime|string $fastPayTimeout);

    /**
     * Получает тип URL для оплаты.
     *
     * @return string Тип URL.
     */
    public function getFastPayType(): string;

    /**
     * Устанавливает тип URL для оплаты.
     *
     * @param string $fastPayType Тип URL.
     */
    public function setFastPayType(string $fastPayType);
}
