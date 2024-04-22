<?php

namespace Assist\AssistRuPhpCore;

use Assist\AssistRuPhpCore\Client\BaseClient;
use Assist\AssistRuPhpCore\Exceptions\BadRequestException;
use Assist\AssistRuPhpCore\Exceptions\ForbiddenException;
use Assist\AssistRuPhpCore\Exceptions\HttpException;
use Assist\AssistRuPhpCore\Exceptions\InternalServerErrorException;
use Assist\AssistRuPhpCore\Exceptions\UnauthorizedException;
use Assist\AssistRuPhpCore\Request\Cancel\CancelRequestInterface;
use Assist\AssistRuPhpCore\Request\Charge\ChargeRequestInterface;
use Assist\AssistRuPhpCore\Request\OrderResult\OrderResultRequestInterface;
use Assist\AssistRuPhpCore\Request\Payments\RecurrentPaymentRequestInterface;
use Assist\AssistRuPhpCore\Response\Cancel\CancelResponse;
use Assist\AssistRuPhpCore\Response\Charge\ChargeResponse;
use Assist\AssistRuPhpCore\Response\OrderResult\OrderResultResponse;
use Assist\AssistRuPhpCore\Response\Payments\RecurrentPaymentResponse;
use GuzzleHttp\Exception\GuzzleException;

class Client extends BaseClient
{
    /**
     * @param RecurrentPaymentRequestInterface $recurrentPaymentRequest
     *
     * @return RecurrentPaymentResponse
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws HttpException
     * @throws InternalServerErrorException
     * @throws UnauthorizedException
     * @throws GuzzleException
     */
    public function recurrentPayment(RecurrentPaymentRequestInterface $recurrentPaymentRequest): RecurrentPaymentResponse
    {
        $response = $this->execute($recurrentPaymentRequest->getPath(), $recurrentPaymentRequest->getParams());

        if ($response->getStatusCode() !== 200) {
            $this->handleError($response);
        }

        return new RecurrentPaymentResponse(json_decode($response->getBody(), true));
    }

    /**
     * @param CancelRequestInterface $cancelRequest
     *
     * @return CancelResponse
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws GuzzleException
     * @throws HttpException
     * @throws InternalServerErrorException
     * @throws UnauthorizedException
     */
    public function cancel(CancelRequestInterface $cancelRequest): CancelResponse
    {
        $response = $this->execute($cancelRequest->getPath(), $cancelRequest->getParams());

        if ($response->getStatusCode() !== 200) {
            $this->handleError($response);
        }

        return new CancelResponse(json_decode($response->getBody(), true));
    }

    /**
     * @param ChargeRequestInterface $cancelRequest
     *
     * @return ChargeResponse
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws GuzzleException
     * @throws HttpException
     * @throws InternalServerErrorException
     * @throws UnauthorizedException
     */
    public function change(ChargeRequestInterface $cancelRequest): ChargeResponse
    {
        $response = $this->execute($cancelRequest->getPath(), $cancelRequest->getParams());

        if ($response->getStatusCode() !== 200) {
            $this->handleError($response);
        }

        return new ChargeResponse(json_decode($response->getBody(), true));
    }

    /**
     * @param OrderResultRequestInterface $cancelRequest
     *
     * @return OrderResultResponse
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws GuzzleException
     * @throws HttpException
     * @throws InternalServerErrorException
     * @throws UnauthorizedException
     */
    public function orderResult(OrderResultRequestInterface $cancelRequest): OrderResultResponse
    {
        $response = $this->execute($cancelRequest->getPath(), $cancelRequest->getParams());

        if ($response->getStatusCode() !== 200) {
            $this->handleError($response);
        }

        return new OrderResultResponse(json_decode($response->getBody(), true));
    }
}
