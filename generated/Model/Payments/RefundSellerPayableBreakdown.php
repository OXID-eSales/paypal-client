<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The breakdown of the refund.
 *
 * generated from: Refund_seller_payable_breakdown
 */
class RefundSellerPayableBreakdown implements JsonSerializable
{
    use BaseModel;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $gross_amount;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $paypal_fee;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $paypal_fee_in_receivable_currency;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $net_amount;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $net_amount_in_receivable_currency;

    /**
     * An array of platform or partner fees, commissions, or brokerage fees for the refund.
     *
     * @var PlatformFee[]
     * maxItems: 0
     * maxItems: 1
     */
    public $platform_fees;

    /**
     * An array of breakdown values for the net amount. Returned when the currency of the refund is different from
     * the currency of the PayPal account where the payee holds their funds.
     *
     * @var NetAmountBreakdownItem[] | null
     */
    public $net_amount_breakdown;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $total_refunded_amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->gross_amount) || Assert::isInstanceOf(
            $this->gross_amount,
            Money::class,
            "gross_amount in RefundSellerPayableBreakdown must be instance of Money $within"
        );
        !isset($this->gross_amount) ||  $this->gross_amount->validate(RefundSellerPayableBreakdown::class);
        !isset($this->paypal_fee) || Assert::isInstanceOf(
            $this->paypal_fee,
            Money::class,
            "paypal_fee in RefundSellerPayableBreakdown must be instance of Money $within"
        );
        !isset($this->paypal_fee) ||  $this->paypal_fee->validate(RefundSellerPayableBreakdown::class);
        !isset($this->paypal_fee_in_receivable_currency) || Assert::isInstanceOf(
            $this->paypal_fee_in_receivable_currency,
            Money::class,
            "paypal_fee_in_receivable_currency in RefundSellerPayableBreakdown must be instance of Money $within"
        );
        !isset($this->paypal_fee_in_receivable_currency) ||  $this->paypal_fee_in_receivable_currency->validate(RefundSellerPayableBreakdown::class);
        !isset($this->net_amount) || Assert::isInstanceOf(
            $this->net_amount,
            Money::class,
            "net_amount in RefundSellerPayableBreakdown must be instance of Money $within"
        );
        !isset($this->net_amount) ||  $this->net_amount->validate(RefundSellerPayableBreakdown::class);
        !isset($this->net_amount_in_receivable_currency) || Assert::isInstanceOf(
            $this->net_amount_in_receivable_currency,
            Money::class,
            "net_amount_in_receivable_currency in RefundSellerPayableBreakdown must be instance of Money $within"
        );
        !isset($this->net_amount_in_receivable_currency) ||  $this->net_amount_in_receivable_currency->validate(RefundSellerPayableBreakdown::class);
        Assert::notNull($this->platform_fees, "platform_fees in RefundSellerPayableBreakdown must not be NULL $within");
        Assert::minCount(
            $this->platform_fees,
            0,
            "platform_fees in RefundSellerPayableBreakdown must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->platform_fees,
            1,
            "platform_fees in RefundSellerPayableBreakdown must have max. count of 1 $within"
        );
        Assert::isArray(
            $this->platform_fees,
            "platform_fees in RefundSellerPayableBreakdown must be array $within"
        );
        if (isset($this->platform_fees)) {
            foreach ($this->platform_fees as $item) {
                $item->validate(RefundSellerPayableBreakdown::class);
            }
        }
        !isset($this->net_amount_breakdown) || Assert::isArray(
            $this->net_amount_breakdown,
            "net_amount_breakdown in RefundSellerPayableBreakdown must be array $within"
        );
        if (isset($this->net_amount_breakdown)) {
            foreach ($this->net_amount_breakdown as $item) {
                $item->validate(RefundSellerPayableBreakdown::class);
            }
        }
        !isset($this->total_refunded_amount) || Assert::isInstanceOf(
            $this->total_refunded_amount,
            Money::class,
            "total_refunded_amount in RefundSellerPayableBreakdown must be instance of Money $within"
        );
        !isset($this->total_refunded_amount) ||  $this->total_refunded_amount->validate(RefundSellerPayableBreakdown::class);
    }

    private function map(array $data)
    {
        if (isset($data['gross_amount'])) {
            $this->gross_amount = new Money($data['gross_amount']);
        }
        if (isset($data['paypal_fee'])) {
            $this->paypal_fee = new Money($data['paypal_fee']);
        }
        if (isset($data['paypal_fee_in_receivable_currency'])) {
            $this->paypal_fee_in_receivable_currency = new Money($data['paypal_fee_in_receivable_currency']);
        }
        if (isset($data['net_amount'])) {
            $this->net_amount = new Money($data['net_amount']);
        }
        if (isset($data['net_amount_in_receivable_currency'])) {
            $this->net_amount_in_receivable_currency = new Money($data['net_amount_in_receivable_currency']);
        }
        if (isset($data['platform_fees'])) {
            $this->platform_fees = [];
            foreach ($data['platform_fees'] as $item) {
                $this->platform_fees[] = new PlatformFee($item);
            }
        }
        if (isset($data['net_amount_breakdown'])) {
            $this->net_amount_breakdown = [];
            foreach ($data['net_amount_breakdown'] as $item) {
                $this->net_amount_breakdown[] = new NetAmountBreakdownItem($item);
            }
        }
        if (isset($data['total_refunded_amount'])) {
            $this->total_refunded_amount = new Money($data['total_refunded_amount']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->platform_fees = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initGrossAmount(): Money
    {
        return $this->gross_amount = new Money();
    }

    public function initPaypalFee(): Money
    {
        return $this->paypal_fee = new Money();
    }

    public function initPaypalFeeInReceivableCurrency(): Money
    {
        return $this->paypal_fee_in_receivable_currency = new Money();
    }

    public function initNetAmount(): Money
    {
        return $this->net_amount = new Money();
    }

    public function initNetAmountInReceivableCurrency(): Money
    {
        return $this->net_amount_in_receivable_currency = new Money();
    }

    public function initTotalRefundedAmount(): Money
    {
        return $this->total_refunded_amount = new Money();
    }
}
