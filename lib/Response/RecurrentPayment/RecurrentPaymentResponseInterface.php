<?php

namespace Assist\Response\RecurrentPayment;

use Assist\Model\RecurrentPayment;
use Assist\Response\ResponseInterface;

interface RecurrentPaymentResponseInterface extends ResponseInterface
{
    /**
     * @return RecurrentPayment
     */
    public function getRecurrentPayment(): RecurrentPayment;
}
