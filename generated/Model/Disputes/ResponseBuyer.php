<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details for the customer who funds the payment. For example, the customer's first name, last name, and
 * email address.
 *
 * generated from: response-buyer.json
 */
class ResponseBuyer implements JsonSerializable
{
    use BaseModel;

    /**
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * @var string | null
     * minLength: 3
     * maxLength: 254
     */
    public $email;

    /**
     * The PayPal payer ID, which is a masked version of the PayPal account number intended for use with third
     * parties. The account number is reversibly encrypted and a proprietary variant of Base32 is used to encode the
     * result.
     *
     * @var string | null
     * minLength: 13
     * maxLength: 13
     */
    public $payer_id;

    /**
     * The customer's name.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $name;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->email) || Assert::minLength(
            $this->email,
            3,
            "email in ResponseBuyer must have minlength of 3 $within"
        );
        !isset($this->email) || Assert::maxLength(
            $this->email,
            254,
            "email in ResponseBuyer must have maxlength of 254 $within"
        );
        !isset($this->payer_id) || Assert::minLength(
            $this->payer_id,
            13,
            "payer_id in ResponseBuyer must have minlength of 13 $within"
        );
        !isset($this->payer_id) || Assert::maxLength(
            $this->payer_id,
            13,
            "payer_id in ResponseBuyer must have maxlength of 13 $within"
        );
        !isset($this->name) || Assert::minLength(
            $this->name,
            1,
            "name in ResponseBuyer must have minlength of 1 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            2000,
            "name in ResponseBuyer must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
        if (isset($data['payer_id'])) {
            $this->payer_id = $data['payer_id'];
        }
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
