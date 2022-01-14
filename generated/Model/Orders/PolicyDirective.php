<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Policy directive indicating how to process the payment.
 *
 * generated from: model-policy_directive.json
 */
class PolicyDirective implements JsonSerializable
{
    use BaseModel;

    /**
     * Indicates the payment state decision. Can be ALLOW, DENY or ALLOW_WITH_HOLD.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 30
     */
    public $payment_decision;

    /**
     * List of reasons for the payment decision.
     *
     * @var string[]
     * maxItems: 1
     * maxItems: 50
     */
    public $reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_decision) || Assert::minLength(
            $this->payment_decision,
            1,
            "payment_decision in PolicyDirective must have minlength of 1 $within"
        );
        !isset($this->payment_decision) || Assert::maxLength(
            $this->payment_decision,
            30,
            "payment_decision in PolicyDirective must have maxlength of 30 $within"
        );
        Assert::notNull($this->reason, "reason in PolicyDirective must not be NULL $within");
        Assert::minCount(
            $this->reason,
            1,
            "reason in PolicyDirective must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->reason,
            50,
            "reason in PolicyDirective must have max. count of 50 $within"
        );
        Assert::isArray(
            $this->reason,
            "reason in PolicyDirective must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['payment_decision'])) {
            $this->payment_decision = $data['payment_decision'];
        }
        if (isset($data['reason'])) {
            $this->reason = [];
            foreach ($data['reason'] as $item) {
                $this->reason[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->reason = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
