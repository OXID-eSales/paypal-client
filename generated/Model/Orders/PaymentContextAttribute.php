<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Payment Context Attribute. Typically used as a reference for a payment. Eg: CART_ID, PAY_ID.
 *
 * generated from: model-payment_context_attribute.json
 */
class PaymentContextAttribute implements JsonSerializable
{
    use BaseModel;

    /**
     * Context attribute name.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $name;

    /**
     * Context attribute value.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $value;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength(
            $this->name,
            1,
            "name in PaymentContextAttribute must have minlength of 1 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            127,
            "name in PaymentContextAttribute must have maxlength of 127 $within"
        );
        !isset($this->value) || Assert::minLength(
            $this->value,
            1,
            "value in PaymentContextAttribute must have minlength of 1 $within"
        );
        !isset($this->value) || Assert::maxLength(
            $this->value,
            255,
            "value in PaymentContextAttribute must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['value'])) {
            $this->value = $data['value'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
