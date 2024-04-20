<?php

namespace Assist\AssistRuPhpCore\Response\Payments;

use Assist\AssistRuPhpCore\Helpers\ResponseHelper;
use Assist\AssistRuPhpCore\Model\RecurrentPayment;
use Assist\AssistRuPhpCore\Response\ResponseTrait;

class RecurrentPaymentResponse extends RecurrentPayment implements RecurrentPaymentResponseInterface
{
    use ResponseTrait;

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
        $this->setFirstname($responseData[ResponseHelper::FIRSTNAME]);
        $this->setLastname($responseData[ResponseHelper::LASTNAME]);
        $this->setMiddlename($responseData[ResponseHelper::MIDDLENAME]);
        $this->setEmail($responseData[ResponseHelper::EMAIL]);
        $this->setBillNumber($responseData[ResponseHelper::BILL_NUMBER]);
        $this->setOrderNumber($responseData[ResponseHelper::ORDER_NUMBER]);
        $this->setTestMode($responseData[ResponseHelper::TEST_MODE]);
        $this->setOrderComment($responseData[ResponseHelper::ORDER_COMMENT]);
        $this->setOrderAmount($responseData[ResponseHelper::ORDER_AMOUNT]);
        $this->setOrderCurrency($responseData[ResponseHelper::ORDER_CURRENCY]);
        $this->setOrderDate($responseData[ResponseHelper::ORDER_DATE]);
        $this->setOrderState($responseData[ResponseHelper::ORDER_STATE]);
        $this->setPacketDate($responseData[ResponseHelper::PACKET_DATE]);
        $this->setSignature($responseData[ResponseHelper::SIGNATURE]);
        $this->setOperationType($responseData[ResponseHelper::OPERATION_TYPE]);
        $this->setAmount($responseData[ResponseHelper::AMOUNT]);
        $this->setCurrency($responseData[ResponseHelper::CURRENCY]);
        $this->setIpAddress($responseData[ResponseHelper::IP_ADDRESS]);
        $this->setMeanTypeName($responseData[ResponseHelper::MEAN_TYPE_NAME]);
        $this->setMeanSubType($responseData[ResponseHelper::MEAN_SUB_TYPE]);
        $this->setMeanNumber($responseData[ResponseHelper::MEAN_NUMBER]);
        $this->setCardHolder($responseData[ResponseHelper::CARD_HOLDER]);
        $this->setCardExpirationDate($responseData[ResponseHelper::CARD_EXPIRATION_DATE]);
        $this->setIssueBank($responseData[ResponseHelper::ISSUE_BANK]);
        $this->setBankCountry($responseData[ResponseHelper::BANK_COUNTRY]);
        $this->setRate($responseData[ResponseHelper::RATE]);
        $this->setResponseCode($responseData[ResponseHelper::RESPONSE_CODE]);
        $this->setMessage($responseData[ResponseHelper::MESSAGE]);
        $this->setCustomerMessage($responseData[ResponseHelper::CUSTOMER_MESSAGE]);
        $this->setRecommendation($responseData[ResponseHelper::RECOMMENDATION]);
        $this->setApprovalCode($responseData[ResponseHelper::APPROVAL_CODE]);
        $this->setProtocolTypeName($responseData[ResponseHelper::PROTOCOL_TYPE_NAME]);
        $this->setProcessingName($responseData[ResponseHelper::PROCESSING_NAME]);
    }
}
