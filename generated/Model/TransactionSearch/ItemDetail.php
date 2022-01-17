<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The item details.
 *
 * generated from: item_detail.json
 */
class ItemDetail implements JsonSerializable
{
    use BaseModel;

    /**
     * An item code that identifies a merchant's goods or service.
     *
     * @var string | null
     * maxLength: 1000
     */
    public $item_code;

    /**
     * The item name.
     *
     * @var string | null
     * maxLength: 200
     */
    public $item_name;

    /**
     * The item description.
     *
     * @var string | null
     * maxLength: 2000
     */
    public $item_description;

    /**
     * The item options. Describes option choices on the purchase of the item in some detail.
     *
     * @var string | null
     * maxLength: 4000
     */
    public $item_options;

    /**
     * The number of purchased units of goods or a service.
     *
     * @var string | null
     * maxLength: 4000
     */
    public $item_quantity;

    /**
     * An array of tax amounts levied by a government on the purchase of goods or services.
     *
     * @var ItemDetailTaxAmount[] | null
     */
    public $tax_amounts;

    /**
     * The invoice number. An alphanumeric string that identifies a billing for a merchant.
     *
     * @var string | null
     * maxLength: 200
     */
    public $invoice_number;

    /**
     * An array of checkout options. Each option has a name and value.
     *
     * @var CheckoutOption[] | null
     */
    public $checkout_options;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->item_code) || Assert::maxLength(
            $this->item_code,
            1000,
            "item_code in ItemDetail must have maxlength of 1000 $within"
        );
        !isset($this->item_name) || Assert::maxLength(
            $this->item_name,
            200,
            "item_name in ItemDetail must have maxlength of 200 $within"
        );
        !isset($this->item_description) || Assert::maxLength(
            $this->item_description,
            2000,
            "item_description in ItemDetail must have maxlength of 2000 $within"
        );
        !isset($this->item_options) || Assert::maxLength(
            $this->item_options,
            4000,
            "item_options in ItemDetail must have maxlength of 4000 $within"
        );
        !isset($this->item_quantity) || Assert::maxLength(
            $this->item_quantity,
            4000,
            "item_quantity in ItemDetail must have maxlength of 4000 $within"
        );
        !isset($this->tax_amounts) || Assert::isArray(
            $this->tax_amounts,
            "tax_amounts in ItemDetail must be array $within"
        );
        if (isset($this->tax_amounts)) {
            foreach ($this->tax_amounts as $item) {
                $item->validate(ItemDetail::class);
            }
        }
        !isset($this->invoice_number) || Assert::maxLength(
            $this->invoice_number,
            200,
            "invoice_number in ItemDetail must have maxlength of 200 $within"
        );
        !isset($this->checkout_options) || Assert::isArray(
            $this->checkout_options,
            "checkout_options in ItemDetail must be array $within"
        );
        if (isset($this->checkout_options)) {
            foreach ($this->checkout_options as $item) {
                $item->validate(ItemDetail::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['item_code'])) {
            $this->item_code = $data['item_code'];
        }
        if (isset($data['item_name'])) {
            $this->item_name = $data['item_name'];
        }
        if (isset($data['item_description'])) {
            $this->item_description = $data['item_description'];
        }
        if (isset($data['item_options'])) {
            $this->item_options = $data['item_options'];
        }
        if (isset($data['item_quantity'])) {
            $this->item_quantity = $data['item_quantity'];
        }
        if (isset($data['tax_amounts'])) {
            $this->tax_amounts = [];
            foreach ($data['tax_amounts'] as $item) {
                $this->tax_amounts[] = new ItemDetailTaxAmount($item);
            }
        }
        if (isset($data['invoice_number'])) {
            $this->invoice_number = $data['invoice_number'];
        }
        if (isset($data['checkout_options'])) {
            $this->checkout_options = [];
            foreach ($data['checkout_options'] as $item) {
                $this->checkout_options[] = new CheckoutOption($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
