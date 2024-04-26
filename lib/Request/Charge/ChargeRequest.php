<?php

namespace Assist\Request\Charge;

use Assist\Helpers\RequestHelper;
use Assist\Request\AbstractRequest;

class ChargeRequest extends AbstractRequest
{
    private const REQUIRED_PARAMETERS = [
        RequestHelper::PARAM_MERCHANT_ID,
        RequestHelper::PARAM_LOGIN,
        RequestHelper::PARAM_PASSWORD,
        RequestHelper::PARAM_BILL_NUMBER,
    ];

    protected string $path = RequestHelper::PATH_CHARGE;

    /**
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
        $this->requiredParameters = self::REQUIRED_PARAMETERS;
    }
}
