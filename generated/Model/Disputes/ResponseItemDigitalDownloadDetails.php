<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The Digital download information.
 *
 * generated from: response-item_digital_download_details.json
 */
class ResponseItemDigitalDownloadDetails implements JsonSerializable
{
    use BaseModel;

    /** Did not receive the digital download. */
    const SUB_REASON_NOT_DOWNLOADABLE = 'NOT_DOWNLOADABLE';

    /** Could not access or use the digital download or content. */
    const SUB_REASON_INACCESSIBLE = 'INACCESSIBLE';

    /** Charged for an incomplete or incompatible download. */
    const SUB_REASON_INCOMPLETE = 'INCOMPLETE';

    /** Non-physical objects, such as online games. */
    const CATEGORY_VIRTUAL_GOODS = 'VIRTUAL_GOODS';

    /** Gift or pre-paid cards. */
    const CATEGORY_GIFT_CARD = 'GIFT_CARD';

    /** Other digital downloads. */
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
    public $download_time;

    /**
     * The URL where the customer downloaded the digital product.
     *
     * @var string | null
     */
    public $download_url;

    /**
     * The sub-reason for the digital download issue.
     *
     * use one of constants defined in this class to set the value:
     * @see SUB_REASON_NOT_DOWNLOADABLE
     * @see SUB_REASON_INACCESSIBLE
     * @see SUB_REASON_INCOMPLETE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $sub_reason;

    /**
     * The digital download category of the item in dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see CATEGORY_VIRTUAL_GOODS
     * @see CATEGORY_GIFT_CARD
     * @see CATEGORY_OTHER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $category;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->download_time) || Assert::minLength(
            $this->download_time,
            20,
            "download_time in ResponseItemDigitalDownloadDetails must have minlength of 20 $within"
        );
        !isset($this->download_time) || Assert::maxLength(
            $this->download_time,
            64,
            "download_time in ResponseItemDigitalDownloadDetails must have maxlength of 64 $within"
        );
        !isset($this->sub_reason) || Assert::minLength(
            $this->sub_reason,
            1,
            "sub_reason in ResponseItemDigitalDownloadDetails must have minlength of 1 $within"
        );
        !isset($this->sub_reason) || Assert::maxLength(
            $this->sub_reason,
            255,
            "sub_reason in ResponseItemDigitalDownloadDetails must have maxlength of 255 $within"
        );
        !isset($this->category) || Assert::minLength(
            $this->category,
            1,
            "category in ResponseItemDigitalDownloadDetails must have minlength of 1 $within"
        );
        !isset($this->category) || Assert::maxLength(
            $this->category,
            255,
            "category in ResponseItemDigitalDownloadDetails must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['download_time'])) {
            $this->download_time = $data['download_time'];
        }
        if (isset($data['download_url'])) {
            $this->download_url = $data['download_url'];
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
