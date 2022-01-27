<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Payment context data required for processing payments for an order.
 *
 * generated from: model-payment_context_data.json
 */
class PaymentContextData implements JsonSerializable
{
    use BaseModel;

    /** The merchant intends to capture payment immediately after the customer makes a payment. */
    public const INTENT_CAPTURE = 'CAPTURE';

    /** The merchant intends to authorize a payment and place funds on hold after the customer makes a payment. Authorized payments are best captured within three days of authorization but are available to capture for up to 29 days. After the three-day honor period, the original authorized payment expires and you must re-authorize the payment. You must make a separate request to capture payments on demand. This intent is not supported when you have more than one `purchase_unit` within your order. */
    public const INTENT_AUTHORIZE = 'AUTHORIZE';

    /**
     * The intent to either capture payment immediately or authorize a payment for an order after order creation.
     *
     * use one of constants defined in this class to set the value:
     * @see INTENT_CAPTURE
     * @see INTENT_AUTHORIZE
     * @var string | null
     */
    public $intent;

    /**
     * Customizes the payer experience during the approval process for the payment with
     * PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code>
     * and <code>shipping_preference</code> during partner account setup, which overrides the request
     * values.</blockquote>
     *
     * @var OrderApplicationContext | null
     */
    public $application_context;

    /**
     * List of facilitators involved in the payment[s].
     *
     * @var Facilitator[]
     * maxItems: 1
     * maxItems: 10
     */
    public $facilitators;

    /**
     * List of payment contract data.
     *
     * @var PaymentUnit[]
     * maxItems: 1
     * maxItems: 100
     */
    public $payment_units;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->application_context) || Assert::isInstanceOf(
            $this->application_context,
            OrderApplicationContext::class,
            "application_context in PaymentContextData must be instance of OrderApplicationContext $within"
        );
        !isset($this->application_context) ||  $this->application_context->validate(PaymentContextData::class);
        Assert::notNull($this->facilitators, "facilitators in PaymentContextData must not be NULL $within");
        Assert::minCount(
            $this->facilitators,
            1,
            "facilitators in PaymentContextData must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->facilitators,
            10,
            "facilitators in PaymentContextData must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->facilitators,
            "facilitators in PaymentContextData must be array $within"
        );
        if (isset($this->facilitators)) {
            foreach ($this->facilitators as $item) {
                $item->validate(PaymentContextData::class);
            }
        }
        Assert::notNull($this->payment_units, "payment_units in PaymentContextData must not be NULL $within");
        Assert::minCount(
            $this->payment_units,
            1,
            "payment_units in PaymentContextData must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->payment_units,
            100,
            "payment_units in PaymentContextData must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->payment_units,
            "payment_units in PaymentContextData must be array $within"
        );
        if (isset($this->payment_units)) {
            foreach ($this->payment_units as $item) {
                $item->validate(PaymentContextData::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['intent'])) {
            $this->intent = $data['intent'];
        }
        if (isset($data['application_context'])) {
            $this->application_context = new OrderApplicationContext($data['application_context']);
        }
        if (isset($data['facilitators'])) {
            $this->facilitators = [];
            foreach ($data['facilitators'] as $item) {
                $this->facilitators[] = new Facilitator($item);
            }
        }
        if (isset($data['payment_units'])) {
            $this->payment_units = [];
            foreach ($data['payment_units'] as $item) {
                $this->payment_units[] = new PaymentUnit($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->facilitators = [];
        $this->payment_units = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initApplicationContext(): OrderApplicationContext
    {
        return $this->application_context = new OrderApplicationContext();
    }
}
