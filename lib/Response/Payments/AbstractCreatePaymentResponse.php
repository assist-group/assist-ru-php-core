<?php

namespace Assist\AssistRuPhpCore\Response\Payments;

use Assist\AssistRuPhpCore\Model\CreatePayment;
use Assist\AssistRuPhpCore\Response\ResponseInterface;

abstract class AbstractCreatePaymentResponse extends CreatePayment implements ResponseInterface
{
    public function __construct(array $responseData) {
        $this->setPropsFromArray($responseData);
    }

    abstract public function setPropsFromArray(array $responseData);
}
