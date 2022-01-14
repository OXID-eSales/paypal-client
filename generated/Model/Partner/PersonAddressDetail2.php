<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A simple postal address with coarse-grained fields.
 *
 * generated from: customized_x_unsupported_5100_customer_common_overrides-person_address_detail.json
 */
class PersonAddressDetail2 extends AddressPortable implements JsonSerializable
{
    use BaseModel;

    /** The home address of the customer. */
    public const TYPE_HOME = 'HOME';

    /**
     * The address type under which the provided address is tagged.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_HOME
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->type, "type in PersonAddressDetail2 must not be NULL $within");
        Assert::minLength(
            $this->type,
            1,
            "type in PersonAddressDetail2 must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->type,
            255,
            "type in PersonAddressDetail2 must have maxlength of 255 $within"
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
