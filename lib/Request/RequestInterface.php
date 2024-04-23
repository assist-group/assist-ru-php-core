<?php

namespace Assist\Request;

interface RequestInterface
{
    public function getPath(): string;

    public function getParams(): array;
}
