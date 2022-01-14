<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The purchase unit details. Used to capture required information for the payment contract.
 *
 * generated from: purchase_unit.json
 */
class PurchaseUnit implements JsonSerializable
{
    use BaseModel;

    /**
     * The API caller-provided external ID for the purchase unit. Required for multiple purchase units when you must
     * update the order through `PATCH`. If you omit this value and the order contains only one purchase unit, PayPal
     * sets this value to `default`. <blockquote><strong>Note:</strong> If there are multiple purchase units,
     * <code>reference_id</code> is required for each purchase unit.</blockquote>
     *
     * @var string | null
     * maxLength: 256
     */
    public $reference_id;

    /**
     * The total order amount with an optional breakdown that provides details, such as the total item amount, total
     * tax amount, shipping, handling, insurance, and discounts, if any.<br/>If you specify `amount.breakdown`, the
     * amount equals `item_total` plus `tax_total` plus `shipping` plus `handling` plus `insurance` minus
     * `shipping_discount` minus discount.<br/>The amount must be a positive number. For listed of supported
     * currencies and decimal precision, see the PayPal REST APIs <a
     * href="/docs/integration/direct/rest/currency-codes/">Currency Codes</a>.
     *
     * @var AmountWithBreakdown | null
     */
    public $amount;

    /**
     * The merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
     *
     * @var Payee | null
     */
    public $payee;

    /**
     * Any additional payment instructions for PayPal Commerce Platform customers. Enables features for the PayPal
     * Commerce Platform, such as delayed disbursement and collection of a platform fee. Applies during order
     * creation for captured payments or during capture of authorized payments.
     *
     * @var PaymentInstruction | null
     */
    public $payment_instruction;

    /**
     * The purchase description.
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
     * The PayPal-generated ID for the purchase unit. This ID appears in both the payer's transaction history and the
     * emails that the payer receives. In addition, this ID is available in transaction and settlement reports that
     * merchants and API callers can use to reconcile transactions. This ID is only available when an order is saved
     * by calling <code>v2/checkout/orders/id/save</code>.
     *
     * @var string | null
     * maxLength: 19
     */
    public $id;

    /**
     * The payment descriptor on account transactions on the customer's credit card statement, that PayPal sends to
     * processors. The maximum length of the soft descriptor information that you can pass in the API field is 22
     * characters, in the following format:<pre>22 - len(PAYPAL * (8)) - len(<var>Descriptor in Payment Receiving
     * Preferences of Merchant account</var> + 1)</pre>The PAYPAL prefix uses 8 characters.<br/><br/>The soft
     * descriptor supports the following ASCII characters:<ul><li>Alphanumeric
     * characters</li><li>Dashes</li><li>Asterisks</li><li>Periods (.)</li><li>Spaces</li></ul>For Wallet payments
     * marketplace integrations:<ul><li>The merchant descriptor in the Payment Receiving Preferences must be the
     * marketplace name.</li><li>You can't use the remaining space to show the customer service number.</li><li>The
     * remaining spaces can be a combination of seller name and country.</li></ul><br/>For unbranded payments (Direct
     * Card) marketplace integrations, use a combination of the seller name and phone number.
     *
     * @var string | null
     * maxLength: 22
     */
    public $soft_descriptor;

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

    /**
     * The supplementary data.
     *
     * @var SupplementaryData | null
     */
    public $supplementary_data;

    /**
     * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized
     * payments, captured payments, and refunds.
     *
     * @var PaymentCollection | null
     */
    public $payments;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->reference_id) || Assert::maxLength(
            $this->reference_id,
            256,
            "reference_id in PurchaseUnit must have maxlength of 256 $within"
        );
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            AmountWithBreakdown::class,
            "amount in PurchaseUnit must be instance of AmountWithBreakdown $within"
        );
        !isset($this->amount) ||  $this->amount->validate(PurchaseUnit::class);
        !isset($this->payee) || Assert::isInstanceOf(
            $this->payee,
            Payee::class,
            "payee in PurchaseUnit must be instance of Payee $within"
        );
        !isset($this->payee) ||  $this->payee->validate(PurchaseUnit::class);
        !isset($this->payment_instruction) || Assert::isInstanceOf(
            $this->payment_instruction,
            PaymentInstruction::class,
            "payment_instruction in PurchaseUnit must be instance of PaymentInstruction $within"
        );
        !isset($this->payment_instruction) ||  $this->payment_instruction->validate(PurchaseUnit::class);
        !isset($this->description) || Assert::maxLength(
            $this->description,
            127,
            "description in PurchaseUnit must have maxlength of 127 $within"
        );
        !isset($this->custom_id) || Assert::maxLength(
            $this->custom_id,
            127,
            "custom_id in PurchaseUnit must have maxlength of 127 $within"
        );
        !isset($this->invoice_id) || Assert::maxLength(
            $this->invoice_id,
            127,
            "invoice_id in PurchaseUnit must have maxlength of 127 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            19,
            "id in PurchaseUnit must have maxlength of 19 $within"
        );
        !isset($this->soft_descriptor) || Assert::maxLength(
            $this->soft_descriptor,
            22,
            "soft_descriptor in PurchaseUnit must have maxlength of 22 $within"
        );
        !isset($this->items) || Assert::isArray(
            $this->items,
            "items in PurchaseUnit must be array $within"
        );
        if (isset($this->items)) {
            foreach ($this->items as $item) {
                $item->validate(PurchaseUnit::class);
            }
        }
        !isset($this->shipping) || Assert::isInstanceOf(
            $this->shipping,
            ShippingDetail::class,
            "shipping in PurchaseUnit must be instance of ShippingDetail $within"
        );
        !isset($this->shipping) ||  $this->shipping->validate(PurchaseUnit::class);
        !isset($this->supplementary_data) || Assert::isInstanceOf(
            $this->supplementary_data,
            SupplementaryData::class,
            "supplementary_data in PurchaseUnit must be instance of SupplementaryData $within"
        );
        !isset($this->supplementary_data) ||  $this->supplementary_data->validate(PurchaseUnit::class);
        !isset($this->payments) || Assert::isInstanceOf(
            $this->payments,
            PaymentCollection::class,
            "payments in PurchaseUnit must be instance of PaymentCollection $within"
        );
        !isset($this->payments) ||  $this->payments->validate(PurchaseUnit::class);
    }

    private function map(array $data)
    {
        if (isset($data['reference_id'])) {
            $this->reference_id = $data['reference_id'];
        }
        if (isset($data['amount'])) {
            $this->amount = new AmountWithBreakdown($data['amount']);
        }
        if (isset($data['payee'])) {
            $this->payee = new Payee($data['payee']);
        }
        if (isset($data['payment_instruction'])) {
            $this->payment_instruction = new PaymentInstruction($data['payment_instruction']);
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
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['soft_descriptor'])) {
            $this->soft_descriptor = $data['soft_descriptor'];
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
        if (isset($data['supplementary_data'])) {
            $this->supplementary_data = new SupplementaryData($data['supplementary_data']);
        }
        if (isset($data['payments'])) {
            $this->payments = new PaymentCollection($data['payments']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAmount(): AmountWithBreakdown
    {
        return $this->amount = new AmountWithBreakdown();
    }

    public function initPayee(): Payee
    {
        return $this->payee = new Payee();
    }

    public function initPaymentInstruction(): PaymentInstruction
    {
        return $this->payment_instruction = new PaymentInstruction();
    }

    public function initShipping(): ShippingDetail
    {
        return $this->shipping = new ShippingDetail();
    }

    public function initSupplementaryData(): SupplementaryData
    {
        return $this->supplementary_data = new SupplementaryData();
    }

    public function initPayments(): PaymentCollection
    {
        return $this->payments = new PaymentCollection();
    }
}
