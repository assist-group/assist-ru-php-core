<?php

namespace Assist\AssistRuPhpCore\Request\Payments;

use Assist\AssistRuPhpCore\Exceptions\RequiredParameterDoesNotExistException;
use Assist\AssistRuPhpCore\Request\AbstractRequest;

class CreatePaymentRequest extends AbstractRequest implements CreatePaymentRequestInterface
{
    private const REQUIRED_PARAMETERS = [
        'Merchant_ID',
        'Login',
        'Password',
        'OrderAmount',
        'Cardnumber',
        'Expiremonth',
        'Expireyear',
        'Cvc2',
    ];

    private string $url = '/pay/order.cfm';
    private bool $isRecurrent = false;
    private bool $isRequiresConfirmation = false;
    private ?string $signatureKeyword = null;
    private string $customerNumber;
    private array $params;

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * Устанавливает идентификатор рекуррентного платежа
     *
     * @param bool $indicator
     */
    public function setRecurrentIndicator(bool $indicator): void
    {
        $this->isRecurrent = $indicator;
    }

    /**
     * Устанавливает идентификатор подтверждения платежа
     *
     * @param bool $indicator
     */
    public function setPaymentConfirmationIndicator(bool $indicator): void
    {
        $this->isRequiresConfirmation = $indicator;
    }

    /**
     * Устанавливает ключевое слово для подписи
     *
     * @param string $keyword
     */
    public function setSignatureKeyword(string $keyword): void
    {
        $this->signatureKeyword = $keyword;
    }

    /**
     * @param string $customerNumber
     * @return mixed
     */
    public function setCustomerNumber(string $customerNumber)
    {
        // TODO: Implement setCustomerNumber() method.
    }

    /**
     * Возвращает параметры запросы
     *
     * @return array
     * @throws RequiredParameterDoesNotExistException
     */
    public function getParams(): array
    {
        $this->checkParams($this->getRequiredParameters(), $this->params);

        return $this->params;
    }

    /**
     * @return string[]
     */
    private function getRequiredParameters(): array
    {
        $requiredParameters = self::REQUIRED_PARAMETERS;

        if ($this->isRecurrent) {
            array_push(
                $requiredParameters,
                'RecurringMinAmount',
                'RecurringMaxAmount',
                'RecurringPeriod',
                'RecurringMaxDate'
            );
        }

        return $requiredParameters;
    }
}
