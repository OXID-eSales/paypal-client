<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Completes an action for an order.
 *
 * generated from: order_validate_request.json
 */
class OrderValidateRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * A payment source that has additional authentication challenges.
     *
     * @var ExtendedPaymentSource | null
     */
    public $payment_source;

    /**
     * Customizes the payer experience during the approval process for the payment with
     * PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code>
     * and <code>shipping_preference</code> during partner account setup, which overrides the request
     * values.</blockquote>
     *
     * @var OrderValidateApplicationContext | null
     */
    public $application_context;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_source) || Assert::isInstanceOf(
            $this->payment_source,
            ExtendedPaymentSource::class,
            "payment_source in OrderValidateRequest must be instance of ExtendedPaymentSource $within"
        );
        !isset($this->payment_source) ||  $this->payment_source->validate(OrderValidateRequest::class);
        !isset($this->application_context) || Assert::isInstanceOf(
            $this->application_context,
            OrderValidateApplicationContext::class,
            "application_context in OrderValidateRequest must be instance of OrderValidateApplicationContext $within"
        );
        !isset($this->application_context) ||  $this->application_context->validate(OrderValidateRequest::class);
    }

    private function map(array $data)
    {
        if (isset($data['payment_source'])) {
            $this->payment_source = new ExtendedPaymentSource($data['payment_source']);
        }
        if (isset($data['application_context'])) {
            $this->application_context = new OrderValidateApplicationContext($data['application_context']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPaymentSource(): ExtendedPaymentSource
    {
        return $this->payment_source = new ExtendedPaymentSource();
    }

    public function initApplicationContext(): OrderValidateApplicationContext
    {
        return $this->application_context = new OrderValidateApplicationContext();
    }
}
