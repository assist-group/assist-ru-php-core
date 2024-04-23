<?php

namespace Assist\Exceptions;

class HttpException extends \Exception
{
    /**
     * @var mixed
     */
    protected mixed $responseBody;

    /**
     * @var string[]
     */
    protected array $responseHeaders;

    /**
     * Constructor
     *
     * @param string $message Error message
     * @param int $statusCode HTTP status code
     * @param array $responseHeaders HTTP header
     * @param mixed|null $responseBody HTTP body
     */
    public function __construct(string $message = "", int $statusCode = 0, array $responseHeaders = [], mixed $responseBody = null)
    {
        parent::__construct($message, $statusCode);

        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;
    }

    /**
     * @return string[]
     */
    public function getResponseHeaders(): array
    {
        return $this->responseHeaders;
    }

    /**
     * @return mixed
     */
    public function getResponseBody(): mixed
    {
        return $this->responseBody;
    }
}
