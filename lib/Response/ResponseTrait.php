<?php

namespace Assist\Response;

trait ResponseTrait
{
    private array $responseData;

    /**
     * Возвращает данные ответа
     *
     * @return array
     */
    public function getResponseData(): array
    {
        return $this->responseData;
    }
}