<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A customer- or merchant-posted message for the dispute.
 *
 * generated from: response-message.json
 */
class ResponseMessage implements JsonSerializable
{
    use BaseModel;

    /** The customer posted the message. */
    public const POSTED_BY_BUYER = 'BUYER';

    /** The merchant posted the message. */
    public const POSTED_BY_SELLER = 'SELLER';

    /** The arbiter of the dispute posted the message. */
    public const POSTED_BY_ARBITER = 'ARBITER';

    /**
     * Indicates whether the customer, merchant, or dispute arbiter posted the message.
     *
     * use one of constants defined in this class to set the value:
     * @see POSTED_BY_BUYER
     * @see POSTED_BY_SELLER
     * @see POSTED_BY_ARBITER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $posted_by;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $time_posted;

    /**
     * The message text.
     *
     * @var string | null
     * maxLength: 2000
     */
    public $content;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->posted_by) || Assert::minLength(
            $this->posted_by,
            1,
            "posted_by in ResponseMessage must have minlength of 1 $within"
        );
        !isset($this->posted_by) || Assert::maxLength(
            $this->posted_by,
            255,
            "posted_by in ResponseMessage must have maxlength of 255 $within"
        );
        !isset($this->time_posted) || Assert::minLength(
            $this->time_posted,
            20,
            "time_posted in ResponseMessage must have minlength of 20 $within"
        );
        !isset($this->time_posted) || Assert::maxLength(
            $this->time_posted,
            64,
            "time_posted in ResponseMessage must have maxlength of 64 $within"
        );
        !isset($this->content) || Assert::maxLength(
            $this->content,
            2000,
            "content in ResponseMessage must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['posted_by'])) {
            $this->posted_by = $data['posted_by'];
        }
        if (isset($data['time_posted'])) {
            $this->time_posted = $data['time_posted'];
        }
        if (isset($data['content'])) {
            $this->content = $data['content'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
