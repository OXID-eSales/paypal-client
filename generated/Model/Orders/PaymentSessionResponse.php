<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The Object returns any external session related information.
 *
 * generated from: payment_session_response.json
 */
class PaymentSessionResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * Base 64 encoded opeque session object which can be used to complete the checkout with external payment
     * gateway.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 6000
     */
    public $payment_session;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_session) || Assert::minLength(
            $this->payment_session,
            1,
            "payment_session in PaymentSessionResponse must have minlength of 1 $within"
        );
        !isset($this->payment_session) || Assert::maxLength(
            $this->payment_session,
            6000,
            "payment_session in PaymentSessionResponse must have maxlength of 6000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['payment_session'])) {
            $this->payment_session = $data['payment_session'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
