<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The authorization of an order request.
 *
 * generated from: order_authorize_request.json
 */
class OrderAuthorizeRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The payment source definition.
     *
     * @var PaymentSource | null
     */
    public $payment_source;

    /**
     * The API caller-provided external ID for the purchase unit. Required for multiple purchase units.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 256
     */
    public $reference_id;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount;

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
            "payment_source in OrderAuthorizeRequest must be instance of PaymentSource $within"
        );
        !isset($this->payment_source) ||  $this->payment_source->validate(OrderAuthorizeRequest::class);
        !isset($this->reference_id) || Assert::minLength(
            $this->reference_id,
            1,
            "reference_id in OrderAuthorizeRequest must have minlength of 1 $within"
        );
        !isset($this->reference_id) || Assert::maxLength(
            $this->reference_id,
            256,
            "reference_id in OrderAuthorizeRequest must have maxlength of 256 $within"
        );
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in OrderAuthorizeRequest must be instance of Money $within"
        );
        !isset($this->amount) ||  $this->amount->validate(OrderAuthorizeRequest::class);
        !isset($this->application_context) || Assert::isInstanceOf(
            $this->application_context,
            OrderApplicationContext2::class,
            "application_context in OrderAuthorizeRequest must be instance of OrderApplicationContext2 $within"
        );
        !isset($this->application_context) ||  $this->application_context->validate(OrderAuthorizeRequest::class);
    }

    private function map(array $data)
    {
        if (isset($data['payment_source'])) {
            $this->payment_source = new PaymentSource($data['payment_source']);
        }
        if (isset($data['reference_id'])) {
            $this->reference_id = $data['reference_id'];
        }
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
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

    public function initAmount(): Money
    {
        return $this->amount = new Money();
    }

    public function initApplicationContext(): OrderApplicationContext2
    {
        return $this->application_context = new OrderApplicationContext2();
    }
}
