<?php

namespace Assist\Response\Cancel;

use Assist\Model\CheckData;
use Assist\Model\Order;
use Assist\Response\ResponseInterface;

interface CancelResponseInterface extends ResponseInterface
{
    /**
     * @return Order
     */
    public function getOrder(): Order;

    /**
     * @return CheckData
     */
    public function getCheckData(): CheckData;
}
