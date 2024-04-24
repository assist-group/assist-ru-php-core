<?php

namespace Assist\Model;

use Assist\Helpers\ResponseHelper;

Class Customer
{
    /**
     * Имя плательщика.
     */
    private ?string $firstname;

    /**
     * Фамилия плательщика.
     */
    private ?string $lastname;

    /**
     * Отчество плательщика.
     */
    private ?string $middlename;

    /**
     * Email плательщика.
     */
    private ?string $email;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->firstname = $data[ResponseHelper::FIRSTNAME] ?? null;
        $this->lastname = $data[ResponseHelper::LASTNAME] ?? null;
        $this->middlename = $data[ResponseHelper::MIDDLENAME] ?? null;
        $this->email = $data[ResponseHelper::EMAIL] ?? null;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getMiddlename(): string
    {
        return $this->middlename;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
