<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Additional attributes associated with the use of this card
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-card_attributes.json
 */
class CardAttributes implements JsonSerializable
{
    use BaseModel;

    /**
     * The details about a customer in merchant's or partner's system of records.
     *
     * @var Customer | null
     */
    public $customer;

    /**
     * The API caller can opt in to verify the card through PayPal offered verification services (e.g. Smart Dollar
     * Auth, 3DS).
     *
     * @var CardVerification | null
     */
    public $verification;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->customer) || Assert::isInstanceOf(
            $this->customer,
            Customer::class,
            "customer in CardAttributes must be instance of Customer $within"
        );
        !isset($this->customer) ||  $this->customer->validate(CardAttributes::class);
        !isset($this->verification) || Assert::isInstanceOf(
            $this->verification,
            CardVerification::class,
            "verification in CardAttributes must be instance of CardVerification $within"
        );
        !isset($this->verification) ||  $this->verification->validate(CardAttributes::class);
    }

    private function map(array $data)
    {
        if (isset($data['customer'])) {
            $this->customer = new Customer($data['customer']);
        }
        if (isset($data['verification'])) {
            $this->verification = new CardVerification($data['verification']);
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

    public function initVerification(): CardVerification
    {
        return $this->verification = new CardVerification();
    }
}
