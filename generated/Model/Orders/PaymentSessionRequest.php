<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * External session data information.
 *
 * generated from: payment_session_request.json
 */
class PaymentSessionRequest implements JsonSerializable
{
    use BaseModel;

    /** For Apple Pay Session. */
    const SESSION_TYPE_APPLE_PAY = 'APPLE_PAY';

    /**
     * Order Id for which transaction is being processed and payment session needs to be creeated..
     *
     * @var string
     * minLength: 1
     * maxLength: 17
     */
    public $order_id;

    /**
     * Type of payment session needs to be created.
     *
     * use one of constants defined in this class to set the value:
     * @see SESSION_TYPE_APPLE_PAY
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $session_type;

    /**
     * This object will hold apple pay payment context information.
     *
     * @var ApplePayDetails | null
     */
    public $apple_pay;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->order_id, "order_id in PaymentSessionRequest must not be NULL $within");
        Assert::minLength(
            $this->order_id,
            1,
            "order_id in PaymentSessionRequest must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->order_id,
            17,
            "order_id in PaymentSessionRequest must have maxlength of 17 $within"
        );
        Assert::notNull($this->session_type, "session_type in PaymentSessionRequest must not be NULL $within");
        Assert::minLength(
            $this->session_type,
            1,
            "session_type in PaymentSessionRequest must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->session_type,
            255,
            "session_type in PaymentSessionRequest must have maxlength of 255 $within"
        );
        !isset($this->apple_pay) || Assert::isInstanceOf(
            $this->apple_pay,
            ApplePayDetails::class,
            "apple_pay in PaymentSessionRequest must be instance of ApplePayDetails $within"
        );
        !isset($this->apple_pay) ||  $this->apple_pay->validate(PaymentSessionRequest::class);
    }

    private function map(array $data)
    {
        if (isset($data['order_id'])) {
            $this->order_id = $data['order_id'];
        }
        if (isset($data['session_type'])) {
            $this->session_type = $data['session_type'];
        }
        if (isset($data['apple_pay'])) {
            $this->apple_pay = new ApplePayDetails($data['apple_pay']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initApplePay(): ApplePayDetails
    {
        return $this->apple_pay = new ApplePayDetails();
    }
}
