<?php

namespace Assist\Request\OrderResult;

use Assist\Request\AbstractRequest;

class OrderResultRequest extends AbstractRequest implements OrderResultRequestInterface
{
    private const REQUIRED_PARAMETERS = [
        'Merchant_ID',
        'Login',
        'Password',
        'BillNumber',
    ];

    protected string $path = '/orderresult/orderresult.cfm';

    public function __construct(array $params)
    {
        $this->params = $params;
        $this->requiredParameters = self::REQUIRED_PARAMETERS;
    }
}
