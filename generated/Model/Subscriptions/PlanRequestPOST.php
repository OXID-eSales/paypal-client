<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The create plan request details.
 *
 * generated from: plan_request_POST.json
 */
class PlanRequestPOST implements JsonSerializable
{
    use BaseModel;

    /** The plan was created. You cannot create subscriptions for a plan in this state. */
    public const STATUS_CREATED = 'CREATED';

    /** The plan is inactive. */
    public const STATUS_INACTIVE = 'INACTIVE';

    /** The plan is active. You can only create subscriptions for a plan in this state. */
    public const STATUS_ACTIVE = 'ACTIVE';

    /** A licensed plan. Has a fixed billing amount. */
    public const USAGE_TYPE_LICENSED = 'LICENSED';

    /** A metered plan. Billed based on service consumption. */
    public const USAGE_TYPE_METERED = 'METERED';

    /**
     * The ID of the product created through Catalog Products API.
     *
     * @var string
     * minLength: 6
     * maxLength: 50
     */
    public $product_id;

    /**
     * The plan name.
     *
     * @var string
     * minLength: 1
     * maxLength: 127
     */
    public $name;

    /**
     * The initial state of the plan. Allowed input values are CREATED and ACTIVE.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CREATED
     * @see STATUS_INACTIVE
     * @see STATUS_ACTIVE
     * @var string | null
     * minLength: 1
     * maxLength: 24
     */
    public $status = 'ACTIVE';

    /**
     * The detailed description of the plan.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $description;

    /**
     * The plan type, which indicates the billing pattern.
     *
     * use one of constants defined in this class to set the value:
     * @see USAGE_TYPE_LICENSED
     * @see USAGE_TYPE_METERED
     * @var string | null
     * minLength: 1
     * maxLength: 24
     */
    public $usage_type = 'LICENSED';

    /**
     * An array of billing cycles for trial billing and regular billing. A plan can have at most two trial cycles and
     * only one regular cycle.
     *
     * @var BillingCycle[]
     * maxItems: 1
     * maxItems: 12
     */
    public $billing_cycles;

    /**
     * The payment preferences for a subscription.
     *
     * @var PaymentPreferences
     */
    public $payment_preferences;

    /**
     * The tax details.
     *
     * @var Taxes | null
     */
    public $taxes;

    /**
     * Indicates whether you can subscribe to this plan by providing a quantity for the goods or service.
     *
     * @var boolean | null
     */
    public $quantity_supported = false;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->product_id, "product_id in PlanRequestPOST must not be NULL $within");
        Assert::minLength(
            $this->product_id,
            6,
            "product_id in PlanRequestPOST must have minlength of 6 $within"
        );
        Assert::maxLength(
            $this->product_id,
            50,
            "product_id in PlanRequestPOST must have maxlength of 50 $within"
        );
        Assert::notNull($this->name, "name in PlanRequestPOST must not be NULL $within");
        Assert::minLength(
            $this->name,
            1,
            "name in PlanRequestPOST must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->name,
            127,
            "name in PlanRequestPOST must have maxlength of 127 $within"
        );
        !isset($this->status) || Assert::minLength(
            $this->status,
            1,
            "status in PlanRequestPOST must have minlength of 1 $within"
        );
        !isset($this->status) || Assert::maxLength(
            $this->status,
            24,
            "status in PlanRequestPOST must have maxlength of 24 $within"
        );
        !isset($this->description) || Assert::minLength(
            $this->description,
            1,
            "description in PlanRequestPOST must have minlength of 1 $within"
        );
        !isset($this->description) || Assert::maxLength(
            $this->description,
            127,
            "description in PlanRequestPOST must have maxlength of 127 $within"
        );
        !isset($this->usage_type) || Assert::minLength(
            $this->usage_type,
            1,
            "usage_type in PlanRequestPOST must have minlength of 1 $within"
        );
        !isset($this->usage_type) || Assert::maxLength(
            $this->usage_type,
            24,
            "usage_type in PlanRequestPOST must have maxlength of 24 $within"
        );
        Assert::notNull($this->billing_cycles, "billing_cycles in PlanRequestPOST must not be NULL $within");
        Assert::minCount(
            $this->billing_cycles,
            1,
            "billing_cycles in PlanRequestPOST must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->billing_cycles,
            12,
            "billing_cycles in PlanRequestPOST must have max. count of 12 $within"
        );
        Assert::isArray(
            $this->billing_cycles,
            "billing_cycles in PlanRequestPOST must be array $within"
        );
        if (isset($this->billing_cycles)) {
            foreach ($this->billing_cycles as $item) {
                $item->validate(PlanRequestPOST::class);
            }
        }
        Assert::notNull($this->payment_preferences, "payment_preferences in PlanRequestPOST must not be NULL $within");
        Assert::isInstanceOf(
            $this->payment_preferences,
            PaymentPreferences::class,
            "payment_preferences in PlanRequestPOST must be instance of PaymentPreferences $within"
        );
         $this->payment_preferences->validate(PlanRequestPOST::class);
        !isset($this->taxes) || Assert::isInstanceOf(
            $this->taxes,
            Taxes::class,
            "taxes in PlanRequestPOST must be instance of Taxes $within"
        );
        !isset($this->taxes) ||  $this->taxes->validate(PlanRequestPOST::class);
    }

    private function map(array $data)
    {
        if (isset($data['product_id'])) {
            $this->product_id = $data['product_id'];
        }
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['description'])) {
            $this->description = $data['description'];
        }
        if (isset($data['usage_type'])) {
            $this->usage_type = $data['usage_type'];
        }
        if (isset($data['billing_cycles'])) {
            $this->billing_cycles = [];
            foreach ($data['billing_cycles'] as $item) {
                $this->billing_cycles[] = new BillingCycle($item);
            }
        }
        if (isset($data['payment_preferences'])) {
            $this->payment_preferences = new PaymentPreferences($data['payment_preferences']);
        }
        if (isset($data['taxes'])) {
            $this->taxes = new Taxes($data['taxes']);
        }
        if (isset($data['quantity_supported'])) {
            $this->quantity_supported = $data['quantity_supported'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->billing_cycles = [];
        $this->payment_preferences = new PaymentPreferences();
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initTaxes(): Taxes
    {
        return $this->taxes = new Taxes();
    }
}
