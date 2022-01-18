<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The subscriber request information .
 *
 * generated from: subscriber_request.json
 */
class SubscriberRequest extends Payer3 implements JsonSerializable
{
    use BaseModel;

    /**
     * The shipping details.
     *
     * @var ShippingDetail | null
     */
    public $shipping_address;

    /**
     * The payment source definition. To be eligible to create subscription using debit or credit card, you will need
     * to sign up here (https://www.paypal.com/bizsignup/entry/product/ppcp). Please note, its available only for
     * non-3DS cards and for merchants in US and AU regions.
     *
     * @var PaymentSource | null
     */
    public $payment_source;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->shipping_address) || Assert::isInstanceOf(
            $this->shipping_address,
            ShippingDetail::class,
            "shipping_address in SubscriberRequest must be instance of ShippingDetail $within"
        );
        !isset($this->shipping_address) ||  $this->shipping_address->validate(SubscriberRequest::class);
        !isset($this->payment_source) || Assert::isInstanceOf(
            $this->payment_source,
            PaymentSource::class,
            "payment_source in SubscriberRequest must be instance of PaymentSource $within"
        );
        !isset($this->payment_source) ||  $this->payment_source->validate(SubscriberRequest::class);
    }

    private function map(array $data)
    {
        if (isset($data['shipping_address'])) {
            $this->shipping_address = new ShippingDetail($data['shipping_address']);
        }
        if (isset($data['payment_source'])) {
            $this->payment_source = new PaymentSource($data['payment_source']);
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

    public function initPaymentSource(): PaymentSource
    {
        return $this->payment_source = new PaymentSource();
    }
}
