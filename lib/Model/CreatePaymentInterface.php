<?php

namespace Assist\AssistRuPhpCore\Model;

use Assist\AssistRuPhpCore\Model\CustomerCardInterface;
use Assist\AssistRuPhpCore\Model\OrderInterface;
use Assist\AssistRuPhpCore\Model\PaymentInterface;
use Assist\AssistRuPhpCore\Model\SbpSystemInterface;

interface CreatePaymentInterface extends CustomerCardInterface, SbpSystemInterface, PaymentInterface, OrderInterface
{

}
