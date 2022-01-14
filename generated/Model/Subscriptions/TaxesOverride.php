<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The tax details.
 *
 * generated from: taxes_override.json
 */
class TaxesOverride implements JsonSerializable
{
    use BaseModel;

    /**
     * The percentage, as a fixed-point, signed decimal number. For example, define a 19.99% interest rate as
     * `19.99`.
     *
     * @var string | null
     */
    public $percentage;

    /**
     * Indicates whether the tax was already included in the billing amount.
     *
     * @var boolean | null
     */
    public $inclusive;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in TaxesOverride must be instance of Money $within"
        );
        !isset($this->amount) ||  $this->amount->validate(TaxesOverride::class);
    }

    private function map(array $data)
    {
        if (isset($data['percentage'])) {
            $this->percentage = $data['percentage'];
        }
        if (isset($data['inclusive'])) {
            $this->inclusive = $data['inclusive'];
        }
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAmount(): Money
    {
        return $this->amount = new Money();
    }
}
