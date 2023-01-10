<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The offer history.
 *
 * generated from: response-offer_history.json
 */
class ResponseOfferHistory implements JsonSerializable
{
    use BaseModel;

    /** The actor is the customer. */
    const ACTOR_BUYER = 'BUYER';

    /** The actor is the merchant. */
    const ACTOR_SELLER = 'SELLER';

    /** The merchant or customer proposed an offer. */
    const EVENT_TYPE_PROPOSED = 'PROPOSED';

    /** The merchant or customer accepted the offer. */
    const EVENT_TYPE_ACCEPTED = 'ACCEPTED';

    /** The merchant or customer rejected the offer. */
    const EVENT_TYPE_DENIED = 'DENIED';

    /** The merchant must refund the customer without any item replacement or return. This offer type is valid in the inquiry phase and occurs when a merchant is willing to refund a specific amount. Buyer acceptance is needed for partial refund offers and dispute is auto closed for full refunds. Include the <code>offer_amount</code> but omit the <code>return_shipping_address</code> parameters from the make offer request. */
    const OFFER_TYPE_REFUND = 'REFUND';

    /** The customer must return the item to the merchant and then merchant will refund the money. This offer type is valid in the inquiry phase and occurs when a merchant is willing to refund a specific amount and requires the customer to return the item. Include the <code>return_shipping_address</code> parameter and the <code>offer_amount</code> parameter in the make offer request. */
    const OFFER_TYPE_REFUND_WITH_RETURN = 'REFUND_WITH_RETURN';

    /** The merchant must do a refund and then send a replacement item to the customer. This offer type is valid in the inquiry phase when a merchant is willing to refund a specific amount and send the replacement item. Include the <code>offer_amount</code> parameter in the make offer request. */
    const OFFER_TYPE_REFUND_WITH_REPLACEMENT = 'REFUND_WITH_REPLACEMENT';

    /** The merchant must send a replacement item to the customer with no additional refunds. This offer type is valid in the inquiry phase when a merchant is willing to replace the item without any refund. Omit the <code>offer_amount</code> parameter from the make offer request. */
    const OFFER_TYPE_REPLACEMENT_WITHOUT_REFUND = 'REPLACEMENT_WITHOUT_REFUND';

    /** A customer and merchant interact in an attempt to resolve a dispute without escalation to PayPal. Occurs when the customer:<ul><li>Has not received goods or a service.</li><li>Reports that the received goods or service are not as described.</li><li>Needs more details, such as a copy of the transaction or a receipt.</li></ul> */
    const DISPUTE_LIFE_CYCLE_STAGE_INQUIRY = 'INQUIRY';

    /** A customer or merchant escalates an inquiry to a claim, which authorizes PayPal to investigate the case and make a determination. Occurs only when the dispute channel is <code>INTERNAL</code>. This stage is a PayPal dispute lifecycle stage and not a credit card or debit card chargeback. All notes that the customer sends in this stage are visible to PayPal agents only. The customer must wait for PayPal’s response before the customer can take further action. In this stage, PayPal shares dispute details with the merchant, who can complete one of these actions:<ul><li>Accept the claim.</li><li>Submit evidence to challenge the claim.</li><li>Make an offer to the customer to resolve the claim.</li></ul> */
    const DISPUTE_LIFE_CYCLE_STAGE_CHARGEBACK = 'CHARGEBACK';

    /** The first appeal stage for merchants. A merchant can appeal a chargeback if PayPal's decision is not in the merchant's favor. If the merchant does not appeal within the appeal period, PayPal considers the case resolved. */
    const DISPUTE_LIFE_CYCLE_STAGE_PRE_ARBITRATION = 'PRE_ARBITRATION';

    /** The second appeal stage for merchants. A merchant can appeal a dispute for a second time if the first appeal was denied. If the merchant does not appeal within the appeal period, the case returns to a resolved status in pre-arbitration stage. */
    const DISPUTE_LIFE_CYCLE_STAGE_ARBITRATION = 'ARBITRATION';

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $offer_time;

    /**
     * The event-related actor.
     *
     * use one of constants defined in this class to set the value:
     * @see ACTOR_BUYER
     * @see ACTOR_SELLER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $actor;

    /**
     * The type of the history event.
     *
     * use one of constants defined in this class to set the value:
     * @see EVENT_TYPE_PROPOSED
     * @see EVENT_TYPE_ACCEPTED
     * @see EVENT_TYPE_DENIED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $event_type;

    /**
     * The merchant-proposed offer type for the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see OFFER_TYPE_REFUND
     * @see OFFER_TYPE_REFUND_WITH_RETURN
     * @see OFFER_TYPE_REFUND_WITH_REPLACEMENT
     * @see OFFER_TYPE_REPLACEMENT_WITHOUT_REFUND
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $offer_type;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $offer_amount;

    /**
     * The user submitted notes.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $notes;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->offer_time) || Assert::minLength(
            $this->offer_time,
            20,
            "offer_time in ResponseOfferHistory must have minlength of 20 $within"
        );
        !isset($this->offer_time) || Assert::maxLength(
            $this->offer_time,
            64,
            "offer_time in ResponseOfferHistory must have maxlength of 64 $within"
        );
        !isset($this->actor) || Assert::minLength(
            $this->actor,
            1,
            "actor in ResponseOfferHistory must have minlength of 1 $within"
        );
        !isset($this->actor) || Assert::maxLength(
            $this->actor,
            255,
            "actor in ResponseOfferHistory must have maxlength of 255 $within"
        );
        !isset($this->event_type) || Assert::minLength(
            $this->event_type,
            1,
            "event_type in ResponseOfferHistory must have minlength of 1 $within"
        );
        !isset($this->event_type) || Assert::maxLength(
            $this->event_type,
            255,
            "event_type in ResponseOfferHistory must have maxlength of 255 $within"
        );
        !isset($this->offer_type) || Assert::minLength(
            $this->offer_type,
            1,
            "offer_type in ResponseOfferHistory must have minlength of 1 $within"
        );
        !isset($this->offer_type) || Assert::maxLength(
            $this->offer_type,
            255,
            "offer_type in ResponseOfferHistory must have maxlength of 255 $within"
        );
        !isset($this->offer_amount) || Assert::isInstanceOf(
            $this->offer_amount,
            Money::class,
            "offer_amount in ResponseOfferHistory must be instance of Money $within"
        );
        !isset($this->offer_amount) ||  $this->offer_amount->validate(ResponseOfferHistory::class);
        !isset($this->notes) || Assert::minLength(
            $this->notes,
            1,
            "notes in ResponseOfferHistory must have minlength of 1 $within"
        );
        !isset($this->notes) || Assert::maxLength(
            $this->notes,
            2000,
            "notes in ResponseOfferHistory must have maxlength of 2000 $within"
        );
        !isset($this->dispute_life_cycle_stage) || Assert::minLength(
            $this->dispute_life_cycle_stage,
            1,
            "dispute_life_cycle_stage in ResponseOfferHistory must have minlength of 1 $within"
        );
        !isset($this->dispute_life_cycle_stage) || Assert::maxLength(
            $this->dispute_life_cycle_stage,
            255,
            "dispute_life_cycle_stage in ResponseOfferHistory must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['offer_time'])) {
            $this->offer_time = $data['offer_time'];
        }
        if (isset($data['actor'])) {
            $this->actor = $data['actor'];
        }
        if (isset($data['event_type'])) {
            $this->event_type = $data['event_type'];
        }
        if (isset($data['offer_type'])) {
            $this->offer_type = $data['offer_type'];
        }
        if (isset($data['offer_amount'])) {
            $this->offer_amount = new Money($data['offer_amount']);
        }
        if (isset($data['notes'])) {
            $this->notes = $data['notes'];
        }
        if (isset($data['dispute_life_cycle_stage'])) {
            $this->dispute_life_cycle_stage = $data['dispute_life_cycle_stage'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initOfferAmount(): Money
    {
        return $this->offer_amount = new Money();
    }
}
