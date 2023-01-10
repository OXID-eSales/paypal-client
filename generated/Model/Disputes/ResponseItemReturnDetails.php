<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The return details for the product - item.
 *
 * generated from: response-item_return_details.json
 */
class ResponseItemReturnDetails implements JsonSerializable
{
    use BaseModel;

    /** The customer shipped the product back to the merchant. */
    const MODE_SHIPPED = 'SHIPPED';

    /** The customer returned the item to the merchant in person. */
    const MODE_IN_PERSON = 'IN_PERSON';

    /**
     * If `true`, indicates that the item was returned but the seller refused to accept the return and if `false`,
     * indicates the item was not attempted to return.
     *
     * @var boolean | null
     */
    public $returned;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $return_time;

    /**
     * The method that the customer used to return the product.
     *
     * use one of constants defined in this class to set the value:
     * @see MODE_SHIPPED
     * @see MODE_IN_PERSON
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $mode;

    /**
     * The tracking number for the item return.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $return_tracking_number;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->return_time) || Assert::minLength(
            $this->return_time,
            20,
            "return_time in ResponseItemReturnDetails must have minlength of 20 $within"
        );
        !isset($this->return_time) || Assert::maxLength(
            $this->return_time,
            64,
            "return_time in ResponseItemReturnDetails must have maxlength of 64 $within"
        );
        !isset($this->mode) || Assert::minLength(
            $this->mode,
            1,
            "mode in ResponseItemReturnDetails must have minlength of 1 $within"
        );
        !isset($this->mode) || Assert::maxLength(
            $this->mode,
            255,
            "mode in ResponseItemReturnDetails must have maxlength of 255 $within"
        );
        !isset($this->return_tracking_number) || Assert::minLength(
            $this->return_tracking_number,
            1,
            "return_tracking_number in ResponseItemReturnDetails must have minlength of 1 $within"
        );
        !isset($this->return_tracking_number) || Assert::maxLength(
            $this->return_tracking_number,
            255,
            "return_tracking_number in ResponseItemReturnDetails must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['returned'])) {
            $this->returned = $data['returned'];
        }
        if (isset($data['return_time'])) {
            $this->return_time = $data['return_time'];
        }
        if (isset($data['mode'])) {
            $this->mode = $data['mode'];
        }
        if (isset($data['return_tracking_number'])) {
            $this->return_tracking_number = $data['return_tracking_number'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
