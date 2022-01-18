<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details for the regulation under which the transaction is covered.
 *
 * generated from: response-regulation_info.json
 */
class ResponseRegulationInfo implements JsonSerializable
{
    use BaseModel;

    /** No regulation. */
    public const REGULATION_COVERED_NONE = 'NONE';

    /** E regulation. */
    public const REGULATION_COVERED_REG_E = 'REG_E';

    /** Z regulation. */
    public const REGULATION_COVERED_REG_Z = 'REG_Z';

    /** ZCAD regulation. */
    public const REGULATION_COVERED_REG_ZCAD = 'REG_ZCAD';

    /** PPBP regulation. */
    public const REGULATION_COVERED_PPBP = 'PPBP';

    /** Deferred claim regulation. */
    public const REGULATION_COVERED_DEFERRED_CLAIM = 'DEFERRED_CLAIM';

    /** LUX AGGR regulation. */
    public const REGULATION_COVERED_LUX_AGGR = 'LUX_AGGR';

    /**
     * The regulation under which the transaction is covered.
     *
     * use one of constants defined in this class to set the value:
     * @see REGULATION_COVERED_NONE
     * @see REGULATION_COVERED_REG_E
     * @see REGULATION_COVERED_REG_Z
     * @see REGULATION_COVERED_REG_ZCAD
     * @see REGULATION_COVERED_PPBP
     * @see REGULATION_COVERED_DEFERRED_CLAIM
     * @see REGULATION_COVERED_LUX_AGGR
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $regulation_covered;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $resolution_sla;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->regulation_covered) || Assert::minLength(
            $this->regulation_covered,
            1,
            "regulation_covered in ResponseRegulationInfo must have minlength of 1 $within"
        );
        !isset($this->regulation_covered) || Assert::maxLength(
            $this->regulation_covered,
            255,
            "regulation_covered in ResponseRegulationInfo must have maxlength of 255 $within"
        );
        !isset($this->resolution_sla) || Assert::minLength(
            $this->resolution_sla,
            20,
            "resolution_sla in ResponseRegulationInfo must have minlength of 20 $within"
        );
        !isset($this->resolution_sla) || Assert::maxLength(
            $this->resolution_sla,
            64,
            "resolution_sla in ResponseRegulationInfo must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['regulation_covered'])) {
            $this->regulation_covered = $data['regulation_covered'];
        }
        if (isset($data['resolution_sla'])) {
            $this->resolution_sla = $data['resolution_sla'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
