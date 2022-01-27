<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Information used to pay using Boleto Bancário.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-boletobancario.json
 */
class Boletobancario implements JsonSerializable
{
    use BaseModel;

    /**
     * The full name representation like Mr J Smith.
     *
     * @var string | null
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
     * @var string | null
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
     * @var string | null
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
     * @var AddressPortable4 | null
     */
    public $billing_address;

    /**
     * The tax ID of the customer. The customer is also known as the payer. Both `tax_id` and `tax_id_type` are
     * required.
     *
     * @var TaxInfo | null
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

    /**
     * Document references of the Boleto Bancário voucher. This is required by the account holder to complete the
     * payment with Boleto Bancário voucher. The account holder can use these document references to pay the Boleto
     * Bancário voucher with, for example, a banking app. For Boleto Bancário payment method DOCUMENT_ID, BARCODE
     * and BARCODE_URL document types are available.
     *
     * @var DocumentReference[]
     * maxItems: 1
     * maxItems: 10
     */
    public $document_references;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength(
            $this->name,
            3,
            "name in Boletobancario must have minlength of 3 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            300,
            "name in Boletobancario must have maxlength of 300 $within"
        );
        !isset($this->email) || Assert::minLength(
            $this->email,
            3,
            "email in Boletobancario must have minlength of 3 $within"
        );
        !isset($this->email) || Assert::maxLength(
            $this->email,
            254,
            "email in Boletobancario must have maxlength of 254 $within"
        );
        !isset($this->country_code) || Assert::minLength(
            $this->country_code,
            2,
            "country_code in Boletobancario must have minlength of 2 $within"
        );
        !isset($this->country_code) || Assert::maxLength(
            $this->country_code,
            2,
            "country_code in Boletobancario must have maxlength of 2 $within"
        );
        !isset($this->billing_address) || Assert::isInstanceOf(
            $this->billing_address,
            AddressPortable4::class,
            "billing_address in Boletobancario must be instance of AddressPortable4 $within"
        );
        !isset($this->billing_address) ||  $this->billing_address->validate(Boletobancario::class);
        !isset($this->tax_info) || Assert::isInstanceOf(
            $this->tax_info,
            TaxInfo::class,
            "tax_info in Boletobancario must be instance of TaxInfo $within"
        );
        !isset($this->tax_info) ||  $this->tax_info->validate(Boletobancario::class);
        !isset($this->expiry_date) || Assert::minLength(
            $this->expiry_date,
            10,
            "expiry_date in Boletobancario must have minlength of 10 $within"
        );
        !isset($this->expiry_date) || Assert::maxLength(
            $this->expiry_date,
            10,
            "expiry_date in Boletobancario must have maxlength of 10 $within"
        );
        Assert::notNull($this->document_references, "document_references in Boletobancario must not be NULL $within");
        Assert::minCount(
            $this->document_references,
            1,
            "document_references in Boletobancario must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->document_references,
            10,
            "document_references in Boletobancario must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->document_references,
            "document_references in Boletobancario must be array $within"
        );
        if (isset($this->document_references)) {
            foreach ($this->document_references as $item) {
                $item->validate(Boletobancario::class);
            }
        }
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
            $this->billing_address = new AddressPortable4($data['billing_address']);
        }
        if (isset($data['tax_info'])) {
            $this->tax_info = new TaxInfo($data['tax_info']);
        }
        if (isset($data['expiry_date'])) {
            $this->expiry_date = $data['expiry_date'];
        }
        if (isset($data['document_references'])) {
            $this->document_references = [];
            foreach ($data['document_references'] as $item) {
                $this->document_references[] = new DocumentReference($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->document_references = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initBillingAddress(): AddressPortable4
    {
        return $this->billing_address = new AddressPortable4();
    }

    public function initTaxInfo(): TaxInfo
    {
        return $this->tax_info = new TaxInfo();
    }
}
