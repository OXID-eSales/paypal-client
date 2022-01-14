<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The phone number, in its canonical international [E.164 numbering plan
 * format](https://www.itu.int/rec/T-REC-E.164/en).
 *
 * generated from: customer_common_overrides-business_phone_detail.json
 */
class BusinessPhoneDetail extends Phone implements JsonSerializable
{
    use BaseModel;

    /** The customer service phone number. */
    public const TYPE_CUSTOMER_SERVICE = 'CUSTOMER_SERVICE';

    /**
     * The name that the phone number is connected to.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 900
     */
    public $contact_name;

    /**
     * Whether this phone number has been inactivated by the user.
     *
     * @var boolean | null
     */
    public $inactive;

    /**
     * Whether this is the primary contact phone number of the user.
     *
     * @var boolean | null
     */
    public $primary;

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

    /**
     * Array of tags for this phone number.
     *
     * @var string[]
     * maxItems: 0
     * maxItems: 20
     */
    public $tags;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->contact_name) || Assert::minLength(
            $this->contact_name,
            1,
            "contact_name in BusinessPhoneDetail must have minlength of 1 $within"
        );
        !isset($this->contact_name) || Assert::maxLength(
            $this->contact_name,
            900,
            "contact_name in BusinessPhoneDetail must have maxlength of 900 $within"
        );
        Assert::notNull($this->type, "type in BusinessPhoneDetail must not be NULL $within");
        Assert::minLength(
            $this->type,
            1,
            "type in BusinessPhoneDetail must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->type,
            255,
            "type in BusinessPhoneDetail must have maxlength of 255 $within"
        );
        Assert::notNull($this->tags, "tags in BusinessPhoneDetail must not be NULL $within");
        Assert::minCount(
            $this->tags,
            0,
            "tags in BusinessPhoneDetail must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->tags,
            20,
            "tags in BusinessPhoneDetail must have max. count of 20 $within"
        );
        Assert::isArray(
            $this->tags,
            "tags in BusinessPhoneDetail must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['contact_name'])) {
            $this->contact_name = $data['contact_name'];
        }
        if (isset($data['inactive'])) {
            $this->inactive = $data['inactive'];
        }
        if (isset($data['primary'])) {
            $this->primary = $data['primary'];
        }
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['tags'])) {
            $this->tags = [];
            foreach ($data['tags'] as $item) {
                $this->tags[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        $this->tags = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
