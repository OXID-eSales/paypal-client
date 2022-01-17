<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A merchant- or customer-submitted supporting information.
 *
 * generated from: response-supporting_info.json
 */
class ResponseSupportingInfo implements JsonSerializable
{
    use BaseModel;

    /** Information was submitted by the customer. */
    public const SOURCE_SUBMITTED_BY_BUYER = 'SUBMITTED_BY_BUYER';

    /** Information was submitted by the merchant. */
    public const SOURCE_SUBMITTED_BY_SELLER = 'SUBMITTED_BY_SELLER';

    /** Information was submitted by the partner. */
    public const SOURCE_SUBMITTED_BY_PARTNER = 'SUBMITTED_BY_PARTNER';

    /**
     * Any supporting notes.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $notes;

    /**
     * An array of metadata for the documents which were uploaded as supporting information for the dispute.
     *
     * @var ResponseDocument[] | null
     */
    public $documents;

    /**
     * The source of the Information.
     *
     * use one of constants defined in this class to set the value:
     * @see SOURCE_SUBMITTED_BY_BUYER
     * @see SOURCE_SUBMITTED_BY_SELLER
     * @see SOURCE_SUBMITTED_BY_PARTNER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $source;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $provided_time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->notes) || Assert::minLength(
            $this->notes,
            1,
            "notes in ResponseSupportingInfo must have minlength of 1 $within"
        );
        !isset($this->notes) || Assert::maxLength(
            $this->notes,
            2000,
            "notes in ResponseSupportingInfo must have maxlength of 2000 $within"
        );
        !isset($this->documents) || Assert::isArray(
            $this->documents,
            "documents in ResponseSupportingInfo must be array $within"
        );
        if (isset($this->documents)) {
            foreach ($this->documents as $item) {
                $item->validate(ResponseSupportingInfo::class);
            }
        }
        !isset($this->source) || Assert::minLength(
            $this->source,
            1,
            "source in ResponseSupportingInfo must have minlength of 1 $within"
        );
        !isset($this->source) || Assert::maxLength(
            $this->source,
            255,
            "source in ResponseSupportingInfo must have maxlength of 255 $within"
        );
        !isset($this->provided_time) || Assert::minLength(
            $this->provided_time,
            20,
            "provided_time in ResponseSupportingInfo must have minlength of 20 $within"
        );
        !isset($this->provided_time) || Assert::maxLength(
            $this->provided_time,
            64,
            "provided_time in ResponseSupportingInfo must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['notes'])) {
            $this->notes = $data['notes'];
        }
        if (isset($data['documents'])) {
            $this->documents = [];
            foreach ($data['documents'] as $item) {
                $this->documents[] = new ResponseDocument($item);
            }
        }
        if (isset($data['source'])) {
            $this->source = $data['source'];
        }
        if (isset($data['provided_time'])) {
            $this->provided_time = $data['provided_time'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
