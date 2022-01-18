<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The individual owner of the account.
 *
 * generated from: customized_x_unsupported_9657_customer_common_overrides-individual_owner.json
 */
class IndividualOwner extends Person implements JsonSerializable
{
    use BaseModel;

    /** Primary account holder. */
    public const TYPE_PRIMARY = 'PRIMARY';

    /**
     * Role of the person party played in the account.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_PRIMARY
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in IndividualOwner must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            255,
            "type in IndividualOwner must have maxlength of 255 $within"
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
        parent::__construct($data);
        if (isset($data)) {
            $this->map($data);
        }
    }
}
