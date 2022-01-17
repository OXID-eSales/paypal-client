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
    public const PERIOD_MONTHLY = 'MONTHLY';

    /**
     * The frequency with which the payer has agreed to make the payment.
     *
     * use one of constants defined in this class to set the value:
     * @see PERIOD_MONTHLY
     * @var string | null
     */
    public $period;

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
