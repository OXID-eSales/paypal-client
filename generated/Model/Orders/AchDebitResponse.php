<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * ACH bank details response object.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-ach_debit_response.json
 */
class AchDebitResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * The last 4 digits of the bank account number.
     *
     * @var string | null
     * minLength: 4
     * maxLength: 4
     */
    public $last_digits;

    /**
     * The 9-digit ABA routing transit number for the bank at which the account is held.
     *
     * @var string | null
     * minLength: 9
     * maxLength: 9
     */
    public $routing_number;

    /**
     * Name of the person or business that owns the bank account.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 300
     */
    public $account_holder_name;

    /**
     * ACH debit attributes response object.
     *
     * @var AchDebitAttributesResponse | null
     */
    public $attributes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->last_digits) || Assert::minLength(
            $this->last_digits,
            4,
            "last_digits in AchDebitResponse must have minlength of 4 $within"
        );
        !isset($this->last_digits) || Assert::maxLength(
            $this->last_digits,
            4,
            "last_digits in AchDebitResponse must have maxlength of 4 $within"
        );
        !isset($this->routing_number) || Assert::minLength(
            $this->routing_number,
            9,
            "routing_number in AchDebitResponse must have minlength of 9 $within"
        );
        !isset($this->routing_number) || Assert::maxLength(
            $this->routing_number,
            9,
            "routing_number in AchDebitResponse must have maxlength of 9 $within"
        );
        !isset($this->account_holder_name) || Assert::minLength(
            $this->account_holder_name,
            1,
            "account_holder_name in AchDebitResponse must have minlength of 1 $within"
        );
        !isset($this->account_holder_name) || Assert::maxLength(
            $this->account_holder_name,
            300,
            "account_holder_name in AchDebitResponse must have maxlength of 300 $within"
        );
        !isset($this->attributes) || Assert::isInstanceOf(
            $this->attributes,
            AchDebitAttributesResponse::class,
            "attributes in AchDebitResponse must be instance of AchDebitAttributesResponse $within"
        );
        !isset($this->attributes) ||  $this->attributes->validate(AchDebitResponse::class);
    }

    private function map(array $data)
    {
        if (isset($data['last_digits'])) {
            $this->last_digits = $data['last_digits'];
        }
        if (isset($data['routing_number'])) {
            $this->routing_number = $data['routing_number'];
        }
        if (isset($data['account_holder_name'])) {
            $this->account_holder_name = $data['account_holder_name'];
        }
        if (isset($data['attributes'])) {
            $this->attributes = new AchDebitAttributesResponse($data['attributes']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAttributes(): AchDebitAttributesResponse
    {
        return $this->attributes = new AchDebitAttributesResponse();
    }
}
