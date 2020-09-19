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
    public static function getInstance(){
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
     * @return string
     */
    public function get(string $url, array $queryParams){
        curl_setopt($this->_curl, CURLOPT_HTTPGET, 1);
        return $this->request($url.'?'.$this->buildParameters($queryParams));
    }

    /**
     * @param $url string
     * @return string
     */
    private function request(string $url){
        curl_setopt($this->_curl, CURLOPT_URL, $url);
        curl_setopt($this->_curl, CURLOPT_HEADER, true);

        $response = curl_exec($this->_curl);

        $httpStatusCode = curl_getinfo($this->_curl, CURLINFO_HTTP_CODE);
        $header_size = curl_getinfo($this->_curl, CURLINFO_HEADER_SIZE);
        $body = substr($response, $header_size);

        if($httpStatusCode == 200){
            return $body;
        } else {
            syslog(LOG_ALERT,
                sprintf('API Request returned a statusCode other than 200! Status Code: %s%sBody: %s',
                    $httpStatusCode,
                    PHP_EOL,
                    $body));
            return '';
        }
    }

    /**
     * @param array $array
     * @param array|false $qs
     * @return string
     */
    private function buildParameters(array $array, $qs = false) {
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
}