<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The ineligible dispute with the reason for ineligibility.
 *
 * generated from: response-ineligible_dispute_reason.json
 */
class ResponseIneligibleDisputeReason implements JsonSerializable
{
    use BaseModel;

    /** The customer did not receive the merchandise or service. */
    const DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';

    /** The customer reports that the merchandise or service is not as described. */
    const DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';

    /** The customer did not authorize purchase of the merchandise or service. */
    const DISPUTE_REASON_UNAUTHORISED = 'UNAUTHORISED';

    /** The refund or credit was not processed for the customer. */
    const DISPUTE_REASON_CREDIT_NOT_PROCESSED = 'CREDIT_NOT_PROCESSED';

    /** The transaction was a duplicate. */
    const DISPUTE_REASON_DUPLICATE_TRANSACTION = 'DUPLICATE_TRANSACTION';

    /** The customer was charged an incorrect amount. */
    const DISPUTE_REASON_INCORRECT_AMOUNT = 'INCORRECT_AMOUNT';

    /** The customer paid for the transaction through other means. */
    const DISPUTE_REASON_PAYMENT_BY_OTHER_MEANS = 'PAYMENT_BY_OTHER_MEANS';

    /** The customer was being charged for a subscription or a recurring transaction that was canceled. */
    const DISPUTE_REASON_CANCELED_RECURRING_BILLING = 'CANCELED_RECURRING_BILLING';

    /** A problem occurred with the remittance. */
    const DISPUTE_REASON_PROBLEM_WITH_REMITTANCE = 'PROBLEM_WITH_REMITTANCE';

    /** Other. */
    const DISPUTE_REASON_OTHER = 'OTHER';

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
     * The reason that the dispute cannot be created.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $ineligibility_reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->dispute_reason) || Assert::minLength(
            $this->dispute_reason,
            1,
            "dispute_reason in ResponseIneligibleDisputeReason must have minlength of 1 $within"
        );
        !isset($this->dispute_reason) || Assert::maxLength(
            $this->dispute_reason,
            255,
            "dispute_reason in ResponseIneligibleDisputeReason must have maxlength of 255 $within"
        );
        !isset($this->ineligibility_reason) || Assert::minLength(
            $this->ineligibility_reason,
            1,
            "ineligibility_reason in ResponseIneligibleDisputeReason must have minlength of 1 $within"
        );
        !isset($this->ineligibility_reason) || Assert::maxLength(
            $this->ineligibility_reason,
            2000,
            "ineligibility_reason in ResponseIneligibleDisputeReason must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['dispute_reason'])) {
            $this->dispute_reason = $data['dispute_reason'];
        }
        if (isset($data['ineligibility_reason'])) {
            $this->ineligibility_reason = $data['ineligibility_reason'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
