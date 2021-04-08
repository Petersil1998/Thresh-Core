<?php

namespace Thresh_Core\Utils;

/**
 * This class is used to make the API requests
 * @package Thresh_Core\Utils
 */
class HTTPClient
{
    private static $httpClient;

    /**
     * @var resource
     */
    private $_curl;

    /**
     * Returns an instance of HTTPClient
     * @return HTTPClient
     */
    public static function getInstance(): HTTPClient
    {
        if(self::$httpClient === null){
            self::$httpClient = new HTTPClient();
        }
        return self::$httpClient;
    }

    private function __construct()
    {
        $this->_curl = curl_init();
        curl_setopt($this->_curl, CURLOPT_RETURNTRANSFER, 1);
    }

    public function __destruct()
    {
        curl_close($this->_curl);
    }

    /**
     * @param string $url
     * @param array $queryParams
     * @return Response
     */
    public function get(string $url, array $queryParams): Response
    {
        curl_setopt($this->_curl, CURLOPT_HTTPGET, 1);
        return $this->request($url.'?'.$this->buildParameters($queryParams));
    }

    /**
     * @param $url string
     * @return Response
     */
    private function request(string $url): Response
    {
        curl_setopt($this->_curl, CURLOPT_URL, $url);
        curl_setopt($this->_curl, CURLOPT_HEADER, true);

        $response = curl_exec($this->_curl);

        $httpStatusCode = curl_getinfo($this->_curl, CURLINFO_HTTP_CODE);
        $header_size = curl_getinfo($this->_curl, CURLINFO_HEADER_SIZE);
        $body = substr($response, $header_size);
        $header = substr($response, 0, $header_size);

        return new Response($body, $httpStatusCode, $this->parseHeaders($header));
    }

    /**
     * @param array $array
     * @param array|false $qs
     * @return string
     */
    private function buildParameters(array $array, $qs = false): string
    {
        $parts = array();
        if ($qs) {
            $parts[] = $qs;
        }
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $value2) {
                    $parts[] = http_build_query(array($key => $value2));
                }
            } else {
                $parts[] = http_build_query(array($key => $value));
            }
        }
        return join('&', $parts);
    }

    /**
     * @param string $header
     * @return array
     */
    private function parseHeaders(string $header): array
    {
        $realHeader = array();
        $headers = explode(PHP_EOL, $header);
        array_shift($headers);
        foreach ($headers as $header) {
            $parts = explode(":", $header, 2);
            if(count($parts) == 2) {
                $realHeader[$parts[0]] = trim($parts[1]);
            }
        }
        return $realHeader;
    }
}