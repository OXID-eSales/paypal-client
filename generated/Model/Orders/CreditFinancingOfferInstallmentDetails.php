<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payer-approved installment payment plan details.
 *
 * generated from: CreditFinancingOffer_installment_details
 */
class CreditFinancingOfferInstallmentDetails implements JsonSerializable
{
    use BaseModel;

    /** Payments are monthly. */
    const PERIOD_MONTHLY = 'MONTHLY';

    /**
     * The frequency with which the payer has agreed to make the payment.
     *
     * use one of constants defined in this class to set the value:
     * @see PERIOD_MONTHLY
     * @var string | null
     */
    public $period;

    /**
     * The [ISO-8601-formatted](https://www.iso.org/standard/40874.html) length of time in years, months, weeks,
     * days, hours, minutes, and seconds.<blockquote><strong>Note:</strong> The format is
     * <code>P<var>y</var>Y<var>m</var>M<var>d</var>DT<var>h</var>H<var>m</var>M<var>s</var>S</code>. When an amount
     * is zero, you can omit it. Because week cannot co-exist with other time components in ISO-8601 duration,
     * specify <code>P7D</code>. Make provisions to incorporate the effects of daylight savings
     * time.</blockquote><br/>For more information, see
     * [durations](https://en.wikipedia.org/wiki/ISO_8601#Durations).
     *
     * @var string | null
     */
    public $interval_duration;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $payment_due;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_due) || Assert::isInstanceOf(
            $this->payment_due,
            Money::class,
            "payment_due in CreditFinancingOfferInstallmentDetails must be instance of Money $within"
        );
        !isset($this->payment_due) ||  $this->payment_due->validate(CreditFinancingOfferInstallmentDetails::class);
    }

    private function map(array $data)
    {
        if (isset($data['period'])) {
            $this->period = $data['period'];
        }
        if (isset($data['interval_duration'])) {
            $this->interval_duration = $data['interval_duration'];
        }
        if (isset($data['payment_due'])) {
            $this->payment_due = new Money($data['payment_due']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPaymentDue(): Money
    {
        return $this->payment_due = new Money();
    }
}
