<?php

namespace Assist\Helpers;

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
    public static function getSign(
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
}
