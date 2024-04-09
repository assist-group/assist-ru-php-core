<?php

namespace Assist\AssistRuPhpCore\Config;

interface ApiConfigLoaderInterface
{
    public function getConfig();

    public function loadConfig();
}
