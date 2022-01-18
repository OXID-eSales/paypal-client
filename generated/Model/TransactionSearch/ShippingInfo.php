<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The shipping information.
 *
 * generated from: shipping_info.json
 */
class ShippingInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * The recipient's name.
     *
     * @var string | null
     * maxLength: 500
     */
    public $name;

    /**
     * The shipping method that is associated with this order.
     *
     * @var string | null
     * maxLength: 500
     */
    public $method;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::maxLength(
            $this->name,
            500,
            "name in ShippingInfo must have maxlength of 500 $within"
        );
        !isset($this->method) || Assert::maxLength(
            $this->method,
            500,
            "method in ShippingInfo must have maxlength of 500 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['method'])) {
            $this->method = $data['method'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
