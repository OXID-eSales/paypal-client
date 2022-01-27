<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The request to update the quantity of the product or service in a subscription. You can also use this method
 * to switch the plan and update the `shipping_amount` and `shipping_address` values for the subscription. This
 * type of update requires the buyer's consent.
 *
 * generated from: customized_x_unsupported_9269_subscription_revise_request.json
 */
class SubscriptionReviseRequest2 implements JsonSerializable
{
    use BaseModel;

    /**
     * The unique PayPal-generated ID for the plan.
     *
     * @var string | null
     * minLength: 3
     * maxLength: 50
     */
    public $plan_id;

    /**
     * The quantity of the product or service in the subscription.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 32
     */
    public $quantity;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $shipping_amount;

    /**
     * The shipping details.
     *
     * @var ShippingDetail | null
     */
    public $shipping_address;

    /**
     * An inline plan object to customise the subscription. You can override plan level default attributes by
     * providing customised values for the subscription in this object.
     *
     * @var PlanOverride | null
     */
    public $plan;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->plan_id) || Assert::minLength(
            $this->plan_id,
            3,
            "plan_id in SubscriptionReviseRequest2 must have minlength of 3 $within"
        );
        !isset($this->plan_id) || Assert::maxLength(
            $this->plan_id,
            50,
            "plan_id in SubscriptionReviseRequest2 must have maxlength of 50 $within"
        );
        !isset($this->quantity) || Assert::minLength(
            $this->quantity,
            1,
            "quantity in SubscriptionReviseRequest2 must have minlength of 1 $within"
        );
        !isset($this->quantity) || Assert::maxLength(
            $this->quantity,
            32,
            "quantity in SubscriptionReviseRequest2 must have maxlength of 32 $within"
        );
        !isset($this->shipping_amount) || Assert::isInstanceOf(
            $this->shipping_amount,
            Money::class,
            "shipping_amount in SubscriptionReviseRequest2 must be instance of Money $within"
        );
        !isset($this->shipping_amount) ||  $this->shipping_amount->validate(SubscriptionReviseRequest2::class);
        !isset($this->shipping_address) || Assert::isInstanceOf(
            $this->shipping_address,
            ShippingDetail::class,
            "shipping_address in SubscriptionReviseRequest2 must be instance of ShippingDetail $within"
        );
        !isset($this->shipping_address) ||  $this->shipping_address->validate(SubscriptionReviseRequest2::class);
        !isset($this->plan) || Assert::isInstanceOf(
            $this->plan,
            PlanOverride::class,
            "plan in SubscriptionReviseRequest2 must be instance of PlanOverride $within"
        );
        !isset($this->plan) ||  $this->plan->validate(SubscriptionReviseRequest2::class);
    }

    private function map(array $data)
    {
        if (isset($data['plan_id'])) {
            $this->plan_id = $data['plan_id'];
        }
        if (isset($data['quantity'])) {
            $this->quantity = $data['quantity'];
        }
        if (isset($data['shipping_amount'])) {
            $this->shipping_amount = new Money($data['shipping_amount']);
        }
        if (isset($data['shipping_address'])) {
            $this->shipping_address = new ShippingDetail($data['shipping_address']);
        }
        if (isset($data['plan'])) {
            $this->plan = new PlanOverride($data['plan']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initShippingAmount(): Money
    {
        return $this->shipping_amount = new Money();
    }

    public function initShippingAddress(): ShippingDetail
    {
        return $this->shipping_address = new ShippingDetail();
    }

    public function initPlan(): PlanOverride
    {
        return $this->plan = new PlanOverride();
    }
}
