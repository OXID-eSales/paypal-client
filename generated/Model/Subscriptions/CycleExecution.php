<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The regular and trial execution details for a billing cycle.
 *
 * generated from: cycle_execution.json
 */
class CycleExecution implements JsonSerializable
{
    use BaseModel;

    /** A regular billing cycle. */
    const TENURE_TYPE_REGULAR = 'REGULAR';

    /** A trial billing cycle. */
    const TENURE_TYPE_TRIAL = 'TRIAL';

    /**
     * The type of the billing cycle.
     *
     * use one of constants defined in this class to set the value:
     * @see TENURE_TYPE_REGULAR
     * @see TENURE_TYPE_TRIAL
     * @var string
     * minLength: 1
     * maxLength: 24
     */
    public $tenure_type;

    /**
     * The order in which to run this cycle among other billing cycles.
     *
     * @var int
     */
    public $sequence;

    /**
     * The number of billing cycles that have completed.
     *
     * @var int
     */
    public $cycles_completed;

    /**
     * For a finite billing cycle, cycles_remaining is the number of remaining cycles. For an infinite billing cycle,
     * cycles_remaining is set as 0.
     *
     * @var int | null
     */
    public $cycles_remaining;

    /**
     * The active pricing scheme version for the billing cycle.
     *
     * @var int | null
     */
    public $current_pricing_scheme_version;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount_payable_per_cycle;

    /**
     * The breakdown details for the amount. Includes the gross, tax, fee, and shipping amounts.
     *
     * @var AmountWithBreakdown | null
     */
    public $total_price_per_cycle;

    /**
     * The number of times this billing cycle gets executed. Trial billing cycles can only be executed a finite
     * number of times (value between <code>1</code> and <code>999</code> for <code>total_cycles</code>). Regular
     * billing cycles can be executed infinite times (value of <code>0</code> for <code>total_cycles</code>) or a
     * finite number of times (value between <code>1</code> and <code>999</code> for <code>total_cycles</code>).
     *
     * @var int | null
     */
    public $total_cycles;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->tenure_type, "tenure_type in CycleExecution must not be NULL $within");
        Assert::minLength(
            $this->tenure_type,
            1,
            "tenure_type in CycleExecution must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->tenure_type,
            24,
            "tenure_type in CycleExecution must have maxlength of 24 $within"
        );
        Assert::notNull($this->sequence, "sequence in CycleExecution must not be NULL $within");
        Assert::notNull($this->cycles_completed, "cycles_completed in CycleExecution must not be NULL $within");
        !isset($this->amount_payable_per_cycle) || Assert::isInstanceOf(
            $this->amount_payable_per_cycle,
            Money::class,
            "amount_payable_per_cycle in CycleExecution must be instance of Money $within"
        );
        !isset($this->amount_payable_per_cycle) ||  $this->amount_payable_per_cycle->validate(CycleExecution::class);
        !isset($this->total_price_per_cycle) || Assert::isInstanceOf(
            $this->total_price_per_cycle,
            AmountWithBreakdown::class,
            "total_price_per_cycle in CycleExecution must be instance of AmountWithBreakdown $within"
        );
        !isset($this->total_price_per_cycle) ||  $this->total_price_per_cycle->validate(CycleExecution::class);
    }

    private function map(array $data)
    {
        if (isset($data['tenure_type'])) {
            $this->tenure_type = $data['tenure_type'];
        }
        if (isset($data['sequence'])) {
            $this->sequence = $data['sequence'];
        }
        if (isset($data['cycles_completed'])) {
            $this->cycles_completed = $data['cycles_completed'];
        }
        if (isset($data['cycles_remaining'])) {
            $this->cycles_remaining = $data['cycles_remaining'];
        }
        if (isset($data['current_pricing_scheme_version'])) {
            $this->current_pricing_scheme_version = $data['current_pricing_scheme_version'];
        }
        if (isset($data['amount_payable_per_cycle'])) {
            $this->amount_payable_per_cycle = new Money($data['amount_payable_per_cycle']);
        }
        if (isset($data['total_price_per_cycle'])) {
            $this->total_price_per_cycle = new AmountWithBreakdown($data['total_price_per_cycle']);
        }
        if (isset($data['total_cycles'])) {
            $this->total_cycles = $data['total_cycles'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAmountPayablePerCycle(): Money
    {
        return $this->amount_payable_per_cycle = new Money();
    }

    public function initTotalPricePerCycle(): AmountWithBreakdown
    {
        return $this->total_price_per_cycle = new AmountWithBreakdown();
    }
}
