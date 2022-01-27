<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer- or merchant-provided messages about the dispute.
 *
 * generated from: referred-referred_message.json
 */
class ReferredReferredMessage implements JsonSerializable
{
    use BaseModel;

    /** The customer posted the message. */
    public const POSTED_BY_BUYER = 'BUYER';

    /** The merchant posted the message. */
    public const POSTED_BY_SELLER = 'SELLER';

    /**
     * The customer or merchant who posted the message.
     *
     * use one of constants defined in this class to set the value:
     * @see POSTED_BY_BUYER
     * @see POSTED_BY_SELLER
     * @var string
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
    public $posted_time;

    /**
     * The customer- or merchant-posted content.
     *
     * @var string
     * maxLength: 2000
     */
    public $content;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->posted_by, "posted_by in ReferredReferredMessage must not be NULL $within");
        Assert::minLength(
            $this->posted_by,
            1,
            "posted_by in ReferredReferredMessage must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->posted_by,
            255,
            "posted_by in ReferredReferredMessage must have maxlength of 255 $within"
        );
        !isset($this->posted_time) || Assert::minLength(
            $this->posted_time,
            20,
            "posted_time in ReferredReferredMessage must have minlength of 20 $within"
        );
        !isset($this->posted_time) || Assert::maxLength(
            $this->posted_time,
            64,
            "posted_time in ReferredReferredMessage must have maxlength of 64 $within"
        );
        Assert::notNull($this->content, "content in ReferredReferredMessage must not be NULL $within");
        Assert::maxLength(
            $this->content,
            2000,
            "content in ReferredReferredMessage must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['posted_by'])) {
            $this->posted_by = $data['posted_by'];
        }
        if (isset($data['posted_time'])) {
            $this->posted_time = $data['posted_time'];
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
