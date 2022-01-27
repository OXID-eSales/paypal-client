<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details about a customer in merchant's or partner's system of records.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-customer.json
 */
class Customer implements JsonSerializable
{
    use BaseModel;

    /**
     * The unique ID for a customer in merchant's or partner's system of records.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 22
     */
    public $id;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in Customer must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            22,
            "id in Customer must have maxlength of 22 $within"
        );
        !isset($this->email_address) || Assert::maxLength(
            $this->email_address,
            254,
            "email_address in Customer must have maxlength of 254 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['email_address'])) {
            $this->email_address = $data['email_address'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
