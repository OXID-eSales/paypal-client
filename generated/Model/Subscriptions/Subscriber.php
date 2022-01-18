<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The subscriber response information.
 *
 * generated from: subscriber.json
 */
class Subscriber extends Payer2 implements JsonSerializable
{
    use BaseModel;

    /**
     * The shipping details.
     *
     * @var ShippingDetail | null
     */
    public $shipping_address;

    /**
     * The payment source used to fund the payment.
     *
     * @var PaymentSourceResponse | null
     */
    public $payment_source;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->shipping_address) || Assert::isInstanceOf(
            $this->shipping_address,
            ShippingDetail::class,
            "shipping_address in Subscriber must be instance of ShippingDetail $within"
        );
        !isset($this->shipping_address) ||  $this->shipping_address->validate(Subscriber::class);
        !isset($this->payment_source) || Assert::isInstanceOf(
            $this->payment_source,
            PaymentSourceResponse::class,
            "payment_source in Subscriber must be instance of PaymentSourceResponse $within"
        );
        !isset($this->payment_source) ||  $this->payment_source->validate(Subscriber::class);
    }

    private function map(array $data)
    {
        if (isset($data['shipping_address'])) {
            $this->shipping_address = new ShippingDetail($data['shipping_address']);
        }
        if (isset($data['payment_source'])) {
            $this->payment_source = new PaymentSourceResponse($data['payment_source']);
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initShippingAddress(): ShippingDetail
    {
        return $this->shipping_address = new ShippingDetail();
    }

    public function initPaymentSource(): PaymentSourceResponse
    {
        return $this->payment_source = new PaymentSourceResponse();
    }
}
