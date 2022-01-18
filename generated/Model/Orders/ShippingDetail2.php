<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The shipping details.
 *
 * generated from:
 * customized_x_unsupported_4353_MerchantsCommonComponentsSpecification-v1-schema-shipping_detail.json
 */
class ShippingDetail2 implements JsonSerializable
{
    use BaseModel;

    /**
     * The name of the party.
     *
     * @var Name4 | null
     */
    public $name;

    /**
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     *
     * @var AddressPortable2 | null
     */
    public $address;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::isInstanceOf(
            $this->name,
            Name4::class,
            "name in ShippingDetail2 must be instance of Name4 $within"
        );
        !isset($this->name) ||  $this->name->validate(ShippingDetail2::class);
        !isset($this->address) || Assert::isInstanceOf(
            $this->address,
            AddressPortable2::class,
            "address in ShippingDetail2 must be instance of AddressPortable2 $within"
        );
        !isset($this->address) ||  $this->address->validate(ShippingDetail2::class);
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = new Name4($data['name']);
        }
        if (isset($data['address'])) {
            $this->address = new AddressPortable2($data['address']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initName(): Name4
    {
        return $this->name = new Name4();
    }

    public function initAddress(): AddressPortable2
    {
        return $this->address = new AddressPortable2();
    }
}
