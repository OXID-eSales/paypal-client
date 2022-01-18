<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The integration details for the partner and customer relationship. Required if `operation` is
 * `API_INTEGRATION`.
 *
 * generated from: referral_data-integration_details.json
 */
class ReferralDataIntegrationDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * The integration details for PayPal CLASSIC endpoints.
     *
     * @var ReferralDataClassicApiIntegration | null
     */
    public $classic_api_integration;

    /**
     * The integration details for PayPal REST endpoints.
     *
     * @var ReferralDataRestApiIntegration | null
     */
    public $rest_api_integration;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->classic_api_integration) || Assert::isInstanceOf(
            $this->classic_api_integration,
            ReferralDataClassicApiIntegration::class,
            "classic_api_integration in ReferralDataIntegrationDetails must be instance of ReferralDataClassicApiIntegration $within"
        );
        !isset($this->classic_api_integration) ||  $this->classic_api_integration->validate(ReferralDataIntegrationDetails::class);
        !isset($this->rest_api_integration) || Assert::isInstanceOf(
            $this->rest_api_integration,
            ReferralDataRestApiIntegration::class,
            "rest_api_integration in ReferralDataIntegrationDetails must be instance of ReferralDataRestApiIntegration $within"
        );
        !isset($this->rest_api_integration) ||  $this->rest_api_integration->validate(ReferralDataIntegrationDetails::class);
    }

    private function map(array $data)
    {
        if (isset($data['classic_api_integration'])) {
            $this->classic_api_integration = new ReferralDataClassicApiIntegration($data['classic_api_integration']);
        }
        if (isset($data['rest_api_integration'])) {
            $this->rest_api_integration = new ReferralDataRestApiIntegration($data['rest_api_integration']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initClassicApiIntegration(): ReferralDataClassicApiIntegration
    {
        return $this->classic_api_integration = new ReferralDataClassicApiIntegration();
    }

    public function initRestApiIntegration(): ReferralDataRestApiIntegration
    {
        return $this->rest_api_integration = new ReferralDataRestApiIntegration();
    }
}
