<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The Booking information.
 *
 * generated from: response-item_booking_details.json
 */
class ResponseItemBookingDetails implements JsonSerializable
{
    use BaseModel;

    /** The booking confirmation was not received. */
    const SUB_REASON_NOT_RECEIVED = 'NOT_RECEIVED';

    /** The received booking was different. */
    const SUB_REASON_DIFFERENT = 'DIFFERENT';

    /** The booking was cancelled. */
    const SUB_REASON_CANCELLED = 'CANCELLED';

    /** Travel items and travel needs. */
    const CATEGORY_TRAVEL = 'TRAVEL';

    /** Tickets for events, such as sports, concerts, and so on. */
    const CATEGORY_TICKETS = 'TICKETS';

    /** Booking for hotels and similar accommodation. */
    const CATEGORY_ACCOMMODATION = 'ACCOMMODATION';

    /** Other bookings. */
    const CATEGORY_OTHER = 'OTHER';

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $booking_time;

    /**
     * The sub-reason for the booking issue.
     *
     * use one of constants defined in this class to set the value:
     * @see SUB_REASON_NOT_RECEIVED
     * @see SUB_REASON_DIFFERENT
     * @see SUB_REASON_CANCELLED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $sub_reason;

    /**
     * The booking category of the item in dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see CATEGORY_TRAVEL
     * @see CATEGORY_TICKETS
     * @see CATEGORY_ACCOMMODATION
     * @see CATEGORY_OTHER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $category;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->booking_time) || Assert::minLength(
            $this->booking_time,
            20,
            "booking_time in ResponseItemBookingDetails must have minlength of 20 $within"
        );
        !isset($this->booking_time) || Assert::maxLength(
            $this->booking_time,
            64,
            "booking_time in ResponseItemBookingDetails must have maxlength of 64 $within"
        );
        !isset($this->sub_reason) || Assert::minLength(
            $this->sub_reason,
            1,
            "sub_reason in ResponseItemBookingDetails must have minlength of 1 $within"
        );
        !isset($this->sub_reason) || Assert::maxLength(
            $this->sub_reason,
            255,
            "sub_reason in ResponseItemBookingDetails must have maxlength of 255 $within"
        );
        !isset($this->category) || Assert::minLength(
            $this->category,
            1,
            "category in ResponseItemBookingDetails must have minlength of 1 $within"
        );
        !isset($this->category) || Assert::maxLength(
            $this->category,
            255,
            "category in ResponseItemBookingDetails must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['booking_time'])) {
            $this->booking_time = $data['booking_time'];
        }
        if (isset($data['sub_reason'])) {
            $this->sub_reason = $data['sub_reason'];
        }
        if (isset($data['category'])) {
            $this->category = $data['category'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
