<?php

namespace Assist\AssistRuPhpCore\Model;

use Assist\AssistRuPhpCore\Model\Traits\CustomerCard;
use Assist\AssistRuPhpCore\Model\Traits\Order;
use Assist\AssistRuPhpCore\Model\Traits\Payment;
use Assist\AssistRuPhpCore\Model\Traits\SbpSystem;

class CreatePayment implements CreatePaymentInterface
{
    use Order, CustomerCard, Payment, SbpSystem;
}
