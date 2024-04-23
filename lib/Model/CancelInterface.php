<?php

namespace Assist\Model;

use Assist\Model\Traits\CheckDataInterface;
use Assist\Model\Traits\CustomerInterface;
use Assist\Model\Traits\OperationInterface;
use Assist\Model\Traits\OrderInterface;

interface CancelInterface extends OrderInterface, CustomerInterface, OperationInterface, CheckDataInterface
{

}
