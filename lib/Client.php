<?php

namespace Assist;

use Assist\Client\BaseClient;
use Assist\Exceptions\BadRequestException;
use Assist\Exceptions\ForbiddenException;
use Assist\Exceptions\HttpException;
use Assist\Exceptions\InternalServerErrorException;
use Assist\Exceptions\UnauthorizedException;
use Assist\Request\Cancel\CancelRequestInterface;
use Assist\Request\Charge\ChargeRequestInterface;
use Assist\Request\OrderResult\OrderResultRequestInterface;
use Assist\Request\Payments\RecurrentPaymentRequestInterface;
use Assist\Response\Cancel\CancelResponse;
use Assist\Response\Charge\ChargeResponse;
use Assist\Response\OrderResult\OrderResultResponse;
use Assist\Response\RecurrentPayment\RecurrentPaymentResponse;
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

        $responseData = (string)$response->getBody();

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
