<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer who approves and pays for the order. The customer is also known as the payer.
 *
 * generated from: customized_x_unsupported_979_merchant.CommonComponentsSpecification-v1-schema-payer.json
 */
class Payer3 implements JsonSerializable
{
    use BaseModel;

    /**
     * The name of the party.
     *
     * @var Name2 | null
     */
    public $name;

    /**
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * @var string | null
     * maxLength: 254
     */
    public $email_address;

    /**
     * The account identifier for a PayPal account.
     *
     * @var string | null
     * minLength: 13
     * maxLength: 13
     */
    public $payer_id;

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
            "name in Payer3 must be instance of Name2 $within"
        );
        !isset($this->name) ||  $this->name->validate(Payer3::class);
        !isset($this->email_address) || Assert::maxLength(
            $this->email_address,
            254,
            "email_address in Payer3 must have maxlength of 254 $within"
        );
        !isset($this->payer_id) || Assert::minLength(
            $this->payer_id,
            13,
            "payer_id in Payer3 must have minlength of 13 $within"
        );
        !isset($this->payer_id) || Assert::maxLength(
            $this->payer_id,
            13,
            "payer_id in Payer3 must have maxlength of 13 $within"
        );
        !isset($this->phone) || Assert::isInstanceOf(
            $this->phone,
            PhoneWithType::class,
            "phone in Payer3 must be instance of PhoneWithType $within"
        );
        !isset($this->phone) ||  $this->phone->validate(Payer3::class);
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = new Name2($data['name']);
        }
        if (isset($data['email_address'])) {
            $this->email_address = $data['email_address'];
        }
        if (isset($data['payer_id'])) {
            $this->payer_id = $data['payer_id'];
        }
        if (isset($data['phone'])) {
            $this->phone = new PhoneWithType($data['phone']);
        }
    }

    public function __construct(array $data = null)
    {
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
