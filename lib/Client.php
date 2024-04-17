<?php

namespace Assist\AssistRuPhpCore;

use Assist\AssistRuPhpCore\Client\BaseClient;
use Assist\AssistRuPhpCore\Exceptions\AuthException;
use Assist\AssistRuPhpCore\Helpers\HttpHelper;
use Assist\AssistRuPhpCore\Request\Payments\CreatePaymentRequestInterface;
use Assist\AssistRuPhpCore\Response\Payments\CreatePaymentResponse;
use Assist\AssistRuPhpCore\Response\Payments\CreatePaymentResponseInterface;
use GuzzleHttp\Exception\GuzzleException;

class Client extends BaseClient
{
    /**
     * @throws GuzzleException
     * @throws AuthException
     */
    public function createPayment(CreatePaymentRequestInterface $createPaymentRequest): CreatePaymentResponseInterface
    {
        $response = $this->execute(
            HttpHelper::METHOD_POST,
            $createPaymentRequest->getUrl(),
            $createPaymentRequest->getParams()
        );

        if ($response->getStatusCode() !== 200) {
            $this->handleError($response);
        }

        return new CreatePaymentResponse($response);
    }
}
