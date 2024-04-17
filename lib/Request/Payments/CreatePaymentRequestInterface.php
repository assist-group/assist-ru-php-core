<?php

namespace Assist\AssistRuPhpCore\Request\Payments;

use Assist\AssistRuPhpCore\Request\RequestInterface;

interface CreatePaymentRequestInterface extends RequestInterface
{
    public function setRecurrentIndicator(bool $indicator);
    public function setPaymentConfirmationIndicator(bool $indicator);
    public function setSignatureKeyword(string $keyword);
    public function setCustomerNumber(string $customerNumber);
}
