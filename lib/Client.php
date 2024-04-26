<?php

namespace Assist;

use Assist\Client\BaseClient;
use Assist\Exceptions\BadRequestException;
use Assist\Exceptions\ForbiddenException;
use Assist\Exceptions\HttpException;
use Assist\Exceptions\InternalServerErrorException;
use Assist\Exceptions\RequiredParameterDoesNotExistException;
use Assist\Exceptions\UnauthorizedException;
use Assist\Request\AbstractRequest;
use Assist\Request\Cancel\CancelRequest;
use Assist\Request\Charge\ChargeRequest;
use Assist\Request\CreatePayment\CreatePaymentRequest;
use Assist\Request\OrderResult\OrderResultRequest;
use Assist\Request\OrderState\OrderStateRequest;
use Assist\Request\RecurrentPayment\RecurrentPaymentRequest;
use Assist\Response\Cancel\CancelResponse;
use Assist\Response\Charge\ChargeResponse;
use Assist\Response\CreatePayment\CreatePaymentResponse;
use Assist\Response\OrderResult\OrderResultResponse;
use Assist\Response\OrderState\OrderStateResponse;
use Assist\Response\RecurrentPayment\RecurrentPaymentResponse;
use GuzzleHttp\Exception\GuzzleException;

class Client extends BaseClient
{
    /**
     * @param CreatePaymentRequest $createPaymentRequest
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
    public function createPayment(CreatePaymentRequest $createPaymentRequest): CreatePaymentResponse
    {
        $this->prepareCreatePaymentParams($createPaymentRequest);

        $response = $this->execute($createPaymentRequest->getPath(), $createPaymentRequest->getParams());

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
        $this->prepareRequestBaseParams($recurrentPaymentRequest);

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
        $this->prepareRequestBaseParams($cancelRequest);

        $response = $this->execute($cancelRequest->getPath(), $cancelRequest->getParams());

        if ($response->getStatusCode() !== 200) {
            $this->handleError($response);
        }

        return new CancelResponse(json_decode((string)$response->getBody(), true));
    }

    /**
     * @param ChargeRequest $chargeRequest
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
    public function change(ChargeRequest $chargeRequest): ChargeResponse
    {
        $this->prepareRequestBaseParams($chargeRequest);

        $response = $this->execute($chargeRequest->getPath(), $chargeRequest->getParams());

        if ($response->getStatusCode() !== 200) {
            $this->handleError($response);
        }

        return new ChargeResponse(json_decode((string)$response->getBody(), true));
    }

    /**
     * @param OrderResultRequest $orderResultRequest
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
    public function orderResult(OrderResultRequest $orderResultRequest): OrderResultResponse
    {
        $this->prepareRequestBaseParams($orderResultRequest);

        $response = $this->execute($orderResultRequest->getPath(), $orderResultRequest->getParams());

        if ($response->getStatusCode() !== 200) {
            $this->handleError($response);
        }

        return new OrderResultResponse(json_decode((string)$response->getBody(), true));
    }


    /**
     * @param OrderStateRequest $orderStateRequest
     *
     * @return OrderStateResponse
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws GuzzleException
     * @throws HttpException
     * @throws InternalServerErrorException
     * @throws RequiredParameterDoesNotExistException
     * @throws UnauthorizedException
     */
    public function orderState(OrderStateRequest $orderStateRequest): OrderStateResponse
    {
        $this->prepareRequestBaseParams($orderStateRequest);

        $response = $this->execute($orderStateRequest->getPath(), $orderStateRequest->getParams());

        if ($response->getStatusCode() !== 200) {
            $this->handleError($response);
        }

        return new OrderStateResponse(json_decode((string)$response->getBody(), true));
    }

    /**
     * @param CreatePaymentRequest $createPaymentRequest
     * @return void
     */
    private function prepareCreatePaymentParams(CreatePaymentRequest $createPaymentRequest): void
    {
        $this->prepareRequestMerchantParam($createPaymentRequest);
        $this->prepareRequestAuthParams($createPaymentRequest);
    }

    /**
     * @param AbstractRequest $request
     * @return void
     */
    private function prepareRequestBaseParams(AbstractRequest $request): void
    {
        $this->prepareRequestMerchantParam($request);
        $this->prepareRequestAuthParams($request);
        $this->prepareRequestLanguageParam($request);
    }

    /**
     * @param AbstractRequest $request
     * @return void
     */
    private function prepareRequestMerchantParam(AbstractRequest $request): void
    {
        if (!$request->getMerchantId() && $this->config->getMerchantId()) {
            $request->setMerchantId($this->config->getMerchantId());
        }
    }

    /**
     * @param AbstractRequest $request
     * @return void
     */
    private function prepareRequestLanguageParam(AbstractRequest $request): void
    {
        if (!$request->getLanguageParam() && $this->config->getLanguage()) {
            $request->setLanguage($this->config->getLanguage());
        }
    }

    /**
     * @param AbstractRequest $request
     * @return void
     */
    private function prepareRequestAuthParams(AbstractRequest $request): void
    {
        $config = $this->config;

        if (!$request->getLoginParam() && $config->getLogin()) {
            $request->setLogin($config->getLogin());
        }

        if (!$request->getPasswordParam() && $config->getPassword()) {
            $request->setPassword($config->getPassword());
        }
    }
}
