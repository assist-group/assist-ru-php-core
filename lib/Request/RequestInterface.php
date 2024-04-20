<?php

namespace Assist\AssistRuPhpCore\Request;

interface RequestInterface
{
    public function getPath(): string;

    public function getParams(): array;
}
