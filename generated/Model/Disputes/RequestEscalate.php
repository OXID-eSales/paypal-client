<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A merchant request to escalate a dispute, by ID, to a PayPal claim.
 *
 * generated from: request-escalate.json
 */
class RequestEscalate implements JsonSerializable
{
    use BaseModel;

    /** The merchant indicates that shipment would have arrived by now. */
    public const BUYER_ESCALATION_REASON_SHIPMENT_NOT_ARRIVED = 'SHIPMENT_NOT_ARRIVED';

    /** The customer has evidence that the merchant might be fraudulent. */
    public const BUYER_ESCALATION_REASON_FRAUDULENT_SELLER = 'FRAUDULENT_SELLER';

    /** The customer already failed to reach a resolution with the merchant before filing this dispute. */
    public const BUYER_ESCALATION_REASON_FAILED_NEGOTIATION = 'FAILED_NEGOTIATION';

    /** The customer thinks he or she cannot reach a resolution with the merchant. */
    public const BUYER_ESCALATION_REASON_INCONCLUSIVE_NEGOTIATION = 'INCONCLUSIVE_NEGOTIATION';

    /** The customer didn't receive refund as mentioned by merchant. */
    public const BUYER_ESCALATION_REASON_REFUND_NOT_RECEIVED = 'REFUND_NOT_RECEIVED';

    /** The customer received lesser refund amount than expected. */
    public const BUYER_ESCALATION_REASON_REFUND_AMOUNT_IS_DIFFERENT = 'REFUND_AMOUNT_IS_DIFFERENT';

    /** Tracking id received from merchant is invalid. */
    public const BUYER_ESCALATION_REASON_TRACKING_ID_INVALID = 'TRACKING_ID_INVALID';

    /** The customer has other reasons, which are described in the comments. If OTHER is specified, customer needs to specify more information in the notes field. */
    public const BUYER_ESCALATION_REASON_OTHER = 'OTHER';

    /**
     * The notes about the escalation of the dispute to a claim.
     *
     * @var string
     * minLength: 1
     * maxLength: 2000
     */
    public $note;

    /**
     * The customer's reason for escalation.
     *
     * use one of constants defined in this class to set the value:
     * @see BUYER_ESCALATION_REASON_SHIPMENT_NOT_ARRIVED
     * @see BUYER_ESCALATION_REASON_FRAUDULENT_SELLER
     * @see BUYER_ESCALATION_REASON_FAILED_NEGOTIATION
     * @see BUYER_ESCALATION_REASON_INCONCLUSIVE_NEGOTIATION
     * @see BUYER_ESCALATION_REASON_REFUND_NOT_RECEIVED
     * @see BUYER_ESCALATION_REASON_REFUND_AMOUNT_IS_DIFFERENT
     * @see BUYER_ESCALATION_REASON_TRACKING_ID_INVALID
     * @see BUYER_ESCALATION_REASON_OTHER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $buyer_escalation_reason;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $buyer_requested_amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->note, "note in RequestEscalate must not be NULL $within");
        Assert::minLength(
            $this->note,
            1,
            "note in RequestEscalate must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->note,
            2000,
            "note in RequestEscalate must have maxlength of 2000 $within"
        );
        !isset($this->buyer_escalation_reason) || Assert::minLength(
            $this->buyer_escalation_reason,
            1,
            "buyer_escalation_reason in RequestEscalate must have minlength of 1 $within"
        );
        !isset($this->buyer_escalation_reason) || Assert::maxLength(
            $this->buyer_escalation_reason,
            255,
            "buyer_escalation_reason in RequestEscalate must have maxlength of 255 $within"
        );
        !isset($this->buyer_requested_amount) || Assert::isInstanceOf(
            $this->buyer_requested_amount,
            Money::class,
            "buyer_requested_amount in RequestEscalate must be instance of Money $within"
        );
        !isset($this->buyer_requested_amount) ||  $this->buyer_requested_amount->validate(RequestEscalate::class);
    }

    private function map(array $data)
    {
        if (isset($data['note'])) {
            $this->note = $data['note'];
        }
        if (isset($data['buyer_escalation_reason'])) {
            $this->buyer_escalation_reason = $data['buyer_escalation_reason'];
        }
        if (isset($data['buyer_requested_amount'])) {
            $this->buyer_requested_amount = new Money($data['buyer_requested_amount']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initBuyerRequestedAmount(): Money
    {
        return $this->buyer_requested_amount = new Money();
    }
}
