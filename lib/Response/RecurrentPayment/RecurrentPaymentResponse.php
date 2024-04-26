<?php

namespace Assist\Response\RecurrentPayment;

use Assist\Model\RecurrentPayment;
use Assist\Response\Response;

class RecurrentPaymentResponse extends Response implements RecurrentPaymentResponseInterface
{
    private RecurrentPayment $recurrentPayment;

    /**
     * @param array $responseData
     */
    public function __construct(array $responseData)
    {
        $this->responseData = $responseData['rp'];
        $this->setPropsFromArray($this->responseData);
    }

    /**
     * @param array $responseData
     * @return void
     */
    private function setPropsFromArray(array $responseData): void
    {
        $this->recurrentPayment = new RecurrentPayment($responseData);
    }

    /**
     * Возвращает рекуррентный платёж
     *
     * @return RecurrentPayment
     */
    public function getRecurrentPayment(): RecurrentPayment
    {
        return $this->recurrentPayment;
    }
}
