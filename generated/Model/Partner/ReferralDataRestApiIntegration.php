<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The integration details for PayPal REST endpoints.
 *
 * generated from: referral_data-rest_api_integration.json
 */
class ReferralDataRestApiIntegration implements JsonSerializable
{
    use BaseModel;

    /** Braintree integration method. */
    public const INTEGRATION_METHOD_BRAINTREE = 'BRAINTREE';

    /** PayPal integration method. */
    public const INTEGRATION_METHOD_PAYPAL = 'PAYPAL';

    /** A first-party integration. */
    public const INTEGRATION_TYPE_FIRST_PARTY = 'FIRST_PARTY';

    /** A third-party integration. */
    public const INTEGRATION_TYPE_THIRD_PARTY = 'THIRD_PARTY';

    /**
     * The REST-credential integration method.
     *
     * use one of constants defined in this class to set the value:
     * @see INTEGRATION_METHOD_BRAINTREE
     * @see INTEGRATION_METHOD_PAYPAL
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $integration_method = 'PAYPAL';

    /**
     * The type of REST-endpoint integration. To integrate with Braintree v.zero for PayPal REST endpoints, specify
     * `third_party_details`.
     *
     * use one of constants defined in this class to set the value:
     * @see INTEGRATION_TYPE_FIRST_PARTY
     * @see INTEGRATION_TYPE_THIRD_PARTY
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $integration_type;

    /**
     * The integration details for PayPal first party REST endpoints.
     *
     * @var ReferralDataRestApiIntegrationFirstPartyDetails | null
     */
    public $first_party_details;

    /**
     * The integration details for PayPal REST endpoints.
     *
     * @var ReferralDataRestApiIntegrationThirdPartyDetails | null
     */
    public $third_party_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->integration_method) || Assert::minLength(
            $this->integration_method,
            1,
            "integration_method in ReferralDataRestApiIntegration must have minlength of 1 $within"
        );
        !isset($this->integration_method) || Assert::maxLength(
            $this->integration_method,
            255,
            "integration_method in ReferralDataRestApiIntegration must have maxlength of 255 $within"
        );
        !isset($this->integration_type) || Assert::minLength(
            $this->integration_type,
            1,
            "integration_type in ReferralDataRestApiIntegration must have minlength of 1 $within"
        );
        !isset($this->integration_type) || Assert::maxLength(
            $this->integration_type,
            255,
            "integration_type in ReferralDataRestApiIntegration must have maxlength of 255 $within"
        );
        !isset($this->first_party_details) || Assert::isInstanceOf(
            $this->first_party_details,
            ReferralDataRestApiIntegrationFirstPartyDetails::class,
            "first_party_details in ReferralDataRestApiIntegration must be instance of ReferralDataRestApiIntegrationFirstPartyDetails $within"
        );
        !isset($this->first_party_details) ||  $this->first_party_details->validate(ReferralDataRestApiIntegration::class);
        !isset($this->third_party_details) || Assert::isInstanceOf(
            $this->third_party_details,
            ReferralDataRestApiIntegrationThirdPartyDetails::class,
            "third_party_details in ReferralDataRestApiIntegration must be instance of ReferralDataRestApiIntegrationThirdPartyDetails $within"
        );
        !isset($this->third_party_details) ||  $this->third_party_details->validate(ReferralDataRestApiIntegration::class);
    }

    private function map(array $data)
    {
        if (isset($data['integration_method'])) {
            $this->integration_method = $data['integration_method'];
        }
        if (isset($data['integration_type'])) {
            $this->integration_type = $data['integration_type'];
        }
        if (isset($data['first_party_details'])) {
            $this->first_party_details = new ReferralDataRestApiIntegrationFirstPartyDetails($data['first_party_details']);
        }
        if (isset($data['third_party_details'])) {
            $this->third_party_details = new ReferralDataRestApiIntegrationThirdPartyDetails($data['third_party_details']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initFirstPartyDetails(): ReferralDataRestApiIntegrationFirstPartyDetails
    {
        return $this->first_party_details = new ReferralDataRestApiIntegrationFirstPartyDetails();
    }

    public function initThirdPartyDetails(): ReferralDataRestApiIntegrationThirdPartyDetails
    {
        return $this->third_party_details = new ReferralDataRestApiIntegrationThirdPartyDetails();
    }
}
