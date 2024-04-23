<?php

namespace Assist\Request\Charge;

use Assist\Request\AbstractRequest;

class ChargeRequest extends AbstractRequest implements ChargeRequestInterface
{
    private const REQUIRED_PARAMETERS = [
        'Merchant_ID',
        'Login',
        'Password',
        'BillNumber',
    ];

    protected string $path = '/charge/charge.cfm';

    public function __construct(array $params)
    {
        $this->params = $params;
        $this->requiredParameters = self::REQUIRED_PARAMETERS;
    }
}
