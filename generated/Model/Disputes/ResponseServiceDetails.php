<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The service details.
 *
 * generated from: response-service_details.json
 */
class ResponseServiceDetails implements JsonSerializable
{
    use BaseModel;

    /** The service was started. */
    public const SERVICE_STARTED_YES = 'YES';

    /** The service was not started. */
    public const SERVICE_STARTED_NO = 'NO';

    /** The service was cancelled. */
    public const SERVICE_STARTED_CANCELLED = 'CANCELLED';

    /**
     * The service description.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $description;

    /**
     * Indicates whether the service was started or cancelled.
     *
     * use one of constants defined in this class to set the value:
     * @see SERVICE_STARTED_YES
     * @see SERVICE_STARTED_NO
     * @see SERVICE_STARTED_CANCELLED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $service_started;

    /**
     * The customer specified note about the service usage.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $note;

    /**
     * An array of sub-reasons for the service issue.
     *
     * @var string[] | null
     */
    public $sub_reasons;

    /**
     * The URL of the merchant or marketplace site where the customer purchased the service.
     *
     * @var string | null
     */
    public $purchase_url;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->description) || Assert::minLength(
            $this->description,
            1,
            "description in ResponseServiceDetails must have minlength of 1 $within"
        );
        !isset($this->description) || Assert::maxLength(
            $this->description,
            2000,
            "description in ResponseServiceDetails must have maxlength of 2000 $within"
        );
        !isset($this->service_started) || Assert::minLength(
            $this->service_started,
            1,
            "service_started in ResponseServiceDetails must have minlength of 1 $within"
        );
        !isset($this->service_started) || Assert::maxLength(
            $this->service_started,
            255,
            "service_started in ResponseServiceDetails must have maxlength of 255 $within"
        );
        !isset($this->note) || Assert::minLength(
            $this->note,
            1,
            "note in ResponseServiceDetails must have minlength of 1 $within"
        );
        !isset($this->note) || Assert::maxLength(
            $this->note,
            2000,
            "note in ResponseServiceDetails must have maxlength of 2000 $within"
        );
        !isset($this->sub_reasons) || Assert::isArray(
            $this->sub_reasons,
            "sub_reasons in ResponseServiceDetails must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['description'])) {
            $this->description = $data['description'];
        }
        if (isset($data['service_started'])) {
            $this->service_started = $data['service_started'];
        }
        if (isset($data['note'])) {
            $this->note = $data['note'];
        }
        if (isset($data['sub_reasons'])) {
            $this->sub_reasons = [];
            foreach ($data['sub_reasons'] as $item) {
                $this->sub_reasons[] = $item;
            }
        }
        if (isset($data['purchase_url'])) {
            $this->purchase_url = $data['purchase_url'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
