<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The net amount. Returned when the currency of the refund is different from the currency of the PayPal account
 * where the merchant holds their funds.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-net_amount_breakdown_item.json
 */
class NetAmountBreakdownItem implements JsonSerializable
{
    use BaseModel;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $payable_amount;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $converted_amount;

    /**
     * The exchange rate that determines the amount to convert from one currency to another currency.
     *
     * @var ExchangeRate | null
     */
    public $exchange_rate;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payable_amount) || Assert::isInstanceOf(
            $this->payable_amount,
            Money::class,
            "payable_amount in NetAmountBreakdownItem must be instance of Money $within"
        );
        !isset($this->payable_amount) ||  $this->payable_amount->validate(NetAmountBreakdownItem::class);
        !isset($this->converted_amount) || Assert::isInstanceOf(
            $this->converted_amount,
            Money::class,
            "converted_amount in NetAmountBreakdownItem must be instance of Money $within"
        );
        !isset($this->converted_amount) ||  $this->converted_amount->validate(NetAmountBreakdownItem::class);
        !isset($this->exchange_rate) || Assert::isInstanceOf(
            $this->exchange_rate,
            ExchangeRate::class,
            "exchange_rate in NetAmountBreakdownItem must be instance of ExchangeRate $within"
        );
        !isset($this->exchange_rate) ||  $this->exchange_rate->validate(NetAmountBreakdownItem::class);
    }

    private function map(array $data)
    {
        if (isset($data['payable_amount'])) {
            $this->payable_amount = new Money($data['payable_amount']);
        }
        if (isset($data['converted_amount'])) {
            $this->converted_amount = new Money($data['converted_amount']);
        }
        if (isset($data['exchange_rate'])) {
            $this->exchange_rate = new ExchangeRate($data['exchange_rate']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPayableAmount(): Money
    {
        return $this->payable_amount = new Money();
    }

    public function initConvertedAmount(): Money
    {
        return $this->converted_amount = new Money();
    }

    public function initExchangeRate(): ExchangeRate
    {
        return $this->exchange_rate = new ExchangeRate();
    }
}
