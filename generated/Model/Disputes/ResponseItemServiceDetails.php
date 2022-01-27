<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The service details - item.
 *
 * generated from: response-item_service_details.json
 */
class ResponseItemServiceDetails implements JsonSerializable
{
    use BaseModel;

    /** The Customer did not receive the service. */
    public const SUB_REASON_NOT_RECEIVED = 'NOT_RECEIVED';

    /** The service was different from what was expected. */
    public const SUB_REASON_DIFFERENT = 'DIFFERENT';

    /** The service was incomplete. */
    public const SUB_REASON_INCOMPLETE = 'INCOMPLETE';

    /** The service was unusable. */
    public const SUB_REASON_UNUSABLE = 'UNUSABLE';

    /** The service was delayed or rescheduled. */
    public const SUB_REASON_DELAYED = 'DELAYED';

    /** The service was cancelled. */
    public const SUB_REASON_CANCELLED = 'CANCELLED';

    /** The repair service. */
    public const CATEGORY_REPAIR = 'REPAIR';

    /** The installation service. */
    public const CATEGORY_INSTALLATION = 'INSTALLATION';

    /** Donations for charitable causes and so on. */
    public const CATEGORY_DONATION = 'DONATION';

    /** Financial products or investments. */
    public const CATEGORY_INVESTMENT = 'INVESTMENT';

    /** Other services. */
    public const CATEGORY_OTHER = 'OTHER';

    /**
     * The sub-reason for the service issue.
     *
     * use one of constants defined in this class to set the value:
     * @see SUB_REASON_NOT_RECEIVED
     * @see SUB_REASON_DIFFERENT
     * @see SUB_REASON_INCOMPLETE
     * @see SUB_REASON_UNUSABLE
     * @see SUB_REASON_DELAYED
     * @see SUB_REASON_CANCELLED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $sub_reason;

    /**
     * The service category of the item in dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see CATEGORY_REPAIR
     * @see CATEGORY_INSTALLATION
     * @see CATEGORY_DONATION
     * @see CATEGORY_INVESTMENT
     * @see CATEGORY_OTHER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $category;

    /**
     * The URL of the merchant or marketplace site where the customer purchased the service.
     *
     * @var string | null
     */
    public $purchase_url;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $completed_time;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $expected_time;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $scheduled_time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->sub_reason) || Assert::minLength(
            $this->sub_reason,
            1,
            "sub_reason in ResponseItemServiceDetails must have minlength of 1 $within"
        );
        !isset($this->sub_reason) || Assert::maxLength(
            $this->sub_reason,
            255,
            "sub_reason in ResponseItemServiceDetails must have maxlength of 255 $within"
        );
        !isset($this->category) || Assert::minLength(
            $this->category,
            1,
            "category in ResponseItemServiceDetails must have minlength of 1 $within"
        );
        !isset($this->category) || Assert::maxLength(
            $this->category,
            255,
            "category in ResponseItemServiceDetails must have maxlength of 255 $within"
        );
        !isset($this->completed_time) || Assert::minLength(
            $this->completed_time,
            20,
            "completed_time in ResponseItemServiceDetails must have minlength of 20 $within"
        );
        !isset($this->completed_time) || Assert::maxLength(
            $this->completed_time,
            64,
            "completed_time in ResponseItemServiceDetails must have maxlength of 64 $within"
        );
        !isset($this->expected_time) || Assert::minLength(
            $this->expected_time,
            20,
            "expected_time in ResponseItemServiceDetails must have minlength of 20 $within"
        );
        !isset($this->expected_time) || Assert::maxLength(
            $this->expected_time,
            64,
            "expected_time in ResponseItemServiceDetails must have maxlength of 64 $within"
        );
        !isset($this->scheduled_time) || Assert::minLength(
            $this->scheduled_time,
            20,
            "scheduled_time in ResponseItemServiceDetails must have minlength of 20 $within"
        );
        !isset($this->scheduled_time) || Assert::maxLength(
            $this->scheduled_time,
            64,
            "scheduled_time in ResponseItemServiceDetails must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['sub_reason'])) {
            $this->sub_reason = $data['sub_reason'];
        }
        if (isset($data['category'])) {
            $this->category = $data['category'];
        }
        if (isset($data['purchase_url'])) {
            $this->purchase_url = $data['purchase_url'];
        }
        if (isset($data['completed_time'])) {
            $this->completed_time = $data['completed_time'];
        }
        if (isset($data['expected_time'])) {
            $this->expected_time = $data['expected_time'];
        }
        if (isset($data['scheduled_time'])) {
            $this->scheduled_time = $data['scheduled_time'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
