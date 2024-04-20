<?php

namespace Assist\AssistRuPhpCore\Model;

use Assist\AssistRuPhpCore\Model\Traits\CheckDataInterface;
use Assist\AssistRuPhpCore\Model\Traits\CustomerInterface;
use Assist\AssistRuPhpCore\Model\Traits\OperationInterface;
use Assist\AssistRuPhpCore\Model\Traits\OrderInterface;

interface RecurrentPaymentInterface extends OrderInterface, CustomerInterface, OperationInterface, CheckDataInterface
{

}
