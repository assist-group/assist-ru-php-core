<?php

namespace Assist\AssistRuPhpCore\Response;

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
