<?php

namespace Assist\AssistRuPhpCore\Request;

use Assist\AssistRuPhpCore\Exceptions\RequiredParameterDoesNotExistException;

class AbstractRequest implements RequestInterface
{
    private string $url;

    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @throws RequiredParameterDoesNotExistException
     */
    protected function checkParams($requiredParams, $params)
    {
        foreach ($requiredParams as $param) {
            if (!in_array($param, $params)) {
                throw new RequiredParameterDoesNotExistException('param ' . $param . ' is not defined');
            }
        }
    }
}
