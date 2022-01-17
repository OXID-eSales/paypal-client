<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Authorizes either a portion or the full amount of a saved order.
 *
 * generated from: authorization_request.json
 */
class AuthorizationRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The identifier of the order for this authorization.
     *
     * @var string
     */
    public $order_id;

    /**
     * The payment source definition.
     *
     * @var PaymentSource | null
     */
    public $payment_source;

    /**
     * The total order amount with an optional breakdown that provides details, such as the total item amount, total
     * tax amount, shipping, handling, insurance, and discounts, if any.<br/>If you specify `amount.breakdown`, the
     * amount equals `item_total` plus `tax_total` plus `shipping` plus `handling` plus `insurance` minus
     * `shipping_discount` minus discount.<br/>The amount must be a positive number. For listed of supported
     * currencies and decimal precision, see the PayPal REST APIs <a
     * href="/docs/integration/direct/rest/currency-codes/">Currency Codes</a>.
     *
     * @var AmountWithBreakdown
     */
    public $amount;

    /**
     * The merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
     *
     * @var Payee | null
     */
    public $payee;

    /**
     * Description of the authorization transaction.
     *
     * @var string | null
     * maxLength: 127
     */
    public $description;

    /**
     * The API caller-provided external ID. Used to reconcile API caller-initiated transactions with PayPal
     * transactions. Appears in transaction and settlement reports.
     *
     * @var string | null
     * maxLength: 127
     */
    public $custom_id;

    /**
     * The API caller-provided external invoice ID for this order.
     *
     * @var string | null
     * maxLength: 127
     */
    public $invoice_id;

    /**
     * An array of items that the customer purchases from the merchant.
     *
     * @var Item[] | null
     */
    public $items;

    /**
     * The shipping details.
     *
     * @var ShippingDetail | null
     */
    public $shipping;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->order_id, "order_id in AuthorizationRequest must not be NULL $within");
        !isset($this->payment_source) || Assert::isInstanceOf(
            $this->payment_source,
            PaymentSource::class,
            "payment_source in AuthorizationRequest must be instance of PaymentSource $within"
        );
        !isset($this->payment_source) ||  $this->payment_source->validate(AuthorizationRequest::class);
        Assert::notNull($this->amount, "amount in AuthorizationRequest must not be NULL $within");
        Assert::isInstanceOf(
            $this->amount,
            AmountWithBreakdown::class,
            "amount in AuthorizationRequest must be instance of AmountWithBreakdown $within"
        );
         $this->amount->validate(AuthorizationRequest::class);
        !isset($this->payee) || Assert::isInstanceOf(
            $this->payee,
            Payee::class,
            "payee in AuthorizationRequest must be instance of Payee $within"
        );
        !isset($this->payee) ||  $this->payee->validate(AuthorizationRequest::class);
        !isset($this->description) || Assert::maxLength(
            $this->description,
            127,
            "description in AuthorizationRequest must have maxlength of 127 $within"
        );
        !isset($this->custom_id) || Assert::maxLength(
            $this->custom_id,
            127,
            "custom_id in AuthorizationRequest must have maxlength of 127 $within"
        );
        !isset($this->invoice_id) || Assert::maxLength(
            $this->invoice_id,
            127,
            "invoice_id in AuthorizationRequest must have maxlength of 127 $within"
        );
        !isset($this->items) || Assert::isArray(
            $this->items,
            "items in AuthorizationRequest must be array $within"
        );
        if (isset($this->items)) {
            foreach ($this->items as $item) {
                $item->validate(AuthorizationRequest::class);
            }
        }
        !isset($this->shipping) || Assert::isInstanceOf(
            $this->shipping,
            ShippingDetail::class,
            "shipping in AuthorizationRequest must be instance of ShippingDetail $within"
        );
        !isset($this->shipping) ||  $this->shipping->validate(AuthorizationRequest::class);
    }

    private function map(array $data)
    {
        if (isset($data['order_id'])) {
            $this->order_id = $data['order_id'];
        }
        if (isset($data['payment_source'])) {
            $this->payment_source = new PaymentSource($data['payment_source']);
        }
        if (isset($data['amount'])) {
            $this->amount = new AmountWithBreakdown($data['amount']);
        }
        if (isset($data['payee'])) {
            $this->payee = new Payee($data['payee']);
        }
        if (isset($data['description'])) {
            $this->description = $data['description'];
        }
        if (isset($data['custom_id'])) {
            $this->custom_id = $data['custom_id'];
        }
        if (isset($data['invoice_id'])) {
            $this->invoice_id = $data['invoice_id'];
        }
        if (isset($data['items'])) {
            $this->items = [];
            foreach ($data['items'] as $item) {
                $this->items[] = new Item($item);
            }
        }
        if (isset($data['shipping'])) {
            $this->shipping = new ShippingDetail($data['shipping']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->amount = new AmountWithBreakdown();
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPaymentSource(): PaymentSource
    {
        return $this->payment_source = new PaymentSource();
    }

    public function initPayee(): Payee
    {
        return $this->payee = new Payee();
    }

    public function initShipping(): ShippingDetail
    {
        return $this->shipping = new ShippingDetail();
    }
}
