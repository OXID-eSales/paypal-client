<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The name of the person.
 *
 * generated from: customized_x_unsupported_5585_customer_common-v1-schema-account_model-person_name.json
 */
class PersonName extends Name implements JsonSerializable
{
    use BaseModel;

    /** Indicates that this name is the legal name of the user. */
    public const TYPE_LEGAL = 'LEGAL';

    /**
     * The person's name type.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_LEGAL
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->type, "type in PersonName must not be NULL $within");
        Assert::minLength(
            $this->type,
            1,
            "type in PersonName must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->type,
            255,
            "type in PersonName must have maxlength of 255 $within"
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
