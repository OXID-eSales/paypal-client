<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The tracking information item.
 *
 * generated from: referred-referred_tracking_info.json
 */
class ReferredReferredTrackingInfo implements JsonSerializable
{
    use BaseModel;

    /** The tracking information is invalid. */
    const TRACKING_STATUS_INVALID = 'INVALID';

    /** The tracking information is not available. */
    const TRACKING_STATUS_NO_TRACKING = 'NO_TRACKING';

    /** The disputed item is in transit. */
    const TRACKING_STATUS_IN_TRANSIT = 'IN_TRANSIT';

    /** The disputed item is lost. */
    const TRACKING_STATUS_LOST = 'LOST';

    /** The disputed item was delivered to the customer. */
    const TRACKING_STATUS_DELIVERED = 'DELIVERED';

    /**
     * The name of the carrier for the shipment of the transaction for this dispute.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $carrier_name;

    /**
     * The URL to track the item shipment.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $tracking_url;

    /**
     * The tracking number for the dispute-related transaction shipment.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $tracking_number;

    /**
     * Each Tracking info sent to PP should be mapped to tracking status.
     *
     * use one of constants defined in this class to set the value:
     * @see TRACKING_STATUS_INVALID
     * @see TRACKING_STATUS_NO_TRACKING
     * @see TRACKING_STATUS_IN_TRANSIT
     * @see TRACKING_STATUS_LOST
     * @see TRACKING_STATUS_DELIVERED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $tracking_status;

    /**
     * Any notes about the tracking information.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $note;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $posted_time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->carrier_name) || Assert::minLength(
            $this->carrier_name,
            1,
            "carrier_name in ReferredReferredTrackingInfo must have minlength of 1 $within"
        );
        !isset($this->carrier_name) || Assert::maxLength(
            $this->carrier_name,
            2000,
            "carrier_name in ReferredReferredTrackingInfo must have maxlength of 2000 $within"
        );
        !isset($this->tracking_url) || Assert::minLength(
            $this->tracking_url,
            1,
            "tracking_url in ReferredReferredTrackingInfo must have minlength of 1 $within"
        );
        !isset($this->tracking_url) || Assert::maxLength(
            $this->tracking_url,
            2000,
            "tracking_url in ReferredReferredTrackingInfo must have maxlength of 2000 $within"
        );
        !isset($this->tracking_number) || Assert::minLength(
            $this->tracking_number,
            1,
            "tracking_number in ReferredReferredTrackingInfo must have minlength of 1 $within"
        );
        !isset($this->tracking_number) || Assert::maxLength(
            $this->tracking_number,
            255,
            "tracking_number in ReferredReferredTrackingInfo must have maxlength of 255 $within"
        );
        !isset($this->tracking_status) || Assert::minLength(
            $this->tracking_status,
            1,
            "tracking_status in ReferredReferredTrackingInfo must have minlength of 1 $within"
        );
        !isset($this->tracking_status) || Assert::maxLength(
            $this->tracking_status,
            255,
            "tracking_status in ReferredReferredTrackingInfo must have maxlength of 255 $within"
        );
        !isset($this->note) || Assert::minLength(
            $this->note,
            1,
            "note in ReferredReferredTrackingInfo must have minlength of 1 $within"
        );
        !isset($this->note) || Assert::maxLength(
            $this->note,
            2000,
            "note in ReferredReferredTrackingInfo must have maxlength of 2000 $within"
        );
        !isset($this->posted_time) || Assert::minLength(
            $this->posted_time,
            20,
            "posted_time in ReferredReferredTrackingInfo must have minlength of 20 $within"
        );
        !isset($this->posted_time) || Assert::maxLength(
            $this->posted_time,
            64,
            "posted_time in ReferredReferredTrackingInfo must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['carrier_name'])) {
            $this->carrier_name = $data['carrier_name'];
        }
        if (isset($data['tracking_url'])) {
            $this->tracking_url = $data['tracking_url'];
        }
        if (isset($data['tracking_number'])) {
            $this->tracking_number = $data['tracking_number'];
        }
        if (isset($data['tracking_status'])) {
            $this->tracking_status = $data['tracking_status'];
        }
        if (isset($data['note'])) {
            $this->note = $data['note'];
        }
        if (isset($data['posted_time'])) {
            $this->posted_time = $data['posted_time'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
