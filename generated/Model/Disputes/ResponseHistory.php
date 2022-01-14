<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The history of the dispute.
 *
 * generated from: response-history.json
 */
class ResponseHistory implements JsonSerializable
{
    use BaseModel;

    /** The actor is the customer. */
    public const ACTOR_BUYER = 'BUYER';

    /** The actor is the merchant. */
    public const ACTOR_SELLER = 'SELLER';

    /** The actor is PayPal. */
    public const ACTOR_PAYPAL = 'PAYPAL';

    /** The dispute was created in PayPal system. */
    public const EVENT_TYPE_CREATED = 'CREATED';

    /** The customer opened the dispute with PayPal. */
    public const EVENT_TYPE_OPEN = 'OPEN';

    /** The dispute moved to waiting for customer's response. */
    public const EVENT_TYPE_WAITING_FOR_BUYER_RESPONSE = 'WAITING_FOR_BUYER_RESPONSE';

    /** The dispute moved to waiting for merchant's response. */
    public const EVENT_TYPE_WAITING_FOR_SELLER_RESPONSE = 'WAITING_FOR_SELLER_RESPONSE';

    /** The dispute moved to a state where it is being reviewed by PayPal. */
    public const EVENT_TYPE_UNDER_REVIEW = 'UNDER_REVIEW';

    /** The dispute was resolved. */
    public const EVENT_TYPE_RESOLVED = 'RESOLVED';

    /** The dispute status moved to the <code>OTHER</code> status. */
    public const EVENT_TYPE_OTHER = 'OTHER';

    /** The customer was notified about dispute through email. */
    public const EVENT_TYPE_EMAIL_SENT_TO_BUYER = 'EMAIL_SENT_TO_BUYER';

    /** The merchant was notified about dispute through email. */
    public const EVENT_TYPE_EMAIL_SENT_TO_SELLER = 'EMAIL_SENT_TO_SELLER';

    /** The customer provided an evidence document for the dispute. */
    public const EVENT_TYPE_EVIDENCE_PROVIDED_BUYER = 'EVIDENCE_PROVIDED_BUYER';

    /** The merchant provided an evidence document for the dispute. */
    public const EVENT_TYPE_EVIDENCE_PROVIDED_SELLER = 'EVIDENCE_PROVIDED_SELLER';

    /** The customer appealed the dispute outcome. */
    public const EVENT_TYPE_APPEALED_BUYER = 'APPEALED_BUYER';

    /** The merchant appealed the dispute outcome. */
    public const EVENT_TYPE_APPEALED_SELLER = 'APPEALED_SELLER';

    /** The customer changed the reason for the dispute. */
    public const EVENT_TYPE_REASON_CHANGED = 'REASON_CHANGED';

    /** The dispute was escalated for PayPal's review. */
    public const EVENT_TYPE_ESCALATED = 'ESCALATED';

    /** The merchant accepted the claim and refunded the customer. */
    public const EVENT_TYPE_ACCEPTED_CLAIM = 'ACCEPTED_CLAIM';

    /** The customer cancelled the dispute. */
    public const EVENT_TYPE_CANCELLED = 'CANCELLED';

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $date;

    /**
     * The event-related actor.
     *
     * use one of constants defined in this class to set the value:
     * @see ACTOR_BUYER
     * @see ACTOR_SELLER
     * @see ACTOR_PAYPAL
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $actor;

    /**
     * The type of the history event.
     *
     * use one of constants defined in this class to set the value:
     * @see EVENT_TYPE_CREATED
     * @see EVENT_TYPE_OPEN
     * @see EVENT_TYPE_WAITING_FOR_BUYER_RESPONSE
     * @see EVENT_TYPE_WAITING_FOR_SELLER_RESPONSE
     * @see EVENT_TYPE_UNDER_REVIEW
     * @see EVENT_TYPE_RESOLVED
     * @see EVENT_TYPE_OTHER
     * @see EVENT_TYPE_EMAIL_SENT_TO_BUYER
     * @see EVENT_TYPE_EMAIL_SENT_TO_SELLER
     * @see EVENT_TYPE_EVIDENCE_PROVIDED_BUYER
     * @see EVENT_TYPE_EVIDENCE_PROVIDED_SELLER
     * @see EVENT_TYPE_APPEALED_BUYER
     * @see EVENT_TYPE_APPEALED_SELLER
     * @see EVENT_TYPE_REASON_CHANGED
     * @see EVENT_TYPE_ESCALATED
     * @see EVENT_TYPE_ACCEPTED_CLAIM
     * @see EVENT_TYPE_CANCELLED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $event_type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->date) || Assert::minLength(
            $this->date,
            20,
            "date in ResponseHistory must have minlength of 20 $within"
        );
        !isset($this->date) || Assert::maxLength(
            $this->date,
            64,
            "date in ResponseHistory must have maxlength of 64 $within"
        );
        !isset($this->actor) || Assert::minLength(
            $this->actor,
            1,
            "actor in ResponseHistory must have minlength of 1 $within"
        );
        !isset($this->actor) || Assert::maxLength(
            $this->actor,
            255,
            "actor in ResponseHistory must have maxlength of 255 $within"
        );
        !isset($this->event_type) || Assert::minLength(
            $this->event_type,
            1,
            "event_type in ResponseHistory must have minlength of 1 $within"
        );
        !isset($this->event_type) || Assert::maxLength(
            $this->event_type,
            255,
            "event_type in ResponseHistory must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['date'])) {
            $this->date = $data['date'];
        }
        if (isset($data['actor'])) {
            $this->actor = $data['actor'];
        }
        if (isset($data['event_type'])) {
            $this->event_type = $data['event_type'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
