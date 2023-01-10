<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer-provided consent.
 *
 * generated from: referral_data-legal_consent.json
 */
class ReferralDataLegalConsent implements JsonSerializable
{
    use BaseModel;

    /** The consent given by the customer to share their data with paypal. */
    const TYPE_SHARE_DATA_CONSENT = 'SHARE_DATA_CONSENT';

    /**
     * The type of consent. `SHARE_DATA_CONSENT` gives consent to you to share your customer's data with PayPal.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_SHARE_DATA_CONSENT
     * @var string
     * minLength: 1
     * maxLength: 127
     */
    public $type;

    /**
     * Indicates whether the customer agreed to share this type of data. To give consent, specify `true`. To withhold
     * consent, specify `false`.
     *
     * @var boolean
     */
    public $granted;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->type, "type in ReferralDataLegalConsent must not be NULL $within");
        Assert::minLength(
            $this->type,
            1,
            "type in ReferralDataLegalConsent must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->type,
            127,
            "type in ReferralDataLegalConsent must have maxlength of 127 $within"
        );
        Assert::notNull($this->granted, "granted in ReferralDataLegalConsent must not be NULL $within");
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['granted'])) {
            $this->granted = $data['granted'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
