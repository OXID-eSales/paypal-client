<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The dispute details.
 *
 * generated from: referred-referred_dispute_summary.json
 */
class ReferredReferredDisputeSummary implements JsonSerializable
{
    use BaseModel;

    /** The customer did not receive the merchandise or service. */
    public const REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';

    /** The customer reports that the merchandise or service is not as described. */
    public const REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';

    /** The dispute is open. */
    public const STATUS_OPEN = 'OPEN';

    /** The dispute is resolved. */
    public const STATUS_CLOSED = 'CLOSED';

    /** A third-party claim. The dispute requires custom handling. */
    public const DISPUTE_FLOW_THIRD_PARTY_CLAIM = 'THIRD_PARTY_CLAIM';

    /** A third-party dispute. The dispute does not require any special handling. Defaults to default procedures. */
    public const DISPUTE_FLOW_THIRD_PARTY_DISPUTE = 'THIRD_PARTY_DISPUTE';

    /**
     * The ID of the PayPal-side dispute.
     *
     * @var string | null
     * minLength: 6
     * maxLength: 20
     */
    public $dispute_id;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $update_time;

    /**
     * The details about the partner disputes.
     *
     * @var ReferredReferenceDispute[] | null
     */
    public $reference_disputes;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $dispute_amount;

    /**
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     *
     * use one of constants defined in this class to set the value:
     * @see REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED
     * @see REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $reason;

    /**
     * The dispute status.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_OPEN
     * @see STATUS_CLOSED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $status;

    /**
     * The dispute flow name.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_FLOW_THIRD_PARTY_CLAIM
     * @see DISPUTE_FLOW_THIRD_PARTY_DISPUTE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_flow;

    /**
     * An array of request-related [HATEOAS links](/docs/api/hateoas-links/).
     *
     * @var array | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->dispute_id) || Assert::minLength(
            $this->dispute_id,
            6,
            "dispute_id in ReferredReferredDisputeSummary must have minlength of 6 $within"
        );
        !isset($this->dispute_id) || Assert::maxLength(
            $this->dispute_id,
            20,
            "dispute_id in ReferredReferredDisputeSummary must have maxlength of 20 $within"
        );
        !isset($this->create_time) || Assert::minLength(
            $this->create_time,
            20,
            "create_time in ReferredReferredDisputeSummary must have minlength of 20 $within"
        );
        !isset($this->create_time) || Assert::maxLength(
            $this->create_time,
            64,
            "create_time in ReferredReferredDisputeSummary must have maxlength of 64 $within"
        );
        !isset($this->update_time) || Assert::minLength(
            $this->update_time,
            20,
            "update_time in ReferredReferredDisputeSummary must have minlength of 20 $within"
        );
        !isset($this->update_time) || Assert::maxLength(
            $this->update_time,
            64,
            "update_time in ReferredReferredDisputeSummary must have maxlength of 64 $within"
        );
        !isset($this->reference_disputes) || Assert::isArray(
            $this->reference_disputes,
            "reference_disputes in ReferredReferredDisputeSummary must be array $within"
        );
        if (isset($this->reference_disputes)) {
            foreach ($this->reference_disputes as $item) {
                $item->validate(ReferredReferredDisputeSummary::class);
            }
        }
        !isset($this->dispute_amount) || Assert::isInstanceOf(
            $this->dispute_amount,
            Money::class,
            "dispute_amount in ReferredReferredDisputeSummary must be instance of Money $within"
        );
        !isset($this->dispute_amount) ||  $this->dispute_amount->validate(ReferredReferredDisputeSummary::class);
        !isset($this->reason) || Assert::minLength(
            $this->reason,
            1,
            "reason in ReferredReferredDisputeSummary must have minlength of 1 $within"
        );
        !isset($this->reason) || Assert::maxLength(
            $this->reason,
            255,
            "reason in ReferredReferredDisputeSummary must have maxlength of 255 $within"
        );
        !isset($this->status) || Assert::minLength(
            $this->status,
            1,
            "status in ReferredReferredDisputeSummary must have minlength of 1 $within"
        );
        !isset($this->status) || Assert::maxLength(
            $this->status,
            255,
            "status in ReferredReferredDisputeSummary must have maxlength of 255 $within"
        );
        !isset($this->dispute_flow) || Assert::minLength(
            $this->dispute_flow,
            1,
            "dispute_flow in ReferredReferredDisputeSummary must have minlength of 1 $within"
        );
        !isset($this->dispute_flow) || Assert::maxLength(
            $this->dispute_flow,
            255,
            "dispute_flow in ReferredReferredDisputeSummary must have maxlength of 255 $within"
        );
        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in ReferredReferredDisputeSummary must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['dispute_id'])) {
            $this->dispute_id = $data['dispute_id'];
        }
        if (isset($data['create_time'])) {
            $this->create_time = $data['create_time'];
        }
        if (isset($data['update_time'])) {
            $this->update_time = $data['update_time'];
        }
        if (isset($data['reference_disputes'])) {
            $this->reference_disputes = [];
            foreach ($data['reference_disputes'] as $item) {
                $this->reference_disputes[] = new ReferredReferenceDispute($item);
            }
        }
        if (isset($data['dispute_amount'])) {
            $this->dispute_amount = new Money($data['dispute_amount']);
        }
        if (isset($data['reason'])) {
            $this->reason = $data['reason'];
        }
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['dispute_flow'])) {
            $this->dispute_flow = $data['dispute_flow'];
        }
        if (isset($data['links'])) {
            $this->links = [];
            foreach ($data['links'] as $item) {
                $this->links[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initDisputeAmount(): Money
    {
        return $this->dispute_amount = new Money();
    }
}
