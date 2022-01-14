<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The currency range, from the minimum inclusive amount to the maximum inclusive amount.
 *
 * generated from: onboarding_common-currency_range.json
 */
class OnboardingCommonCurrencyRange implements JsonSerializable
{
    use BaseModel;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $minimum_amount;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $maximum_amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->minimum_amount) || Assert::isInstanceOf(
            $this->minimum_amount,
            Money::class,
            "minimum_amount in OnboardingCommonCurrencyRange must be instance of Money $within"
        );
        !isset($this->minimum_amount) ||  $this->minimum_amount->validate(OnboardingCommonCurrencyRange::class);
        !isset($this->maximum_amount) || Assert::isInstanceOf(
            $this->maximum_amount,
            Money::class,
            "maximum_amount in OnboardingCommonCurrencyRange must be instance of Money $within"
        );
        !isset($this->maximum_amount) ||  $this->maximum_amount->validate(OnboardingCommonCurrencyRange::class);
    }

    private function map(array $data)
    {
        if (isset($data['minimum_amount'])) {
            $this->minimum_amount = new Money($data['minimum_amount']);
        }
        if (isset($data['maximum_amount'])) {
            $this->maximum_amount = new Money($data['maximum_amount']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initMinimumAmount(): Money
    {
        return $this->minimum_amount = new Money();
    }

    public function initMaximumAmount(): Money
    {
        return $this->maximum_amount = new Money();
    }
}
