<?php

namespace Assist\Response;

interface ResponseInterface
{
    public function __construct(array $responseData);
    public function getResponseData(): array;
}
