<?php

namespace Assist\AssistRuPhpCore\Response\Cancel;

use Assist\AssistRuPhpCore\Helpers\ResponseHelper;
use Assist\AssistRuPhpCore\Model\Cancel;
use Assist\AssistRuPhpCore\Response\ResponseInterface;
use Assist\AssistRuPhpCore\Response\ResponseTrait;

class CancelResponse extends Cancel implements ResponseInterface, CancelResponseInterface
{
    use ResponseTrait;

    public function __construct(array $responseData)
    {
        $this->responseData = $responseData;
        $this->setPropsFromArray($responseData);
    }

    private function setPropsFromArray(array $responseData)
    {
        $this->setOrderNumber($responseData[ResponseHelper::ORDER_NUMBER]);
        $this->setResponseCode($responseData[ResponseHelper::RESPONSE_CODE]);
        $this->setRecommendation($responseData[ResponseHelper::RECOMMENDATION]);
        $this->setMessage($responseData[ResponseHelper::MESSAGE]);
        $this->setOrderComment($responseData[ResponseHelper::ORDER_COMMENT]);
        $this->setOrderDate($responseData[ResponseHelper::ORDER_DATE]);
        $this->setAmount($responseData[ResponseHelper::AMOUNT]);
        $this->setCurrency($responseData[ResponseHelper::CURRENCY]);
        $this->setMeanTypeName($responseData[ResponseHelper::MEAN_TYPE_NAME]);
        $this->setMeanNumber($responseData[ResponseHelper::MEAN_NUMBER]);
        $this->setLastname($responseData[ResponseHelper::LASTNAME]);
        $this->setFirstname($responseData[ResponseHelper::FIRSTNAME]);
        $this->setMiddlename($responseData[ResponseHelper::MIDDLENAME]);
        $this->setEmail($responseData[ResponseHelper::EMAIL]);
        $this->setIssueBank($responseData[ResponseHelper::ISSUE_BANK]);
        $this->setBankCountry($responseData[ResponseHelper::BANK_COUNTRY]);
        $this->setRate($responseData[ResponseHelper::RATE]);
        $this->setApprovalCode($responseData[ResponseHelper::APPROVAL_CODE]);
        $this->setMeanSubType($responseData[ResponseHelper::MEAN_SUB_TYPE]);
        $this->setCardHolder($responseData[ResponseHelper::CARD_HOLDER]);
        $this->setCardExpirationDate($responseData[ResponseHelper::CARD_EXPIRATION_DATE]);
        $this->setIpaddress($responseData[ResponseHelper::IP_ADDRESS]);
        $this->setProtocolTypeName($responseData[ResponseHelper::PROTOCOL_TYPE_NAME]);
        $this->setTestMode($responseData[ResponseHelper::TEST_MODE]);
        $this->setCustomerMessage($responseData[ResponseHelper::CUSTOMER_MESSAGE]);
        $this->setOrderState($responseData[ResponseHelper::ORDER_STATE]);
        $this->setProcessingName($responseData[ResponseHelper::PROCESSING_NAME]);
        $this->setOperationType($responseData[ResponseHelper::OPERATION_TYPE]);
        $this->setBillNumber($responseData[ResponseHelper::BILL_NUMBER]);
        $this->setOrderAmount($responseData[ResponseHelper::ORDER_AMOUNT]);
        $this->setOrderCurrency($responseData[ResponseHelper::ORDER_CURRENCY]);
        $this->setSlipno($responseData[ResponseHelper::SLIPNO]);
        $this->setPacketDate($responseData[ResponseHelper::PACKET_DATE]);
        $this->setSignature($responseData[ResponseHelper::SIGNATURE]);
    }
}
