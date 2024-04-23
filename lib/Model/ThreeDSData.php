<?php

namespace Assist\Model;

class ThreeDSData
{
    /**
     * Версия протокола 3DSecure
     */
    private string $version;

    /**
     * Результат авторизации (Y - успешно, N - неуспешно, A - Attempt, U – невозможно провести аутентификацию, R- отказ, C – не завершено по каким-либо причинам, E - ошибка, I - для информации)
     */
    private string $alphaAuthResult;

    /**
     * Взаимодействие с держателем карты (C – было, F – не было, D - отложенная аутентификация)
     */
    private string $challenge;

    /**
     * Electronic Commerce Indicator (5 – полная аутентификация, 6 – попытка аутентификации, 7 – без аутентификации)
     */
    private string $eci;

    public function __construct(string $version, string $alphaAuthResult, string $challenge, string $eci)
    {
        $this->version = $version;
        $this->alphaAuthResult = $alphaAuthResult;
        $this->challenge = $challenge;
        $this->eci = $eci;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getAlphaAuthResult(): string
    {
        return $this->alphaAuthResult;
    }

    /**
     * @return string
     */
    public function getChallenge(): string
    {
        return $this->challenge;
    }

    /**
     * @return string
     */
    public function getEci(): string
    {
        return $this->eci;
    }
}
