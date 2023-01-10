<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The options that the payee or merchant offers to the payer to ship or pick up their items.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-shipping_option.json
 */
class ShippingOption implements JsonSerializable
{
    use BaseModel;

    /** The payer intends to receive the items at a specified address. */
    const TYPE_SHIPPING = 'SHIPPING';

    /** The payer intends to pick up the items at a specified address. For example, a store address. */
    const TYPE_PICKUP = 'PICKUP';

    /**
     * A unique ID that identifies a payer-selected shipping option.
     *
     * @var string
     * maxLength: 127
     */
    public $id;

    /**
     * A description that the payer sees, which helps them choose an appropriate shipping option. For example, `Free
     * Shipping`, `USPS Priority Shipping`, `Expédition prioritaire USPS`, or `USPS yōuxiān fā huò`. Localize
     * this description to the payer's locale.
     *
     * @var string
     * maxLength: 127
     */
    public $label;

    /**
     * The method by which the payer wants to get their items.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_SHIPPING
     * @see TYPE_PICKUP
     * @var string | null
     */
    public $type;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount;

    /**
     * If the API request sets `selected = true`, it represents the shipping option that the payee or merchant
     * expects to be pre-selected for the payer when they first view the `shipping.options` in the PayPal Checkout
     * experience. As part of the response if a `shipping.option` contains `selected=true`, it represents the
     * shipping option that the payer selected during the course of checkout with PayPal. Only one `shipping.option`
     * can be set to `selected=true`.
     *
     * @var boolean
     */
    public $selected;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->id, "id in ShippingOption must not be NULL $within");
        Assert::maxLength(
            $this->id,
            127,
            "id in ShippingOption must have maxlength of 127 $within"
        );
        Assert::notNull($this->label, "label in ShippingOption must not be NULL $within");
        Assert::maxLength(
            $this->label,
            127,
            "label in ShippingOption must have maxlength of 127 $within"
        );
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in ShippingOption must be instance of Money $within"
        );
        !isset($this->amount) ||  $this->amount->validate(ShippingOption::class);
        Assert::notNull($this->selected, "selected in ShippingOption must not be NULL $within");
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['label'])) {
            $this->label = $data['label'];
        }
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
        }
        if (isset($data['selected'])) {
            $this->selected = $data['selected'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAmount(): Money
    {
        return $this->amount = new Money();
    }
}
