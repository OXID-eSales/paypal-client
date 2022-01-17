<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details of the billing agreement between the partner and a seller.
 *
 * generated from: referral_data-billing_agreement.json
 */
class ReferralDataBillingAgreement implements JsonSerializable
{
    use BaseModel;

    /**
     * The billing agreement description.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 125
     */
    public $description;

    /**
     * The preference that customizes the billing experience of the customer.
     *
     * @var ReferralDataBillingExperiencePreference | null
     */
    public $billing_experience_preference;

    /**
     * The custom data for the billing agreement.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 125
     */
    public $merchant_custom_data;

    /**
     * The URL to which to redirect seller to accept the billing agreement.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 125
     */
    public $approval_url;

    /**
     * The billing agreement token for the agreement.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 50
     */
    public $ec_token;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->description) || Assert::minLength(
            $this->description,
            1,
            "description in ReferralDataBillingAgreement must have minlength of 1 $within"
        );
        !isset($this->description) || Assert::maxLength(
            $this->description,
            125,
            "description in ReferralDataBillingAgreement must have maxlength of 125 $within"
        );
        !isset($this->billing_experience_preference) || Assert::isInstanceOf(
            $this->billing_experience_preference,
            ReferralDataBillingExperiencePreference::class,
            "billing_experience_preference in ReferralDataBillingAgreement must be instance of ReferralDataBillingExperiencePreference $within"
        );
        !isset($this->billing_experience_preference) ||  $this->billing_experience_preference->validate(ReferralDataBillingAgreement::class);
        !isset($this->merchant_custom_data) || Assert::minLength(
            $this->merchant_custom_data,
            1,
            "merchant_custom_data in ReferralDataBillingAgreement must have minlength of 1 $within"
        );
        !isset($this->merchant_custom_data) || Assert::maxLength(
            $this->merchant_custom_data,
            125,
            "merchant_custom_data in ReferralDataBillingAgreement must have maxlength of 125 $within"
        );
        !isset($this->approval_url) || Assert::minLength(
            $this->approval_url,
            1,
            "approval_url in ReferralDataBillingAgreement must have minlength of 1 $within"
        );
        !isset($this->approval_url) || Assert::maxLength(
            $this->approval_url,
            125,
            "approval_url in ReferralDataBillingAgreement must have maxlength of 125 $within"
        );
        !isset($this->ec_token) || Assert::minLength(
            $this->ec_token,
            1,
            "ec_token in ReferralDataBillingAgreement must have minlength of 1 $within"
        );
        !isset($this->ec_token) || Assert::maxLength(
            $this->ec_token,
            50,
            "ec_token in ReferralDataBillingAgreement must have maxlength of 50 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['description'])) {
            $this->description = $data['description'];
        }
        if (isset($data['billing_experience_preference'])) {
            $this->billing_experience_preference = new ReferralDataBillingExperiencePreference($data['billing_experience_preference']);
        }
        if (isset($data['merchant_custom_data'])) {
            $this->merchant_custom_data = $data['merchant_custom_data'];
        }
        if (isset($data['approval_url'])) {
            $this->approval_url = $data['approval_url'];
        }
        if (isset($data['ec_token'])) {
            $this->ec_token = $data['ec_token'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initBillingExperiencePreference(): ReferralDataBillingExperiencePreference
    {
        return $this->billing_experience_preference = new ReferralDataBillingExperiencePreference();
    }
}
