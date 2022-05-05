<?php

namespace OxidSolutionCatalysts\PayPalApi;

use OxidSolutionCatalysts\PayPalApi\Model\Partner\Operation;
use OxidSolutionCatalysts\PayPalApi\Model\Partner\ReferralData;
use OxidSolutionCatalysts\PayPalApi\Model\Partner\RestApiIntegration;
use OxidSolutionCatalysts\PayPalApi\Model\Partner\RestApiIntegrationFirstPartyDetails;
use OxidSolutionCatalysts\PayPalApi\Service\Partner;
use Psr\Log\LoggerInterface;

class Onboarding extends Client
{
    /**
     * @var string
     */
    private $partnerId;

    /**
     * @var string
     */
    private $sellerId;

    /**
     * during onboarding you do not have shop owners credentials
     * so you initialize the client with the technical oxid account credentials
     * Onboarding constructor.
     * @param LoggerInterface $logger
     * @param $endpoint string the base API url
     * @param $oxidClientId string the client id from the technical oxid account
     * @param $oxidClientSecret string the client secret from the technical oxid account
     * @param $oxidPartnerId string for getting credentials and informations for successful onboarding
     * @param $sellerId string for getting informations for successful onboarding
     * @param bool $debug set to true to debug request sent to paypal on the console
     */
    public function __construct(
        LoggerInterface $logger,
        $endpoint,
        $oxidClientId,
        $oxidClientSecret,
        $oxidPartnerId,
        $sellerId,
        $debug = false
    ) {
        $this->partnerId = $oxidPartnerId;
        $this->sellerId = $sellerId;
        parent::__construct($logger, $endpoint, $oxidClientId, $oxidClientSecret, '', $debug);
    }


    /**
     * Auth after seller used on browser to login into the paypal account
     * the parameters are usually provided in a callback on client side e.g.:
     * <script>
     * function onboardedCallback(authCode, sharedId) {
     * // post data to the server side post(authCode, sharedId)
     * }
     * </script>
     * @param $authCode string this is returned by paypal in the call back function
     * @param $sharedId string this is returned by paypal in the call back function
     * @param $sellerNonce string the random number that was used to generate the paypal register/login link
     */
    public function authAfterWebLogin($authCode, $sharedId, $sellerNonce)
    {
        //fixme: test this by using register link and callback see 2.1.3.1 in paypal sdd 1.0
        $authBase64 = base64_encode("$sharedId:");
        $client = $this->httpClient;
        $url = $this->endpoint . "/v1/oauth2/token";
        $headers = [
            "Authorization" => "Basic $authBase64",
            "Accept" => self::CONTENT_TYPE_JSON
        ];

        $res = $client->post($url, [
            "headers" => $headers,
            'form_params' => [
                "grant_type" => "authorization_code",
                "code" => $authCode,
                "code_verifier" => $sellerNonce,
            ]
        ]);

        $this->tokenResponse = json_decode('' . $res->getBody(), true);
    }

    public function getCredentials()
    {
        $partnerId = $this->partnerId;
        $request = $this->createRequest(
            'GET',
            "/v1/customer/partners/{$partnerId}/merchant-integrations/credentials",
            []
        );
        $response = $this->send($request);
        return json_decode($response->getBody(), true);
    }

    public function getMerchantInformations()
    {
        $partnerId = $this->partnerId;
        $sellerId = $this->sellerId;
        $request = $this->createRequest(
            'GET',
            "/v1/customer/partners/{$partnerId}/merchant-integrations/{$sellerId}",
            []
        );
        $response = $this->send($request);
        return json_decode($response->getBody(), true);
    }
}
