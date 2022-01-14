<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The outcome of the dispute case.
 *
 * generated from: referred-outcome.json
 */
class ReferredOutcome implements JsonSerializable
{
    use BaseModel;

    /** The customer is at fault. */
    public const FAULTY_PARTY_BUYER = 'BUYER';

    /** The merchant is at fault. */
    public const FAULTY_PARTY_SELLER = 'SELLER';

    /** The partner is at fault. */
    public const FAULTY_PARTY_PARTNER = 'PARTNER';

    /** No specific party is at fault. */
    public const FAULTY_PARTY_NONE = 'NONE';

    /**
     * The party that was at fault.
     *
     * use one of constants defined in this class to set the value:
     * @see FAULTY_PARTY_BUYER
     * @see FAULTY_PARTY_SELLER
     * @see FAULTY_PARTY_PARTNER
     * @see FAULTY_PARTY_NONE
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $faulty_party;

    /**
     * The reason for the decision.
     *
     * @var string
     * minLength: 1
     * maxLength: 2000
     */
    public $adjudication_reason;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $resolution_date;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->faulty_party, "faulty_party in ReferredOutcome must not be NULL $within");
        Assert::minLength(
            $this->faulty_party,
            1,
            "faulty_party in ReferredOutcome must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->faulty_party,
            255,
            "faulty_party in ReferredOutcome must have maxlength of 255 $within"
        );
        Assert::notNull($this->adjudication_reason, "adjudication_reason in ReferredOutcome must not be NULL $within");
        Assert::minLength(
            $this->adjudication_reason,
            1,
            "adjudication_reason in ReferredOutcome must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->adjudication_reason,
            2000,
            "adjudication_reason in ReferredOutcome must have maxlength of 2000 $within"
        );
        !isset($this->resolution_date) || Assert::minLength(
            $this->resolution_date,
            20,
            "resolution_date in ReferredOutcome must have minlength of 20 $within"
        );
        !isset($this->resolution_date) || Assert::maxLength(
            $this->resolution_date,
            64,
            "resolution_date in ReferredOutcome must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['faulty_party'])) {
            $this->faulty_party = $data['faulty_party'];
        }
        if (isset($data['adjudication_reason'])) {
            $this->adjudication_reason = $data['adjudication_reason'];
        }
        if (isset($data['resolution_date'])) {
            $this->resolution_date = $data['resolution_date'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
