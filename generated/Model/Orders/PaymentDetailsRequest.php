<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Payment details for an order.
 *
 * generated from: model-payment_details_request.json
 */
class PaymentDetailsRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The payment source definition.
     *
     * @var PaymentSource | null
     */
    public $payment_source;

    /**
     * An array of purchase units. Each purchase unit establishes a contract between a customer and merchant. Each
     * purchase unit represents either a full or partial order that the customer intends to purchase from the
     * merchant.
     *
     * @var UpdatePurchaseUnitRequest[]
     * maxItems: 1
     * maxItems: 10
     */
    public $purchase_units;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_source) || Assert::isInstanceOf(
            $this->payment_source,
            PaymentSource::class,
            "payment_source in PaymentDetailsRequest must be instance of PaymentSource $within"
        );
        !isset($this->payment_source) ||  $this->payment_source->validate(PaymentDetailsRequest::class);
        Assert::notNull($this->purchase_units, "purchase_units in PaymentDetailsRequest must not be NULL $within");
        Assert::minCount(
            $this->purchase_units,
            1,
            "purchase_units in PaymentDetailsRequest must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->purchase_units,
            10,
            "purchase_units in PaymentDetailsRequest must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->purchase_units,
            "purchase_units in PaymentDetailsRequest must be array $within"
        );
        if (isset($this->purchase_units)) {
            foreach ($this->purchase_units as $item) {
                $item->validate(PaymentDetailsRequest::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['payment_source'])) {
            $this->payment_source = new PaymentSource($data['payment_source']);
        }
        if (isset($data['purchase_units'])) {
            $this->purchase_units = [];
            foreach ($data['purchase_units'] as $item) {
                $this->purchase_units[] = new UpdatePurchaseUnitRequest($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->purchase_units = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPaymentSource(): PaymentSource
    {
        return $this->payment_source = new PaymentSource();
    }
}
