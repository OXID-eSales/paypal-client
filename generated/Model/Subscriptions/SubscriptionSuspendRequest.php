<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The suspend subscription request details.
 *
 * generated from: subscription_suspend_request.json
 */
class SubscriptionSuspendRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The reason for suspenson of the subscription.
     *
     * @var string
     * minLength: 1
     * maxLength: 128
     */
    public $reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->reason, "reason in SubscriptionSuspendRequest must not be NULL $within");
        Assert::minLength(
            $this->reason,
            1,
            "reason in SubscriptionSuspendRequest must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->reason,
            128,
            "reason in SubscriptionSuspendRequest must have maxlength of 128 $within"
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
