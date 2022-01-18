<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The pricing tier details.
 *
 * generated from: pricing_tier.json
 */
class PricingTier implements JsonSerializable
{
    use BaseModel;

    /**
     * The starting quantity for the tier.
     *
     * @var string
     * minLength: 1
     * maxLength: 32
     */
    public $starting_quantity;

    /**
     * The ending quantity for the tier. Optional for the last tier.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 32
     */
    public $ending_quantity;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money
     */
    public $amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->starting_quantity, "starting_quantity in PricingTier must not be NULL $within");
        Assert::minLength(
            $this->starting_quantity,
            1,
            "starting_quantity in PricingTier must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->starting_quantity,
            32,
            "starting_quantity in PricingTier must have maxlength of 32 $within"
        );
        !isset($this->ending_quantity) || Assert::minLength(
            $this->ending_quantity,
            1,
            "ending_quantity in PricingTier must have minlength of 1 $within"
        );
        !isset($this->ending_quantity) || Assert::maxLength(
            $this->ending_quantity,
            32,
            "ending_quantity in PricingTier must have maxlength of 32 $within"
        );
        Assert::notNull($this->amount, "amount in PricingTier must not be NULL $within");
        Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in PricingTier must be instance of Money $within"
        );
         $this->amount->validate(PricingTier::class);
    }

    private function map(array $data)
    {
        if (isset($data['starting_quantity'])) {
            $this->starting_quantity = $data['starting_quantity'];
        }
        if (isset($data['ending_quantity'])) {
            $this->ending_quantity = $data['ending_quantity'];
        }
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->amount = new Money();
        if (isset($data)) {
            $this->map($data);
        }
    }
}
