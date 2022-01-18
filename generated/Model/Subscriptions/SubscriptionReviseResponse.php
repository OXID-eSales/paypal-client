<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The response to a request to update the quantity of the product or service in a subscription. You can also use
 * this method to switch the plan and update the `shipping_amount` and `shipping_address` values for the
 * subscription. This type of update requires the buyer's consent.
 *
 * generated from: subscription_revise_response.json
 */
class SubscriptionReviseResponse extends SubscriptionReviseRequest2 implements JsonSerializable
{
    use BaseModel;

    /**
     * Indicates whether the subscription has overridden any plan attributes.
     *
     * @var boolean | null
     */
    public $plan_overridden;

    /**
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     *
     * @var array | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in SubscriptionReviseResponse must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['plan_overridden'])) {
            $this->plan_overridden = $data['plan_overridden'];
        }
        if (isset($data['links'])) {
            $this->links = [];
            foreach ($data['links'] as $item) {
                $this->links[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        if (isset($data)) {
            $this->map($data);
        }
    }
}
