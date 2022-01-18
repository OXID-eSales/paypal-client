<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payment card used to fund the payment. Card can be a credit or debit card.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-card_response_with_billing_address.json
 */
class CardResponseWithBillingAddress extends CardResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * The card holder's name as it appears on the card.
     *
     * @var string | null
     * minLength: 2
     * maxLength: 300
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
    public $billing_address;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength(
            $this->name,
            2,
            "name in CardResponseWithBillingAddress must have minlength of 2 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            300,
            "name in CardResponseWithBillingAddress must have maxlength of 300 $within"
        );
        !isset($this->billing_address) || Assert::isInstanceOf(
            $this->billing_address,
            AddressPortable2::class,
            "billing_address in CardResponseWithBillingAddress must be instance of AddressPortable2 $within"
        );
        !isset($this->billing_address) ||  $this->billing_address->validate(CardResponseWithBillingAddress::class);
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['billing_address'])) {
            $this->billing_address = new AddressPortable2($data['billing_address']);
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initBillingAddress(): AddressPortable2
    {
        return $this->billing_address = new AddressPortable2();
    }
}
