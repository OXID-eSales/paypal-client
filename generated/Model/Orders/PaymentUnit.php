<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Payment data for a purchase unit.
 *
 * generated from: model-payment_unit.json
 */
class PaymentUnit implements JsonSerializable
{
    use BaseModel;

    /**
     * Unique Identifier for this payment unit scoped in current order.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $reference_id;

    /**
     * Reference Id of the parent payment unit.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $parent_reference_id;

    /**
     * Idempotency Id for the payment.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $idempotency_id;

    /**
     * BN Code or Partner Attribution Id used for revenue attribution.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $partner_attribution_id;

    /**
     * Payment Category PHYSICAL_GOODS, DIGITAL_GOODS, DONATIONS, PLATFORM_FEE Etc.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $payment_category;

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
     * List of purchase items.
     *
     * @var Item[]
     * maxItems: 1
     * maxItems: 10
     */
    public $items;

    /**
     * Shipping details for transaction.
     *
     * @var ShippingDetails | null
     */
    public $shipping_details;

    /**
     * Free-form field for the use of clients.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $custom_id;

    /**
     * Description of what is being paid for.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $description;

    /**
     * Invoice id to track this payment.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 256
     */
    public $invoice_id;

    /**
     * Payment schedule category. Eg: FIRST_RECURRING, SUBSEQUENT_RECURRING, INSTALLMENT, UNSCHEDULED Etc.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $payment_schedule_category;

    /**
     * Soft Descriptor Details.
     *
     * @var SoftDescriptorDetails | null
     */
    public $soft_descriptor_details;

    /**
     * The name of the originator company used in ACH settlement. While processing bank transactions as a third party
     * processor, clients sending transactions to PayPal may or may not provide this info.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 16
     */
    public $biller_company_name;

    /**
     * The Id of the originator company used in ACH settlement. While processing bank transactions as a third party
     * processor, clients sending transactions to PayPal may or may not provide this info. This Id is assigned by the
     * banks to originator.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 10
     */
    public $biller_company_id;

    /**
     * ODFI acts as the interface between the Federal Reserve or ACH network and the originator of the transaction.
     *
     * @var OdfiDetails | null
     */
    public $odfi_details;

    /**
     * List of context attributes usually used to lookup as an alternative id or provides a relative context for a
     * payment.
     *
     * @var PaymentContextAttribute[]
     * maxItems: 1
     * maxItems: 50
     */
    public $context_attributes;

    /**
     * Participant in a payment activity, one of person or business must be provided.
     *
     * @var Participant | null
     */
    public $receiver;

    /**
     * Payment Directives for transaction.
     *
     * @var PaymentDirectives | null
     */
    public $payment_directives;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->reference_id) || Assert::minLength(
            $this->reference_id,
            1,
            "reference_id in PaymentUnit must have minlength of 1 $within"
        );
        !isset($this->reference_id) || Assert::maxLength(
            $this->reference_id,
            255,
            "reference_id in PaymentUnit must have maxlength of 255 $within"
        );
        !isset($this->parent_reference_id) || Assert::minLength(
            $this->parent_reference_id,
            1,
            "parent_reference_id in PaymentUnit must have minlength of 1 $within"
        );
        !isset($this->parent_reference_id) || Assert::maxLength(
            $this->parent_reference_id,
            255,
            "parent_reference_id in PaymentUnit must have maxlength of 255 $within"
        );
        !isset($this->idempotency_id) || Assert::minLength(
            $this->idempotency_id,
            1,
            "idempotency_id in PaymentUnit must have minlength of 1 $within"
        );
        !isset($this->idempotency_id) || Assert::maxLength(
            $this->idempotency_id,
            255,
            "idempotency_id in PaymentUnit must have maxlength of 255 $within"
        );
        !isset($this->partner_attribution_id) || Assert::minLength(
            $this->partner_attribution_id,
            1,
            "partner_attribution_id in PaymentUnit must have minlength of 1 $within"
        );
        !isset($this->partner_attribution_id) || Assert::maxLength(
            $this->partner_attribution_id,
            255,
            "partner_attribution_id in PaymentUnit must have maxlength of 255 $within"
        );
        !isset($this->payment_category) || Assert::minLength(
            $this->payment_category,
            1,
            "payment_category in PaymentUnit must have minlength of 1 $within"
        );
        !isset($this->payment_category) || Assert::maxLength(
            $this->payment_category,
            127,
            "payment_category in PaymentUnit must have maxlength of 127 $within"
        );
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            AmountWithBreakdown::class,
            "amount in PaymentUnit must be instance of AmountWithBreakdown $within"
        );
        !isset($this->amount) ||  $this->amount->validate(PaymentUnit::class);
        Assert::notNull($this->items, "items in PaymentUnit must not be NULL $within");
        Assert::minCount(
            $this->items,
            1,
            "items in PaymentUnit must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->items,
            10,
            "items in PaymentUnit must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->items,
            "items in PaymentUnit must be array $within"
        );
        if (isset($this->items)) {
            foreach ($this->items as $item) {
                $item->validate(PaymentUnit::class);
            }
        }
        !isset($this->shipping_details) || Assert::isInstanceOf(
            $this->shipping_details,
            ShippingDetails::class,
            "shipping_details in PaymentUnit must be instance of ShippingDetails $within"
        );
        !isset($this->shipping_details) ||  $this->shipping_details->validate(PaymentUnit::class);
        !isset($this->custom_id) || Assert::minLength(
            $this->custom_id,
            1,
            "custom_id in PaymentUnit must have minlength of 1 $within"
        );
        !isset($this->custom_id) || Assert::maxLength(
            $this->custom_id,
            127,
            "custom_id in PaymentUnit must have maxlength of 127 $within"
        );
        !isset($this->description) || Assert::minLength(
            $this->description,
            1,
            "description in PaymentUnit must have minlength of 1 $within"
        );
        !isset($this->description) || Assert::maxLength(
            $this->description,
            127,
            "description in PaymentUnit must have maxlength of 127 $within"
        );
        !isset($this->invoice_id) || Assert::minLength(
            $this->invoice_id,
            1,
            "invoice_id in PaymentUnit must have minlength of 1 $within"
        );
        !isset($this->invoice_id) || Assert::maxLength(
            $this->invoice_id,
            256,
            "invoice_id in PaymentUnit must have maxlength of 256 $within"
        );
        !isset($this->payment_schedule_category) || Assert::minLength(
            $this->payment_schedule_category,
            1,
            "payment_schedule_category in PaymentUnit must have minlength of 1 $within"
        );
        !isset($this->payment_schedule_category) || Assert::maxLength(
            $this->payment_schedule_category,
            127,
            "payment_schedule_category in PaymentUnit must have maxlength of 127 $within"
        );
        !isset($this->soft_descriptor_details) || Assert::isInstanceOf(
            $this->soft_descriptor_details,
            SoftDescriptorDetails::class,
            "soft_descriptor_details in PaymentUnit must be instance of SoftDescriptorDetails $within"
        );
        !isset($this->soft_descriptor_details) ||  $this->soft_descriptor_details->validate(PaymentUnit::class);
        !isset($this->biller_company_name) || Assert::minLength(
            $this->biller_company_name,
            1,
            "biller_company_name in PaymentUnit must have minlength of 1 $within"
        );
        !isset($this->biller_company_name) || Assert::maxLength(
            $this->biller_company_name,
            16,
            "biller_company_name in PaymentUnit must have maxlength of 16 $within"
        );
        !isset($this->biller_company_id) || Assert::minLength(
            $this->biller_company_id,
            1,
            "biller_company_id in PaymentUnit must have minlength of 1 $within"
        );
        !isset($this->biller_company_id) || Assert::maxLength(
            $this->biller_company_id,
            10,
            "biller_company_id in PaymentUnit must have maxlength of 10 $within"
        );
        !isset($this->odfi_details) || Assert::isInstanceOf(
            $this->odfi_details,
            OdfiDetails::class,
            "odfi_details in PaymentUnit must be instance of OdfiDetails $within"
        );
        !isset($this->odfi_details) ||  $this->odfi_details->validate(PaymentUnit::class);
        Assert::notNull($this->context_attributes, "context_attributes in PaymentUnit must not be NULL $within");
        Assert::minCount(
            $this->context_attributes,
            1,
            "context_attributes in PaymentUnit must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->context_attributes,
            50,
            "context_attributes in PaymentUnit must have max. count of 50 $within"
        );
        Assert::isArray(
            $this->context_attributes,
            "context_attributes in PaymentUnit must be array $within"
        );
        if (isset($this->context_attributes)) {
            foreach ($this->context_attributes as $item) {
                $item->validate(PaymentUnit::class);
            }
        }
        !isset($this->receiver) || Assert::isInstanceOf(
            $this->receiver,
            Participant::class,
            "receiver in PaymentUnit must be instance of Participant $within"
        );
        !isset($this->receiver) ||  $this->receiver->validate(PaymentUnit::class);
        !isset($this->payment_directives) || Assert::isInstanceOf(
            $this->payment_directives,
            PaymentDirectives::class,
            "payment_directives in PaymentUnit must be instance of PaymentDirectives $within"
        );
        !isset($this->payment_directives) ||  $this->payment_directives->validate(PaymentUnit::class);
    }

    private function map(array $data)
    {
        if (isset($data['reference_id'])) {
            $this->reference_id = $data['reference_id'];
        }
        if (isset($data['parent_reference_id'])) {
            $this->parent_reference_id = $data['parent_reference_id'];
        }
        if (isset($data['idempotency_id'])) {
            $this->idempotency_id = $data['idempotency_id'];
        }
        if (isset($data['partner_attribution_id'])) {
            $this->partner_attribution_id = $data['partner_attribution_id'];
        }
        if (isset($data['payment_category'])) {
            $this->payment_category = $data['payment_category'];
        }
        if (isset($data['amount'])) {
            $this->amount = new AmountWithBreakdown($data['amount']);
        }
        if (isset($data['items'])) {
            $this->items = [];
            foreach ($data['items'] as $item) {
                $this->items[] = new Item($item);
            }
        }
        if (isset($data['shipping_details'])) {
            $this->shipping_details = new ShippingDetails($data['shipping_details']);
        }
        if (isset($data['custom_id'])) {
            $this->custom_id = $data['custom_id'];
        }
        if (isset($data['description'])) {
            $this->description = $data['description'];
        }
        if (isset($data['invoice_id'])) {
            $this->invoice_id = $data['invoice_id'];
        }
        if (isset($data['payment_schedule_category'])) {
            $this->payment_schedule_category = $data['payment_schedule_category'];
        }
        if (isset($data['soft_descriptor_details'])) {
            $this->soft_descriptor_details = new SoftDescriptorDetails($data['soft_descriptor_details']);
        }
        if (isset($data['biller_company_name'])) {
            $this->biller_company_name = $data['biller_company_name'];
        }
        if (isset($data['biller_company_id'])) {
            $this->biller_company_id = $data['biller_company_id'];
        }
        if (isset($data['odfi_details'])) {
            $this->odfi_details = new OdfiDetails($data['odfi_details']);
        }
        if (isset($data['context_attributes'])) {
            $this->context_attributes = [];
            foreach ($data['context_attributes'] as $item) {
                $this->context_attributes[] = new PaymentContextAttribute($item);
            }
        }
        if (isset($data['receiver'])) {
            $this->receiver = new Participant($data['receiver']);
        }
        if (isset($data['payment_directives'])) {
            $this->payment_directives = new PaymentDirectives($data['payment_directives']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->items = [];
        $this->context_attributes = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAmount(): AmountWithBreakdown
    {
        return $this->amount = new AmountWithBreakdown();
    }

    public function initShippingDetails(): ShippingDetails
    {
        return $this->shipping_details = new ShippingDetails();
    }

    public function initSoftDescriptorDetails(): SoftDescriptorDetails
    {
        return $this->soft_descriptor_details = new SoftDescriptorDetails();
    }

    public function initOdfiDetails(): OdfiDetails
    {
        return $this->odfi_details = new OdfiDetails();
    }

    public function initReceiver(): Participant
    {
        return $this->receiver = new Participant();
    }

    public function initPaymentDirectives(): PaymentDirectives
    {
        return $this->payment_directives = new PaymentDirectives();
    }
}
