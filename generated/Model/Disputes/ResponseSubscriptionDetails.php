<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The subscription details.
 *
 * generated from: response-subscription_details.json
 */
class ResponseSubscriptionDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $subscription_start_time;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $agreed_subscription_amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->subscription_start_time) || Assert::minLength(
            $this->subscription_start_time,
            20,
            "subscription_start_time in ResponseSubscriptionDetails must have minlength of 20 $within"
        );
        !isset($this->subscription_start_time) || Assert::maxLength(
            $this->subscription_start_time,
            64,
            "subscription_start_time in ResponseSubscriptionDetails must have maxlength of 64 $within"
        );
        !isset($this->agreed_subscription_amount) || Assert::isInstanceOf(
            $this->agreed_subscription_amount,
            Money::class,
            "agreed_subscription_amount in ResponseSubscriptionDetails must be instance of Money $within"
        );
        !isset($this->agreed_subscription_amount) ||  $this->agreed_subscription_amount->validate(ResponseSubscriptionDetails::class);
    }

    private function map(array $data)
    {
        if (isset($data['subscription_start_time'])) {
            $this->subscription_start_time = $data['subscription_start_time'];
        }
        if (isset($data['agreed_subscription_amount'])) {
            $this->agreed_subscription_amount = new Money($data['agreed_subscription_amount']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAgreedSubscriptionAmount(): Money
    {
        return $this->agreed_subscription_amount = new Money();
    }
}
