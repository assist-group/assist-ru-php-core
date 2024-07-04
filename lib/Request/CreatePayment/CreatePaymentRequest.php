<?php

namespace Assist\Request\CreatePayment;

use Assist\Helpers\RequestHelper;
use Assist\Request\Request;

class CreatePaymentRequest extends Request
{
    private const REQUIRED_PARAMETERS = [
        RequestHelper::PARAM_MERCHANT_ID,
        RequestHelper::PARAM_ORDER_NUMBER,
        RequestHelper::PARAM_ORDER_AMOUNT,
    ];

    private const RECURRENT_PARAMETERS = [
        RequestHelper::PARAM_RECURRING_MIN_AMOUNT,
        RequestHelper::PARAM_RECURRING_MAX_AMOUNT,
        RequestHelper::PARAM_RECURRING_PERIOD,
        RequestHelper::PARAM_RECURRING_MAX_DATE,
    ];

    protected string $path = RequestHelper::PATH_CREATE_PAYMENT;

    /**
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
        $this->requiredParameters = self::REQUIRED_PARAMETERS;

        if (array_key_exists(
                RequestHelper::PARAM_RECURRING_INDICATOR,
                $params
            ) && $params[RequestHelper::PARAM_RECURRING_INDICATOR]) {
            $this->requiredParameters = array_merge($this->requiredParameters, self::RECURRENT_PARAMETERS);
        }
    }
}
