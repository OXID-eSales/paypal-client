<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer who approves and pays for the order. The customer is also known as the payer.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-payer.json
 */
class Payer implements JsonSerializable
{
    use BaseModel;

    /**
     * The name of the party.
     *
     * @var Name2 | null
     */
    public $name;

    /**
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * @var string | null
     * maxLength: 254
     */
    public $email_address;

    /**
     * The account identifier for a PayPal account.
     *
     * @var string | null
     * minLength: 13
     * maxLength: 13
     */
    public $payer_id;

    /**
     * The phone information.
     *
     * @var PhoneWithType | null
     */
    public $phone;

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
    public $birth_date;

    /**
     * The tax ID of the customer. The customer is also known as the payer. Both `tax_id` and `tax_id_type` are
     * required.
     *
     * @var TaxInfo | null
     */
    public $tax_info;

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
            Name2::class,
            "name in Payer must be instance of Name2 $within"
        );
        !isset($this->name) ||  $this->name->validate(Payer::class);
        !isset($this->email_address) || Assert::maxLength(
            $this->email_address,
            254,
            "email_address in Payer must have maxlength of 254 $within"
        );
        !isset($this->payer_id) || Assert::minLength(
            $this->payer_id,
            13,
            "payer_id in Payer must have minlength of 13 $within"
        );
        !isset($this->payer_id) || Assert::maxLength(
            $this->payer_id,
            13,
            "payer_id in Payer must have maxlength of 13 $within"
        );
        !isset($this->phone) || Assert::isInstanceOf(
            $this->phone,
            PhoneWithType::class,
            "phone in Payer must be instance of PhoneWithType $within"
        );
        !isset($this->phone) ||  $this->phone->validate(Payer::class);
        !isset($this->birth_date) || Assert::minLength(
            $this->birth_date,
            10,
            "birth_date in Payer must have minlength of 10 $within"
        );
        !isset($this->birth_date) || Assert::maxLength(
            $this->birth_date,
            10,
            "birth_date in Payer must have maxlength of 10 $within"
        );
        !isset($this->tax_info) || Assert::isInstanceOf(
            $this->tax_info,
            TaxInfo::class,
            "tax_info in Payer must be instance of TaxInfo $within"
        );
        !isset($this->tax_info) ||  $this->tax_info->validate(Payer::class);
        !isset($this->address) || Assert::isInstanceOf(
            $this->address,
            AddressPortable2::class,
            "address in Payer must be instance of AddressPortable2 $within"
        );
        !isset($this->address) ||  $this->address->validate(Payer::class);
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = new Name2($data['name']);
        }
        if (isset($data['email_address'])) {
            $this->email_address = $data['email_address'];
        }
        if (isset($data['payer_id'])) {
            $this->payer_id = $data['payer_id'];
        }
        if (isset($data['phone'])) {
            $this->phone = new PhoneWithType($data['phone']);
        }
        if (isset($data['birth_date'])) {
            $this->birth_date = $data['birth_date'];
        }
        if (isset($data['tax_info'])) {
            $this->tax_info = new TaxInfo($data['tax_info']);
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

    public function initName(): Name2
    {
        return $this->name = new Name2();
    }

    public function initPhone(): PhoneWithType
    {
        return $this->phone = new PhoneWithType();
    }

    public function initTaxInfo(): TaxInfo
    {
        return $this->tax_info = new TaxInfo();
    }

    public function initAddress(): AddressPortable2
    {
        return $this->address = new AddressPortable2();
    }
}
