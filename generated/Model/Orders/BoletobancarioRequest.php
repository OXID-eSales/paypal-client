<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Information needed to pay using Boleto Bancário.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-boletobancario_request.json
 */
class BoletobancarioRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The full name representation like Mr J Smith.
     *
     * @var string
     * minLength: 3
     * maxLength: 300
     */
    public $name;

    /**
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * @var string
     * minLength: 3
     * maxLength: 254
     */
    public $email;

    /**
     * The [two-character ISO 3166-1 code](/docs/integration/direct/rest/country-codes/) that identifies the country
     * or region.<blockquote><strong>Note:</strong> The country code for Great Britain is <code>GB</code> and not
     * <code>UK</code> as used in the top-level domain names for that country. Use the `C2` country code for China
     * worldwide for comparable uncontrolled price (CUP) method, bank card, and cross-border
     * transactions.</blockquote>
     *
     * @var string
     * minLength: 2
     * maxLength: 2
     */
    public $country_code;

    /**
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     *
     * @var AddressPortable5
     */
    public $billing_address;

    /**
     * The tax ID of the customer. The customer is also known as the payer. Both `tax_id` and `tax_id_type` are
     * required.
     *
     * @var TaxInfo
     */
    public $tax_info;

    /**
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     *
     * @var string | null
     * minLength: 10
     * maxLength: 10
     */
    public $expiry_date;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->name, "name in BoletobancarioRequest must not be NULL $within");
        Assert::minLength(
            $this->name,
            3,
            "name in BoletobancarioRequest must have minlength of 3 $within"
        );
        Assert::maxLength(
            $this->name,
            300,
            "name in BoletobancarioRequest must have maxlength of 300 $within"
        );
        Assert::notNull($this->email, "email in BoletobancarioRequest must not be NULL $within");
        Assert::minLength(
            $this->email,
            3,
            "email in BoletobancarioRequest must have minlength of 3 $within"
        );
        Assert::maxLength(
            $this->email,
            254,
            "email in BoletobancarioRequest must have maxlength of 254 $within"
        );
        Assert::notNull($this->country_code, "country_code in BoletobancarioRequest must not be NULL $within");
        Assert::minLength(
            $this->country_code,
            2,
            "country_code in BoletobancarioRequest must have minlength of 2 $within"
        );
        Assert::maxLength(
            $this->country_code,
            2,
            "country_code in BoletobancarioRequest must have maxlength of 2 $within"
        );
        Assert::notNull($this->billing_address, "billing_address in BoletobancarioRequest must not be NULL $within");
        Assert::isInstanceOf(
            $this->billing_address,
            AddressPortable5::class,
            "billing_address in BoletobancarioRequest must be instance of AddressPortable5 $within"
        );
         $this->billing_address->validate(BoletobancarioRequest::class);
        Assert::notNull($this->tax_info, "tax_info in BoletobancarioRequest must not be NULL $within");
        Assert::isInstanceOf(
            $this->tax_info,
            TaxInfo::class,
            "tax_info in BoletobancarioRequest must be instance of TaxInfo $within"
        );
         $this->tax_info->validate(BoletobancarioRequest::class);
        !isset($this->expiry_date) || Assert::minLength(
            $this->expiry_date,
            10,
            "expiry_date in BoletobancarioRequest must have minlength of 10 $within"
        );
        !isset($this->expiry_date) || Assert::maxLength(
            $this->expiry_date,
            10,
            "expiry_date in BoletobancarioRequest must have maxlength of 10 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
        if (isset($data['country_code'])) {
            $this->country_code = $data['country_code'];
        }
        if (isset($data['billing_address'])) {
            $this->billing_address = new AddressPortable5($data['billing_address']);
        }
        if (isset($data['tax_info'])) {
            $this->tax_info = new TaxInfo($data['tax_info']);
        }
        if (isset($data['expiry_date'])) {
            $this->expiry_date = $data['expiry_date'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->billing_address = new AddressPortable5();
        $this->tax_info = new TaxInfo();
        if (isset($data)) {
            $this->map($data);
        }
    }
}
