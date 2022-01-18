<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Participant in a payment activity, one of person or business must be provided.
 *
 * generated from: model-participant.json
 */
class Participant extends Account implements JsonSerializable
{
    use BaseModel;

    /**
     * Person information.
     *
     * @var Person | null
     */
    public $person;

    /**
     * Business information.
     *
     * @var Business | null
     */
    public $business;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->person) || Assert::isInstanceOf(
            $this->person,
            Person::class,
            "person in Participant must be instance of Person $within"
        );
        !isset($this->person) ||  $this->person->validate(Participant::class);
        !isset($this->business) || Assert::isInstanceOf(
            $this->business,
            Business::class,
            "business in Participant must be instance of Business $within"
        );
        !isset($this->business) ||  $this->business->validate(Participant::class);
    }

    private function map(array $data)
    {
        if (isset($data['person'])) {
            $this->person = new Person($data['person']);
        }
        if (isset($data['business'])) {
            $this->business = new Business($data['business']);
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPerson(): Person
    {
        return $this->person = new Person();
    }

    public function initBusiness(): Business
    {
        return $this->business = new Business();
    }
}
