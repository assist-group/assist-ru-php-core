<?php

namespace Assist\AssistRuPhpCore\Request;

use Assist\AssistRuPhpCore\Exceptions\RequiredParameterDoesNotExistException;

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
