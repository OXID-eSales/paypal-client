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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_source) || Assert::isInstanceOf(
            $this->payment_source,
            ExtendedPaymentSource::class,
            "payment_source in OrderValidateRequest must be instance of ExtendedPaymentSource $within"
        );
        !isset($this->payment_source) ||  $this->payment_source->validate(OrderValidateRequest::class);
        !isset($this->payment_source->experience_context) || Assert::isInstanceOf(
            $this->payment_source->experience_context,
            OrderValidateExperienceContext::class,
            "experience_context in OrderValidateRequest must be instance of OrderValidateApplicationContext $within"
        );
        !isset($this->payment_source->experience_context) ||  $this->payment_source->experience_context->validate(OrderValidateRequest::class);
    }

    private function map(array $data)
    {
        if (isset($data['payment_source'])) {
            $this->payment_source = new ExtendedPaymentSource($data['payment_source']);
        }
        if (isset($data['experience_context'])) {
            $this->payment_source->experience_context = new OrderValidateExperienceContext($data['experience_context']);
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

    public function initExperienceContext(): OrderValidateExperienceContext
    {
        return $this->payment_source->experience_context = new OrderValidateExperienceContext();
    }
}
