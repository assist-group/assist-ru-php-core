<?php

namespace Assist\Model;

Class Customer
{
    /**
     * Имя плательщика.
     */
    private string $firstname;

    /**
     * Фамилия плательщика.
     */
    private string $lastname;

    /**
     * Отчество плательщика.
     */
    private string $middlename;

    /**
     * Email плательщика.
     */
    private string $email;

    /**
     * @param string $firstname
     * @param string $lastname
     * @param string $middlename
     * @param string $email
     */
    public function __construct(string $firstname, string $lastname, string $middlename, string $email)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->middlename = $middlename;
        $this->email = $email;
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

    /**
     * @param string $firstname
     * @return void
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @param string $lastname
     * @return void
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @param string $middlename
     * @return void
     */
    public function setMiddlename(string $middlename): void
    {
        $this->middlename = $middlename;
    }

    /**
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
