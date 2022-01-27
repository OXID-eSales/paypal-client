<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The plan details.
 *
 * generated from: customized_x_unsupported_2182_plan.json
 */
class Plan2 implements JsonSerializable
{
    use BaseModel;

    /**
     * The ID for the product.
     *
     * @var string | null
     * minLength: 6
     * maxLength: 50
     */
    public $product_id;

    /**
     * The plan name.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $name;

    /**
     * The detailed description of the plan.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $description;

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
     * @var PaymentPreferences | null
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

    /**
     * The product details.
     *
     * @var Product2 | null
     */
    public $product;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->product_id) || Assert::minLength(
            $this->product_id,
            6,
            "product_id in Plan2 must have minlength of 6 $within"
        );
        !isset($this->product_id) || Assert::maxLength(
            $this->product_id,
            50,
            "product_id in Plan2 must have maxlength of 50 $within"
        );
        !isset($this->name) || Assert::minLength(
            $this->name,
            1,
            "name in Plan2 must have minlength of 1 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            127,
            "name in Plan2 must have maxlength of 127 $within"
        );
        !isset($this->description) || Assert::minLength(
            $this->description,
            1,
            "description in Plan2 must have minlength of 1 $within"
        );
        !isset($this->description) || Assert::maxLength(
            $this->description,
            127,
            "description in Plan2 must have maxlength of 127 $within"
        );
        Assert::notNull($this->billing_cycles, "billing_cycles in Plan2 must not be NULL $within");
        Assert::minCount(
            $this->billing_cycles,
            1,
            "billing_cycles in Plan2 must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->billing_cycles,
            12,
            "billing_cycles in Plan2 must have max. count of 12 $within"
        );
        Assert::isArray(
            $this->billing_cycles,
            "billing_cycles in Plan2 must be array $within"
        );
        if (isset($this->billing_cycles)) {
            foreach ($this->billing_cycles as $item) {
                $item->validate(Plan2::class);
            }
        }
        !isset($this->payment_preferences) || Assert::isInstanceOf(
            $this->payment_preferences,
            PaymentPreferences::class,
            "payment_preferences in Plan2 must be instance of PaymentPreferences $within"
        );
        !isset($this->payment_preferences) ||  $this->payment_preferences->validate(Plan2::class);
        !isset($this->taxes) || Assert::isInstanceOf(
            $this->taxes,
            Taxes::class,
            "taxes in Plan2 must be instance of Taxes $within"
        );
        !isset($this->taxes) ||  $this->taxes->validate(Plan2::class);
        !isset($this->product) || Assert::isInstanceOf(
            $this->product,
            Product2::class,
            "product in Plan2 must be instance of Product2 $within"
        );
        !isset($this->product) ||  $this->product->validate(Plan2::class);
    }

    private function map(array $data)
    {
        if (isset($data['product_id'])) {
            $this->product_id = $data['product_id'];
        }
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['description'])) {
            $this->description = $data['description'];
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
        if (isset($data['product'])) {
            $this->product = new Product2($data['product']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->billing_cycles = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPaymentPreferences(): PaymentPreferences
    {
        return $this->payment_preferences = new PaymentPreferences();
    }

    public function initTaxes(): Taxes
    {
        return $this->taxes = new Taxes();
    }

    public function initProduct(): Product2
    {
        return $this->product = new Product2();
    }
}
