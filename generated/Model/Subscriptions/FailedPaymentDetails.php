<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details for the failed payment of the subscription.
 *
 * generated from: failed_payment_details.json
 */
class FailedPaymentDetails implements JsonSerializable
{
    use BaseModel;

    /** PayPal declined the payment due to one or more customer issues. */
    public const REASON_CODE_PAYMENT_DENIED = 'PAYMENT_DENIED';

    /** An internal server error has occurred. */
    public const REASON_CODE_INTERNAL_SERVER_ERROR = 'INTERNAL_SERVER_ERROR';

    /** The payee account is not in good standing and cannot receive payments. */
    public const REASON_CODE_PAYEE_ACCOUNT_RESTRICTED = 'PAYEE_ACCOUNT_RESTRICTED';

    /** The payer account is not in good standing and cannot make payments. */
    public const REASON_CODE_PAYER_ACCOUNT_RESTRICTED = 'PAYER_ACCOUNT_RESTRICTED';

    /** Payer cannot pay for this transaction. */
    public const REASON_CODE_PAYER_CANNOT_PAY = 'PAYER_CANNOT_PAY';

    /** The transaction exceeds the payer's sending limit. */
    public const REASON_CODE_SENDING_LIMIT_EXCEEDED = 'SENDING_LIMIT_EXCEEDED';

    /** The transaction exceeds the receiver's receiving limit. */
    public const REASON_CODE_TRANSACTION_RECEIVING_LIMIT_EXCEEDED = 'TRANSACTION_RECEIVING_LIMIT_EXCEEDED';

    /** The transaction is declined due to a currency mismatch. */
    public const REASON_CODE_CURRENCY_MISMATCH = 'CURRENCY_MISMATCH';

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money
     */
    public $amount;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string
     * minLength: 20
     * maxLength: 64
     */
    public $time;

    /**
     * The reason code for the payment failure.
     *
     * use one of constants defined in this class to set the value:
     * @see REASON_CODE_PAYMENT_DENIED
     * @see REASON_CODE_INTERNAL_SERVER_ERROR
     * @see REASON_CODE_PAYEE_ACCOUNT_RESTRICTED
     * @see REASON_CODE_PAYER_ACCOUNT_RESTRICTED
     * @see REASON_CODE_PAYER_CANNOT_PAY
     * @see REASON_CODE_SENDING_LIMIT_EXCEEDED
     * @see REASON_CODE_TRANSACTION_RECEIVING_LIMIT_EXCEEDED
     * @see REASON_CODE_CURRENCY_MISMATCH
     * @var string | null
     * minLength: 1
     * maxLength: 120
     */
    public $reason_code;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $next_payment_retry_time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->amount, "amount in FailedPaymentDetails must not be NULL $within");
        Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in FailedPaymentDetails must be instance of Money $within"
        );
         $this->amount->validate(FailedPaymentDetails::class);
        Assert::notNull($this->time, "time in FailedPaymentDetails must not be NULL $within");
        Assert::minLength(
            $this->time,
            20,
            "time in FailedPaymentDetails must have minlength of 20 $within"
        );
        Assert::maxLength(
            $this->time,
            64,
            "time in FailedPaymentDetails must have maxlength of 64 $within"
        );
        !isset($this->reason_code) || Assert::minLength(
            $this->reason_code,
            1,
            "reason_code in FailedPaymentDetails must have minlength of 1 $within"
        );
        !isset($this->reason_code) || Assert::maxLength(
            $this->reason_code,
            120,
            "reason_code in FailedPaymentDetails must have maxlength of 120 $within"
        );
        !isset($this->next_payment_retry_time) || Assert::minLength(
            $this->next_payment_retry_time,
            20,
            "next_payment_retry_time in FailedPaymentDetails must have minlength of 20 $within"
        );
        !isset($this->next_payment_retry_time) || Assert::maxLength(
            $this->next_payment_retry_time,
            64,
            "next_payment_retry_time in FailedPaymentDetails must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
        }
        if (isset($data['time'])) {
            $this->time = $data['time'];
        }
        if (isset($data['reason_code'])) {
            $this->reason_code = $data['reason_code'];
        }
        if (isset($data['next_payment_retry_time'])) {
            $this->next_payment_retry_time = $data['next_payment_retry_time'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->amount = new Money();
        if (isset($data)) {
            $this->map($data);
        }
    }
}
