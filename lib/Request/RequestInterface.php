<?php

namespace Assist\AssistRuPhpCore\Request;

interface RequestInterface
{
    public function getUrl(): string;

    public function getParams(): string;
}
