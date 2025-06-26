<?php

namespace OxidSolutionCatalysts\PayPalApi\Service;

use GuzzleHttp\Exception\GuzzleException;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
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
        $logger = $this->client->getLogger();

        $params = array_filter($params);
        if ($params) {
            $q = Query::build($params);
            $path = "$path?$q";
        }
        $fullPath = $this->basePath . $path;

        $headers['PayPal-Request-Id'] = md5($path . serialize($body) . $this->client->getActionHash());

        $request = $this->client->createRequest($method, $fullPath, $headers, $body);

        $logger->log('debug', 'PayPal SEND path ' . $path);
        $logger->log('debug', 'PayPal SEND request ' . $request->getBody());
        $logger->log('debug', 'PayPal SEND headers ' . serialize($request->getHeaders()));

        try {
            $response = $this->client->send($request);
        } catch (GuzzleException $exception) {
            $logger->log('error', $exception->getMessage(), [$exception]);
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
            $loggerService = new LoggerService();

            $this->logger = $loggerService->createLoggerWithHandlers('custom-logger', [
                new RotatingFileHandler(__DIR__ . '/../../logs/paypal_requests.log', 7, Logger::DEBUG)
            ]);
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

        // Log the request body if it exists
        if ($body !== null) {
            $logger->log('debug', 'PayPal SEND request to ' . $path . ' with body: ' . $body);
        } else {
            $logger->log('debug', 'PayPal SEND request to ' . $path);
        }

        // Send the request using the existing send method
        $response = $this->send($method, $path, $params, $headers, $body);

        // Log the response body
        $responseBody = $response->getBody();
        $logger->log('debug', 'PayPal RECEIVE response from ' . $path . ' with body: ' . $responseBody);

        // Reset the response body pointer to the beginning
        $responseBody->rewind();

        return $response;
    }
}
