<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details for the merchant who receives the funds and fulfills the order. For example, merchant ID, and
 * contact email address.
 *
 * generated from: response-seller.json
 */
class ResponseSeller implements JsonSerializable
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
     * The PayPal account ID for the merchant.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $merchant_id;

    /**
     * The name of the merchant.
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
            "email in ResponseSeller must have minlength of 3 $within"
        );
        !isset($this->email) || Assert::maxLength(
            $this->email,
            254,
            "email in ResponseSeller must have maxlength of 254 $within"
        );
        !isset($this->merchant_id) || Assert::minLength(
            $this->merchant_id,
            1,
            "merchant_id in ResponseSeller must have minlength of 1 $within"
        );
        !isset($this->merchant_id) || Assert::maxLength(
            $this->merchant_id,
            255,
            "merchant_id in ResponseSeller must have maxlength of 255 $within"
        );
        !isset($this->name) || Assert::minLength(
            $this->name,
            1,
            "name in ResponseSeller must have minlength of 1 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            2000,
            "name in ResponseSeller must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
        if (isset($data['merchant_id'])) {
            $this->merchant_id = $data['merchant_id'];
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
