<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Completes an capture payment for an order.
 *
 * generated from: order_capture_request.json
 */
class OrderCaptureRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The payment source definition.
     *
     * @var PaymentSource | null
     */
    public $payment_source;

    /**
     * Customizes the payer experience during the approval process for the payment with
     * PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code>
     * and <code>shipping_preference</code> during partner account setup, which overrides the request
     * values.</blockquote>
     *
     * @var OrderApplicationContext2 | null
     */
    public $application_context;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_source) || Assert::isInstanceOf(
            $this->payment_source,
            PaymentSource::class,
            "payment_source in OrderCaptureRequest must be instance of PaymentSource $within"
        );
        !isset($this->payment_source) ||  $this->payment_source->validate(OrderCaptureRequest::class);
        !isset($this->application_context) || Assert::isInstanceOf(
            $this->application_context,
            OrderApplicationContext2::class,
            "application_context in OrderCaptureRequest must be instance of OrderApplicationContext2 $within"
        );
        !isset($this->application_context) ||  $this->application_context->validate(OrderCaptureRequest::class);
    }

    private function map(array $data)
    {
        if (isset($data['payment_source'])) {
            $this->payment_source = new PaymentSource($data['payment_source']);
        }
        if (isset($data['application_context'])) {
            $this->application_context = new OrderApplicationContext2($data['application_context']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPaymentSource(): PaymentSource
    {
        return $this->payment_source = new PaymentSource();
    }

    public function initApplicationContext(): OrderApplicationContext2
    {
        return $this->application_context = new OrderApplicationContext2();
    }
}
