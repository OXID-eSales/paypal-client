<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Shipping details for transaction.
 *
 * generated from: model-shipping_details.json
 */
class ShippingDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * Address and confirmation details.
     *
     * @var AddressWithConfirmation | null
     */
    public $shipping_address;

    /**
     * An array of shipping options that the payee or merchant offers to the payer to ship or pick up their items.
     *
     * @var ShippingOption[]
     * maxItems: 1
     * maxItems: 10
     */
    public $options;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->shipping_address) || Assert::isInstanceOf(
            $this->shipping_address,
            AddressWithConfirmation::class,
            "shipping_address in ShippingDetails must be instance of AddressWithConfirmation $within"
        );
        !isset($this->shipping_address) ||  $this->shipping_address->validate(ShippingDetails::class);
        Assert::notNull($this->options, "options in ShippingDetails must not be NULL $within");
        Assert::minCount(
            $this->options,
            1,
            "options in ShippingDetails must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->options,
            10,
            "options in ShippingDetails must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->options,
            "options in ShippingDetails must be array $within"
        );
        if (isset($this->options)) {
            foreach ($this->options as $item) {
                $item->validate(ShippingDetails::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['shipping_address'])) {
            $this->shipping_address = new AddressWithConfirmation($data['shipping_address']);
        }
        if (isset($data['options'])) {
            $this->options = [];
            foreach ($data['options'] as $item) {
                $this->options[] = new ShippingOption($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->options = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initShippingAddress(): AddressWithConfirmation
    {
        return $this->shipping_address = new AddressWithConfirmation();
    }
}
