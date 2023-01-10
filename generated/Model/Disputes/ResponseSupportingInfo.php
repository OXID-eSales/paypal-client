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
    const SOURCE_SUBMITTED_BY_BUYER = 'SUBMITTED_BY_BUYER';

    /** Information was submitted by the merchant. */
    const SOURCE_SUBMITTED_BY_SELLER = 'SUBMITTED_BY_SELLER';

    /** Information was submitted by the partner. */
    const SOURCE_SUBMITTED_BY_PARTNER = 'SUBMITTED_BY_PARTNER';

    /** A customer and merchant interact in an attempt to resolve a dispute without escalation to PayPal. Occurs when the customer:<ul><li>Has not received goods or a service.</li><li>Reports that the received goods or service are not as described.</li><li>Needs more details, such as a copy of the transaction or a receipt.</li></ul> */
    const DISPUTE_LIFE_CYCLE_STAGE_INQUIRY = 'INQUIRY';

    /** A customer or merchant escalates an inquiry to a claim, which authorizes PayPal to investigate the case and make a determination. Occurs only when the dispute channel is <code>INTERNAL</code>. This stage is a PayPal dispute lifecycle stage and not a credit card or debit card chargeback. All notes that the customer sends in this stage are visible to PayPal agents only. The customer must wait for PayPal’s response before the customer can take further action. In this stage, PayPal shares dispute details with the merchant, who can complete one of these actions:<ul><li>Accept the claim.</li><li>Submit evidence to challenge the claim.</li><li>Make an offer to the customer to resolve the claim.</li></ul> */
    const DISPUTE_LIFE_CYCLE_STAGE_CHARGEBACK = 'CHARGEBACK';

    /** The first appeal stage for merchants. A merchant can appeal a chargeback if PayPal's decision is not in the merchant's favor. If the merchant does not appeal within the appeal period, PayPal considers the case resolved. */
    const DISPUTE_LIFE_CYCLE_STAGE_PRE_ARBITRATION = 'PRE_ARBITRATION';

    /** The second appeal stage for merchants. A merchant can appeal a dispute for a second time if the first appeal was denied. If the merchant does not appeal within the appeal period, the case returns to a resolved status in pre-arbitration stage. */
    const DISPUTE_LIFE_CYCLE_STAGE_ARBITRATION = 'ARBITRATION';

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
     * @var ResponseDocument[]
     * maxItems: 1
     * maxItems: 100
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

    /**
     * The stage in the dispute lifecycle.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_LIFE_CYCLE_STAGE_INQUIRY
     * @see DISPUTE_LIFE_CYCLE_STAGE_CHARGEBACK
     * @see DISPUTE_LIFE_CYCLE_STAGE_PRE_ARBITRATION
     * @see DISPUTE_LIFE_CYCLE_STAGE_ARBITRATION
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_life_cycle_stage;

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
        Assert::notNull($this->documents, "documents in ResponseSupportingInfo must not be NULL $within");
        Assert::minCount(
            $this->documents,
            1,
            "documents in ResponseSupportingInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->documents,
            100,
            "documents in ResponseSupportingInfo must have max. count of 100 $within"
        );
        Assert::isArray(
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
        !isset($this->dispute_life_cycle_stage) || Assert::minLength(
            $this->dispute_life_cycle_stage,
            1,
            "dispute_life_cycle_stage in ResponseSupportingInfo must have minlength of 1 $within"
        );
        !isset($this->dispute_life_cycle_stage) || Assert::maxLength(
            $this->dispute_life_cycle_stage,
            255,
            "dispute_life_cycle_stage in ResponseSupportingInfo must have maxlength of 255 $within"
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
        if (isset($data['dispute_life_cycle_stage'])) {
            $this->dispute_life_cycle_stage = $data['dispute_life_cycle_stage'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->documents = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
