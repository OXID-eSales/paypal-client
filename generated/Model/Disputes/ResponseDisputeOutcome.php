<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The outcome of a dispute.
 *
 * generated from: response-dispute_outcome.json
 */
class ResponseDisputeOutcome implements JsonSerializable
{
    use BaseModel;

    /** The dispute was resolved in the customer's favor. */
    const OUTCOME_CODE_RESOLVED_BUYER_FAVOUR = 'RESOLVED_BUYER_FAVOUR';

    /** The dispute was resolved in the merchant's favor. */
    const OUTCOME_CODE_RESOLVED_SELLER_FAVOUR = 'RESOLVED_SELLER_FAVOUR';

    /** PayPal provided the merchant or customer with protection and the case is resolved. */
    const OUTCOME_CODE_RESOLVED_WITH_PAYOUT = 'RESOLVED_WITH_PAYOUT';

    /** The customer canceled the dispute. */
    const OUTCOME_CODE_CANCELED_BY_BUYER = 'CANCELED_BY_BUYER';

    /** DEPRECATED. PayPal accepted the dispute. */
    const OUTCOME_CODE_ACCEPTED = 'ACCEPTED';

    /** DEPRECATED. PayPal denied the dispute. */
    const OUTCOME_CODE_DENIED = 'DENIED';

    /** A dispute was created for the same transaction ID, and the previous dispute was closed without any decision. */
    const OUTCOME_CODE_NONE = 'NONE';

    /**
     * The outcome of a resolved dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see OUTCOME_CODE_RESOLVED_BUYER_FAVOUR
     * @see OUTCOME_CODE_RESOLVED_SELLER_FAVOUR
     * @see OUTCOME_CODE_RESOLVED_WITH_PAYOUT
     * @see OUTCOME_CODE_CANCELED_BY_BUYER
     * @see OUTCOME_CODE_ACCEPTED
     * @see OUTCOME_CODE_DENIED
     * @see OUTCOME_CODE_NONE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $outcome_code;

    /**
     * The justification for the adjudication outcome.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $outcome_reason;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount_refunded;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->outcome_code) || Assert::minLength(
            $this->outcome_code,
            1,
            "outcome_code in ResponseDisputeOutcome must have minlength of 1 $within"
        );
        !isset($this->outcome_code) || Assert::maxLength(
            $this->outcome_code,
            255,
            "outcome_code in ResponseDisputeOutcome must have maxlength of 255 $within"
        );
        !isset($this->outcome_reason) || Assert::minLength(
            $this->outcome_reason,
            1,
            "outcome_reason in ResponseDisputeOutcome must have minlength of 1 $within"
        );
        !isset($this->outcome_reason) || Assert::maxLength(
            $this->outcome_reason,
            2000,
            "outcome_reason in ResponseDisputeOutcome must have maxlength of 2000 $within"
        );
        !isset($this->amount_refunded) || Assert::isInstanceOf(
            $this->amount_refunded,
            Money::class,
            "amount_refunded in ResponseDisputeOutcome must be instance of Money $within"
        );
        !isset($this->amount_refunded) ||  $this->amount_refunded->validate(ResponseDisputeOutcome::class);
    }

    private function map(array $data)
    {
        if (isset($data['outcome_code'])) {
            $this->outcome_code = $data['outcome_code'];
        }
        if (isset($data['outcome_reason'])) {
            $this->outcome_reason = $data['outcome_reason'];
        }
        if (isset($data['amount_refunded'])) {
            $this->amount_refunded = new Money($data['amount_refunded']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAmountRefunded(): Money
    {
        return $this->amount_refunded = new Money();
    }
}
