<?php

namespace Assist\Model;

use Assist\Model\Traits\CheckData;
use Assist\Model\Traits\Customer;
use Assist\Model\Traits\Operation;
use Assist\Model\Traits\Order;

class Cancel implements CancelInterface
{
    use Order, Customer, Operation, CheckData;
}
