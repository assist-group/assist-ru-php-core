<?php

namespace Assist\AssistRuPhpCore\Request\Payments;

use Assist\AssistRuPhpCore\Request\AbstractRequest;

class RecurrentPaymentRequest extends AbstractRequest
{
    private const REQUIRED_PARAMETERS = [
        'Merchant_ID',
        'Login',
        'Password',
        'OrderAmount',
        'BillNumber',
        'OrderNumber',
        'Amount',
        'Currency',
    ];

    protected string $path = '/recurrent/rp.cfm';

    public function __construct(array $params)
    {
        $this->params = $params;
        $this->requiredParameters = self::REQUIRED_PARAMETERS;
    }
}
