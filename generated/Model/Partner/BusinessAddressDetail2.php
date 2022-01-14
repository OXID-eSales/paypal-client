<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A simple postal address with coarse-grained fields.
 *
 * generated from: customized_x_unsupported_6338_customer_common_overrides-business_address_detail.json
 */
class BusinessAddressDetail2 extends AddressPortable implements JsonSerializable
{
    use BaseModel;

    /** The address of the business. */
    public const TYPE_WORK = 'WORK';

    /**
     * Address type under which the provided address is tagged
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_WORK
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->type, "type in BusinessAddressDetail2 must not be NULL $within");
        Assert::minLength(
            $this->type,
            1,
            "type in BusinessAddressDetail2 must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->type,
            255,
            "type in BusinessAddressDetail2 must have maxlength of 255 $within"
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
