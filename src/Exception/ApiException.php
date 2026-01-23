<?php

namespace OxidSolutionCatalysts\PayPalApi\Exception;

use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ApiException extends \Exception
{
    /**
     * @var RequestInterface|null
     */
    private $request;

    /**
     * @var ResponseInterface|null
     */
    private $response;

    /**
     * @throws JsonException
     */
    public function __construct(GuzzleException $e)
    {
        $code = $e->getCode();

        // Safe extraction of request and response objects
        $this->request = method_exists($e, 'getRequest') ? $e->getRequest() : null;
        $this->response = method_exists($e, 'getResponse') ? $e->getResponse() : null;

        // Build base message
        $message = 'HTTP Request';
        if ($this->request) {
            $message = $this->request->getMethod() . ' ' . $this->request->getUri();
        }

        if ($this->response) {
            $phrase = $this->response->getReasonPhrase();
            $message .= " returned: $code $phrase";
            try {
                // Analyze response body for error details
                $error = json_decode($this->response->getBody(), true, 512, JSON_THROW_ON_ERROR);
                if ($error) {
                    if (isset($error['message'])) {
                        $message .= "\nReturned Message: " . $error['message'];
                    }
                    if (isset($error['details'])) {
                        $details = $error['details'];
                        $message .= "\nError Details: \n" . json_encode($details, JSON_THROW_ON_ERROR) . "\n";
                        unset($error['details']);
                    }
                    unset($error['message']);
                    $message .= "\nResponse: \n" . json_encode($error, JSON_THROW_ON_ERROR) . "\n";
                }
            } catch (JsonException $e) {
                // No response available (e.g. for ConnectException)
                $message .= " failed: " . $e->getMessage();
            }
        } else {
            // No response available (e.g. for ConnectException)
            $message .= " failed: " . $e->getMessage();
        }

        // Add cURL simulation only if request is available
        if ($this->request) {
            $message .= "\nThe following curl request could be used to simulate a similar request:
            \ncurl -v -X " . $this->request->getMethod() . ' "' . $this->request->getUri() . '"';
            foreach ($this->request->getHeaders() as $headerName => $headerValue) {
                $message .= " -H \"$headerName: " . join(",", $headerValue) . '"';
            }
            if ($this->request->getBody() . "") {
                $message .= " -d " . $this->request->getBody();
            }
        }

        parent::__construct($message, $code);
    }

    /**
     * Checks if the exception information should be visible to end user
     *
     * @return bool
     */
    public function shouldDisplay()
    {
        return true;
    }

    /**
     * Gets error description
     *
     * @return string
     * @throws JsonException
     */
    public function getErrorDescription()
    {
        $description = '';

        if ($this->response && $error = json_decode($this->response->getBody(), true, 512, JSON_THROW_ON_ERROR)) {
            if (isset($error['details'][0]['description'])) {
                $description = $error['details'][0]['description'];
            } elseif (isset($error['message'])) {
                $description = $error['message'];
            }
        }

        return $description;
    }

    /**
     * Gets error issue (better for translation ...)
     *
     * @return string
     * @throws JsonException
     */
    public function getErrorIssue()
    {
        $issue = '';
        if ($this->response) {
            $error = json_decode($this->response->getBody(), true, 512, JSON_THROW_ON_ERROR);
            if (isset($error['details'][0]['issue'])) {
                $issue = $error['details'][0]['issue'];
            }
        }
        return $issue;
    }
}