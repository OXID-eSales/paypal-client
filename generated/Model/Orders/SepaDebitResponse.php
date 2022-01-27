<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Details of SEPA direct debit payment response including mandate response.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-sepa_debit_response.json
 */
class SepaDebitResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * The last characters of the IBAN used to pay.
     *
     * @var string | null
     * minLength: 4
     * maxLength: 34
     */
    public $iban_last_chars;

    /**
     * Name of the person or business that owns the bank account.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 300
     */
    public $account_holder_name;

    /**
     * SEPA debit attributes response object.
     *
     * @var SepaDebitAttributesResponse | null
     */
    public $attributes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->iban_last_chars) || Assert::minLength(
            $this->iban_last_chars,
            4,
            "iban_last_chars in SepaDebitResponse must have minlength of 4 $within"
        );
        !isset($this->iban_last_chars) || Assert::maxLength(
            $this->iban_last_chars,
            34,
            "iban_last_chars in SepaDebitResponse must have maxlength of 34 $within"
        );
        !isset($this->account_holder_name) || Assert::minLength(
            $this->account_holder_name,
            1,
            "account_holder_name in SepaDebitResponse must have minlength of 1 $within"
        );
        !isset($this->account_holder_name) || Assert::maxLength(
            $this->account_holder_name,
            300,
            "account_holder_name in SepaDebitResponse must have maxlength of 300 $within"
        );
        !isset($this->attributes) || Assert::isInstanceOf(
            $this->attributes,
            SepaDebitAttributesResponse::class,
            "attributes in SepaDebitResponse must be instance of SepaDebitAttributesResponse $within"
        );
        !isset($this->attributes) ||  $this->attributes->validate(SepaDebitResponse::class);
    }

    private function map(array $data)
    {
        if (isset($data['iban_last_chars'])) {
            $this->iban_last_chars = $data['iban_last_chars'];
        }
        if (isset($data['account_holder_name'])) {
            $this->account_holder_name = $data['account_holder_name'];
        }
        if (isset($data['attributes'])) {
            $this->attributes = new SepaDebitAttributesResponse($data['attributes']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAttributes(): SepaDebitAttributesResponse
    {
        return $this->attributes = new SepaDebitAttributesResponse();
    }
}
