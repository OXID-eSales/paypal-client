<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The cancellation details - item.
 *
 * generated from: response-item_cancellation_details.json
 */
class ResponseItemCancellationDetails implements JsonSerializable
{
    use BaseModel;

    /** The customer cancelled the order. */
    const CANCELLED_BY_BUYER = 'BUYER';

    /** The merchant cancelled the order. */
    const CANCELLED_BY_SELLER = 'SELLER';

    /** Cancelled the billing agreement. */
    const CANCELLATION_MODE_CANCELLED_PAYPAL_BILLING_AGREEMENT = 'CANCELLED_PAYPAL_BILLING_AGREEMENT';

    /** The item was cancelled on the merchant's website. */
    const CANCELLATION_MODE_WEBSITE = 'WEBSITE';

    /** The item was cancelled through either phone or fax. */
    const CANCELLATION_MODE_PHONE = 'PHONE';

    /** The item was cancelled through either email or text message. */
    const CANCELLATION_MODE_EMAIL = 'EMAIL';

    /** The item was cancelled via written communication. */
    const CANCELLATION_MODE_WRITTEN = 'WRITTEN';

    /** The item was cancelled in person. */
    const CANCELLATION_MODE_IN_PERSON = 'IN_PERSON';

    /**
     * Indicates whether the item was canceled.
     *
     * @var boolean | null
     */
    public $cancelled;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $cancellation_time;

    /**
     * The cancellation number.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $cancellation_number;

    /**
     * The party which cancelled the order.
     *
     * use one of constants defined in this class to set the value:
     * @see CANCELLED_BY_BUYER
     * @see CANCELLED_BY_SELLER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $cancelled_by;

    /**
     * Indicates the mode used for order cancellation.
     *
     * use one of constants defined in this class to set the value:
     * @see CANCELLATION_MODE_CANCELLED_PAYPAL_BILLING_AGREEMENT
     * @see CANCELLATION_MODE_WEBSITE
     * @see CANCELLATION_MODE_PHONE
     * @see CANCELLATION_MODE_EMAIL
     * @see CANCELLATION_MODE_WRITTEN
     * @see CANCELLATION_MODE_IN_PERSON
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $cancellation_mode;

    /**
     * The URL of the Merchant or Marketplace site which have refund or cancellation policy.
     *
     * @var string | null
     */
    public $policy_url;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->cancellation_time) || Assert::minLength(
            $this->cancellation_time,
            20,
            "cancellation_time in ResponseItemCancellationDetails must have minlength of 20 $within"
        );
        !isset($this->cancellation_time) || Assert::maxLength(
            $this->cancellation_time,
            64,
            "cancellation_time in ResponseItemCancellationDetails must have maxlength of 64 $within"
        );
        !isset($this->cancellation_number) || Assert::minLength(
            $this->cancellation_number,
            1,
            "cancellation_number in ResponseItemCancellationDetails must have minlength of 1 $within"
        );
        !isset($this->cancellation_number) || Assert::maxLength(
            $this->cancellation_number,
            127,
            "cancellation_number in ResponseItemCancellationDetails must have maxlength of 127 $within"
        );
        !isset($this->cancelled_by) || Assert::minLength(
            $this->cancelled_by,
            1,
            "cancelled_by in ResponseItemCancellationDetails must have minlength of 1 $within"
        );
        !isset($this->cancelled_by) || Assert::maxLength(
            $this->cancelled_by,
            255,
            "cancelled_by in ResponseItemCancellationDetails must have maxlength of 255 $within"
        );
        !isset($this->cancellation_mode) || Assert::minLength(
            $this->cancellation_mode,
            1,
            "cancellation_mode in ResponseItemCancellationDetails must have minlength of 1 $within"
        );
        !isset($this->cancellation_mode) || Assert::maxLength(
            $this->cancellation_mode,
            255,
            "cancellation_mode in ResponseItemCancellationDetails must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['cancelled'])) {
            $this->cancelled = $data['cancelled'];
        }
        if (isset($data['cancellation_time'])) {
            $this->cancellation_time = $data['cancellation_time'];
        }
        if (isset($data['cancellation_number'])) {
            $this->cancellation_number = $data['cancellation_number'];
        }
        if (isset($data['cancelled_by'])) {
            $this->cancelled_by = $data['cancelled_by'];
        }
        if (isset($data['cancellation_mode'])) {
            $this->cancellation_mode = $data['cancellation_mode'];
        }
        if (isset($data['policy_url'])) {
            $this->policy_url = $data['policy_url'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
