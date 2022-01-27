<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The phone number, in its canonical international [E.164 numbering plan
 * format](https://www.itu.int/rec/T-REC-E.164/en).
 *
 * generated from: customized_x_unsupported_4124_customer_common_overrides-business_phone_detail.json
 */
class BusinessPhoneDetail2 extends Phone implements JsonSerializable
{
    use BaseModel;

    /** The customer service phone number. */
    public const TYPE_CUSTOMER_SERVICE = 'CUSTOMER_SERVICE';

    /**
     * The type of phone number provided. For example, home, work, or mobile.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_CUSTOMER_SERVICE
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->type, "type in BusinessPhoneDetail2 must not be NULL $within");
        Assert::minLength(
            $this->type,
            1,
            "type in BusinessPhoneDetail2 must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->type,
            255,
            "type in BusinessPhoneDetail2 must have maxlength of 255 $within"
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
