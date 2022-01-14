<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The preference that customizes the billing experience of the customer.
 *
 * generated from: referral_data-billing_experience_preference.json
 */
class ReferralDataBillingExperiencePreference implements JsonSerializable
{
    use BaseModel;

    /**
     * The ID of the payment web experience profile.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 20
     */
    public $experience_id;

    /**
     * Indicates whether the partner has already displayed the billing context to the seller.
     *
     * @var boolean | null
     */
    public $billing_context_set;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->experience_id) || Assert::minLength(
            $this->experience_id,
            1,
            "experience_id in ReferralDataBillingExperiencePreference must have minlength of 1 $within"
        );
        !isset($this->experience_id) || Assert::maxLength(
            $this->experience_id,
            20,
            "experience_id in ReferralDataBillingExperiencePreference must have maxlength of 20 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['experience_id'])) {
            $this->experience_id = $data['experience_id'];
        }
        if (isset($data['billing_context_set'])) {
            $this->billing_context_set = $data['billing_context_set'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
