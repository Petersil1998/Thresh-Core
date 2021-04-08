<?php

namespace Thresh_Core\Utils;

class Response
{
    private $body;

    private $statusCode;

    private $headers;

    /**
     * Response constructor.
     * @param string $body
     * @param int $statusCode
     * @param array $headers
     */
    public function __construct(string $body, int $statusCode, array $headers) {
        $this->body = $body;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param string $header
     * @return string
     */
    public function getHeader(string $header): string
    {
        return $this->headers[$header];
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }
}