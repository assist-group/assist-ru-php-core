<?php

namespace Assist;

use Assist\Client\BaseClient;
use Assist\Exceptions\BadRequestException;
use Assist\Exceptions\ForbiddenException;
use Assist\Exceptions\HttpException;
use Assist\Exceptions\InternalServerErrorException;
use Assist\Exceptions\RequiredParameterDoesNotExistException;
use Assist\Exceptions\UnauthorizedException;
use Assist\Request\Cancel\CancelRequest;
use Assist\Request\Charge\ChargeRequest;
use Assist\Request\CreatePayment\CreatePaymentRequest;
use Assist\Request\OrderResult\OrderResultRequest;
use Assist\Request\RecurrentPayment\RecurrentPaymentRequest;
use Assist\Response\Cancel\CancelResponse;
use Assist\Response\Charge\ChargeResponse;
use Assist\Response\CreatePayment\CreatePaymentResponse;
use Assist\Response\OrderResult\OrderResultResponse;
use Assist\Response\RecurrentPayment\RecurrentPaymentResponse;
use GuzzleHttp\Exception\GuzzleException;

class Client extends BaseClient
{
    /**
     * @param CreatePaymentRequest $createPayment
     *
     * @return CreatePaymentResponse
     *
     * @throws BadRequestException
     * @throws Exceptions\RequiredParameterDoesNotExistException
     * @throws ForbiddenException
     * @throws GuzzleException
     * @throws HttpException
     * @throws InternalServerErrorException
     * @throws UnauthorizedException
     */
    public function createPayment(CreatePaymentRequest $createPayment): CreatePaymentResponse
    {
        $config = $this->config;

        if ($config->getLogin()) {
            $createPayment->setLogin($config->getLogin());
        }

        if ($config->getPassword()) {
            $createPayment->setPassword($config->getPassword());
        }

        if ($config->getSuccessPaymentPageUrl()) {
            $createPayment->setSuccessPaymentPageUrl($config->getSuccessPaymentPageUrl());
        }

        if ($config->getErrorPaymentPageUrl()) {
            $createPayment->setErrorPaymentPageUrl($config->getErrorPaymentPageUrl());
        }

        $response = $this->execute($createPayment->getPath(), $createPayment->getParams());

        if ($response->getStatusCode() !== 200) {
            $this->handleError($response);
        }

        return new CreatePaymentResponse(json_decode((string)$response->getBody(), true));
    }

    /**
     * @param RecurrentPaymentRequest $recurrentPaymentRequest
     *
     * @return RecurrentPaymentResponse
     *
     * @throws BadRequestException
     * @throws RequiredParameterDoesNotExistException
     * @throws ForbiddenException
     * @throws GuzzleException
     * @throws HttpException
     * @throws InternalServerErrorException
     * @throws UnauthorizedException
     */
    public function recurrentPayment(RecurrentPaymentRequest $recurrentPaymentRequest): RecurrentPaymentResponse
    {
        $response = $this->execute($recurrentPaymentRequest->getPath(), $recurrentPaymentRequest->getParams());

        if ($response->getStatusCode() !== 200) {
            $this->handleError($response);
        }

        return new RecurrentPaymentResponse(json_decode((string)$response->getBody(), true));
    }

    /**
     * @param CancelRequest $cancelRequest
     *
     * @return CancelResponse
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws GuzzleException
     * @throws HttpException
     * @throws InternalServerErrorException
     * @throws RequiredParameterDoesNotExistException
     * @throws UnauthorizedException
     */
    public function cancel(CancelRequest $cancelRequest): CancelResponse
    {
        $response = $this->execute($cancelRequest->getPath(), $cancelRequest->getParams());

        if ($response->getStatusCode() !== 200) {
            $this->handleError($response);
        }

        return new CancelResponse(json_decode((string)$response->getBody(), true));
    }

    /**
     * @param ChargeRequest $cancelRequest
     *
     * @return ChargeResponse
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws GuzzleException
     * @throws HttpException
     * @throws InternalServerErrorException
     * @throws RequiredParameterDoesNotExistException
     * @throws UnauthorizedException
     */
    public function change(ChargeRequest $cancelRequest): ChargeResponse
    {
        $response = $this->execute($cancelRequest->getPath(), $cancelRequest->getParams());

        if ($response->getStatusCode() !== 200) {
            $this->handleError($response);
        }

        return new ChargeResponse(json_decode((string)$response->getBody(), true));
    }

    /**
     * @param OrderResultRequest $cancelRequest
     *
     * @return OrderResultResponse
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws GuzzleException
     * @throws HttpException
     * @throws InternalServerErrorException
     * @throws RequiredParameterDoesNotExistException
     * @throws UnauthorizedException
     */
    public function orderResult(OrderResultRequest $cancelRequest): OrderResultResponse
    {
        $response = $this->execute($cancelRequest->getPath(), $cancelRequest->getParams());

        if ($response->getStatusCode() !== 200) {
            $this->handleError($response);
        }

        return new OrderResultResponse(json_decode((string)$response->getBody(), true));
    }
}
