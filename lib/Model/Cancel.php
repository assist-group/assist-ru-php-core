<?php

namespace Assist\AssistRuPhpCore\Model;

use Assist\AssistRuPhpCore\Model\Traits\CheckData;
use Assist\AssistRuPhpCore\Model\Traits\Customer;
use Assist\AssistRuPhpCore\Model\Traits\Operation;
use Assist\AssistRuPhpCore\Model\Traits\Order;

class Cancel implements CancelInterface
{
    use Order, Customer, Operation, CheckData;
}
