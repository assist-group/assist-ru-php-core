<?php

namespace Assist\Request\OrderState;

use Assist\Helpers\RequestHelper;
use Assist\Request\Request;

class OrderStateRequest extends Request
{
    private const REQUIRED_PARAMETERS = [
        RequestHelper::PARAM_MERCHANT_ID,
        RequestHelper::PARAM_LOGIN,
        RequestHelper::PARAM_PASSWORD,
        RequestHelper::PARAM_ORDER_NUMBER,
    ];

    protected string $path = RequestHelper::PATH_ORDER_STATE;

    /**
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
        $this->requiredParameters = self::REQUIRED_PARAMETERS;
    }
}
