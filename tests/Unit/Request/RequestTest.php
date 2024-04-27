<?php

use Assist\Exceptions\RequiredParameterDoesNotExistException;
use Assist\Helpers\RequestHelper;
use Assist\Request\Request;

use function Pest\Faker\fake;

it('should checkParams() throw RequiredParameterDoesNotExistException if any required params is missing', function () {
    $params = [];
    $requireParams = [RequestHelper::PARAM_MERCHANT_ID];
    $request = new Request();
    $checkParamsMethod = getMethod($request, 'checkParams');

    $checkParamsMethod->invoke($request, $requireParams, $params);
})->throws(RequiredParameterDoesNotExistException::class);

it(
    'should checkParams() dont throw RequiredParameterDoesNotExistException if any required params exists in params argument',
    function () {
        $params = [RequestHelper::PARAM_MERCHANT_ID => fake()->randomNumber()];
        $requireParams = [RequestHelper::PARAM_MERCHANT_ID];
        $request = new Request();
        $checkParamsMethod = getMethod($request, 'checkParams');

        $checkParamsMethod->invoke($request, $requireParams, $params);
    }
)->throwsNoExceptions();
