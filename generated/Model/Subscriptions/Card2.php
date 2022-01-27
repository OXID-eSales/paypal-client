<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payment card to use to fund a payment. Can be a credit or debit card.
 *
 * generated from: customized_x_unsupported_1063_merchant.CommonComponentsSpecification-v1-schema-card.json
 */
class Card2 implements JsonSerializable
{
    use BaseModel;

    /**
     * The card holder's name as it appears on the card.
     *
     * @var string | null
     * maxLength: 300
     */
    public $name;

    /**
     * The primary account number (PAN) for the payment card.
     *
     * @var string
     * minLength: 13
     * maxLength: 19
     */
    public $number;

    /**
     * The year and month, in ISO-8601 `YYYY-MM` date format. See [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @var string
     * minLength: 7
     * maxLength: 7
     */
    public $expiry;

    /**
     * The three- or four-digit security code of the card. Also known as the CVV, CVC, CVN, CVE, or CID. This
     * parameter cannot be present in the request when `payment_initiator=MERCHANT`.
     *
     * @var string | null
     */
    public $security_code;

    /**
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     *
     * @var AddressPortable2 | null
     */
    public $billing_address;

    /**
     * Additional attributes associated with the use of this card.
     *
     * @var CardAttributes | null
     */
    public $attributes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::maxLength(
            $this->name,
            300,
            "name in Card2 must have maxlength of 300 $within"
        );
        Assert::notNull($this->number, "number in Card2 must not be NULL $within");
        Assert::minLength(
            $this->number,
            13,
            "number in Card2 must have minlength of 13 $within"
        );
        Assert::maxLength(
            $this->number,
            19,
            "number in Card2 must have maxlength of 19 $within"
        );
        Assert::notNull($this->expiry, "expiry in Card2 must not be NULL $within");
        Assert::minLength(
            $this->expiry,
            7,
            "expiry in Card2 must have minlength of 7 $within"
        );
        Assert::maxLength(
            $this->expiry,
            7,
            "expiry in Card2 must have maxlength of 7 $within"
        );
        !isset($this->billing_address) || Assert::isInstanceOf(
            $this->billing_address,
            AddressPortable2::class,
            "billing_address in Card2 must be instance of AddressPortable2 $within"
        );
        !isset($this->billing_address) ||  $this->billing_address->validate(Card2::class);
        !isset($this->attributes) || Assert::isInstanceOf(
            $this->attributes,
            CardAttributes::class,
            "attributes in Card2 must be instance of CardAttributes $within"
        );
        !isset($this->attributes) ||  $this->attributes->validate(Card2::class);
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['number'])) {
            $this->number = $data['number'];
        }
        if (isset($data['expiry'])) {
            $this->expiry = $data['expiry'];
        }
        if (isset($data['security_code'])) {
            $this->security_code = $data['security_code'];
        }
        if (isset($data['billing_address'])) {
            $this->billing_address = new AddressPortable2($data['billing_address']);
        }
        if (isset($data['attributes'])) {
            $this->attributes = new CardAttributes($data['attributes']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initBillingAddress(): AddressPortable2
    {
        return $this->billing_address = new AddressPortable2();
    }

    public function initAttributes(): CardAttributes
    {
        return $this->attributes = new CardAttributes();
    }
}
