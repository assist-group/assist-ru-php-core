<?php

namespace Assist\Model;

use Assist\Helpers\ResponseHelper;

class ThreeDSData
{
    private string $version;
    private string $alphaAuthResult;
    private string $challenge;
    private string $eci;

    public function __construct(array $data)
    {
        $this->version = $data[ResponseHelper::VERSION];
        $this->alphaAuthResult = $data[ResponseHelper::ALPHA_AUTH_RESULT];
        $this->challenge = $data[ResponseHelper::CHALLENGE];
        $this->eci = $data[ResponseHelper::ECI];
    }

    /**
     * Возвращает версия протокола 3DSecure
     *
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * Возвращает результат авторизации
     * (Y - успешно, N - неуспешно, A - Attempt, U – невозможно провести аутентификацию, R- отказ, C – не завершено по каким-либо причинам, E - ошибка, I - для информации)
     *
     * @return string
     */
    public function getAlphaAuthResult(): string
    {
        return $this->alphaAuthResult;
    }

    /**
     * Возвращает взаимодействие с держателем карты (C – было, F – не было, D - отложенная аутентификация)
     *
     * @return string
     */
    public function getChallenge(): string
    {
        return $this->challenge;
    }

    /**
     * Возвращает Electronic Commerce Indicator (5 – полная аутентификация, 6 – попытка аутентификации, 7 – без аутентификации)
     *
     * @return string
     */
    public function getEci(): string
    {
        return $this->eci;
    }
}
