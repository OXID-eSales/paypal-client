<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The integration details for PayPal first party REST endpoints.
 *
 * generated from: ReferralDataRestApiIntegration_first_party_details
 */
class ReferralDataRestApiIntegrationFirstPartyDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of features that partner can access, or use, in PayPal on behalf of the seller. The seller grants
     * permission for these features to the partner.
     *
     * @var string[]
     */
    public $features;

    /**
     * S256 - The code verifier must be high-entropy cryptographic random string with a byte length of 43-128 range.
     *
     * @var string
     * minLength: 44
     * maxLength: 128
     */
    public $seller_nonce;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->features, "features in ReferralDataRestApiIntegrationFirstPartyDetails must not be NULL $within");
        Assert::isArray(
            $this->features,
            "features in ReferralDataRestApiIntegrationFirstPartyDetails must be array $within"
        );
        Assert::notNull($this->seller_nonce, "seller_nonce in ReferralDataRestApiIntegrationFirstPartyDetails must not be NULL $within");
        Assert::minLength(
            $this->seller_nonce,
            44,
            "seller_nonce in ReferralDataRestApiIntegrationFirstPartyDetails must have minlength of 44 $within"
        );
        Assert::maxLength(
            $this->seller_nonce,
            128,
            "seller_nonce in ReferralDataRestApiIntegrationFirstPartyDetails must have maxlength of 128 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['features'])) {
            $this->features = [];
            foreach ($data['features'] as $item) {
                $this->features[] = $item;
            }
        }
        if (isset($data['seller_nonce'])) {
            $this->seller_nonce = $data['seller_nonce'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->features = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
