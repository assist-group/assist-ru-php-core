<?php

namespace Assist\Config;

interface ApiConfigLoaderInterface
{
    public function getConfig();

    public function loadConfig();
}
