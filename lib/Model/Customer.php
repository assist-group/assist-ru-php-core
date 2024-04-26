<?php

namespace Assist\Model;

use Assist\Helpers\ResponseHelper;

Class Customer
{
    private ?string $firstname;
    private ?string $lastname;
    private ?string $middlename;
    private ?string $email;
    private ?string $ipAddress;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->firstname = $data[ResponseHelper::FIRSTNAME] ?? null;
        $this->lastname = $data[ResponseHelper::LASTNAME] ?? null;
        $this->middlename = $data[ResponseHelper::MIDDLENAME] ?? null;
        $this->email = $data[ResponseHelper::EMAIL] ?? null;
        $this->ipAddress = $data[ResponseHelper::IP_ADDRESS] ?? null;
    }

    /**
     * Возвращает имя
     *
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * Возвращает фамилию
     *
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * Возвращает отчество
     *
     * @return string|null
     */
    public function getMiddlename(): ?string
    {
        return $this->middlename;
    }

    /**
     * Возвращает email
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Возвращает IP-адрес
     *
     * @return string|null
     */
    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }
}
