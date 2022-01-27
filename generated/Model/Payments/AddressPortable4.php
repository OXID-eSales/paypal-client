<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The portable international postal address. Maps to
 * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
 * HTML 5.1 [Autofilling form controls: the autocomplete
 * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
 *
 * generated from:
 * customized_x_requiredOverride_20663_customized_x_unsupported_6934_MerchantCommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-address_portable.json
 */
class AddressPortable4 implements JsonSerializable
{
    use BaseModel;

    /**
     * The first line of the address. For example, number or street. For example, `173 Drury Lane`. Required for data
     * entry and compliance and risk checks. Must contain the full address.
     *
     * @var string
     * maxLength: 300
     */
    public $address_line_1;

    /**
     * The second line of the address. For example, suite or apartment number.
     *
     * @var string
     * maxLength: 300
     */
    public $address_line_2;

    /**
     * A city, town, or village. Smaller than `admin_area_level_1`.
     *
     * @var string
     * maxLength: 120
     */
    public $admin_area_2;

    /**
     * The highest level sub-division in a country, which is usually a province, state, or ISO-3166-2 subdivision.
     * Format for postal delivery. For example, `CA` and not `California`. Value, by country, is:<ul><li>UK. A
     * county.</li><li>US. A state.</li><li>Canada. A province.</li><li>Japan. A prefecture.</li><li>Switzerland. A
     * kanton.</li></ul>
     *
     * @var string
     * maxLength: 300
     */
    public $admin_area_1;

    /**
     * The postal code, which is the zip code or equivalent. Typically required for countries with a postal code or
     * an equivalent. See [postal code](https://en.wikipedia.org/wiki/Postal_code).
     *
     * @var string
     * maxLength: 60
     */
    public $postal_code;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->address_line_1, "address_line_1 in AddressPortable4 must not be NULL $within");
        Assert::maxLength(
            $this->address_line_1,
            300,
            "address_line_1 in AddressPortable4 must have maxlength of 300 $within"
        );
        Assert::notNull($this->address_line_2, "address_line_2 in AddressPortable4 must not be NULL $within");
        Assert::maxLength(
            $this->address_line_2,
            300,
            "address_line_2 in AddressPortable4 must have maxlength of 300 $within"
        );
        Assert::notNull($this->admin_area_2, "admin_area_2 in AddressPortable4 must not be NULL $within");
        Assert::maxLength(
            $this->admin_area_2,
            120,
            "admin_area_2 in AddressPortable4 must have maxlength of 120 $within"
        );
        Assert::notNull($this->admin_area_1, "admin_area_1 in AddressPortable4 must not be NULL $within");
        Assert::maxLength(
            $this->admin_area_1,
            300,
            "admin_area_1 in AddressPortable4 must have maxlength of 300 $within"
        );
        Assert::notNull($this->postal_code, "postal_code in AddressPortable4 must not be NULL $within");
        Assert::maxLength(
            $this->postal_code,
            60,
            "postal_code in AddressPortable4 must have maxlength of 60 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['address_line_1'])) {
            $this->address_line_1 = $data['address_line_1'];
        }
        if (isset($data['address_line_2'])) {
            $this->address_line_2 = $data['address_line_2'];
        }
        if (isset($data['admin_area_2'])) {
            $this->admin_area_2 = $data['admin_area_2'];
        }
        if (isset($data['admin_area_1'])) {
            $this->admin_area_1 = $data['admin_area_1'];
        }
        if (isset($data['postal_code'])) {
            $this->postal_code = $data['postal_code'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
