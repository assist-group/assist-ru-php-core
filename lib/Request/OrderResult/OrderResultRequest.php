<?php

namespace Assist\Request\OrderResult;

use Assist\Helpers\RequestHelper;
use Assist\Request\Request;

class OrderResultRequest extends Request
{
    private const REQUIRED_PARAMETERS = [
        RequestHelper::PARAM_MERCHANT_ID,
        RequestHelper::PARAM_LOGIN,
        RequestHelper::PARAM_PASSWORD,
        RequestHelper::PARAM_BILL_NUMBER,
    ];

    protected string $path = RequestHelper::PATH_ORDER_RESULT;

    /**
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
        $this->requiredParameters = self::REQUIRED_PARAMETERS;
    }
}
