<?php

namespace Assist\Response\OrderResult;

use Assist\Helpers\ResponseHelper;
use Assist\Model\CheckData;
use Assist\Model\Customer;
use Assist\Model\Operation;
use Assist\Model\OrderResult;
use Assist\Response\ResponseTrait;

class OrderResultResponse extends OrderResult implements OrderResultResponseInterface
{
    use ResponseTrait;

    /**
     * @param array $responseData
     */
    public function __construct(array $responseData)
    {
        $this->responseData = $responseData;
        $this->setPropsFromArray($responseData);
    }

    /**
     * @param array $responseData
     * @return void
     */
    private function setPropsFromArray(array $responseData): void
    {
        $this->setBillNumber($responseData[ResponseHelper::BILL_NUMBER]);
        $this->setOrderNumber($responseData[ResponseHelper::ORDER_NUMBER]);
        $this->setTestMode($responseData[ResponseHelper::TEST_MODE]);
        $this->setOrderComment($responseData[ResponseHelper::ORDER_COMMENT]);
        $this->setOrderAmount($responseData[ResponseHelper::ORDER_AMOUNT]);
        $this->setOrderCurrency($responseData[ResponseHelper::ORDER_CURRENCY]);
        $this->setOrderDate($responseData[ResponseHelper::ORDER_DATE]);
        $this->setOrderState($responseData[ResponseHelper::ORDER_STATE]);
        $this->setRate($responseData[ResponseHelper::RATE]);

        $customerData = $responseData[ResponseHelper::CUSTOMER];
        $this->setCustomer(
            new Customer(
                $customerData[ResponseHelper::FIRSTNAME],
                $customerData[ResponseHelper::LASTNAME],
                $customerData[ResponseHelper::MIDDLENAME],
                $customerData[ResponseHelper::EMAIL]
            )
        );

        $checkData = $responseData[ResponseHelper::CHECK_DATA];
        $this->setCheckData(
            new CheckData(
                $checkData[ResponseHelper::SIGNATURE],
                $checkData[ResponseHelper::CHECK_VALUE],
                $checkData[ResponseHelper::PACKET_DATE]
            )
        );

        $operations = $responseData[ResponseHelper::OPERATIONS];
        $operationsResult = [];

        foreach ($operations as $operation) {
            $operationsResult[] = new Operation($operation);
        }

        $this->setOperations($operationsResult);
    }
}
