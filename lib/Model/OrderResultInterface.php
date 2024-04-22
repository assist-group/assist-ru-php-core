<?php

namespace Assist\AssistRuPhpCore\Model;

use Assist\AssistRuPhpCore\Model\Traits\CheckDataInterface;
use Assist\AssistRuPhpCore\Model\Traits\CustomerInterface;
use Assist\AssistRuPhpCore\Model\Traits\ThreeDSDataInterface;

interface OrderResultInterface extends ThreeDSDataInterface, CheckDataInterface, CustomerInterface
{
    /**
     * Возвращает код ошибки
     *
     * @return string
     */
    public function getErrorCode(): string;
}
