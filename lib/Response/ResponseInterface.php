<?php

namespace Assist\AssistRuPhpCore\Response;

interface ResponseInterface
{
    public function __construct(array $responseData);
    public function getResponseData(): array;
}
