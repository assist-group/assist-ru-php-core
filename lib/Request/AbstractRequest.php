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
     * @return string|bool
     */
    public function getMerchantId(): string|bool
    {
        return $this->params[RequestHelper::PARAM_MERCHANT_ID] ?? false;
    }

    /**
     * @return string|bool
     */
    public function getLoginParam(): string|bool
    {
        return $this->params[RequestHelper::PARAM_LOGIN] ?? false;
    }

    /**
     * @return string|bool
     */
    public function getPasswordParam(): string|bool
    {
        return $this->params[RequestHelper::PARAM_PASSWORD] ?? false;
    }

    /**
     * @return string|bool
     */
    public function getLanguageParam(): string|bool
    {
        return $this->params[RequestHelper::PARAM_LANGUAGE] ?? false;
    }

    /**
     * @param string $merchantId
     * @return void
     */
    public function setMerchantId(string $merchantId): void
    {
        $this->params[RequestHelper::PARAM_MERCHANT_ID] = $merchantId;
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
     * @param string $language
     * @return void
     */
    public function setLanguage(string $language): void
    {
        $this->params[RequestHelper::PARAM_LANGUAGE] = $language;
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
