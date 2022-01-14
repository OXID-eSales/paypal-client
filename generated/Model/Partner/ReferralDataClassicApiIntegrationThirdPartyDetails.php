<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details of a classic third-party integration. If you have API credentials with which to call the API on
 * the customer's behalf, specify details in this field. The signup and setup flow asks that the seller grant the
 * required permissions to the partner.
 *
 * generated from: ReferralDataClassicApiIntegration_third_party_details
 */
class ReferralDataClassicApiIntegrationThirdPartyDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of permissions that the partner requests from the customer.
     *
     * @var string[]
     * maxItems: 0
     * maxItems: 30
     */
    public $permissions;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->permissions, "permissions in ReferralDataClassicApiIntegrationThirdPartyDetails must not be NULL $within");
        Assert::minCount(
            $this->permissions,
            0,
            "permissions in ReferralDataClassicApiIntegrationThirdPartyDetails must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->permissions,
            30,
            "permissions in ReferralDataClassicApiIntegrationThirdPartyDetails must have max. count of 30 $within"
        );
        Assert::isArray(
            $this->permissions,
            "permissions in ReferralDataClassicApiIntegrationThirdPartyDetails must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['permissions'])) {
            $this->permissions = [];
            foreach ($data['permissions'] as $item) {
                $this->permissions[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->permissions = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
