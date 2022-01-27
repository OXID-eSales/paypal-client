<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The partner-provided details that were used for adjudication on the partner's side.
 *
 * generated from: referred-referred_adjudication_info.json
 */
class ReferredReferredAdjudicationInfo implements JsonSerializable
{
    use BaseModel;

    /** The customer did not receive the merchandise or service. */
    public const DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';

    /** The customer reports that the merchandise or service is not as described. */
    public const DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $dispute_amount;

    /**
     * An array of items in the transaction that is in dispute.
     *
     * @var ReferredReferredItemInfo[]
     * maxItems: 1
     * maxItems: 1000
     */
    public $items;

    /**
     * The outcome of the dispute case.
     *
     * @var ReferredReferredOutcome | null
     */
    public $outcome;

    /**
     * The extended properties for the dispute. Includes additional information for a dispute category, such as
     * billing disputes, the original transaction ID, correct amount, and so on.
     *
     * @var ReferredReferredExtensions | null
     */
    public $extensions;

    /**
     * An array of partner-submitted evidences, such as tracking information.
     *
     * @var ReferredReferredEvidence[]
     * maxItems: 1
     * maxItems: 100
     */
    public $evidences;

    /**
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED
     * @see DISPUTE_REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_reason;

    /**
     * The reason that the dispute was closed.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $closure_reason;

    /**
     * An array of customer- or merchant-posted messages.
     *
     * @var ReferredReferredMessage[]
     * maxItems: 1
     * maxItems: 1000
     */
    public $messages;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->dispute_amount) || Assert::isInstanceOf(
            $this->dispute_amount,
            Money::class,
            "dispute_amount in ReferredReferredAdjudicationInfo must be instance of Money $within"
        );
        !isset($this->dispute_amount) ||  $this->dispute_amount->validate(ReferredReferredAdjudicationInfo::class);
        Assert::notNull($this->items, "items in ReferredReferredAdjudicationInfo must not be NULL $within");
        Assert::minCount(
            $this->items,
            1,
            "items in ReferredReferredAdjudicationInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->items,
            1000,
            "items in ReferredReferredAdjudicationInfo must have max. count of 1000 $within"
        );
        Assert::isArray(
            $this->items,
            "items in ReferredReferredAdjudicationInfo must be array $within"
        );
        if (isset($this->items)) {
            foreach ($this->items as $item) {
                $item->validate(ReferredReferredAdjudicationInfo::class);
            }
        }
        !isset($this->outcome) || Assert::isInstanceOf(
            $this->outcome,
            ReferredReferredOutcome::class,
            "outcome in ReferredReferredAdjudicationInfo must be instance of ReferredReferredOutcome $within"
        );
        !isset($this->outcome) ||  $this->outcome->validate(ReferredReferredAdjudicationInfo::class);
        !isset($this->extensions) || Assert::isInstanceOf(
            $this->extensions,
            ReferredReferredExtensions::class,
            "extensions in ReferredReferredAdjudicationInfo must be instance of ReferredReferredExtensions $within"
        );
        !isset($this->extensions) ||  $this->extensions->validate(ReferredReferredAdjudicationInfo::class);
        Assert::notNull($this->evidences, "evidences in ReferredReferredAdjudicationInfo must not be NULL $within");
        Assert::minCount(
            $this->evidences,
            1,
            "evidences in ReferredReferredAdjudicationInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->evidences,
            100,
            "evidences in ReferredReferredAdjudicationInfo must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->evidences,
            "evidences in ReferredReferredAdjudicationInfo must be array $within"
        );
        if (isset($this->evidences)) {
            foreach ($this->evidences as $item) {
                $item->validate(ReferredReferredAdjudicationInfo::class);
            }
        }
        !isset($this->dispute_reason) || Assert::minLength(
            $this->dispute_reason,
            1,
            "dispute_reason in ReferredReferredAdjudicationInfo must have minlength of 1 $within"
        );
        !isset($this->dispute_reason) || Assert::maxLength(
            $this->dispute_reason,
            255,
            "dispute_reason in ReferredReferredAdjudicationInfo must have maxlength of 255 $within"
        );
        !isset($this->closure_reason) || Assert::minLength(
            $this->closure_reason,
            1,
            "closure_reason in ReferredReferredAdjudicationInfo must have minlength of 1 $within"
        );
        !isset($this->closure_reason) || Assert::maxLength(
            $this->closure_reason,
            2000,
            "closure_reason in ReferredReferredAdjudicationInfo must have maxlength of 2000 $within"
        );
        Assert::notNull($this->messages, "messages in ReferredReferredAdjudicationInfo must not be NULL $within");
        Assert::minCount(
            $this->messages,
            1,
            "messages in ReferredReferredAdjudicationInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->messages,
            1000,
            "messages in ReferredReferredAdjudicationInfo must have max. count of 1000 $within"
        );
        Assert::isArray(
            $this->messages,
            "messages in ReferredReferredAdjudicationInfo must be array $within"
        );
        if (isset($this->messages)) {
            foreach ($this->messages as $item) {
                $item->validate(ReferredReferredAdjudicationInfo::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['dispute_amount'])) {
            $this->dispute_amount = new Money($data['dispute_amount']);
        }
        if (isset($data['items'])) {
            $this->items = [];
            foreach ($data['items'] as $item) {
                $this->items[] = new ReferredReferredItemInfo($item);
            }
        }
        if (isset($data['outcome'])) {
            $this->outcome = new ReferredReferredOutcome($data['outcome']);
        }
        if (isset($data['extensions'])) {
            $this->extensions = new ReferredReferredExtensions($data['extensions']);
        }
        if (isset($data['evidences'])) {
            $this->evidences = [];
            foreach ($data['evidences'] as $item) {
                $this->evidences[] = new ReferredReferredEvidence($item);
            }
        }
        if (isset($data['dispute_reason'])) {
            $this->dispute_reason = $data['dispute_reason'];
        }
        if (isset($data['closure_reason'])) {
            $this->closure_reason = $data['closure_reason'];
        }
        if (isset($data['messages'])) {
            $this->messages = [];
            foreach ($data['messages'] as $item) {
                $this->messages[] = new ReferredReferredMessage($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->items = [];
        $this->evidences = [];
        $this->messages = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initDisputeAmount(): Money
    {
        return $this->dispute_amount = new Money();
    }

    public function initOutcome(): ReferredReferredOutcome
    {
        return $this->outcome = new ReferredReferredOutcome();
    }

    public function initExtensions(): ReferredReferredExtensions
    {
        return $this->extensions = new ReferredReferredExtensions();
    }
}
