<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * SEPA direct debit/bank details required to fund the payment.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-sepa_debit.json
 */
class SepaDebit implements JsonSerializable
{
    use BaseModel;

    /**
     * International Bank Account Number, a unique identifier for a bank account that is used by banks around Europe.
     *
     * @var string
     * minLength: 10
     * maxLength: 34
     */
    public $iban;

    /**
     * Name of the person or business that owns the bank account.
     *
     * @var string
     * minLength: 1
     * maxLength: 300
     */
    public $account_holder_name;

    /**
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     *
     * @var AddressPortable3
     */
    public $billing_address;

    /**
     * SEPA debit attributes object
     *
     * @var SepaDebitAttributes
     */
    public $attributes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->iban, "iban in SepaDebit must not be NULL $within");
        Assert::minLength(
            $this->iban,
            10,
            "iban in SepaDebit must have minlength of 10 $within"
        );
        Assert::maxLength(
            $this->iban,
            34,
            "iban in SepaDebit must have maxlength of 34 $within"
        );
        Assert::notNull($this->account_holder_name, "account_holder_name in SepaDebit must not be NULL $within");
        Assert::minLength(
            $this->account_holder_name,
            1,
            "account_holder_name in SepaDebit must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->account_holder_name,
            300,
            "account_holder_name in SepaDebit must have maxlength of 300 $within"
        );
        Assert::notNull($this->billing_address, "billing_address in SepaDebit must not be NULL $within");
        Assert::isInstanceOf(
            $this->billing_address,
            AddressPortable3::class,
            "billing_address in SepaDebit must be instance of AddressPortable3 $within"
        );
         $this->billing_address->validate(SepaDebit::class);
        Assert::notNull($this->attributes, "attributes in SepaDebit must not be NULL $within");
        Assert::isInstanceOf(
            $this->attributes,
            SepaDebitAttributes::class,
            "attributes in SepaDebit must be instance of SepaDebitAttributes $within"
        );
         $this->attributes->validate(SepaDebit::class);
    }

    private function map(array $data)
    {
        if (isset($data['iban'])) {
            $this->iban = $data['iban'];
        }
        if (isset($data['account_holder_name'])) {
            $this->account_holder_name = $data['account_holder_name'];
        }
        if (isset($data['billing_address'])) {
            $this->billing_address = new AddressPortable3($data['billing_address']);
        }
        if (isset($data['attributes'])) {
            $this->attributes = new SepaDebitAttributes($data['attributes']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->billing_address = new AddressPortable3();
        $this->attributes = new SepaDebitAttributes();
        if (isset($data)) {
            $this->map($data);
        }
    }
}
