<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The roll-out strategy for a pricing scheme update. After the pricing update, all new subscriptions are based
 * on this pricing scheme and the values in this object determine the behavior for the existing subscriptions.
 *
 * generated from: roll_out_strategy.json
 */
class RollOutStrategy implements JsonSerializable
{
    use BaseModel;

    /** The pricing change takes effect from the next billing payment after the effective time. */
    public const PROCESS_CHANGE_FROM_NEXT_PAYMENT = 'NEXT_PAYMENT';

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $effective_time;

    /**
     * The date and time when this pricing change goes into effect, in [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6). Applies only if the plan's pricing scheme is
     * updated.
     *
     * use one of constants defined in this class to set the value:
     * @see PROCESS_CHANGE_FROM_NEXT_PAYMENT
     * @var string | null
     * minLength: 1
     * maxLength: 30
     */
    public $process_change_from = 'NEXT_PAYMENT';

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->effective_time) || Assert::minLength(
            $this->effective_time,
            20,
            "effective_time in RollOutStrategy must have minlength of 20 $within"
        );
        !isset($this->effective_time) || Assert::maxLength(
            $this->effective_time,
            64,
            "effective_time in RollOutStrategy must have maxlength of 64 $within"
        );
        !isset($this->process_change_from) || Assert::minLength(
            $this->process_change_from,
            1,
            "process_change_from in RollOutStrategy must have minlength of 1 $within"
        );
        !isset($this->process_change_from) || Assert::maxLength(
            $this->process_change_from,
            30,
            "process_change_from in RollOutStrategy must have maxlength of 30 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['effective_time'])) {
            $this->effective_time = $data['effective_time'];
        }
        if (isset($data['process_change_from'])) {
            $this->process_change_from = $data['process_change_from'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
