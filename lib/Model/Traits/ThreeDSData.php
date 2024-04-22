<?php

namespace Assist\AssistRuPhpCore\Model\Traits;

trait ThreeDSData
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

    /**
     * Возвращает версию протокола 3DSecure
     *
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return void
     */
    protected function setVersion(string $version): void
    {
        $this->version = $version;
    }

    /**
     * Возвращает результат авторизации
     *
     * @return string
     */
    public function getAlphaAuthResult(): string
    {
        return $this->alphaAuthResult;
    }

    /**
     * @param string $alphaAuthResult
     * @return void
     */
    protected function setAlphaAuthResult(string $alphaAuthResult): void
    {
        $this->alphaAuthResult = $alphaAuthResult;
    }

    /**
     * Возвращает взаимодействие с держателем карты
     *
     * @return string
     */
    public function getChallenge(): string
    {
        return $this->challenge;
    }

    /**
     * @param string $challenge
     * @return void
     */
    protected function setChallenge(string $challenge): void
    {
        $this->challenge = $challenge;
    }

    /**
     * Возвращает Electronic Commerce Indicator
     *
     * @return string
     */
    public function getEci(): string
    {
        return $this->eci;
    }

    /**
     * @param string $eci
     * @return void
     */
    protected function setEci(string $eci): void
    {
        $this->eci = $eci;
    }
}
