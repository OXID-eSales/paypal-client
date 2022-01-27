<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * SEPA debit attributes object
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-sepa_debit_attributes.json
 */
class SepaDebitAttributes implements JsonSerializable
{
    use BaseModel;

    /**
     * Details about SEPA mandate
     *
     * @var SepaMandate | null
     */
    public $mandate;

    /**
     * The details about a customer in merchant's or partner's system of records.
     *
     * @var Customer
     */
    public $customer;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->mandate) || Assert::isInstanceOf(
            $this->mandate,
            SepaMandate::class,
            "mandate in SepaDebitAttributes must be instance of SepaMandate $within"
        );
        !isset($this->mandate) ||  $this->mandate->validate(SepaDebitAttributes::class);
        Assert::notNull($this->customer, "customer in SepaDebitAttributes must not be NULL $within");
        Assert::isInstanceOf(
            $this->customer,
            Customer::class,
            "customer in SepaDebitAttributes must be instance of Customer $within"
        );
         $this->customer->validate(SepaDebitAttributes::class);
    }

    private function map(array $data)
    {
        if (isset($data['mandate'])) {
            $this->mandate = new SepaMandate($data['mandate']);
        }
        if (isset($data['customer'])) {
            $this->customer = new Customer($data['customer']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->customer = new Customer();
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initMandate(): SepaMandate
    {
        return $this->mandate = new SepaMandate();
    }
}
