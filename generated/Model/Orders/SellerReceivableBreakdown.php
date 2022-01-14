<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The detailed breakdown of the capture activity.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-seller_receivable_breakdown.json
 */
class SellerReceivableBreakdown implements JsonSerializable
{
    use BaseModel;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money
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
    public $receivable_amount;

    /**
     * The exchange rate that determines the amount to convert from one currency to another currency.
     *
     * @var ExchangeRate | null
     */
    public $exchange_rate;

    /**
     * An array of platform or partner fees, commissions, or brokerage fees that associated with the captured
     * payment.
     *
     * @var PlatformFee[]
     * maxItems: 0
     * maxItems: 1
     */
    public $platform_fees;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->gross_amount, "gross_amount in SellerReceivableBreakdown must not be NULL $within");
        Assert::isInstanceOf(
            $this->gross_amount,
            Money::class,
            "gross_amount in SellerReceivableBreakdown must be instance of Money $within"
        );
         $this->gross_amount->validate(SellerReceivableBreakdown::class);
        !isset($this->paypal_fee) || Assert::isInstanceOf(
            $this->paypal_fee,
            Money::class,
            "paypal_fee in SellerReceivableBreakdown must be instance of Money $within"
        );
        !isset($this->paypal_fee) ||  $this->paypal_fee->validate(SellerReceivableBreakdown::class);
        !isset($this->paypal_fee_in_receivable_currency) || Assert::isInstanceOf(
            $this->paypal_fee_in_receivable_currency,
            Money::class,
            "paypal_fee_in_receivable_currency in SellerReceivableBreakdown must be instance of Money $within"
        );
        !isset($this->paypal_fee_in_receivable_currency) ||  $this->paypal_fee_in_receivable_currency->validate(SellerReceivableBreakdown::class);
        !isset($this->net_amount) || Assert::isInstanceOf(
            $this->net_amount,
            Money::class,
            "net_amount in SellerReceivableBreakdown must be instance of Money $within"
        );
        !isset($this->net_amount) ||  $this->net_amount->validate(SellerReceivableBreakdown::class);
        !isset($this->receivable_amount) || Assert::isInstanceOf(
            $this->receivable_amount,
            Money::class,
            "receivable_amount in SellerReceivableBreakdown must be instance of Money $within"
        );
        !isset($this->receivable_amount) ||  $this->receivable_amount->validate(SellerReceivableBreakdown::class);
        !isset($this->exchange_rate) || Assert::isInstanceOf(
            $this->exchange_rate,
            ExchangeRate::class,
            "exchange_rate in SellerReceivableBreakdown must be instance of ExchangeRate $within"
        );
        !isset($this->exchange_rate) ||  $this->exchange_rate->validate(SellerReceivableBreakdown::class);
        Assert::notNull($this->platform_fees, "platform_fees in SellerReceivableBreakdown must not be NULL $within");
        Assert::minCount(
            $this->platform_fees,
            0,
            "platform_fees in SellerReceivableBreakdown must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->platform_fees,
            1,
            "platform_fees in SellerReceivableBreakdown must have max. count of 1 $within"
        );
        Assert::isArray(
            $this->platform_fees,
            "platform_fees in SellerReceivableBreakdown must be array $within"
        );
        if (isset($this->platform_fees)) {
            foreach ($this->platform_fees as $item) {
                $item->validate(SellerReceivableBreakdown::class);
            }
        }
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
        if (isset($data['receivable_amount'])) {
            $this->receivable_amount = new Money($data['receivable_amount']);
        }
        if (isset($data['exchange_rate'])) {
            $this->exchange_rate = new ExchangeRate($data['exchange_rate']);
        }
        if (isset($data['platform_fees'])) {
            $this->platform_fees = [];
            foreach ($data['platform_fees'] as $item) {
                $this->platform_fees[] = new PlatformFee($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->gross_amount = new Money();
        $this->platform_fees = [];
        if (isset($data)) {
            $this->map($data);
        }
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

    public function initReceivableAmount(): Money
    {
        return $this->receivable_amount = new Money();
    }

    public function initExchangeRate(): ExchangeRate
    {
        return $this->exchange_rate = new ExchangeRate();
    }
}
