<?php

namespace Assist\Response\Cancel;

use Assist\Model\CheckData;
use Assist\Model\Order;
use Assist\Response\ResponseInterface;
use Assist\Response\Response;

class CancelResponse extends Response implements ResponseInterface
{

    /**
     * @var Order
     */
    private Order $order;

    /**
     * @var CheckData|null
     */
    private ?CheckData $checkData;

    /**
     * @param array $responseData
     */
    public function __construct(array $responseData)
    {
        $this->responseData = $responseData['wscancel'];
        $this->setPropsFromArray($this->responseData);
    }

    /**
     * @param array $responseData
     * @return void
     */
    private function setPropsFromArray(array $responseData): void
    {
        $this->order = new Order($responseData['order']);
        $this->checkData = $responseData['checkdata'] ? new CheckData($responseData['checkdata']) : null;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @return CheckData|null
     */
    public function getCheckData(): ?CheckData
    {
        return $this->checkData;
    }
}
