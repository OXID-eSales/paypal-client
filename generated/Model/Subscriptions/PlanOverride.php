<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * An inline plan object to customise the subscription. You can override plan level default attributes by
 * providing customised values for the subscription in this object.
 *
 * generated from: plan_override.json
 */
class PlanOverride implements JsonSerializable
{
    use BaseModel;

    /**
     * The plan name.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $name;

    /**
     * An array of billing cycles for trial billing and regular billing. The subscription billing cycle definition
     * has to adhere to the plan billing cycle definition.
     *
     * @var BillingCycleOverride[]
     * maxItems: 1
     * maxItems: 12
     */
    public $billing_cycles;

    /**
     * The payment preferences to override at subscription level.
     *
     * @var PaymentPreferencesOverride | null
     */
    public $payment_preferences;

    /**
     * The tax details.
     *
     * @var TaxesOverride | null
     */
    public $taxes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength(
            $this->name,
            1,
            "name in PlanOverride must have minlength of 1 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            127,
            "name in PlanOverride must have maxlength of 127 $within"
        );
        Assert::notNull($this->billing_cycles, "billing_cycles in PlanOverride must not be NULL $within");
        Assert::minCount(
            $this->billing_cycles,
            1,
            "billing_cycles in PlanOverride must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->billing_cycles,
            12,
            "billing_cycles in PlanOverride must have max. count of 12 $within"
        );
        Assert::isArray(
            $this->billing_cycles,
            "billing_cycles in PlanOverride must be array $within"
        );
        if (isset($this->billing_cycles)) {
            foreach ($this->billing_cycles as $item) {
                $item->validate(PlanOverride::class);
            }
        }
        !isset($this->payment_preferences) || Assert::isInstanceOf(
            $this->payment_preferences,
            PaymentPreferencesOverride::class,
            "payment_preferences in PlanOverride must be instance of PaymentPreferencesOverride $within"
        );
        !isset($this->payment_preferences) ||  $this->payment_preferences->validate(PlanOverride::class);
        !isset($this->taxes) || Assert::isInstanceOf(
            $this->taxes,
            TaxesOverride::class,
            "taxes in PlanOverride must be instance of TaxesOverride $within"
        );
        !isset($this->taxes) ||  $this->taxes->validate(PlanOverride::class);
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['billing_cycles'])) {
            $this->billing_cycles = [];
            foreach ($data['billing_cycles'] as $item) {
                $this->billing_cycles[] = new BillingCycleOverride($item);
            }
        }
        if (isset($data['payment_preferences'])) {
            $this->payment_preferences = new PaymentPreferencesOverride($data['payment_preferences']);
        }
        if (isset($data['taxes'])) {
            $this->taxes = new TaxesOverride($data['taxes']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->billing_cycles = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPaymentPreferences(): PaymentPreferencesOverride
    {
        return $this->payment_preferences = new PaymentPreferencesOverride();
    }

    public function initTaxes(): TaxesOverride
    {
        return $this->taxes = new TaxesOverride();
    }
}
