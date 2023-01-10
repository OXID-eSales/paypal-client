<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * ACH bank details required to fund the payment.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-ach_debit.json
 */
class AchDebit implements JsonSerializable
{
    use BaseModel;

    /** Bank account of type CHECKING. */
    const ACCOUNT_TYPE_CHECKING = 'CHECKING';

    /** Bank account of type SAVINGS. */
    const ACCOUNT_TYPE_SAVINGS = 'SAVINGS';

    /**
     * The US bank account number from which the payment will be debited.
     *
     * @var string
     * minLength: 3
     * maxLength: 17
     */
    public $account_number;

    /**
     * The 9-digit ABA routing transit number for the bank at which the account is held.
     *
     * @var string
     * minLength: 9
     * maxLength: 9
     */
    public $routing_number;

    /**
     * Represents the type of the bank account.  If not provided, default is CHECKING.
     *
     * use one of constants defined in this class to set the value:
     * @see ACCOUNT_TYPE_CHECKING
     * @see ACCOUNT_TYPE_SAVINGS
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $account_type = 'CHECKING';

    /**
     * Name of the person or business that owns the bank account.
     *
     * @var string
     * minLength: 1
     * maxLength: 300
     */
    public $account_holder_name;

    /**
     * ACH debit attributes object.
     *
     * @var AchDebitAttributes | null
     */
    public $attributes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->account_number, "account_number in AchDebit must not be NULL $within");
        Assert::minLength(
            $this->account_number,
            3,
            "account_number in AchDebit must have minlength of 3 $within"
        );
        Assert::maxLength(
            $this->account_number,
            17,
            "account_number in AchDebit must have maxlength of 17 $within"
        );
        Assert::notNull($this->routing_number, "routing_number in AchDebit must not be NULL $within");
        Assert::minLength(
            $this->routing_number,
            9,
            "routing_number in AchDebit must have minlength of 9 $within"
        );
        Assert::maxLength(
            $this->routing_number,
            9,
            "routing_number in AchDebit must have maxlength of 9 $within"
        );
        !isset($this->account_type) || Assert::minLength(
            $this->account_type,
            1,
            "account_type in AchDebit must have minlength of 1 $within"
        );
        !isset($this->account_type) || Assert::maxLength(
            $this->account_type,
            255,
            "account_type in AchDebit must have maxlength of 255 $within"
        );
        Assert::notNull($this->account_holder_name, "account_holder_name in AchDebit must not be NULL $within");
        Assert::minLength(
            $this->account_holder_name,
            1,
            "account_holder_name in AchDebit must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->account_holder_name,
            300,
            "account_holder_name in AchDebit must have maxlength of 300 $within"
        );
        !isset($this->attributes) || Assert::isInstanceOf(
            $this->attributes,
            AchDebitAttributes::class,
            "attributes in AchDebit must be instance of AchDebitAttributes $within"
        );
        !isset($this->attributes) ||  $this->attributes->validate(AchDebit::class);
    }

    private function map(array $data)
    {
        if (isset($data['account_number'])) {
            $this->account_number = $data['account_number'];
        }
        if (isset($data['routing_number'])) {
            $this->routing_number = $data['routing_number'];
        }
        if (isset($data['account_type'])) {
            $this->account_type = $data['account_type'];
        }
        if (isset($data['account_holder_name'])) {
            $this->account_holder_name = $data['account_holder_name'];
        }
        if (isset($data['attributes'])) {
            $this->attributes = new AchDebitAttributes($data['attributes']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAttributes(): AchDebitAttributes
    {
        return $this->attributes = new AchDebitAttributes();
    }
}
