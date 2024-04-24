<?php

namespace Assist\Response\Charge;

use Assist\Response\Response;

class ChargeResponse extends Response implements ChargeResponseInterface
{
    /**
     * @param array $responseData
     */
    public function __construct(array $responseData)
    {
        $this->responseData = $responseData['charge'];
        $this->setPropsFromArray($this->responseData);
    }

    /**
     * @param array $responseData
     * @return void
     */
    private function setPropsFromArray(array $responseData): void
    {

    }
}
