<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Details about when an actor becomes eligible to perform an action.
 *
 * generated from: response-action_eligibility.json
 */
class ResponseActionEligibility implements JsonSerializable
{
    use BaseModel;

    /** The dispute case escalation action. */
    public const ACTION_TYPE_ESCALATE = 'ESCALATE';

    /** The customer can perform the action after the eligible date and time. */
    public const ACTOR_BUYER = 'BUYER';

    /** The merchant can perform the action after the eligible date and time. */
    public const ACTOR_SELLER = 'SELLER';

    /**
     * The action which the actor can perform after given date and time.
     *
     * use one of constants defined in this class to set the value:
     * @see ACTION_TYPE_ESCALATE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $action_type;

    /**
     * The actor which is allowed to perform the action after the eligible date and time.
     *
     * use one of constants defined in this class to set the value:
     * @see ACTOR_BUYER
     * @see ACTOR_SELLER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $actor;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $eligible_after_time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->action_type) || Assert::minLength(
            $this->action_type,
            1,
            "action_type in ResponseActionEligibility must have minlength of 1 $within"
        );
        !isset($this->action_type) || Assert::maxLength(
            $this->action_type,
            255,
            "action_type in ResponseActionEligibility must have maxlength of 255 $within"
        );
        !isset($this->actor) || Assert::minLength(
            $this->actor,
            1,
            "actor in ResponseActionEligibility must have minlength of 1 $within"
        );
        !isset($this->actor) || Assert::maxLength(
            $this->actor,
            255,
            "actor in ResponseActionEligibility must have maxlength of 255 $within"
        );
        !isset($this->eligible_after_time) || Assert::minLength(
            $this->eligible_after_time,
            20,
            "eligible_after_time in ResponseActionEligibility must have minlength of 20 $within"
        );
        !isset($this->eligible_after_time) || Assert::maxLength(
            $this->eligible_after_time,
            64,
            "eligible_after_time in ResponseActionEligibility must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['action_type'])) {
            $this->action_type = $data['action_type'];
        }
        if (isset($data['actor'])) {
            $this->actor = $data['actor'];
        }
        if (isset($data['eligible_after_time'])) {
            $this->eligible_after_time = $data['eligible_after_time'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
