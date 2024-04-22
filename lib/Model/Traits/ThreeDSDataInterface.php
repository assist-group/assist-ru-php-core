<?php

namespace Assist\AssistRuPhpCore\Model\Traits;

interface ThreeDSDataInterface
{
    /**
     * Возвращает версию протокола 3DSecure
     *
     * @return string
     */
    public function getVersion(): string;

    /**
     * Возвращает результат авторизации
     *
     * @return string
     */
    public function getAlphaAuthResult(): string;

    /**
     * Возвращает взаимодействие с держателем карты
     *
     * @return string
     */
    public function getChallenge(): string;

    /**
     * Возвращает Electronic Commerce Indicator
     *
     * @return string
     */
    public function getEci(): string;
}
