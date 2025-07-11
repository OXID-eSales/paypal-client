<?php

namespace OxidSolutionCatalysts\PayPalApi\Service;

use GuzzleHttp\Exception\GuzzleException;
use OxidSolutionCatalysts\PayPalApi\Client;
use OxidSolutionCatalysts\PayPalApi\Exception\ApiException;
use OxidSolutionCatalysts\PayPalApi\Traits\TrackingTrait;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Query;
use Psr\Log\LoggerInterface;

class BaseService
{
    use TrackingTrait;

    public Client $client;

    protected string $basePath = '';

    /**
     * @var \Psr\Log\LoggerInterface|null
     */
    protected $logger = null;

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

        $headers['PayPal-Request-Id'] = md5($path . serialize($body) . $this->client->getActionHash());

        $request = $this->client->createRequest($method, $fullPath, $headers, $body);

        try {
            $response = $this->client->send($request);
        } catch (GuzzleException $exception) {
            throw new ApiException($exception);
        }
        return $response;
    }

    /**
     * Get the logger instance
     *
     * @return \Psr\Log\LoggerInterface
     */
    protected function getLogger(): LoggerInterface
    {
        if ($this->logger === null) {
            $this->logger = $this->client->getLogger();
        }

        return $this->logger;
    }

    /**
     * Sends a request with logging of request and response bodies
     *
     * @param string $method HTTP method (POST, GET, etc.)
     * @param string $path API endpoint path
     * @param array $params Query parameters
     * @param array<string,string> $headers Request headers
     * @param null|string $body Request body
     * @return ResponseInterface The response from the API
     * @throws ApiException
     */
    protected function sendWithRequestResponseLogging(string $method, string $path, array $params = [], array $headers = [], $body = null): ResponseInterface
    {
        // Create a copy of the request for logging purposes
        $params_copy = array_filter($params);
        if ($params_copy) {
            $q = Query::build($params_copy);
            $path_with_query = "$path?$q";
        } else {
            $path_with_query = $path;
        }
        $fullPath = $this->basePath . $path_with_query;

        $headers_copy = $headers;
        $headers_copy['PayPal-Request-Id'] = md5($path_with_query . serialize($body) . $this->client->getActionHash());

        $request = $this->client->createRequest($method, $fullPath, $headers_copy, $body);
        $logMessagePrefix = $method . str_repeat(" ", 5 - strlen($method)) . ' | ' . $path_with_query;
        $requestBody = $request->getBody();
        $this->log('debug', $logMessagePrefix . ' | ' . $requestBody ?? '{}',
            [
                'headers' => $request->getHeaders()
            ]);

        try {
            // Send the actual request
            $response = $this->send($method, $path, $params, $headers, $body);
            $responseBody = $response->getBody();

            $this->log('debug', $logMessagePrefix . ' | ' . $responseBody, [], true);

            $responseBody->rewind();

            return $response;
        } catch (ApiException $exception) {
            $this->log('error', $logMessagePrefix . ' | ' . $exception->getMessage(), [$exception], true);

            throw $exception;
        }
    }
}
