<?php

namespace Assist\Request\RecurrentPayment;

use Assist\Helpers\RequestHelper;
use Assist\Request\AbstractRequest;

class RecurrentPaymentRequest extends AbstractRequest
{
    private const REQUIRED_PARAMETERS = [
        RequestHelper::PARAM_MERCHANT_ID,
        RequestHelper::PARAM_LOGIN,
        RequestHelper::PARAM_PASSWORD,
        RequestHelper::PARAM_BILL_NUMBER,
        RequestHelper::PARAM_ORDER_NUMBER,
        RequestHelper::PARAM_ORDER_AMOUNT,
        RequestHelper::PARAM_AMOUNT,
        RequestHelper::PARAM_CURRENCY,
    ];

    protected string $path = RequestHelper::PATH_RECURRENT;

    public function __construct(array $params)
    {
        $this->params = $params;
        $this->requiredParameters = self::REQUIRED_PARAMETERS;
    }
}
