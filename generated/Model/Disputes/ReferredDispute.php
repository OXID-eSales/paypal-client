<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The dispute details.
 *
 * generated from: referred-dispute.json
 */
class ReferredDispute implements JsonSerializable
{
    use BaseModel;

    /** Third-party claim information that the dispute requires custom handling. */
    public const DISPUTE_FLOW_THIRD_PARTY_CLAIM = 'THIRD_PARTY_CLAIM';

    /** Third-party claim information that the dispute does not require any special handling. Defaults to default procedures. */
    public const DISPUTE_FLOW_THIRD_PARTY_DISPUTE = 'THIRD_PARTY_DISPUTE';

    /** The customer did not receive the merchandise or service. */
    public const REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';

    /** The customer reports that the merchandise or service is not as described. */
    public const REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';

    /** The order is incomplete. It has missing parts or an incorrect quantity. */
    public const SUB_REASON_INCOMPLETE_ORDER = 'INCOMPLETE_ORDER';

    /** The goods are damaged. */
    public const SUB_REASON_DAMAGED = 'DAMAGED';

    /** The item is fake. */
    public const SUB_REASON_FAKE = 'FAKE';

    /** The item is materially different. It is a different item, the wrong size or model,the wrong color, or used instead of new. */
    public const SUB_REASON_MATERIALLY_DIFFERENT = 'MATERIALLY_DIFFERENT';

    /** The item is unusable or ruined. */
    public const SUB_REASON_UNUSABLE = 'UNUSABLE';

    /** The surcharge is incorrect. */
    public const SUB_REASON_EXCESSIVE_SURCHARGE = 'EXCESSIVE_SURCHARGE';

    /** The dispute is open. */
    public const STATUS_OPEN = 'OPEN';

    /** The dispute is resolved. */
    public const STATUS_CLOSED = 'CLOSED';

    /**
     * The ID of the PayPal-side dispute.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $id;

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
     * The flow ID for the dispute being created.
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
     * The details about the partner disputes.
     *
     * @var ReferredReferenceDispute[] | null
     */
    public $reference_disputes;

    /**
     * The transaction for which to create a case.
     *
     * @var ReferredTransaction | null
     */
    public $transaction;

    /**
     * The extended properties for the dispute. Includes additional information for a dispute category, such as
     * billing disputes, the original transaction ID, correct amount, and so on.
     *
     * @var ReferredExtensions | null
     */
    public $extensions;

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
     * The dispute sub-reason.
     *
     * use one of constants defined in this class to set the value:
     * @see SUB_REASON_INCOMPLETE_ORDER
     * @see SUB_REASON_DAMAGED
     * @see SUB_REASON_FAKE
     * @see SUB_REASON_MATERIALLY_DIFFERENT
     * @see SUB_REASON_UNUSABLE
     * @see SUB_REASON_EXCESSIVE_SURCHARGE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $sub_reason;

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
     * The partner-submitted evidence documents, such as tracking information.
     *
     * @var ReferredEvidence[] | null
     */
    public $evidences;

    /**
     * The payout details for the referred dispute.
     *
     * @var ReferredRefundInfo | null
     */
    public $refund_info;

    /**
     * The outcome of the dispute case.
     *
     * @var ReferredOutcome | null
     */
    public $outcome;

    /**
     * An array of customer- or merchant-posted messages.
     *
     * @var ReferredMessage[] | null
     */
    public $messages;

    /**
     * An array of request-related [HATEOAS links](/docs/api/hateoas-links/).
     *
     * @var array | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in ReferredDispute must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            255,
            "id in ReferredDispute must have maxlength of 255 $within"
        );
        !isset($this->create_time) || Assert::minLength(
            $this->create_time,
            20,
            "create_time in ReferredDispute must have minlength of 20 $within"
        );
        !isset($this->create_time) || Assert::maxLength(
            $this->create_time,
            64,
            "create_time in ReferredDispute must have maxlength of 64 $within"
        );
        !isset($this->update_time) || Assert::minLength(
            $this->update_time,
            20,
            "update_time in ReferredDispute must have minlength of 20 $within"
        );
        !isset($this->update_time) || Assert::maxLength(
            $this->update_time,
            64,
            "update_time in ReferredDispute must have maxlength of 64 $within"
        );
        !isset($this->dispute_flow) || Assert::minLength(
            $this->dispute_flow,
            1,
            "dispute_flow in ReferredDispute must have minlength of 1 $within"
        );
        !isset($this->dispute_flow) || Assert::maxLength(
            $this->dispute_flow,
            255,
            "dispute_flow in ReferredDispute must have maxlength of 255 $within"
        );
        !isset($this->reference_disputes) || Assert::isArray(
            $this->reference_disputes,
            "reference_disputes in ReferredDispute must be array $within"
        );
        if (isset($this->reference_disputes)) {
            foreach ($this->reference_disputes as $item) {
                $item->validate(ReferredDispute::class);
            }
        }
        !isset($this->transaction) || Assert::isInstanceOf(
            $this->transaction,
            ReferredTransaction::class,
            "transaction in ReferredDispute must be instance of ReferredTransaction $within"
        );
        !isset($this->transaction) ||  $this->transaction->validate(ReferredDispute::class);
        !isset($this->extensions) || Assert::isInstanceOf(
            $this->extensions,
            ReferredExtensions::class,
            "extensions in ReferredDispute must be instance of ReferredExtensions $within"
        );
        !isset($this->extensions) ||  $this->extensions->validate(ReferredDispute::class);
        !isset($this->reason) || Assert::minLength(
            $this->reason,
            1,
            "reason in ReferredDispute must have minlength of 1 $within"
        );
        !isset($this->reason) || Assert::maxLength(
            $this->reason,
            255,
            "reason in ReferredDispute must have maxlength of 255 $within"
        );
        !isset($this->sub_reason) || Assert::minLength(
            $this->sub_reason,
            1,
            "sub_reason in ReferredDispute must have minlength of 1 $within"
        );
        !isset($this->sub_reason) || Assert::maxLength(
            $this->sub_reason,
            255,
            "sub_reason in ReferredDispute must have maxlength of 255 $within"
        );
        !isset($this->status) || Assert::minLength(
            $this->status,
            1,
            "status in ReferredDispute must have minlength of 1 $within"
        );
        !isset($this->status) || Assert::maxLength(
            $this->status,
            255,
            "status in ReferredDispute must have maxlength of 255 $within"
        );
        !isset($this->evidences) || Assert::isArray(
            $this->evidences,
            "evidences in ReferredDispute must be array $within"
        );
        if (isset($this->evidences)) {
            foreach ($this->evidences as $item) {
                $item->validate(ReferredDispute::class);
            }
        }
        !isset($this->refund_info) || Assert::isInstanceOf(
            $this->refund_info,
            ReferredRefundInfo::class,
            "refund_info in ReferredDispute must be instance of ReferredRefundInfo $within"
        );
        !isset($this->refund_info) ||  $this->refund_info->validate(ReferredDispute::class);
        !isset($this->outcome) || Assert::isInstanceOf(
            $this->outcome,
            ReferredOutcome::class,
            "outcome in ReferredDispute must be instance of ReferredOutcome $within"
        );
        !isset($this->outcome) ||  $this->outcome->validate(ReferredDispute::class);
        !isset($this->messages) || Assert::isArray(
            $this->messages,
            "messages in ReferredDispute must be array $within"
        );
        if (isset($this->messages)) {
            foreach ($this->messages as $item) {
                $item->validate(ReferredDispute::class);
            }
        }
        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in ReferredDispute must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['create_time'])) {
            $this->create_time = $data['create_time'];
        }
        if (isset($data['update_time'])) {
            $this->update_time = $data['update_time'];
        }
        if (isset($data['dispute_flow'])) {
            $this->dispute_flow = $data['dispute_flow'];
        }
        if (isset($data['reference_disputes'])) {
            $this->reference_disputes = [];
            foreach ($data['reference_disputes'] as $item) {
                $this->reference_disputes[] = new ReferredReferenceDispute($item);
            }
        }
        if (isset($data['transaction'])) {
            $this->transaction = new ReferredTransaction($data['transaction']);
        }
        if (isset($data['extensions'])) {
            $this->extensions = new ReferredExtensions($data['extensions']);
        }
        if (isset($data['reason'])) {
            $this->reason = $data['reason'];
        }
        if (isset($data['sub_reason'])) {
            $this->sub_reason = $data['sub_reason'];
        }
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['evidences'])) {
            $this->evidences = [];
            foreach ($data['evidences'] as $item) {
                $this->evidences[] = new ReferredEvidence($item);
            }
        }
        if (isset($data['refund_info'])) {
            $this->refund_info = new ReferredRefundInfo($data['refund_info']);
        }
        if (isset($data['outcome'])) {
            $this->outcome = new ReferredOutcome($data['outcome']);
        }
        if (isset($data['messages'])) {
            $this->messages = [];
            foreach ($data['messages'] as $item) {
                $this->messages[] = new ReferredMessage($item);
            }
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

    public function initTransaction(): ReferredTransaction
    {
        return $this->transaction = new ReferredTransaction();
    }

    public function initExtensions(): ReferredExtensions
    {
        return $this->extensions = new ReferredExtensions();
    }

    public function initRefundInfo(): ReferredRefundInfo
    {
        return $this->refund_info = new ReferredRefundInfo();
    }

    public function initOutcome(): ReferredOutcome
    {
        return $this->outcome = new ReferredOutcome();
    }
}
