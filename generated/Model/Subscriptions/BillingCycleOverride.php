<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The billing cycle details to override at subscription level.
 *
 * generated from: billing_cycle_override.json
 */
class BillingCycleOverride implements JsonSerializable
{
    use BaseModel;

    /** A regular billing cycle. */
    public const TENURE_TYPE_REGULAR = 'REGULAR';

    /** A trial billing cycle. */
    public const TENURE_TYPE_TRIAL = 'TRIAL';

    /**
     * The pricing scheme details.
     *
     * @var PricingScheme | null
     */
    public $pricing_scheme;

    /**
     * The frequency of the billing cycle.
     *
     * @var Frequency | null
     */
    public $frequency;

    /**
     * The tenure type of the billing cycle. In case of a plan having trial cycle, only 2 trial cycles are allowed
     * per plan.
     *
     * use one of constants defined in this class to set the value:
     * @see TENURE_TYPE_REGULAR
     * @see TENURE_TYPE_TRIAL
     * @var string | null
     * minLength: 1
     * maxLength: 24
     */
    public $tenure_type;

    /**
     * The order in which this cycle is to run among other billing cycles. For example, a trial billing cycle has a
     * `sequence` of `1` while a regular billing cycle has a `sequence` of `2`, so that trial cycle runs before the
     * regular cycle.
     *
     * @var int
     */
    public $sequence;

    /**
     * The number of times this billing cycle gets executed. Trial billing cycles can only be executed a finite
     * number of times (value between <code>1</code> and <code>999</code> for <code>total_cycles</code>). Regular
     * billing cycles can be executed infinite times (value of <code>0</code> for <code>total_cycles</code>) or a
     * finite number of times (value between <code>1</code> and <code>999</code> for <code>total_cycles</code>).
     *
     * @var int | null
     */
    public $total_cycles;

    /**
     * The tax details.
     *
     * @var Taxes | null
     */
    public $taxes;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $shipping_amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->pricing_scheme) || Assert::isInstanceOf(
            $this->pricing_scheme,
            PricingScheme::class,
            "pricing_scheme in BillingCycleOverride must be instance of PricingScheme $within"
        );
        !isset($this->pricing_scheme) ||  $this->pricing_scheme->validate(BillingCycleOverride::class);
        !isset($this->frequency) || Assert::isInstanceOf(
            $this->frequency,
            Frequency::class,
            "frequency in BillingCycleOverride must be instance of Frequency $within"
        );
        !isset($this->frequency) ||  $this->frequency->validate(BillingCycleOverride::class);
        !isset($this->tenure_type) || Assert::minLength(
            $this->tenure_type,
            1,
            "tenure_type in BillingCycleOverride must have minlength of 1 $within"
        );
        !isset($this->tenure_type) || Assert::maxLength(
            $this->tenure_type,
            24,
            "tenure_type in BillingCycleOverride must have maxlength of 24 $within"
        );
        Assert::notNull($this->sequence, "sequence in BillingCycleOverride must not be NULL $within");
        !isset($this->taxes) || Assert::isInstanceOf(
            $this->taxes,
            Taxes::class,
            "taxes in BillingCycleOverride must be instance of Taxes $within"
        );
        !isset($this->taxes) ||  $this->taxes->validate(BillingCycleOverride::class);
        !isset($this->shipping_amount) || Assert::isInstanceOf(
            $this->shipping_amount,
            Money::class,
            "shipping_amount in BillingCycleOverride must be instance of Money $within"
        );
        !isset($this->shipping_amount) ||  $this->shipping_amount->validate(BillingCycleOverride::class);
    }

    private function map(array $data)
    {
        if (isset($data['pricing_scheme'])) {
            $this->pricing_scheme = new PricingScheme($data['pricing_scheme']);
        }
        if (isset($data['frequency'])) {
            $this->frequency = new Frequency($data['frequency']);
        }
        if (isset($data['tenure_type'])) {
            $this->tenure_type = $data['tenure_type'];
        }
        if (isset($data['sequence'])) {
            $this->sequence = $data['sequence'];
        }
        if (isset($data['total_cycles'])) {
            $this->total_cycles = $data['total_cycles'];
        }
        if (isset($data['taxes'])) {
            $this->taxes = new Taxes($data['taxes']);
        }
        if (isset($data['shipping_amount'])) {
            $this->shipping_amount = new Money($data['shipping_amount']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPricingScheme(): PricingScheme
    {
        return $this->pricing_scheme = new PricingScheme();
    }

    public function initFrequency(): Frequency
    {
        return $this->frequency = new Frequency();
    }

    public function initTaxes(): Taxes
    {
        return $this->taxes = new Taxes();
    }

    public function initShippingAmount(): Money
    {
        return $this->shipping_amount = new Money();
    }
}
