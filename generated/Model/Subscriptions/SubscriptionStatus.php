<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The subscription status details.
 *
 * generated from: subscription_status.json
 */
class SubscriptionStatus implements JsonSerializable
{
    use BaseModel;

    /** The subscription is created but not yet approved by the buyer. */
    public const STATUS_APPROVAL_PENDING = 'APPROVAL_PENDING';

    /** The buyer has approved the subscription. */
    public const STATUS_APPROVED = 'APPROVED';

    /** The subscription is active. */
    public const STATUS_ACTIVE = 'ACTIVE';

    /** The subscription is suspended. */
    public const STATUS_SUSPENDED = 'SUSPENDED';

    /** The subscription is cancelled. */
    public const STATUS_CANCELLED = 'CANCELLED';

    /** The subscription is expired. */
    public const STATUS_EXPIRED = 'EXPIRED';

    /** The subscription status bas been updated by the system. */
    public const STATUS_CHANGED_BY_SYSTEM = 'SYSTEM';

    /** The subscription status bas been updated by the buyer. */
    public const STATUS_CHANGED_BY_BUYER = 'BUYER';

    /** The subscription status bas been updated by the merchant. */
    public const STATUS_CHANGED_BY_MERCHANT = 'MERCHANT';

    /** The subscription status bas been updated by the facilitator. Facilitators ca be a third party or channel partner that integrates with PayPal. */
    public const STATUS_CHANGED_BY_FACILITATOR = 'FACILITATOR';

    /**
     * The status of the subscription.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_APPROVAL_PENDING
     * @see STATUS_APPROVED
     * @see STATUS_ACTIVE
     * @see STATUS_SUSPENDED
     * @see STATUS_CANCELLED
     * @see STATUS_EXPIRED
     * @var string | null
     * minLength: 1
     * maxLength: 24
     */
    public $status;

    /**
     * The reason or notes for the status of the subscription.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 128
     */
    public $status_change_note;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $status_update_time;

    /**
     * The last actor that updated the subscription.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CHANGED_BY_SYSTEM
     * @see STATUS_CHANGED_BY_BUYER
     * @see STATUS_CHANGED_BY_MERCHANT
     * @see STATUS_CHANGED_BY_FACILITATOR
     * @var string | null
     * minLength: 1
     * maxLength: 24
     */
    public $status_changed_by;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->status) || Assert::minLength(
            $this->status,
            1,
            "status in SubscriptionStatus must have minlength of 1 $within"
        );
        !isset($this->status) || Assert::maxLength(
            $this->status,
            24,
            "status in SubscriptionStatus must have maxlength of 24 $within"
        );
        !isset($this->status_change_note) || Assert::minLength(
            $this->status_change_note,
            1,
            "status_change_note in SubscriptionStatus must have minlength of 1 $within"
        );
        !isset($this->status_change_note) || Assert::maxLength(
            $this->status_change_note,
            128,
            "status_change_note in SubscriptionStatus must have maxlength of 128 $within"
        );
        !isset($this->status_update_time) || Assert::minLength(
            $this->status_update_time,
            20,
            "status_update_time in SubscriptionStatus must have minlength of 20 $within"
        );
        !isset($this->status_update_time) || Assert::maxLength(
            $this->status_update_time,
            64,
            "status_update_time in SubscriptionStatus must have maxlength of 64 $within"
        );
        !isset($this->status_changed_by) || Assert::minLength(
            $this->status_changed_by,
            1,
            "status_changed_by in SubscriptionStatus must have minlength of 1 $within"
        );
        !isset($this->status_changed_by) || Assert::maxLength(
            $this->status_changed_by,
            24,
            "status_changed_by in SubscriptionStatus must have maxlength of 24 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['status_change_note'])) {
            $this->status_change_note = $data['status_change_note'];
        }
        if (isset($data['status_update_time'])) {
            $this->status_update_time = $data['status_update_time'];
        }
        if (isset($data['status_changed_by'])) {
            $this->status_changed_by = $data['status_changed_by'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
