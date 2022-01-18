<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The activate subscription request details.
 *
 * generated from: subscription_activate_request.json
 */
class SubscriptionActivateRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The reason for activation of a subscription. Required to reactivate the subscription.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 128
     */
    public $reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->reason) || Assert::minLength(
            $this->reason,
            1,
            "reason in SubscriptionActivateRequest must have minlength of 1 $within"
        );
        !isset($this->reason) || Assert::maxLength(
            $this->reason,
            128,
            "reason in SubscriptionActivateRequest must have maxlength of 128 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['reason'])) {
            $this->reason = $data['reason'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
