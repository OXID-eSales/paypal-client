<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A simple postal address with coarse-grained fields.
 *
 * generated from: customer_common_overrides-person_address_detail.json
 */
class PersonAddressDetail extends AddressPortable implements JsonSerializable
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

    /**
     * Whether this is the primary address of the user. This cannot be directly set to `false`, but rather it is
     * toggled `false` in the datastore when another address is set to primary.
     *
     * @var boolean | null
     */
    public $primary;

    /**
     * Whether this address has been inactivated.
     *
     * @var boolean | null
     */
    public $inactive;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->type, "type in PersonAddressDetail must not be NULL $within");
        Assert::minLength(
            $this->type,
            1,
            "type in PersonAddressDetail must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->type,
            255,
            "type in PersonAddressDetail must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['primary'])) {
            $this->primary = $data['primary'];
        }
        if (isset($data['inactive'])) {
            $this->inactive = $data['inactive'];
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
