<?php

namespace Assist\Model\Traits;

interface CustomerInterface
{
    /**
     * Возвращает имя плательщика
     *
     * @return string
     */
    public function getFirstname(): string;

    /**
     * Возвращает фамилию плательщика
     *
     * @return string
     */
    public function getLastname(): string;

    /**
     * Возвращает отчество плательщика
     *
     * @return string
     */
    public function getMiddlename(): string;

    /**
     * Возвращает email
     *
     * @return string
     */
    public function getEmail(): string;
}
