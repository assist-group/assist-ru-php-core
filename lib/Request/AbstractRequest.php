<?php

namespace Assist\Request;

use Assist\Exceptions\RequiredParameterDoesNotExistException;
use Assist\Helpers\RequestHelper;

class AbstractRequest implements RequestInterface
{
    protected string $path;
    protected array $params;
    protected array $requiredParameters;


    /**
     * Возвращает путь запроса
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Возвращает параметры запросы
     *
     * @return array
     * @throws RequiredParameterDoesNotExistException
     */
    public function getParams(): array
    {
        $this->checkParams($this->getRequiredParameters(), $this->params);

        return $this->params;
    }

    /**
     * @param string $successPaymentPageUrl
     * @return void
     */
    public function setSuccessPaymentPageUrl(string $successPaymentPageUrl): void
    {
        $this->params[RequestHelper::PARAM_URL_RETURN_OK] = $successPaymentPageUrl;
    }

    /**
     * @param string $errorPaymentPageUrl
     * @return void
     */
    public function setErrorPaymentPageUrl(string $errorPaymentPageUrl): void
    {
        $this->params[RequestHelper::PARAM_URL_RETURN_NO] = $errorPaymentPageUrl;
    }

    /**
     * @param string $login
     * @return void
     */
    public function setLogin(string $login): void
    {
        $this->params[RequestHelper::PARAM_LOGIN] = $login;
    }

    /**
     * @param string $password
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->params[RequestHelper::PARAM_PASSWORD] = $password;
    }

    /**
     * @return string[]
     */
    protected function getRequiredParameters(): array
    {
        return $this->requiredParameters;
    }

    /**
     * @param array $requiredParams
     * @param array $params
     * @throws RequiredParameterDoesNotExistException
     */
    protected function checkParams(array $requiredParams, array $params): void
    {
        foreach ($requiredParams as $param) {
            if (!array_key_exists($param, $params)) {
                throw new RequiredParameterDoesNotExistException('param ' . $param . ' is not defined');
            }
        }
    }
}
