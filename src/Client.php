<?php

declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPalApi;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Log\LoggerInterface;

/**
 * Class Client
 *
 * 1. auth
 * 2. call APIs
 * 3. get results
 *
 */
class Client
{
    const SANDBOX_URL            = "https://api.sandbox.paypal.com";
    const PRODUCTION_URL         = "https://api.paypal.com";
    const CONTENT_TYPE_JSON      = 'application/json';
    const CONTENT_TYPE_X_WWW     = 'application/x-www-form-urlencoded';

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * @var null|string
     */
    protected $tokenResponse = null;

    /**
     * @var string
     */
    private $merchantClientId;

    /**
     * @var string
     */
    private $merchantClientSecret;

    /**
     * @var string
     */
    private $merchantPayerId;

    /**
     * @var string
     */
    private $tokenCacheFilename;

    /**
     * Client constructor.
     * @param LoggerInterface $logger
     * @param string $endpoint
     * @param string $clientId
     * seller/merchant or partner ClientId depending on if it is a first party or a third party request
     * @param string $clientSecret
     * seller/merchant or partner clientSecret depending on if it is a first party or a third party
     * request. Usually you want to use the sellers credentials if they are available
     * @param string $tokenCacheFilename the filename for the cached token
     * @param string $payerId the technical oxid paypal account client id used as meta information in requests
     * @param bool $debug
     */
    public function __construct(
        LoggerInterface $logger,
                        $endpoint,
                        $clientId,
                        $clientSecret,
                        $tokenCacheFilename,
                        $payerId = "",
                        $debug = false
    ) {
        $this->endpoint = $endpoint;
        $this->merchantClientId = $clientId;
        $this->merchantClientSecret = $clientSecret;
        $this->merchantPayerId = $payerId;
        $this->tokenCacheFilename = $tokenCacheFilename;
        $stack = HandlerStack::create();
        if ($debug) {
            $stack->push(
                Middleware::log($logger, new MessageFormatter(MessageFormatter::DEBUG))
            );
        }
        $this->httpClient = new \GuzzleHttp\Client(
            [
                'handler' => $stack,
                'debug' => $debug
            ]
        );
    }

    /**
     * @param string $method HTTP method
     * @param string $path part of the URI without the endpoint domain itself
     * @param array $headers Request headers
     * @param string|null|resource|StreamInterface $body Request body
     * @return RequestInterface
     */
    public function createRequest($method, $path, array $headers, $body = null): RequestInterface
    {
        return new Request($method, $this->endpoint . $path, $headers, $body);
    }

    /**
     * @param RequestInterface $request
     * @throws GuzzleException but you should not rely on this the only commitment for this
     * exception object is that the method getCode() return the http result code if there is one.
     * @return ResponseInterface
     */
    public function send(RequestInterface $request): ResponseInterface
    {
        try {
            $method = $request->getMethod();
            assert(
                (array_search($method, ['POST','PATCH','PUT','GET','DELETE']) !== false),
                "not valid http method '$method' for paypal client"
            );

            return $this->sendWithAuth($request);
        } catch (GuzzleException $e) {
            if ($e->getCode() === 401) {
                //clear tokens to force re-auth
                $this->setTokenResponse(null);
                return $this->sendWithAuth($request);
            } else {
                throw $e;
            }
        }
    }

    public function request($method, $uri = '', $options = [])
    {
        $res = $this->httpClient->request($method, $this->endpoint . $uri, $options);
        return $res;
    }

    /**
     * explicit auth you can use this to make the auth before sending your request.
     * This call is time consuming and should be done only once within 8 hours
     * see Client::setTokenResponse()
     * this call will be done implicitly if a request is sent and the client is not yet authenticated
     * @return $this
     */
    public function auth()
    {
        $clientId = $this->merchantClientId;
        $clientSecret = $this->merchantClientSecret;
        $authBase64 = base64_encode("$clientId:$clientSecret");
        $url = $this->endpoint . "/v1/oauth2/token";

        $res = $this->httpClient->post($url, [
            "headers" => [
                "Authorization" => "Basic $authBase64",
                "Content-Type" => self::CONTENT_TYPE_X_WWW,
                "Accept" => self::CONTENT_TYPE_JSON
            ],
            'form_params' => [
                "grant_type" => "client_credentials",
            ]
        ]);

        $rawTokenResponse = json_decode('' . $res->getBody(), true);

        $this->setTokenResponse($rawTokenResponse['access_token']);

        return $this;
    }

    public function isAuthenticated()
    {
        return !is_null($this->getTokenResponse());
    }

    /**
     * use this if you want to inject a token into the auth headers set by this client.
     * You may want to use this with the return from getTokenResponse() so you are able to cache the
     * the auth between requests.
     * @param null|string $tokenResponse
     */
    public function setTokenResponse($tokenResponse)
    {
        file_put_contents($this->tokenCacheFilename, $tokenResponse);
        $this->tokenResponse = $tokenResponse;
    }

    /**
     * use this if you want to store the auth response for later reuse
     * see also setTokenResponse
     * @return string|null the token response from the auth call
     */
    public function getTokenResponse()
    {
        if (is_null($this->tokenResponse) && file_exists($this->tokenCacheFilename)) {
            $tokenResponse = file_get_contents($this->tokenCacheFilename);
            if ($tokenResponse) {
                $this->tokenResponse = $tokenResponse;
            }
        }
        return $this->tokenResponse;
    }

    /**
     * @param RequestInterface $request
     * @return RequestInterface
     */
    protected function injectAuthHeaders(RequestInterface $request)
    {
        if (!$this->isAuthenticated()) {
            $this->auth();
        }

        $headers["Authorization"] = "Bearer " . $this->getTokenResponse();

        $joseHeader = base64_encode('{"alg":"none"}');

        $payerId = $this->merchantPayerId;
        if ($payerId !== "") {
            $partnerClientId = $this->merchantClientId;
            $payload = base64_encode("{\"iss\": \"$partnerClientId\", \"payer_id\":\"$payerId\"}");

            $headers['PayPal-Auth-Assertion'] = "{$joseHeader}.{$payload}.";
        }

        foreach ($headers as $headerName => $headerValue) {
            $request = $request->withHeader($headerName, $headerValue);
        }

        return $request;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function sendWithAuth(RequestInterface $request)
    {
        $request = $this->injectAuthHeaders($request);
        $res = $this->httpClient->send($request);
        return $res;
    }


    /**
     * @return string
     */
    public function getMerchantPayerId(): string
    {
        return $this->merchantPayerId;
    }

    /**
     * @return string
     */
    public function getMerchantClientId(): string
    {
        return $this->merchantClientId;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }
}
