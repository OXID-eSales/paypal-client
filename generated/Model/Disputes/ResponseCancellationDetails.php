<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The cancellation details.
 *
 * generated from: response-cancellation_details.json
 */
class ResponseCancellationDetails implements JsonSerializable
{
    use BaseModel;

    /** Cancelled the billing agreement. */
    public const CANCELLATION_MODE_CANCELLED_PAYPAL_BILLING_AGREEMENT = 'CANCELLED_PAYPAL_BILLING_AGREEMENT';

    /** The item was cancelled on the merchant's website. */
    public const CANCELLATION_MODE_WEBSITE = 'WEBSITE';

    /** The item was cancelled through either phone or fax. */
    public const CANCELLATION_MODE_PHONE = 'PHONE';

    /** The item was cancelled through either email or text message. */
    public const CANCELLATION_MODE_EMAIL = 'EMAIL';

    /** The item was cancelled via written communication. */
    public const CANCELLATION_MODE_WRITTEN = 'WRITTEN';

    /** The item was cancelled in person. */
    public const CANCELLATION_MODE_IN_PERSON = 'IN_PERSON';

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $cancellation_date;

    /**
     * The cancellation number.
     *
     * @var string | null
     */
    public $cancellation_number;

    /**
     * Indicates whether the dispute was canceled.
     *
     * @var boolean | null
     */
    public $cancelled;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->cancellation_date) || Assert::minLength(
            $this->cancellation_date,
            20,
            "cancellation_date in ResponseCancellationDetails must have minlength of 20 $within"
        );
        !isset($this->cancellation_date) || Assert::maxLength(
            $this->cancellation_date,
            64,
            "cancellation_date in ResponseCancellationDetails must have maxlength of 64 $within"
        );
        !isset($this->cancellation_mode) || Assert::minLength(
            $this->cancellation_mode,
            1,
            "cancellation_mode in ResponseCancellationDetails must have minlength of 1 $within"
        );
        !isset($this->cancellation_mode) || Assert::maxLength(
            $this->cancellation_mode,
            255,
            "cancellation_mode in ResponseCancellationDetails must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['cancellation_date'])) {
            $this->cancellation_date = $data['cancellation_date'];
        }
        if (isset($data['cancellation_number'])) {
            $this->cancellation_number = $data['cancellation_number'];
        }
        if (isset($data['cancelled'])) {
            $this->cancelled = $data['cancelled'];
        }
        if (isset($data['cancellation_mode'])) {
            $this->cancellation_mode = $data['cancellation_mode'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
