<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The cart information.
 *
 * generated from: cart_info.json
 */
class CartInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of item details.
     *
     * @var ItemDetail[] | null
     */
    public $item_details;

    /**
     * Indicates whether the item amount or the shipping amount already includes tax.
     *
     * @var boolean | null
     */
    public $tax_inclusive = false;

    /**
     * The ID of the invoice. Appears for only PayPal-generated invoices.
     *
     * @var string | null
     */
    public $paypal_invoice_id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->item_details) || Assert::isArray(
            $this->item_details,
            "item_details in CartInfo must be array $within"
        );
        if (isset($this->item_details)) {
            foreach ($this->item_details as $item) {
                $item->validate(CartInfo::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['item_details'])) {
            $this->item_details = [];
            foreach ($data['item_details'] as $item) {
                $this->item_details[] = new ItemDetail($item);
            }
        }
        if (isset($data['tax_inclusive'])) {
            $this->tax_inclusive = $data['tax_inclusive'];
        }
        if (isset($data['paypal_invoice_id'])) {
            $this->paypal_invoice_id = $data['paypal_invoice_id'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
