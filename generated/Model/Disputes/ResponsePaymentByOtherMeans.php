<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payment by other means details.
 *
 * generated from: response-payment_by_other_means.json
 */
class ResponsePaymentByOtherMeans implements JsonSerializable
{
    use BaseModel;

    /** The payment method was cash. */
    public const PAYMENT_METHOD_CASH = 'CASH';

    /** The payment method was a credit card. */
    public const PAYMENT_METHOD_CREDIT_CARD = 'CREDIT_CARD';

    /** The payment method was a check. */
    public const PAYMENT_METHOD_CHECK = 'CHECK';

    /** The payment method was PayPal. */
    public const PAYMENT_METHOD_PAYPAL = 'PAYPAL';

    /** The payment method was a debit card. */
    public const PAYMENT_METHOD_DEBIT_CARD = 'DEBIT_CARD';

    /** The payment method was a gift card. */
    public const PAYMENT_METHOD_GIFT_CARD = 'GIFT_CARD';

    /** The payment method was through bank transfer. */
    public const PAYMENT_METHOD_BANK_TRANSFER = 'BANK_TRANSFER';

    /**
     * If `true`, indicates that a charge was made that is different from the original charge.
     *
     * @var boolean | null
     */
    public $charge_different_from_original;

    /**
     * If `true`, indicates that a duplicate transaction was received.
     *
     * @var boolean | null
     */
    public $received_duplicate;

    /**
     * The payment method.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYMENT_METHOD_CASH
     * @see PAYMENT_METHOD_CREDIT_CARD
     * @see PAYMENT_METHOD_CHECK
     * @see PAYMENT_METHOD_PAYPAL
     * @see PAYMENT_METHOD_DEBIT_CARD
     * @see PAYMENT_METHOD_GIFT_CARD
     * @see PAYMENT_METHOD_BANK_TRANSFER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $payment_method;

    /**
     * Last 2-4 characters of the payment instrument. For payment_method CHECK, payment_instrument_suffix entered
     * must be of minimum length 2-4 characters. For payment_method CREDIT_CARD, DEBIT_CARD, GIFT_CARD,
     * BANK_TRANSFER, payment_instrument_suffix entered must be of length 4.
     *
     * @var string | null
     * minLength: 2
     * maxLength: 4
     */
    public $payment_instrument_suffix;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_method) || Assert::minLength(
            $this->payment_method,
            1,
            "payment_method in ResponsePaymentByOtherMeans must have minlength of 1 $within"
        );
        !isset($this->payment_method) || Assert::maxLength(
            $this->payment_method,
            255,
            "payment_method in ResponsePaymentByOtherMeans must have maxlength of 255 $within"
        );
        !isset($this->payment_instrument_suffix) || Assert::minLength(
            $this->payment_instrument_suffix,
            2,
            "payment_instrument_suffix in ResponsePaymentByOtherMeans must have minlength of 2 $within"
        );
        !isset($this->payment_instrument_suffix) || Assert::maxLength(
            $this->payment_instrument_suffix,
            4,
            "payment_instrument_suffix in ResponsePaymentByOtherMeans must have maxlength of 4 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['charge_different_from_original'])) {
            $this->charge_different_from_original = $data['charge_different_from_original'];
        }
        if (isset($data['received_duplicate'])) {
            $this->received_duplicate = $data['received_duplicate'];
        }
        if (isset($data['payment_method'])) {
            $this->payment_method = $data['payment_method'];
        }
        if (isset($data['payment_instrument_suffix'])) {
            $this->payment_instrument_suffix = $data['payment_instrument_suffix'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
