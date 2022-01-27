<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * ACH debit attributes object.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-ach_debit_attributes.json
 */
class AchDebitAttributes implements JsonSerializable
{
    use BaseModel;

    /**
     * The details about a customer in merchant's or partner's system of records.
     *
     * @var Customer | null
     */
    public $customer;

    /**
     * ACH debit verification object.
     *
     * @var AchDebitVerification | null
     */
    public $verification;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->customer) || Assert::isInstanceOf(
            $this->customer,
            Customer::class,
            "customer in AchDebitAttributes must be instance of Customer $within"
        );
        !isset($this->customer) ||  $this->customer->validate(AchDebitAttributes::class);
        !isset($this->verification) || Assert::isInstanceOf(
            $this->verification,
            AchDebitVerification::class,
            "verification in AchDebitAttributes must be instance of AchDebitVerification $within"
        );
        !isset($this->verification) ||  $this->verification->validate(AchDebitAttributes::class);
    }

    private function map(array $data)
    {
        if (isset($data['customer'])) {
            $this->customer = new Customer($data['customer']);
        }
        if (isset($data['verification'])) {
            $this->verification = new AchDebitVerification($data['verification']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initCustomer(): Customer
    {
        return $this->customer = new Customer();
    }

    public function initVerification(): AchDebitVerification
    {
        return $this->verification = new AchDebitVerification();
    }
}
