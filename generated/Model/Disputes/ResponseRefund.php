<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The refund details.
 *
 * generated from: response-refund.json
 */
class ResponseRefund implements JsonSerializable
{
    use BaseModel;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $gross_amount;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $transaction_time;

    /**
     * The ID of the transaction for the refund, as it appears to the merchant.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $transaction_id;

    /**
     * The ID of the invoice for the refund.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $invoice_number;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->gross_amount) || Assert::isInstanceOf(
            $this->gross_amount,
            Money::class,
            "gross_amount in ResponseRefund must be instance of Money $within"
        );
        !isset($this->gross_amount) ||  $this->gross_amount->validate(ResponseRefund::class);
        !isset($this->transaction_time) || Assert::minLength(
            $this->transaction_time,
            20,
            "transaction_time in ResponseRefund must have minlength of 20 $within"
        );
        !isset($this->transaction_time) || Assert::maxLength(
            $this->transaction_time,
            64,
            "transaction_time in ResponseRefund must have maxlength of 64 $within"
        );
        !isset($this->transaction_id) || Assert::minLength(
            $this->transaction_id,
            1,
            "transaction_id in ResponseRefund must have minlength of 1 $within"
        );
        !isset($this->transaction_id) || Assert::maxLength(
            $this->transaction_id,
            255,
            "transaction_id in ResponseRefund must have maxlength of 255 $within"
        );
        !isset($this->invoice_number) || Assert::minLength(
            $this->invoice_number,
            1,
            "invoice_number in ResponseRefund must have minlength of 1 $within"
        );
        !isset($this->invoice_number) || Assert::maxLength(
            $this->invoice_number,
            127,
            "invoice_number in ResponseRefund must have maxlength of 127 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['gross_amount'])) {
            $this->gross_amount = new Money($data['gross_amount']);
        }
        if (isset($data['transaction_time'])) {
            $this->transaction_time = $data['transaction_time'];
        }
        if (isset($data['transaction_id'])) {
            $this->transaction_id = $data['transaction_id'];
        }
        if (isset($data['invoice_number'])) {
            $this->invoice_number = $data['invoice_number'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initGrossAmount(): Money
    {
        return $this->gross_amount = new Money();
    }
}
