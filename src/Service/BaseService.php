<?php

namespace OxidSolutionCatalysts\PayPal\Api\Service;

use GuzzleHttp\Exception\GuzzleException;
use OxidSolutionCatalysts\PayPal\Api\Client;
use OxidSolutionCatalysts\PayPal\Api\Exception\ApiException;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Query;

class BaseService
{
    /** @var Client */
    public $client;

    /**
     * @param $client Client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $params
     * @param array<string,string> $headers
     * @param null|string $body
     * @return ResponseInterface
     * @throws ApiException
     */
    protected function send($method, $path, $params = [], $headers = [], $body = null): ResponseInterface
    {
        $params = array_filter($params);
        if ($params) {
            $q = Query::build($params);
            $path = "$path?$q";
        }
        $fullPath = $this->basePath . $path;
        $request = $this->client->createRequest($method, $fullPath, $headers, $body);
        try {
            $response = $this->client->send($request);
        } catch (GuzzleException $e) {
            throw new ApiException($e);
        }
        return $response;
    }
}
