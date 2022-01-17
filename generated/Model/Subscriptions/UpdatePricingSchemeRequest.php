<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The update pricing scheme request details.
 *
 * generated from: update_pricing_scheme_request.json
 */
class UpdatePricingSchemeRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The billing cycle sequence.
     *
     * @var int
     */
    public $billing_cycle_sequence;

    /**
     * The pricing scheme details.
     *
     * @var PricingScheme
     */
    public $pricing_scheme;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->billing_cycle_sequence, "billing_cycle_sequence in UpdatePricingSchemeRequest must not be NULL $within");
        Assert::notNull($this->pricing_scheme, "pricing_scheme in UpdatePricingSchemeRequest must not be NULL $within");
        Assert::isInstanceOf(
            $this->pricing_scheme,
            PricingScheme::class,
            "pricing_scheme in UpdatePricingSchemeRequest must be instance of PricingScheme $within"
        );
         $this->pricing_scheme->validate(UpdatePricingSchemeRequest::class);
    }

    private function map(array $data)
    {
        if (isset($data['billing_cycle_sequence'])) {
            $this->billing_cycle_sequence = $data['billing_cycle_sequence'];
        }
        if (isset($data['pricing_scheme'])) {
            $this->pricing_scheme = new PricingScheme($data['pricing_scheme']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->pricing_scheme = new PricingScheme();
        if (isset($data)) {
            $this->map($data);
        }
    }
}
