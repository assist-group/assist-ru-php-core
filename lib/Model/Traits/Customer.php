<?php

namespace Assist\AssistRuPhpCore\Model\Traits;

trait Customer
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
     * Возвращает имя плательщика
     *
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return void
     */
    protected function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * Возвращает фамилию плательщика
     *
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return void
     */
    protected function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * Возвращает отчество плательщика
     *
     * @return string
     */
    public function getMiddlename(): string
    {
        return $this->middlename;
    }

    /**
     * @param string $middlename
     * @return void
     */
    protected function setMiddlename(string $middlename): void
    {
        $this->middlename = $middlename;
    }

    /**
     * Возвращает email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return void
     */
    protected function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
