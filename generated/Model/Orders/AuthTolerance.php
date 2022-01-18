<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Auth-Capture Tolerance details.
 *
 * generated from: model-auth_tolerance.json
 */
class AuthTolerance implements JsonSerializable
{
    use BaseModel;

    /**
     * The percentage, as a fixed-point, signed decimal number. For example, define a 19.99% interest rate as
     * `19.99`.
     *
     * @var string | null
     */
    public $percent;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $absolute;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->absolute) || Assert::isInstanceOf(
            $this->absolute,
            Money::class,
            "absolute in AuthTolerance must be instance of Money $within"
        );
        !isset($this->absolute) ||  $this->absolute->validate(AuthTolerance::class);
    }

    private function map(array $data)
    {
        if (isset($data['percent'])) {
            $this->percent = $data['percent'];
        }
        if (isset($data['absolute'])) {
            $this->absolute = new Money($data['absolute']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAbsolute(): Money
    {
        return $this->absolute = new Money();
    }
}
