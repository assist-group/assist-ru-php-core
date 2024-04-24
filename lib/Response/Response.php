<?php

namespace Assist\Response;

Class Response
{
    protected array $responseData;

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
