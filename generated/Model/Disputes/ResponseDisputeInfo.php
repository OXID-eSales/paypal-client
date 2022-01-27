<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The dispute summary information.
 *
 * generated from: response-dispute_info.json
 */
class ResponseDisputeInfo implements JsonSerializable
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

    /** The dispute is open. */
    public const STATUS_OPEN = 'OPEN';

    /** The dispute is waiting for a response from the customer. */
    public const STATUS_WAITING_FOR_BUYER_RESPONSE = 'WAITING_FOR_BUYER_RESPONSE';

    /** The dispute is waiting for a response from the merchant. */
    public const STATUS_WAITING_FOR_SELLER_RESPONSE = 'WAITING_FOR_SELLER_RESPONSE';

    /** The dispute is under review with PayPal. */
    public const STATUS_UNDER_REVIEW = 'UNDER_REVIEW';

    /** The dispute is resolved. */
    public const STATUS_RESOLVED = 'RESOLVED';

    /** The default status if the dispute does not have one of the other statuses. */
    public const STATUS_OTHER = 'OTHER';

    /** The dispute is open. */
    public const DISPUTE_STATE_OPEN_INQUIRIES = 'OPEN_INQUIRIES';

    /** The dispute is waiting for a response. */
    public const DISPUTE_STATE_REQUIRED_ACTION = 'REQUIRED_ACTION';

    /** The dispute is waiting for a response from other party. */
    public const DISPUTE_STATE_REQUIRED_OTHER_PARTY_ACTION = 'REQUIRED_OTHER_PARTY_ACTION';

    /** The dispute is under review with PayPal. */
    public const DISPUTE_STATE_UNDER_PAYPAL_REVIEW = 'UNDER_PAYPAL_REVIEW';

    /** The dispute can be appealed. */
    public const DISPUTE_STATE_APPEALABLE = 'APPEALABLE';

    /** The dispute is resolved. */
    public const DISPUTE_STATE_RESOLVED = 'RESOLVED';

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

    /** ACH returns. */
    public const DISPUTE_FLOW_ACH_RETURNS = 'ACH_RETURNS';

    /** Account issues. */
    public const DISPUTE_FLOW_ACCOUNT_ISSUES = 'ACCOUNT_ISSUES';

    /** Admin fraud reversal. */
    public const DISPUTE_FLOW_ADMIN_FRAUD_REVERSAL = 'ADMIN_FRAUD_REVERSAL';

    /** Billing. */
    public const DISPUTE_FLOW_BILLING = 'BILLING';

    /** Charge back. */
    public const DISPUTE_FLOW_CHARGEBACKS = 'CHARGEBACKS';

    /** Complaint resolution. */
    public const DISPUTE_FLOW_COMPLAINT_RESOLUTION = 'COMPLAINT_RESOLUTION';

    /** Correction. */
    public const DISPUTE_FLOW_CORRECTION = 'CORRECTION';

    /** Debit card charge back. */
    public const DISPUTE_FLOW_DEBIT_CARD_CHARGEBACK = 'DEBIT_CARD_CHARGEBACK';

    /** FAX routing. */
    public const DISPUTE_FLOW_FAX_ROUTING = 'FAX_ROUTING';

    /** MIPS complaint item. */
    public const DISPUTE_FLOW_MIPS_COMPLAINT_ITEM = 'MIPS_COMPLAINT_ITEM';

    /** MIPS complaint. */
    public const DISPUTE_FLOW_MIPS_COMPLAINT = 'MIPS_COMPLAINT';

    /** OPS verification flow. */
    public const DISPUTE_FLOW_OPS_VERIFICATION_FLOW = 'OPS_VERIFICATION_FLOW';

    /** PayPal dispute resolution. */
    public const DISPUTE_FLOW_PAYPAL_DISPUTE_RESOLUTION = 'PAYPAL_DISPUTE_RESOLUTION';

    /** Pin-less debit return. */
    public const DISPUTE_FLOW_PINLESS_DEBIT_RETURN = 'PINLESS_DEBIT_RETURN';

    /** Pricing adjustment. */
    public const DISPUTE_FLOW_PRICING_ADJUSTMENT = 'PRICING_ADJUSTMENT';

    /** Spoof unauthorized child. */
    public const DISPUTE_FLOW_SPOOF_UNAUTH_CHILD = 'SPOOF_UNAUTH_CHILD';

    /** Spoof unauthorized parent. */
    public const DISPUTE_FLOW_SPOOF_UNAUTH_PARENT = 'SPOOF_UNAUTH_PARENT';

    /** Third-party claim. */
    public const DISPUTE_FLOW_THIRD_PARTY_CLAIM = 'THIRD_PARTY_CLAIM';

    /** Third-party dispute. */
    public const DISPUTE_FLOW_THIRD_PARTY_DISPUTE = 'THIRD_PARTY_DISPUTE';

    /** Ticket retrieval. */
    public const DISPUTE_FLOW_TICKET_RETRIEVAL = 'TICKET_RETRIEVAL';

    /** UK Express returns. */
    public const DISPUTE_FLOW_UK_EXPRESS_RETURNS = 'UK_EXPRESS_RETURNS';

    /** Unknown faxes. */
    public const DISPUTE_FLOW_UNKNOWN_FAXES = 'UNKNOWN_FAXES';

    /** Vetting. */
    public const DISPUTE_FLOW_VETTING = 'VETTING';

    /** Other. */
    public const DISPUTE_FLOW_OTHER = 'OTHER';

    /**
     * The ID of the dispute.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
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
     * An array of transactions for which disputes were created.
     *
     * @var ResponseTransactionInfo[]
     * maxItems: 1
     * maxItems: 1000
     */
    public $disputed_transactions;

    /**
     * An array of merchant account activities.
     *
     * @var ResponseAccountActivity[]
     * maxItems: 1
     * maxItems: 1000
     */
    public $disputed_account_activities;

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
     * The status of the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_OPEN
     * @see STATUS_WAITING_FOR_BUYER_RESPONSE
     * @see STATUS_WAITING_FOR_SELLER_RESPONSE
     * @see STATUS_UNDER_REVIEW
     * @see STATUS_RESOLVED
     * @see STATUS_OTHER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $status;

    /**
     * The state of the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_STATE_OPEN_INQUIRIES
     * @see DISPUTE_STATE_REQUIRED_ACTION
     * @see DISPUTE_STATE_REQUIRED_OTHER_PARTY_ACTION
     * @see DISPUTE_STATE_UNDER_PAYPAL_REVIEW
     * @see DISPUTE_STATE_APPEALABLE
     * @see DISPUTE_STATE_RESOLVED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_state;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $dispute_amount;

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
     * An array of customer- or merchant-posted messages for the dispute.
     *
     * @var ResponseMessage[]
     * maxItems: 1
     * maxItems: 1000
     */
    public $messages;

    /**
     * The extended properties for the dispute. Includes additional information for a dispute category, such as
     * billing disputes, the original transaction ID, and the correct amount.
     *
     * @var ResponseExtensions | null
     */
    public $extensions;

    /**
     * An array of evidence documents.
     *
     * @var ResponseEvidence[]
     * maxItems: 1
     * maxItems: 100
     */
    public $evidences;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $buyer_response_due_date;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $seller_response_due_date;

    /**
     * An array of history objects.
     *
     * @var ResponseHistory[]
     * maxItems: 1
     * maxItems: 1000
     */
    public $history;

    /**
     * The flow ID for the dispute ID.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_FLOW_ACH_RETURNS
     * @see DISPUTE_FLOW_ACCOUNT_ISSUES
     * @see DISPUTE_FLOW_ADMIN_FRAUD_REVERSAL
     * @see DISPUTE_FLOW_BILLING
     * @see DISPUTE_FLOW_CHARGEBACKS
     * @see DISPUTE_FLOW_COMPLAINT_RESOLUTION
     * @see DISPUTE_FLOW_CORRECTION
     * @see DISPUTE_FLOW_DEBIT_CARD_CHARGEBACK
     * @see DISPUTE_FLOW_FAX_ROUTING
     * @see DISPUTE_FLOW_MIPS_COMPLAINT_ITEM
     * @see DISPUTE_FLOW_MIPS_COMPLAINT
     * @see DISPUTE_FLOW_OPS_VERIFICATION_FLOW
     * @see DISPUTE_FLOW_PAYPAL_DISPUTE_RESOLUTION
     * @see DISPUTE_FLOW_PINLESS_DEBIT_RETURN
     * @see DISPUTE_FLOW_PRICING_ADJUSTMENT
     * @see DISPUTE_FLOW_SPOOF_UNAUTH_CHILD
     * @see DISPUTE_FLOW_SPOOF_UNAUTH_PARENT
     * @see DISPUTE_FLOW_THIRD_PARTY_CLAIM
     * @see DISPUTE_FLOW_THIRD_PARTY_DISPUTE
     * @see DISPUTE_FLOW_TICKET_RETRIEVAL
     * @see DISPUTE_FLOW_UK_EXPRESS_RETURNS
     * @see DISPUTE_FLOW_UNKNOWN_FAXES
     * @see DISPUTE_FLOW_VETTING
     * @see DISPUTE_FLOW_OTHER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_flow;

    /**
     * The merchant-proposed offer for a dispute.
     *
     * @var ResponseOffer | null
     */
    public $offer;

    /**
     * The refund details.
     *
     * @var ResponseRefundDetails | null
     */
    public $refund_details;

    /**
     * The contact details that a merchant provides to the customer to use to share their evidence documents.
     *
     * @var ResponseCommunicationDetails | null
     */
    public $communication_details;

    /**
     * An array of all the actions that are associated to this dispute.
     *
     * @var ResponsePartnerAction[]
     * maxItems: 1
     * maxItems: 10
     */
    public $partner_actions;

    /**
     * An array of all the supporting information that are associated to this dispute.
     *
     * @var ResponseSupportingInfo[]
     * maxItems: 1
     * maxItems: 100
     */
    public $supporting_info;

    /**
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links/).
     *
     * @var array
     * maxItems: 1
     * maxItems: 10
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->dispute_id) || Assert::minLength(
            $this->dispute_id,
            1,
            "dispute_id in ResponseDisputeInfo must have minlength of 1 $within"
        );
        !isset($this->dispute_id) || Assert::maxLength(
            $this->dispute_id,
            255,
            "dispute_id in ResponseDisputeInfo must have maxlength of 255 $within"
        );
        !isset($this->create_time) || Assert::minLength(
            $this->create_time,
            20,
            "create_time in ResponseDisputeInfo must have minlength of 20 $within"
        );
        !isset($this->create_time) || Assert::maxLength(
            $this->create_time,
            64,
            "create_time in ResponseDisputeInfo must have maxlength of 64 $within"
        );
        !isset($this->update_time) || Assert::minLength(
            $this->update_time,
            20,
            "update_time in ResponseDisputeInfo must have minlength of 20 $within"
        );
        !isset($this->update_time) || Assert::maxLength(
            $this->update_time,
            64,
            "update_time in ResponseDisputeInfo must have maxlength of 64 $within"
        );
        Assert::notNull($this->disputed_transactions, "disputed_transactions in ResponseDisputeInfo must not be NULL $within");
        Assert::minCount(
            $this->disputed_transactions,
            1,
            "disputed_transactions in ResponseDisputeInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->disputed_transactions,
            1000,
            "disputed_transactions in ResponseDisputeInfo must have max. count of 1000 $within"
        );
        Assert::isArray(
            $this->disputed_transactions,
            "disputed_transactions in ResponseDisputeInfo must be array $within"
        );
        if (isset($this->disputed_transactions)) {
            foreach ($this->disputed_transactions as $item) {
                $item->validate(ResponseDisputeInfo::class);
            }
        }
        Assert::notNull($this->disputed_account_activities, "disputed_account_activities in ResponseDisputeInfo must not be NULL $within");
        Assert::minCount(
            $this->disputed_account_activities,
            1,
            "disputed_account_activities in ResponseDisputeInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->disputed_account_activities,
            1000,
            "disputed_account_activities in ResponseDisputeInfo must have max. count of 1000 $within"
        );
        Assert::isArray(
            $this->disputed_account_activities,
            "disputed_account_activities in ResponseDisputeInfo must be array $within"
        );
        if (isset($this->disputed_account_activities)) {
            foreach ($this->disputed_account_activities as $item) {
                $item->validate(ResponseDisputeInfo::class);
            }
        }
        !isset($this->reason) || Assert::minLength(
            $this->reason,
            1,
            "reason in ResponseDisputeInfo must have minlength of 1 $within"
        );
        !isset($this->reason) || Assert::maxLength(
            $this->reason,
            255,
            "reason in ResponseDisputeInfo must have maxlength of 255 $within"
        );
        !isset($this->status) || Assert::minLength(
            $this->status,
            1,
            "status in ResponseDisputeInfo must have minlength of 1 $within"
        );
        !isset($this->status) || Assert::maxLength(
            $this->status,
            255,
            "status in ResponseDisputeInfo must have maxlength of 255 $within"
        );
        !isset($this->dispute_state) || Assert::minLength(
            $this->dispute_state,
            1,
            "dispute_state in ResponseDisputeInfo must have minlength of 1 $within"
        );
        !isset($this->dispute_state) || Assert::maxLength(
            $this->dispute_state,
            255,
            "dispute_state in ResponseDisputeInfo must have maxlength of 255 $within"
        );
        !isset($this->dispute_amount) || Assert::isInstanceOf(
            $this->dispute_amount,
            Money::class,
            "dispute_amount in ResponseDisputeInfo must be instance of Money $within"
        );
        !isset($this->dispute_amount) ||  $this->dispute_amount->validate(ResponseDisputeInfo::class);
        !isset($this->external_reason_code) || Assert::minLength(
            $this->external_reason_code,
            1,
            "external_reason_code in ResponseDisputeInfo must have minlength of 1 $within"
        );
        !isset($this->external_reason_code) || Assert::maxLength(
            $this->external_reason_code,
            2000,
            "external_reason_code in ResponseDisputeInfo must have maxlength of 2000 $within"
        );
        !isset($this->dispute_outcome) || Assert::isInstanceOf(
            $this->dispute_outcome,
            ResponseDisputeOutcome::class,
            "dispute_outcome in ResponseDisputeInfo must be instance of ResponseDisputeOutcome $within"
        );
        !isset($this->dispute_outcome) ||  $this->dispute_outcome->validate(ResponseDisputeInfo::class);
        !isset($this->dispute_life_cycle_stage) || Assert::minLength(
            $this->dispute_life_cycle_stage,
            1,
            "dispute_life_cycle_stage in ResponseDisputeInfo must have minlength of 1 $within"
        );
        !isset($this->dispute_life_cycle_stage) || Assert::maxLength(
            $this->dispute_life_cycle_stage,
            255,
            "dispute_life_cycle_stage in ResponseDisputeInfo must have maxlength of 255 $within"
        );
        !isset($this->dispute_channel) || Assert::minLength(
            $this->dispute_channel,
            1,
            "dispute_channel in ResponseDisputeInfo must have minlength of 1 $within"
        );
        !isset($this->dispute_channel) || Assert::maxLength(
            $this->dispute_channel,
            255,
            "dispute_channel in ResponseDisputeInfo must have maxlength of 255 $within"
        );
        Assert::notNull($this->messages, "messages in ResponseDisputeInfo must not be NULL $within");
        Assert::minCount(
            $this->messages,
            1,
            "messages in ResponseDisputeInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->messages,
            1000,
            "messages in ResponseDisputeInfo must have max. count of 1000 $within"
        );
        Assert::isArray(
            $this->messages,
            "messages in ResponseDisputeInfo must be array $within"
        );
        if (isset($this->messages)) {
            foreach ($this->messages as $item) {
                $item->validate(ResponseDisputeInfo::class);
            }
        }
        !isset($this->extensions) || Assert::isInstanceOf(
            $this->extensions,
            ResponseExtensions::class,
            "extensions in ResponseDisputeInfo must be instance of ResponseExtensions $within"
        );
        !isset($this->extensions) ||  $this->extensions->validate(ResponseDisputeInfo::class);
        Assert::notNull($this->evidences, "evidences in ResponseDisputeInfo must not be NULL $within");
        Assert::minCount(
            $this->evidences,
            1,
            "evidences in ResponseDisputeInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->evidences,
            100,
            "evidences in ResponseDisputeInfo must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->evidences,
            "evidences in ResponseDisputeInfo must be array $within"
        );
        if (isset($this->evidences)) {
            foreach ($this->evidences as $item) {
                $item->validate(ResponseDisputeInfo::class);
            }
        }
        !isset($this->buyer_response_due_date) || Assert::minLength(
            $this->buyer_response_due_date,
            20,
            "buyer_response_due_date in ResponseDisputeInfo must have minlength of 20 $within"
        );
        !isset($this->buyer_response_due_date) || Assert::maxLength(
            $this->buyer_response_due_date,
            64,
            "buyer_response_due_date in ResponseDisputeInfo must have maxlength of 64 $within"
        );
        !isset($this->seller_response_due_date) || Assert::minLength(
            $this->seller_response_due_date,
            20,
            "seller_response_due_date in ResponseDisputeInfo must have minlength of 20 $within"
        );
        !isset($this->seller_response_due_date) || Assert::maxLength(
            $this->seller_response_due_date,
            64,
            "seller_response_due_date in ResponseDisputeInfo must have maxlength of 64 $within"
        );
        Assert::notNull($this->history, "history in ResponseDisputeInfo must not be NULL $within");
        Assert::minCount(
            $this->history,
            1,
            "history in ResponseDisputeInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->history,
            1000,
            "history in ResponseDisputeInfo must have max. count of 1000 $within"
        );
        Assert::isArray(
            $this->history,
            "history in ResponseDisputeInfo must be array $within"
        );
        if (isset($this->history)) {
            foreach ($this->history as $item) {
                $item->validate(ResponseDisputeInfo::class);
            }
        }
        !isset($this->dispute_flow) || Assert::minLength(
            $this->dispute_flow,
            1,
            "dispute_flow in ResponseDisputeInfo must have minlength of 1 $within"
        );
        !isset($this->dispute_flow) || Assert::maxLength(
            $this->dispute_flow,
            255,
            "dispute_flow in ResponseDisputeInfo must have maxlength of 255 $within"
        );
        !isset($this->offer) || Assert::isInstanceOf(
            $this->offer,
            ResponseOffer::class,
            "offer in ResponseDisputeInfo must be instance of ResponseOffer $within"
        );
        !isset($this->offer) ||  $this->offer->validate(ResponseDisputeInfo::class);
        !isset($this->refund_details) || Assert::isInstanceOf(
            $this->refund_details,
            ResponseRefundDetails::class,
            "refund_details in ResponseDisputeInfo must be instance of ResponseRefundDetails $within"
        );
        !isset($this->refund_details) ||  $this->refund_details->validate(ResponseDisputeInfo::class);
        !isset($this->communication_details) || Assert::isInstanceOf(
            $this->communication_details,
            ResponseCommunicationDetails::class,
            "communication_details in ResponseDisputeInfo must be instance of ResponseCommunicationDetails $within"
        );
        !isset($this->communication_details) ||  $this->communication_details->validate(ResponseDisputeInfo::class);
        Assert::notNull($this->partner_actions, "partner_actions in ResponseDisputeInfo must not be NULL $within");
        Assert::minCount(
            $this->partner_actions,
            1,
            "partner_actions in ResponseDisputeInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->partner_actions,
            10,
            "partner_actions in ResponseDisputeInfo must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->partner_actions,
            "partner_actions in ResponseDisputeInfo must be array $within"
        );
        if (isset($this->partner_actions)) {
            foreach ($this->partner_actions as $item) {
                $item->validate(ResponseDisputeInfo::class);
            }
        }
        Assert::notNull($this->supporting_info, "supporting_info in ResponseDisputeInfo must not be NULL $within");
        Assert::minCount(
            $this->supporting_info,
            1,
            "supporting_info in ResponseDisputeInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->supporting_info,
            100,
            "supporting_info in ResponseDisputeInfo must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->supporting_info,
            "supporting_info in ResponseDisputeInfo must be array $within"
        );
        if (isset($this->supporting_info)) {
            foreach ($this->supporting_info as $item) {
                $item->validate(ResponseDisputeInfo::class);
            }
        }
        Assert::notNull($this->links, "links in ResponseDisputeInfo must not be NULL $within");
        Assert::minCount(
            $this->links,
            1,
            "links in ResponseDisputeInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->links,
            10,
            "links in ResponseDisputeInfo must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->links,
            "links in ResponseDisputeInfo must be array $within"
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
        if (isset($data['disputed_transactions'])) {
            $this->disputed_transactions = [];
            foreach ($data['disputed_transactions'] as $item) {
                $this->disputed_transactions[] = new ResponseTransactionInfo($item);
            }
        }
        if (isset($data['disputed_account_activities'])) {
            $this->disputed_account_activities = [];
            foreach ($data['disputed_account_activities'] as $item) {
                $this->disputed_account_activities[] = new ResponseAccountActivity($item);
            }
        }
        if (isset($data['reason'])) {
            $this->reason = $data['reason'];
        }
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['dispute_state'])) {
            $this->dispute_state = $data['dispute_state'];
        }
        if (isset($data['dispute_amount'])) {
            $this->dispute_amount = new Money($data['dispute_amount']);
        }
        if (isset($data['external_reason_code'])) {
            $this->external_reason_code = $data['external_reason_code'];
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
        if (isset($data['messages'])) {
            $this->messages = [];
            foreach ($data['messages'] as $item) {
                $this->messages[] = new ResponseMessage($item);
            }
        }
        if (isset($data['extensions'])) {
            $this->extensions = new ResponseExtensions($data['extensions']);
        }
        if (isset($data['evidences'])) {
            $this->evidences = [];
            foreach ($data['evidences'] as $item) {
                $this->evidences[] = new ResponseEvidence($item);
            }
        }
        if (isset($data['buyer_response_due_date'])) {
            $this->buyer_response_due_date = $data['buyer_response_due_date'];
        }
        if (isset($data['seller_response_due_date'])) {
            $this->seller_response_due_date = $data['seller_response_due_date'];
        }
        if (isset($data['history'])) {
            $this->history = [];
            foreach ($data['history'] as $item) {
                $this->history[] = new ResponseHistory($item);
            }
        }
        if (isset($data['dispute_flow'])) {
            $this->dispute_flow = $data['dispute_flow'];
        }
        if (isset($data['offer'])) {
            $this->offer = new ResponseOffer($data['offer']);
        }
        if (isset($data['refund_details'])) {
            $this->refund_details = new ResponseRefundDetails($data['refund_details']);
        }
        if (isset($data['communication_details'])) {
            $this->communication_details = new ResponseCommunicationDetails($data['communication_details']);
        }
        if (isset($data['partner_actions'])) {
            $this->partner_actions = [];
            foreach ($data['partner_actions'] as $item) {
                $this->partner_actions[] = new ResponsePartnerAction($item);
            }
        }
        if (isset($data['supporting_info'])) {
            $this->supporting_info = [];
            foreach ($data['supporting_info'] as $item) {
                $this->supporting_info[] = new ResponseSupportingInfo($item);
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
        $this->disputed_transactions = [];
        $this->disputed_account_activities = [];
        $this->messages = [];
        $this->evidences = [];
        $this->history = [];
        $this->partner_actions = [];
        $this->supporting_info = [];
        $this->links = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initDisputeAmount(): Money
    {
        return $this->dispute_amount = new Money();
    }

    public function initDisputeOutcome(): ResponseDisputeOutcome
    {
        return $this->dispute_outcome = new ResponseDisputeOutcome();
    }

    public function initExtensions(): ResponseExtensions
    {
        return $this->extensions = new ResponseExtensions();
    }

    public function initOffer(): ResponseOffer
    {
        return $this->offer = new ResponseOffer();
    }

    public function initRefundDetails(): ResponseRefundDetails
    {
        return $this->refund_details = new ResponseRefundDetails();
    }

    public function initCommunicationDetails(): ResponseCommunicationDetails
    {
        return $this->communication_details = new ResponseCommunicationDetails();
    }
}
