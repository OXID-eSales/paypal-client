<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The eligible dispute reason.
 *
 * generated from: response-eligible_dispute_reason.json
 */
class ResponseEligibleDisputeReason implements JsonSerializable
{
    use BaseModel;

    /** The customer did not receive the merchandise or service. */
    public const DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';

    /** The customer reports that the merchandise or service is not as described. */
    public const DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';

    /** The customer did not authorize purchase of the merchandise or service. */
    public const DISPUTE_REASON_UNAUTHORISED = 'UNAUTHORISED';

    /** The refund or credit was not processed for the customer. */
    public const DISPUTE_REASON_CREDIT_NOT_PROCESSED = 'CREDIT_NOT_PROCESSED';

    /** The transaction was a duplicate. */
    public const DISPUTE_REASON_DUPLICATE_TRANSACTION = 'DUPLICATE_TRANSACTION';

    /** The customer was charged an incorrect amount. */
    public const DISPUTE_REASON_INCORRECT_AMOUNT = 'INCORRECT_AMOUNT';

    /** The customer paid for the transaction through other means. */
    public const DISPUTE_REASON_PAYMENT_BY_OTHER_MEANS = 'PAYMENT_BY_OTHER_MEANS';

    /** The customer was being charged for a subscription or a recurring transaction that was canceled. */
    public const DISPUTE_REASON_CANCELED_RECURRING_BILLING = 'CANCELED_RECURRING_BILLING';

    /** A problem occurred with the remittance. */
    public const DISPUTE_REASON_PROBLEM_WITH_REMITTANCE = 'PROBLEM_WITH_REMITTANCE';

    /** Other. */
    public const DISPUTE_REASON_OTHER = 'OTHER';

    /**
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED
     * @see DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED
     * @see DISPUTE_REASON_UNAUTHORISED
     * @see DISPUTE_REASON_CREDIT_NOT_PROCESSED
     * @see DISPUTE_REASON_DUPLICATE_TRANSACTION
     * @see DISPUTE_REASON_INCORRECT_AMOUNT
     * @see DISPUTE_REASON_PAYMENT_BY_OTHER_MEANS
     * @see DISPUTE_REASON_CANCELED_RECURRING_BILLING
     * @see DISPUTE_REASON_PROBLEM_WITH_REMITTANCE
     * @see DISPUTE_REASON_OTHER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_reason;

    /**
     * The details about the allowable lifecycle stage and the reason why it is allowed.
     *
     * @var ResponseEligibleDisputeReasonAllowableLifeCycle | null
     */
    public $allowable_life_cycle;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->dispute_reason) || Assert::minLength(
            $this->dispute_reason,
            1,
            "dispute_reason in ResponseEligibleDisputeReason must have minlength of 1 $within"
        );
        !isset($this->dispute_reason) || Assert::maxLength(
            $this->dispute_reason,
            255,
            "dispute_reason in ResponseEligibleDisputeReason must have maxlength of 255 $within"
        );
        !isset($this->allowable_life_cycle) || Assert::isInstanceOf(
            $this->allowable_life_cycle,
            ResponseEligibleDisputeReasonAllowableLifeCycle::class,
            "allowable_life_cycle in ResponseEligibleDisputeReason must be instance of ResponseEligibleDisputeReasonAllowableLifeCycle $within"
        );
        !isset($this->allowable_life_cycle) ||  $this->allowable_life_cycle->validate(ResponseEligibleDisputeReason::class);
    }

    private function map(array $data)
    {
        if (isset($data['dispute_reason'])) {
            $this->dispute_reason = $data['dispute_reason'];
        }
        if (isset($data['allowable_life_cycle'])) {
            $this->allowable_life_cycle = new ResponseEligibleDisputeReasonAllowableLifeCycle($data['allowable_life_cycle']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAllowableLifeCycle(): ResponseEligibleDisputeReasonAllowableLifeCycle
    {
        return $this->allowable_life_cycle = new ResponseEligibleDisputeReasonAllowableLifeCycle();
    }
}
