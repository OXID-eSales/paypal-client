<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The extended properties for the event. Includes additional information for a dispute event, such as
 * accept-claim event, the accept claim type and reason.
 *
 * generated from: event-event_extensions.json
 */
class EventEventExtensions implements JsonSerializable
{
    use BaseModel;

    /** The merchant must refund the customer without any item replacement or return. This offer type is valid in the inquiry phase and occurs when a merchant is willing to refund a specific amount. Buyer acceptance is needed for partial refund offers and dispute is auto closed for full refunds. Include the <code>offer_amount</code> but omit the <code>return_shipping_address</code> parameters from the make offer request. */
    const MAKE_OFFER_TYPE_REFUND = 'REFUND';

    /** The customer must return the item to the merchant and then merchant will refund the money. This offer type is valid in the inquiry phase and occurs when a merchant is willing to refund a specific amount and requires the customer to return the item. Include the <code>return_shipping_address</code> parameter and the <code>offer_amount</code> parameter in the make offer request. */
    const MAKE_OFFER_TYPE_REFUND_WITH_RETURN = 'REFUND_WITH_RETURN';

    /** The merchant must do a refund and then send a replacement item to the customer. This offer type is valid in the inquiry phase when a merchant is willing to refund a specific amount and send the replacement item. Include the <code>offer_amount</code> parameter in the make offer request. */
    const MAKE_OFFER_TYPE_REFUND_WITH_REPLACEMENT = 'REFUND_WITH_REPLACEMENT';

    /** The merchant must send a replacement item to the customer with no additional refunds. This offer type is valid in the inquiry phase when a merchant is willing to replace the item without any refund. Omit the <code>offer_amount</code> parameter from the make offer request. */
    const MAKE_OFFER_TYPE_REPLACEMENT_WITHOUT_REFUND = 'REPLACEMENT_WITHOUT_REFUND';

    /** The merchant must refund the customer without any item replacement or return. This type is applicable when a merchant is willing to refund the entire dispute amount without any further action from customer. Omit the <code>refund_amount</code> and <code>return_shipping_address</code> parameters from the <a href="/docs/api/customer-disputes/v1/#disputes-actions_accept-claim">accept claim</a> call. */
    const ACCEPT_CLAIM_TYPE_REFUND = 'REFUND';

    /** The customer must return the item to the merchant and then merchant will refund the money. This type is applicable when a merchant is willing to refund the dispute amount and requires the customer to return the item. Include the <code>return_shipping_address</code> parameter in but omit the <code>refund_amount</code> parameter from the <a href="/docs/api/customer-disputes/v1/#disputes-actions_accept-claim">accept claim</a> call. */
    const ACCEPT_CLAIM_TYPE_REFUND_WITH_RETURN = 'REFUND_WITH_RETURN';

    /** The merchant proposes a partial refund for the dispute.This type is applicable when a merchant is willing to refund an amount lesser than dispute amount. Include the <code>refund_amount</code> parameter. */
    const ACCEPT_CLAIM_TYPE_PARTIAL_REFUND = 'PARTIAL_REFUND';

    /** Merchant is accepting customer's claim as they could not ship the item back to the customer */
    const ACCEPT_CLAIM_REASON_DID_NOT_SHIP_ITEM = 'DID_NOT_SHIP_ITEM';

    /** Merchant is accepting customer's claim as it is taking too long for merchant to fulfil the order */
    const ACCEPT_CLAIM_REASON_TOO_TIME_CONSUMING = 'TOO_TIME_CONSUMING';

    /** Merchant is accepting customer's claim as the item is lost in mail or transit */
    const ACCEPT_CLAIM_REASON_LOST_IN_MAIL = 'LOST_IN_MAIL';

    /** Merchant is accepting customer's claim as the merchant is not able to find sufficient evidence to win this dispute */
    const ACCEPT_CLAIM_REASON_NOT_ABLE_TO_WIN = 'NOT_ABLE_TO_WIN';

    /** Merchant is accepting customer’s claims to follow their internal company policy */
    const ACCEPT_CLAIM_REASON_COMPANY_POLICY = 'COMPANY_POLICY';

    /** This is the default value merchant can use if none of the above reasons apply */
    const ACCEPT_CLAIM_REASON_REASON_NOT_SET = 'REASON_NOT_SET';

    /** The customer already received the item. */
    const CANCELLATION_REASON_ITEM_RECEIVED = 'ITEM_RECEIVED';

    /** The customer already received a refund for the item. */
    const CANCELLATION_REASON_REFUND_RECEIVED = 'REFUND_RECEIVED';

    /** The customer cancelled the dispute for another reason. If OTHER is specified, customer needs to specify more information in the notes field. */
    const CANCELLATION_REASON_OTHER = 'OTHER';

    /** The customer received the provided shipping tracking information and agrees to cancel. */
    const CANCELLATION_REASON_SHIPMENT_INFO_RECEIVED = 'SHIPMENT_INFO_RECEIVED';

    /** The customer received the item replacement and agrees to cancel. */
    const CANCELLATION_REASON_REPLACEMENT_RECEIVED = 'REPLACEMENT_RECEIVED';

    /** The merchant indicates that shipment would have arrived by now. */
    const BUYER_ESCALATION_REASON_SHIPMENT_NOT_ARRIVED = 'SHIPMENT_NOT_ARRIVED';

    /** The customer has evidence that the merchant might be fraudulent. */
    const BUYER_ESCALATION_REASON_FRAUDULENT_SELLER = 'FRAUDULENT_SELLER';

    /** The customer already failed to reach a resolution with the merchant before filing this dispute. */
    const BUYER_ESCALATION_REASON_FAILED_NEGOTIATION = 'FAILED_NEGOTIATION';

    /** The customer thinks he or she cannot reach a resolution with the merchant. */
    const BUYER_ESCALATION_REASON_INCONCLUSIVE_NEGOTIATION = 'INCONCLUSIVE_NEGOTIATION';

    /** The customer didn't receive refund as mentioned by merchant. */
    const BUYER_ESCALATION_REASON_REFUND_NOT_RECEIVED = 'REFUND_NOT_RECEIVED';

    /** The customer received lesser refund amount than expected. */
    const BUYER_ESCALATION_REASON_REFUND_AMOUNT_IS_DIFFERENT = 'REFUND_AMOUNT_IS_DIFFERENT';

    /** Tracking id received from merchant is invalid. */
    const BUYER_ESCALATION_REASON_TRACKING_ID_INVALID = 'TRACKING_ID_INVALID';

    /** The customer has other reasons, which are described in the comments. If OTHER is specified, customer needs to specify more information in the notes field. */
    const BUYER_ESCALATION_REASON_OTHER = 'OTHER';

    /** The merchant has received the item returned by the customer. */
    const ACKNOWLEDGEMENT_TYPE_ITEM_RECEIVED = 'ITEM_RECEIVED';

    /** The merchant has not received the item. */
    const ACKNOWLEDGEMENT_TYPE_ITEM_NOT_RECEIVED = 'ITEM_NOT_RECEIVED';

    /** The items returned by the customer were damaged. */
    const ACKNOWLEDGEMENT_TYPE_DAMAGED = 'DAMAGED';

    /** The package was empty or the goods were different from what was expected. */
    const ACKNOWLEDGEMENT_TYPE_EMPTY_PACKAGE_OR_DIFFERENT = 'EMPTY_PACKAGE_OR_DIFFERENT';

    /** The package did not have all the items that were expected. */
    const ACKNOWLEDGEMENT_TYPE_MISSING_ITEMS = 'MISSING_ITEMS';

    /**
     * Customer or merchant posted evidences for the dispute.
     *
     * @var ResponseEvidence[]
     * maxItems: 1
     * maxItems: 50
     */
    public $evidences;

    /**
     * Customer or merchant posted supporting information for the dispute.
     *
     * @var ResponseSupportingInfo[]
     * maxItems: 1
     * maxItems: 50
     */
    public $supporting_info;

    /**
     * Customer or merchant posted messages for the dispute.
     *
     * @var ResponseMessage[]
     * maxItems: 1
     * maxItems: 50
     */
    public $messages;

    /**
     * The adjudication details for the dispute.
     *
     * @var ResponseAdjudication[]
     * maxItems: 1
     * maxItems: 10
     */
    public $adjudications;

    /**
     * The merchant-proposed offer type for the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see MAKE_OFFER_TYPE_REFUND
     * @see MAKE_OFFER_TYPE_REFUND_WITH_RETURN
     * @see MAKE_OFFER_TYPE_REFUND_WITH_REPLACEMENT
     * @see MAKE_OFFER_TYPE_REPLACEMENT_WITHOUT_REFUND
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $make_offer_type;

    /**
     * The refund type proposed by the merchant for the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see ACCEPT_CLAIM_TYPE_REFUND
     * @see ACCEPT_CLAIM_TYPE_REFUND_WITH_RETURN
     * @see ACCEPT_CLAIM_TYPE_PARTIAL_REFUND
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $accept_claim_type;

    /**
     * The merchant's reason for acceptance of the customer's claim.
     *
     * use one of constants defined in this class to set the value:
     * @see ACCEPT_CLAIM_REASON_DID_NOT_SHIP_ITEM
     * @see ACCEPT_CLAIM_REASON_TOO_TIME_CONSUMING
     * @see ACCEPT_CLAIM_REASON_LOST_IN_MAIL
     * @see ACCEPT_CLAIM_REASON_NOT_ABLE_TO_WIN
     * @see ACCEPT_CLAIM_REASON_COMPANY_POLICY
     * @see ACCEPT_CLAIM_REASON_REASON_NOT_SET
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $accept_claim_reason;

    /**
     * The reason the customer cancelled the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see CANCELLATION_REASON_ITEM_RECEIVED
     * @see CANCELLATION_REASON_REFUND_RECEIVED
     * @see CANCELLATION_REASON_OTHER
     * @see CANCELLATION_REASON_SHIPMENT_INFO_RECEIVED
     * @see CANCELLATION_REASON_REPLACEMENT_RECEIVED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $cancellation_reason;

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
     * The type of acknowledgement allowed for the merchant after the customer has returned the item. The merchant
     * can update whether the item was received and is as expected or if the item was not received.
     *
     * use one of constants defined in this class to set the value:
     * @see ACKNOWLEDGEMENT_TYPE_ITEM_RECEIVED
     * @see ACKNOWLEDGEMENT_TYPE_ITEM_NOT_RECEIVED
     * @see ACKNOWLEDGEMENT_TYPE_DAMAGED
     * @see ACKNOWLEDGEMENT_TYPE_EMPTY_PACKAGE_OR_DIFFERENT
     * @see ACKNOWLEDGEMENT_TYPE_MISSING_ITEMS
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $acknowledgement_type;

    /**
     * The merchant-provided ID of the invoice for the refund. This optional value is used to map the refund to an
     * invoice ID in the merchant's system.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $invoice_id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->evidences, "evidences in EventEventExtensions must not be NULL $within");
        Assert::minCount(
            $this->evidences,
            1,
            "evidences in EventEventExtensions must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->evidences,
            50,
            "evidences in EventEventExtensions must have max. count of 50 $within"
        );
        Assert::isArray(
            $this->evidences,
            "evidences in EventEventExtensions must be array $within"
        );
        if (isset($this->evidences)) {
            foreach ($this->evidences as $item) {
                $item->validate(EventEventExtensions::class);
            }
        }
        Assert::notNull($this->supporting_info, "supporting_info in EventEventExtensions must not be NULL $within");
        Assert::minCount(
            $this->supporting_info,
            1,
            "supporting_info in EventEventExtensions must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->supporting_info,
            50,
            "supporting_info in EventEventExtensions must have max. count of 50 $within"
        );
        Assert::isArray(
            $this->supporting_info,
            "supporting_info in EventEventExtensions must be array $within"
        );
        if (isset($this->supporting_info)) {
            foreach ($this->supporting_info as $item) {
                $item->validate(EventEventExtensions::class);
            }
        }
        Assert::notNull($this->messages, "messages in EventEventExtensions must not be NULL $within");
        Assert::minCount(
            $this->messages,
            1,
            "messages in EventEventExtensions must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->messages,
            50,
            "messages in EventEventExtensions must have max. count of 50 $within"
        );
        Assert::isArray(
            $this->messages,
            "messages in EventEventExtensions must be array $within"
        );
        if (isset($this->messages)) {
            foreach ($this->messages as $item) {
                $item->validate(EventEventExtensions::class);
            }
        }
        Assert::notNull($this->adjudications, "adjudications in EventEventExtensions must not be NULL $within");
        Assert::minCount(
            $this->adjudications,
            1,
            "adjudications in EventEventExtensions must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->adjudications,
            10,
            "adjudications in EventEventExtensions must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->adjudications,
            "adjudications in EventEventExtensions must be array $within"
        );
        if (isset($this->adjudications)) {
            foreach ($this->adjudications as $item) {
                $item->validate(EventEventExtensions::class);
            }
        }
        !isset($this->make_offer_type) || Assert::minLength(
            $this->make_offer_type,
            1,
            "make_offer_type in EventEventExtensions must have minlength of 1 $within"
        );
        !isset($this->make_offer_type) || Assert::maxLength(
            $this->make_offer_type,
            255,
            "make_offer_type in EventEventExtensions must have maxlength of 255 $within"
        );
        !isset($this->accept_claim_type) || Assert::minLength(
            $this->accept_claim_type,
            1,
            "accept_claim_type in EventEventExtensions must have minlength of 1 $within"
        );
        !isset($this->accept_claim_type) || Assert::maxLength(
            $this->accept_claim_type,
            255,
            "accept_claim_type in EventEventExtensions must have maxlength of 255 $within"
        );
        !isset($this->accept_claim_reason) || Assert::minLength(
            $this->accept_claim_reason,
            1,
            "accept_claim_reason in EventEventExtensions must have minlength of 1 $within"
        );
        !isset($this->accept_claim_reason) || Assert::maxLength(
            $this->accept_claim_reason,
            255,
            "accept_claim_reason in EventEventExtensions must have maxlength of 255 $within"
        );
        !isset($this->cancellation_reason) || Assert::minLength(
            $this->cancellation_reason,
            1,
            "cancellation_reason in EventEventExtensions must have minlength of 1 $within"
        );
        !isset($this->cancellation_reason) || Assert::maxLength(
            $this->cancellation_reason,
            255,
            "cancellation_reason in EventEventExtensions must have maxlength of 255 $within"
        );
        !isset($this->buyer_escalation_reason) || Assert::minLength(
            $this->buyer_escalation_reason,
            1,
            "buyer_escalation_reason in EventEventExtensions must have minlength of 1 $within"
        );
        !isset($this->buyer_escalation_reason) || Assert::maxLength(
            $this->buyer_escalation_reason,
            255,
            "buyer_escalation_reason in EventEventExtensions must have maxlength of 255 $within"
        );
        !isset($this->acknowledgement_type) || Assert::minLength(
            $this->acknowledgement_type,
            1,
            "acknowledgement_type in EventEventExtensions must have minlength of 1 $within"
        );
        !isset($this->acknowledgement_type) || Assert::maxLength(
            $this->acknowledgement_type,
            255,
            "acknowledgement_type in EventEventExtensions must have maxlength of 255 $within"
        );
        !isset($this->invoice_id) || Assert::minLength(
            $this->invoice_id,
            1,
            "invoice_id in EventEventExtensions must have minlength of 1 $within"
        );
        !isset($this->invoice_id) || Assert::maxLength(
            $this->invoice_id,
            127,
            "invoice_id in EventEventExtensions must have maxlength of 127 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['evidences'])) {
            $this->evidences = [];
            foreach ($data['evidences'] as $item) {
                $this->evidences[] = new ResponseEvidence($item);
            }
        }
        if (isset($data['supporting_info'])) {
            $this->supporting_info = [];
            foreach ($data['supporting_info'] as $item) {
                $this->supporting_info[] = new ResponseSupportingInfo($item);
            }
        }
        if (isset($data['messages'])) {
            $this->messages = [];
            foreach ($data['messages'] as $item) {
                $this->messages[] = new ResponseMessage($item);
            }
        }
        if (isset($data['adjudications'])) {
            $this->adjudications = [];
            foreach ($data['adjudications'] as $item) {
                $this->adjudications[] = new ResponseAdjudication($item);
            }
        }
        if (isset($data['make_offer_type'])) {
            $this->make_offer_type = $data['make_offer_type'];
        }
        if (isset($data['accept_claim_type'])) {
            $this->accept_claim_type = $data['accept_claim_type'];
        }
        if (isset($data['accept_claim_reason'])) {
            $this->accept_claim_reason = $data['accept_claim_reason'];
        }
        if (isset($data['cancellation_reason'])) {
            $this->cancellation_reason = $data['cancellation_reason'];
        }
        if (isset($data['buyer_escalation_reason'])) {
            $this->buyer_escalation_reason = $data['buyer_escalation_reason'];
        }
        if (isset($data['acknowledgement_type'])) {
            $this->acknowledgement_type = $data['acknowledgement_type'];
        }
        if (isset($data['invoice_id'])) {
            $this->invoice_id = $data['invoice_id'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->evidences = [];
        $this->supporting_info = [];
        $this->messages = [];
        $this->adjudications = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
