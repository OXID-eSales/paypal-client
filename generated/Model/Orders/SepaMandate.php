<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Details about SEPA mandate
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-sepa_mandate.json
 */
class SepaMandate implements JsonSerializable
{
    use BaseModel;

    /** SEPA mandate of type ONE_OFF. */
    const TYPE_ONE_OFF = 'ONE_OFF';

    /** SEPA mandate of type RECURRENT. */
    const TYPE_RECURRENT = 'RECURRENT';

    /**
     * Represents the type of mandate. If not provided, default is ONE_OFF.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_ONE_OFF
     * @see TYPE_RECURRENT
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $type = 'ONE_OFF';

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in SepaMandate must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            255,
            "type in SepaMandate must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
