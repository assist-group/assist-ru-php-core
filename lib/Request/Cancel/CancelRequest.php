<?php

namespace Assist\AssistRuPhpCore\Request\Cancel;

use Assist\AssistRuPhpCore\Request\AbstractRequest;

class CancelRequest extends AbstractRequest implements CancelRequestInterface
{
    private const REQUIRED_PARAMETERS = [
        'Merchant_ID',
        'Login',
        'Password',
        'BillNumber',
    ];

    protected string $path = '/cancel/cancel.cfm';

    public function __construct(array $params)
    {
        $this->params = $params;
        $this->requiredParameters = self::REQUIRED_PARAMETERS;
    }
}
