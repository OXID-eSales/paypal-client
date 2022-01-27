<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer who approves and pays for the order. The customer is also known as the payer.
 *
 * generated from: customized_x_unsupported_2933_merchant.CommonComponentsSpecification-v1-schema-payer.json
 */
class Payer2 extends PayerBase implements JsonSerializable
{
    use BaseModel;

    /**
     * The name of the party.
     *
     * @var Name2 | null
     */
    public $name;

    /**
     * The phone information.
     *
     * @var PhoneWithType | null
     */
    public $phone;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::isInstanceOf(
            $this->name,
            Name2::class,
            "name in Payer2 must be instance of Name2 $within"
        );
        !isset($this->name) ||  $this->name->validate(Payer2::class);
        !isset($this->phone) || Assert::isInstanceOf(
            $this->phone,
            PhoneWithType::class,
            "phone in Payer2 must be instance of PhoneWithType $within"
        );
        !isset($this->phone) ||  $this->phone->validate(Payer2::class);
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = new Name2($data['name']);
        }
        if (isset($data['phone'])) {
            $this->phone = new PhoneWithType($data['phone']);
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initName(): Name2
    {
        return $this->name = new Name2();
    }

    public function initPhone(): PhoneWithType
    {
        return $this->phone = new PhoneWithType();
    }
}
