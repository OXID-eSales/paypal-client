<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The dispute event details.
 *
 * generated from: event-dispute_event.json
 */
class EventDisputeEvent implements JsonSerializable
{
    use BaseModel;

    /** The customer did not receive the merchandise or service. */
    public const REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';

    /** The customer reports that the merchandise or service is not as described. */
    public const REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';

    /** The customer did not authorize purchase of the merchandise or service. */
    public const REASON_UNAUTHORISED = 'UNAUTHORISED';

    /** The refund or credit was not processed for the customer. */
    public const REASON_CREDIT_NOT_PROCESSED = 'CREDIT_NOT_PROCESSED';

    /** The transaction was a duplicate. */
    public const REASON_DUPLICATE_TRANSACTION = 'DUPLICATE_TRANSACTION';

    /** The customer was charged an incorrect amount. */
    public const REASON_INCORRECT_AMOUNT = 'INCORRECT_AMOUNT';

    /** The customer paid for the transaction through other means. */
    public const REASON_PAYMENT_BY_OTHER_MEANS = 'PAYMENT_BY_OTHER_MEANS';

    /** The customer was being charged for a subscription or a recurring transaction that was canceled. */
    public const REASON_CANCELED_RECURRING_BILLING = 'CANCELED_RECURRING_BILLING';

    /** A problem occurred with the remittance. */
    public const REASON_PROBLEM_WITH_REMITTANCE = 'PROBLEM_WITH_REMITTANCE';

    /** Other. */
    public const REASON_OTHER = 'OTHER';

    /** A customer and merchant interact in an attempt to resolve a dispute without escalation to PayPal. Occurs when the customer:<ul><li>Has not received goods or a service.</li><li>Reports that the received goods or service are not as described.</li><li>Needs more details, such as a copy of the transaction or a receipt.</li></ul> */
    public const DISPUTE_LIFE_CYCLE_STAGE_INQUIRY = 'INQUIRY';

    /** A customer or merchant escalates an inquiry to a claim, which authorizes PayPal to investigate the case and make a determination. Occurs only when the dispute channel is <code>INTERNAL</code>. This stage is a PayPal dispute lifecycle stage and not a credit card or debit card chargeback. All notes that the customer sends in this stage are visible to PayPal agents only. The customer must wait for PayPal’s response before the customer can take further action. In this stage, PayPal shares dispute details with the merchant, who can complete one of these actions:<ul><li>Accept the claim.</li><li>Submit evidence to challenge the claim.</li><li>Make an offer to the customer to resolve the claim.</li></ul> */
    public const DISPUTE_LIFE_CYCLE_STAGE_CHARGEBACK = 'CHARGEBACK';

    /** The first appeal stage for merchants. A merchant can appeal a chargeback if PayPal's decision is not in the merchant's favor. If the merchant does not appeal within the appeal period, PayPal considers the case resolved. */
    public const DISPUTE_LIFE_CYCLE_STAGE_PRE_ARBITRATION = 'PRE_ARBITRATION';

    /** The second appeal stage for merchants. A merchant can appeal a dispute for a second time if the first appeal was denied. If the merchant does not appeal within the appeal period, the case returns to a resolved status in pre-arbitration stage. */
    public const DISPUTE_LIFE_CYCLE_STAGE_ARBITRATION = 'ARBITRATION';

    /** The customer contacts PayPal to file a dispute with the merchant. */
    public const DISPUTE_CHANNEL_INTERNAL = 'INTERNAL';

    /** The customer contacts their card issuer or bank to request a refund. */
    public const DISPUTE_CHANNEL_EXTERNAL = 'EXTERNAL';

    /** The Resolution center channel. */
    public const EVENT_CHANNEL_RESOLUTION_CENTER = 'RESOLUTION_CENTER';

    /** The Front office teammates channel. */
    public const EVENT_CHANNEL_FRONT_OFFICE = 'FRONT_OFFICE';

    /** The Back office teammates channel. */
    public const EVENT_CHANNEL_BACK_OFFICE = 'BACK_OFFICE';

    /** The customer relationship management tool channel. */
    public const EVENT_CHANNEL_CRM_TOOL = 'CRM_TOOL';

    /**
     * The ID of the dispute.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_id;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount;

    /**
     * The notes associated with the event.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $notes;

    /**
     * An array of transactions for which disputes were created.
     *
     * @var EventTxnInfo[]
     * maxItems: 1
     * maxItems: 50
     */
    public $disputed_transactions;

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
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     *
     * use one of constants defined in this class to set the value:
     * @see REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED
     * @see REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED
     * @see REASON_UNAUTHORISED
     * @see REASON_CREDIT_NOT_PROCESSED
     * @see REASON_DUPLICATE_TRANSACTION
     * @see REASON_INCORRECT_AMOUNT
     * @see REASON_PAYMENT_BY_OTHER_MEANS
     * @see REASON_CANCELED_RECURRING_BILLING
     * @see REASON_PROBLEM_WITH_REMITTANCE
     * @see REASON_OTHER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $reason;

    /**
     * The code that identifies the reason for the credit card chargeback. Each card issuer follows their own
     * standards for defining reason type, code, and its format. For more details about the external reason code, see
     * the card issue site. Available for only unbranded transactions.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $external_reason_code;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $response_due_date;

    /**
     * The outcome of a dispute.
     *
     * @var ResponseDisputeOutcome | null
     */
    public $dispute_outcome;

    /**
     * The stage in the dispute lifecycle.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_LIFE_CYCLE_STAGE_INQUIRY
     * @see DISPUTE_LIFE_CYCLE_STAGE_CHARGEBACK
     * @see DISPUTE_LIFE_CYCLE_STAGE_PRE_ARBITRATION
     * @see DISPUTE_LIFE_CYCLE_STAGE_ARBITRATION
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_life_cycle_stage;

    /**
     * The channel where the customer created the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_CHANNEL_INTERNAL
     * @see DISPUTE_CHANNEL_EXTERNAL
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_channel;

    /**
     * The extended properties for the dispute. Includes additional information for a dispute category, such as
     * billing disputes, the original transaction ID, and the correct amount.
     *
     * @var ResponseExtensions | null
     */
    public $dispute_extensions;

    /**
     * The extended properties for the event. Includes additional information for a dispute event, such as
     * accept-claim event, the accept claim type and reason.
     *
     * @var EventEventExtensions | null
     */
    public $event_extensions;

    /**
     * The channel through which the dispute event was triggered in the source.
     *
     * use one of constants defined in this class to set the value:
     * @see EVENT_CHANNEL_RESOLUTION_CENTER
     * @see EVENT_CHANNEL_FRONT_OFFICE
     * @see EVENT_CHANNEL_BACK_OFFICE
     * @see EVENT_CHANNEL_CRM_TOOL
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $event_channel;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->dispute_id) || Assert::minLength(
            $this->dispute_id,
            1,
            "dispute_id in EventDisputeEvent must have minlength of 1 $within"
        );
        !isset($this->dispute_id) || Assert::maxLength(
            $this->dispute_id,
            255,
            "dispute_id in EventDisputeEvent must have maxlength of 255 $within"
        );
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in EventDisputeEvent must be instance of Money $within"
        );
        !isset($this->amount) ||  $this->amount->validate(EventDisputeEvent::class);
        !isset($this->notes) || Assert::minLength(
            $this->notes,
            1,
            "notes in EventDisputeEvent must have minlength of 1 $within"
        );
        !isset($this->notes) || Assert::maxLength(
            $this->notes,
            2000,
            "notes in EventDisputeEvent must have maxlength of 2000 $within"
        );
        Assert::notNull($this->disputed_transactions, "disputed_transactions in EventDisputeEvent must not be NULL $within");
        Assert::minCount(
            $this->disputed_transactions,
            1,
            "disputed_transactions in EventDisputeEvent must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->disputed_transactions,
            50,
            "disputed_transactions in EventDisputeEvent must have max. count of 50 $within"
        );
        Assert::isArray(
            $this->disputed_transactions,
            "disputed_transactions in EventDisputeEvent must be array $within"
        );
        if (isset($this->disputed_transactions)) {
            foreach ($this->disputed_transactions as $item) {
                $item->validate(EventDisputeEvent::class);
            }
        }
        !isset($this->create_time) || Assert::minLength(
            $this->create_time,
            20,
            "create_time in EventDisputeEvent must have minlength of 20 $within"
        );
        !isset($this->create_time) || Assert::maxLength(
            $this->create_time,
            64,
            "create_time in EventDisputeEvent must have maxlength of 64 $within"
        );
        !isset($this->reason) || Assert::minLength(
            $this->reason,
            1,
            "reason in EventDisputeEvent must have minlength of 1 $within"
        );
        !isset($this->reason) || Assert::maxLength(
            $this->reason,
            255,
            "reason in EventDisputeEvent must have maxlength of 255 $within"
        );
        !isset($this->external_reason_code) || Assert::minLength(
            $this->external_reason_code,
            1,
            "external_reason_code in EventDisputeEvent must have minlength of 1 $within"
        );
        !isset($this->external_reason_code) || Assert::maxLength(
            $this->external_reason_code,
            2000,
            "external_reason_code in EventDisputeEvent must have maxlength of 2000 $within"
        );
        !isset($this->response_due_date) || Assert::minLength(
            $this->response_due_date,
            20,
            "response_due_date in EventDisputeEvent must have minlength of 20 $within"
        );
        !isset($this->response_due_date) || Assert::maxLength(
            $this->response_due_date,
            64,
            "response_due_date in EventDisputeEvent must have maxlength of 64 $within"
        );
        !isset($this->dispute_outcome) || Assert::isInstanceOf(
            $this->dispute_outcome,
            ResponseDisputeOutcome::class,
            "dispute_outcome in EventDisputeEvent must be instance of ResponseDisputeOutcome $within"
        );
        !isset($this->dispute_outcome) ||  $this->dispute_outcome->validate(EventDisputeEvent::class);
        !isset($this->dispute_life_cycle_stage) || Assert::minLength(
            $this->dispute_life_cycle_stage,
            1,
            "dispute_life_cycle_stage in EventDisputeEvent must have minlength of 1 $within"
        );
        !isset($this->dispute_life_cycle_stage) || Assert::maxLength(
            $this->dispute_life_cycle_stage,
            255,
            "dispute_life_cycle_stage in EventDisputeEvent must have maxlength of 255 $within"
        );
        !isset($this->dispute_channel) || Assert::minLength(
            $this->dispute_channel,
            1,
            "dispute_channel in EventDisputeEvent must have minlength of 1 $within"
        );
        !isset($this->dispute_channel) || Assert::maxLength(
            $this->dispute_channel,
            255,
            "dispute_channel in EventDisputeEvent must have maxlength of 255 $within"
        );
        !isset($this->dispute_extensions) || Assert::isInstanceOf(
            $this->dispute_extensions,
            ResponseExtensions::class,
            "dispute_extensions in EventDisputeEvent must be instance of ResponseExtensions $within"
        );
        !isset($this->dispute_extensions) ||  $this->dispute_extensions->validate(EventDisputeEvent::class);
        !isset($this->event_extensions) || Assert::isInstanceOf(
            $this->event_extensions,
            EventEventExtensions::class,
            "event_extensions in EventDisputeEvent must be instance of EventEventExtensions $within"
        );
        !isset($this->event_extensions) ||  $this->event_extensions->validate(EventDisputeEvent::class);
        !isset($this->event_channel) || Assert::minLength(
            $this->event_channel,
            1,
            "event_channel in EventDisputeEvent must have minlength of 1 $within"
        );
        !isset($this->event_channel) || Assert::maxLength(
            $this->event_channel,
            255,
            "event_channel in EventDisputeEvent must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['dispute_id'])) {
            $this->dispute_id = $data['dispute_id'];
        }
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
        }
        if (isset($data['notes'])) {
            $this->notes = $data['notes'];
        }
        if (isset($data['disputed_transactions'])) {
            $this->disputed_transactions = [];
            foreach ($data['disputed_transactions'] as $item) {
                $this->disputed_transactions[] = new EventTxnInfo($item);
            }
        }
        if (isset($data['create_time'])) {
            $this->create_time = $data['create_time'];
        }
        if (isset($data['reason'])) {
            $this->reason = $data['reason'];
        }
        if (isset($data['external_reason_code'])) {
            $this->external_reason_code = $data['external_reason_code'];
        }
        if (isset($data['response_due_date'])) {
            $this->response_due_date = $data['response_due_date'];
        }
        if (isset($data['dispute_outcome'])) {
            $this->dispute_outcome = new ResponseDisputeOutcome($data['dispute_outcome']);
        }
        if (isset($data['dispute_life_cycle_stage'])) {
            $this->dispute_life_cycle_stage = $data['dispute_life_cycle_stage'];
        }
        if (isset($data['dispute_channel'])) {
            $this->dispute_channel = $data['dispute_channel'];
        }
        if (isset($data['dispute_extensions'])) {
            $this->dispute_extensions = new ResponseExtensions($data['dispute_extensions']);
        }
        if (isset($data['event_extensions'])) {
            $this->event_extensions = new EventEventExtensions($data['event_extensions']);
        }
        if (isset($data['event_channel'])) {
            $this->event_channel = $data['event_channel'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->disputed_transactions = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAmount(): Money
    {
        return $this->amount = new Money();
    }

    public function initDisputeOutcome(): ResponseDisputeOutcome
    {
        return $this->dispute_outcome = new ResponseDisputeOutcome();
    }

    public function initDisputeExtensions(): ResponseExtensions
    {
        return $this->dispute_extensions = new ResponseExtensions();
    }

    public function initEventExtensions(): EventEventExtensions
    {
        return $this->event_extensions = new EventEventExtensions();
    }
}
