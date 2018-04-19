<?php

namespace CapsuleCRM;

use CapsuleCRM\Exception;
use CapsuleCRM\Resource;
use CapsuleCRM\Resource\AbstractResource;

/**
 * Class Client
 *
 * @package CapsuleCRM
 * @property-read Resource\Party $party party resource
 */
class Client
{
    const API_ENDPOINT = 'https://api.capsulecrm.com/api/v2/';

    /**
     * @var string
     */
    protected $accessToken = '';

    /**
     * @var string
     */
    protected $lastResponseRaw = '';

    /**
     * @var array
     */
    protected $lastResponse;

    /**
     * @var int
     */
    protected $curlConnectTimeout = 20;

    /**
     * @var int
     */
    protected $curlTimeout = 20;

    /**
     * Client constructor.
     * @param string $accessToken
     */
    public function __construct($accessToken = '')
    {
        $this->setAccessToken($accessToken);
    }

    /**
     * @param string $accessToken
     * @throws Exception\LengthException
     */
    public function setAccessToken($accessToken)
    {
        if (strlen($accessToken) != 64) {
            throw new Exception\LengthException('Missing or invalid API key');
        }

        $this->accessToken = $accessToken;
    }

    /**
     * @param string $path
     * @param array $params
     * @return array
     * @throws Exception\ApiException
     */
    public function get($path, $params = [])
    {
        return $this->request('GET', $path, $params);
    }

    /**
     * @param string $path
     * @param array $data
     * @param array $params
     * @return array
     * @throws Exception\ApiException
     */
    public function post($path, $data = [], $params = [])
    {
        return $this->request('POST', $path, $params, $data);
    }

    /**
     * @param string $path
     * @param array $data
     * @param array $params
     * @return array
     * @throws Exception\ApiException
     */
    public function put($path, $data = [], $params = [])
    {
        return $this->request('PUT', $path, $params, $data);
    }

    /**
     * @param string $path
     * @param array $params
     * @return array
     * @throws Exception\ApiException
     */
    public function delete($path, $params = [])
    {
        return $this->request('DELETE', $path, $params);
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $params
     * @param string|array|null $data
     * @return array
     * @throws Exception\ApiException
     */
    private function request($method, $path, array $params = [], $data = null)
    {
        $this->lastResponseRaw = null;
        $this->lastResponse = null;

        $url = trim($path, '/');

        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }

        $ch = curl_init(self::API_ENDPOINT . $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->curlConnectTimeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->curlTimeout);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            sprintf('Authorization: Bearer %s', $this->accessToken),
            'Accept: application/json',
        ]);

        if ($data !== null) {
            $jsonData = json_encode($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($jsonData),
            ]);
        }

        // Log last raw response
        $this->lastResponseRaw = curl_exec($ch);

        // Get status code and errors before closing handle
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $errorNumber = curl_errno($ch);
        $error = curl_error($ch);
        curl_close($ch);

        // Check for a Curl error
        if ($errorNumber) {
            throw new Exception\RuntimeException('CURL: ' . $error, $errorNumber);
        }

        // Log last decoded response
        $this->lastResponse = $response = json_decode($this->lastResponseRaw, true);

        // Check HTTP status code
        if ($statusCode < 200 || $statusCode >= 300) {
            throw new Exception\ApiException('Request failure: ' . $response['result'], $statusCode);
        }

        return $response;
    }

    /**
     * @param string $name
     * @return AbstractResource
     */
    public function __get($name)
    {
        $resourceClass = 'CapsuleCRM\Resource\\' . ucfirst($name);
        if (!class_exists($resourceClass)) {
            throw new Exception\RuntimeException('Undefined property');
        }

        $resource = new $resourceClass($this);
        return $resource;
    }
}
