<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The tax details.
 *
 * generated from: taxes.json
 */
class Taxes implements JsonSerializable
{
    use BaseModel;

    /**
     * The percentage, as a fixed-point, signed decimal number. For example, define a 19.99% interest rate as
     * `19.99`.
     *
     * @var string
     */
    public $percentage;

    /**
     * Indicates whether the tax was already included in the billing amount.
     *
     * @var boolean | null
     */
    public $inclusive = true;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->percentage, "percentage in Taxes must not be NULL $within");
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in Taxes must be instance of Money $within"
        );
        !isset($this->amount) ||  $this->amount->validate(Taxes::class);
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
