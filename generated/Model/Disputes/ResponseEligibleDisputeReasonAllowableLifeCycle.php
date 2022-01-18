<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details about the allowable lifecycle stage and the reason why it is allowed.
 *
 * generated from: ResponseEligibleDisputeReason_allowable_life_cycle
 */
class ResponseEligibleDisputeReasonAllowableLifeCycle implements JsonSerializable
{
    use BaseModel;

    /** Dispute is allowed in the <code>INQUIRY</code> lifecycle stage. */
    public const STAGE_INQUIRY = 'INQUIRY';

    /** Dispute is allowed in the <code>CHARGEBACK</code> lifecycle stage. */
    public const STAGE_CHARGEBACK = 'CHARGEBACK';

    /**
     * The stage in the dispute life cycle where the dispute creation is allowed.
     *
     * use one of constants defined in this class to set the value:
     * @see STAGE_INQUIRY
     * @see STAGE_CHARGEBACK
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $stage;

    /**
     * The reason why dispute creation is allowed in this lifecycle stage. Value is `SELLER_OPTED_OUT_OF_DISPUTE`,
     * `LOCKED_SELLER`, `RESTRICTED_SELLER`, or `DISPUTE_DISABLED_PARTNER`.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->stage) || Assert::minLength(
            $this->stage,
            1,
            "stage in ResponseEligibleDisputeReasonAllowableLifeCycle must have minlength of 1 $within"
        );
        !isset($this->stage) || Assert::maxLength(
            $this->stage,
            255,
            "stage in ResponseEligibleDisputeReasonAllowableLifeCycle must have maxlength of 255 $within"
        );
        !isset($this->reason) || Assert::minLength(
            $this->reason,
            1,
            "reason in ResponseEligibleDisputeReasonAllowableLifeCycle must have minlength of 1 $within"
        );
        !isset($this->reason) || Assert::maxLength(
            $this->reason,
            2000,
            "reason in ResponseEligibleDisputeReasonAllowableLifeCycle must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['stage'])) {
            $this->stage = $data['stage'];
        }
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
