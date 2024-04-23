<?php

namespace Assist\Request\Payments;

use Assist\Request\AbstractRequest;

class RecurrentPaymentRequest extends AbstractRequest implements RecurrentPaymentRequestInterface
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
