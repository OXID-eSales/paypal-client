<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The preference to customize the web experience of the customer by overriding that is set at the Partner's
 * Account.
 *
 * generated from: referral_data-partner_config_override.json
 */
class ReferralDataPartnerConfigOverride implements JsonSerializable
{
    use BaseModel;

    /**
     * The partner logo URL to display in the customer's onboarding flow.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $partner_logo_url;

    /**
     * The URL to which to redirect the customer upon completion of the onboarding process.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $return_url;

    /**
     * The description of the return URL.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $return_url_description;

    /**
     * If `renew_action_url` expires, redirect the customer to this URL.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $action_renewal_url;

    /**
     * Indicates whether to show an add credit card page.
     *
     * @var boolean | null
     */
    public $show_add_credit_card;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->partner_logo_url) || Assert::minLength(
            $this->partner_logo_url,
            1,
            "partner_logo_url in ReferralDataPartnerConfigOverride must have minlength of 1 $within"
        );
        !isset($this->partner_logo_url) || Assert::maxLength(
            $this->partner_logo_url,
            127,
            "partner_logo_url in ReferralDataPartnerConfigOverride must have maxlength of 127 $within"
        );
        !isset($this->return_url) || Assert::minLength(
            $this->return_url,
            1,
            "return_url in ReferralDataPartnerConfigOverride must have minlength of 1 $within"
        );
        !isset($this->return_url) || Assert::maxLength(
            $this->return_url,
            127,
            "return_url in ReferralDataPartnerConfigOverride must have maxlength of 127 $within"
        );
        !isset($this->return_url_description) || Assert::minLength(
            $this->return_url_description,
            1,
            "return_url_description in ReferralDataPartnerConfigOverride must have minlength of 1 $within"
        );
        !isset($this->return_url_description) || Assert::maxLength(
            $this->return_url_description,
            127,
            "return_url_description in ReferralDataPartnerConfigOverride must have maxlength of 127 $within"
        );
        !isset($this->action_renewal_url) || Assert::minLength(
            $this->action_renewal_url,
            1,
            "action_renewal_url in ReferralDataPartnerConfigOverride must have minlength of 1 $within"
        );
        !isset($this->action_renewal_url) || Assert::maxLength(
            $this->action_renewal_url,
            127,
            "action_renewal_url in ReferralDataPartnerConfigOverride must have maxlength of 127 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['partner_logo_url'])) {
            $this->partner_logo_url = $data['partner_logo_url'];
        }
        if (isset($data['return_url'])) {
            $this->return_url = $data['return_url'];
        }
        if (isset($data['return_url_description'])) {
            $this->return_url_description = $data['return_url_description'];
        }
        if (isset($data['action_renewal_url'])) {
            $this->action_renewal_url = $data['action_renewal_url'];
        }
        if (isset($data['show_add_credit_card'])) {
            $this->show_add_credit_card = $data['show_add_credit_card'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
