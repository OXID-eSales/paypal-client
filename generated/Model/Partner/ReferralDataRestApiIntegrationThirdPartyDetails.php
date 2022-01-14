<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The integration details for PayPal REST endpoints.
 *
 * generated from: ReferralDataRestApiIntegration_third_party_details
 */
class ReferralDataRestApiIntegrationThirdPartyDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of features that partner can access, or use, in PayPal on behalf of the seller. The seller grants
     * permission for these features to the partner.
     *
     * @var string[]
     * maxItems: 0
     * maxItems: 20
     */
    public $features;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->features, "features in ReferralDataRestApiIntegrationThirdPartyDetails must not be NULL $within");
        Assert::minCount(
            $this->features,
            0,
            "features in ReferralDataRestApiIntegrationThirdPartyDetails must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->features,
            20,
            "features in ReferralDataRestApiIntegrationThirdPartyDetails must have max. count of 20 $within"
        );
        Assert::isArray(
            $this->features,
            "features in ReferralDataRestApiIntegrationThirdPartyDetails must be array $within"
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
    }

    public function __construct(array $data = null)
    {
        $this->features = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
