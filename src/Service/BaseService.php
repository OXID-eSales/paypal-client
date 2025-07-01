<?php

namespace OxidSolutionCatalysts\PayPalApi\Service;

use GuzzleHttp\Exception\GuzzleException;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidSolutionCatalysts\PayPal\Service\ModuleSettings;
use OxidSolutionCatalysts\PayPalApi\Client;
use OxidSolutionCatalysts\PayPalApi\Exception\ApiException;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Query;
use Psr\Log\LoggerInterface;

class BaseService
{
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
        $logger = $this->getLogger();
        $moduleSettings = ContainerFactory::getInstance()
            ->getContainer()
            ->get(ModuleSettings::class);
        $debugLevel = $moduleSettings->getPayPalDebugLevel();

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

        // Log request if debug is enabled
        if ($debugLevel === 'debug') {
            $logger->log('debug', 'PayPal SEND request to ' . $path . ': ' . $request->getBody(), [
                'headers' => $request->getHeaders()
            ]);
        }

        try {
            // Send the actual request
            $response = $this->send($method, $path, $params, $headers, $body);

            // Log response if debug is enabled
            if ($debugLevel === 'debug') {
                // Log the response body
                $responseBody = $response->getBody();
                $logger->log('debug', 'PayPal RECEIVE response from ' . $path . ' with body: ' . $responseBody);

                // Reset the response body pointer to the beginning
                $responseBody->rewind();
            }

            return $response;
        } catch (ApiException $exception) {
            // Log error if debug or error level is enabled
            if ($debugLevel === 'debug' || $debugLevel === 'error') {
                $logger->log('error', $exception->getMessage(), [$exception]);
            }
            throw $exception;
        }
    }
}
