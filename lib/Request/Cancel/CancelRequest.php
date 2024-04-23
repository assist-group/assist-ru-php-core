<?php

namespace Assist\Request\Cancel;

use Assist\Request\AbstractRequest;

class CancelRequest extends AbstractRequest implements CancelRequestInterface
{
    private const REQUIRED_PARAMETERS = [
        'Merchant_ID',
        'Login',
        'Password',
        'Billnumber',
    ];

    protected string $path = '/cancel/wscancel.cfm';

    public function __construct(array $params)
    {
        $this->params = $params;
        $this->requiredParameters = self::REQUIRED_PARAMETERS;
    }
}
