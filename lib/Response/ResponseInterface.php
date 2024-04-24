<?php

namespace Assist\Response;

interface ResponseInterface
{
    /**
     * @param array $responseData
     */
    public function __construct(array $responseData);

    /**
     * @return array
     */
    public function getResponseData(): array;
}
