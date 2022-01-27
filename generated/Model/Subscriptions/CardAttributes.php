<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Additional attributes associated with the use of this card.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-card_attributes.json
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

    /**
     * The details of the selected installment option.
     *
     * @var Installments | null
     */
    public $installments;

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
        !isset($this->installments) || Assert::isInstanceOf(
            $this->installments,
            Installments::class,
            "installments in CardAttributes must be instance of Installments $within"
        );
        !isset($this->installments) ||  $this->installments->validate(CardAttributes::class);
    }

    private function map(array $data)
    {
        if (isset($data['customer'])) {
            $this->customer = new Customer($data['customer']);
        }
        if (isset($data['verification'])) {
            $this->verification = new CardVerification($data['verification']);
        }
        if (isset($data['installments'])) {
            $this->installments = new Installments($data['installments']);
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

    public function initInstallments(): Installments
    {
        return $this->installments = new Installments();
    }
}
