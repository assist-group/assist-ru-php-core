<?php

namespace Assist\Helpers;

use SodiumException;

class SignHelper
{
    /**
     * @param int $merchantId
     * @param string $orderNumber
     * @param string $orderAmount
     * @param string $orderCurrency
     * @param string|null $orderMaxPoints
     * @param string|null $customerNumber
     * @param string|null $disable3DS
     * @param string|null $prepayment
     *
     * @return string
     */
    private static function getSignString(
        int $merchantId,
        string $orderNumber,
        string $orderAmount,
        string $orderCurrency,
        ?string $orderMaxPoints = null,
        ?string $customerNumber = null,
        ?string $disable3DS = null,
        ?string $prepayment = null,
    ): string {
        $signParams = [
            $merchantId,
            $orderNumber,
            $orderAmount,
            $orderCurrency,
        ];

        if ($orderMaxPoints) {
            $signParams[] = $orderMaxPoints;
        }

        if ($customerNumber) {
            $signParams[] = $customerNumber;
        }

        if ($disable3DS) {
            $signParams[] = $disable3DS;
        }

        if ($prepayment) {
            $signParams[] = $prepayment;
        }

        return implode(';', $signParams);
    }

    /**
     * Формирует подпись
     *
     * Параметры для формирования подписи передаются в массиве $params в формате ключ => значение
     *
     * Обязательные параметры: Merchant_ID, OrderNumber, OrderAmount, OrderCurrency
     * Необязательные параметры: OrderMaxPoints, CustomerNumber, Disable3DS, Prepayment
     *
     * @param array $params
     * @param string $privateKey
     * @return string
     * @throws SodiumException
     */
    public static function getSignature(array $params, string $privateKey): string
    {
        $privateKey = sodium_crypto_sign_secretkey($privateKey);
        $string = self::getSignString(
            $params[RequestHelper::PARAM_MERCHANT_ID],
            $params[RequestHelper::PARAM_ORDER_NUMBER],
            $params[RequestHelper::PARAM_ORDER_AMOUNT],
            $params[RequestHelper::PARAM_ORDER_CURRENCY],
            $params[RequestHelper::PARAM_ORDER_MAX_POINTS] ?? null,
            $params[RequestHelper::PARAM_CUSTOMER_NUMBER] ?? null,
            $params[RequestHelper::PARAM_DISABLE_3DS] ?? null,
            $params[RequestHelper::PARAM_PREPAYMENT] ?? null
        );

        $digest = md5($string);

        return sodium_crypto_sign_detached($digest, $privateKey);
    }

    /**
     * Формирует контрольный код
     *
     * Параметры для формирования контрольного кода передаются в массиве $params в формате ключ => значение
     *
     * Обязательные параметры: Merchant_ID, OrderNumber, OrderAmount, OrderCurrency
     * Необязательные параметры: OrderMaxPoints, CustomerNumber, Disable3DS, Prepayment
     *
     * @param array $params
     * @param string $salt
     * @return string
     */
    public static function getCheckValue(array $params, string $salt): string
    {
        $string = self::getSignString(
            $params[RequestHelper::PARAM_MERCHANT_ID],
            $params[RequestHelper::PARAM_ORDER_NUMBER],
            $params[RequestHelper::PARAM_ORDER_AMOUNT],
            $params[RequestHelper::PARAM_ORDER_CURRENCY],
            $params[RequestHelper::PARAM_ORDER_MAX_POINTS] ?? null,
            $params[RequestHelper::PARAM_CUSTOMER_NUMBER] ?? null,
            $params[RequestHelper::PARAM_DISABLE_3DS] ?? null,
            $params[RequestHelper::PARAM_PREPAYMENT] ?? null
        );

        return strtoupper(md5(strtoupper(md5($salt) . md5($string))));
    }

    /**
     * Формирует контрольный код для ответа со статусом заказа
     *
     * Параметры для формирования контрольного кода передаются в массиве $params в формате ключ => значение
     *
     * Обязательные параметры: Merchant_ID, OrderNumber, OrderAmount, OrderCurrency, orderstate
     *
     * @param array $params
     * @param string $salt
     * @return string
     */
    public static function getStatusResponseCheckValue(array $params, string $salt): string
    {
        $string = implode('', [
            $params[RequestHelper::PARAM_MERCHANT_ID],
            $params[RequestHelper::PARAM_ORDER_NUMBER],
            $params[RequestHelper::PARAM_ORDER_AMOUNT],
            $params[RequestHelper::PARAM_ORDER_CURRENCY],
            $params[ResponseHelper::ORDER_STATE]
        ]);

        return strtoupper(md5(strtoupper(md5($salt) . md5($string))));
    }
}
