<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The incorrect transaction amount details.
 *
 * generated from: response-incorrect_transaction_amount.json
 */
class ResponseIncorrectTransactionAmount implements JsonSerializable
{
    use BaseModel;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $correct_transaction_amount;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $correct_transaction_time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->correct_transaction_amount) || Assert::isInstanceOf(
            $this->correct_transaction_amount,
            Money::class,
            "correct_transaction_amount in ResponseIncorrectTransactionAmount must be instance of Money $within"
        );
        !isset($this->correct_transaction_amount) ||  $this->correct_transaction_amount->validate(ResponseIncorrectTransactionAmount::class);
        !isset($this->correct_transaction_time) || Assert::minLength(
            $this->correct_transaction_time,
            20,
            "correct_transaction_time in ResponseIncorrectTransactionAmount must have minlength of 20 $within"
        );
        !isset($this->correct_transaction_time) || Assert::maxLength(
            $this->correct_transaction_time,
            64,
            "correct_transaction_time in ResponseIncorrectTransactionAmount must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['correct_transaction_amount'])) {
            $this->correct_transaction_amount = new Money($data['correct_transaction_amount']);
        }
        if (isset($data['correct_transaction_time'])) {
            $this->correct_transaction_time = $data['correct_transaction_time'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initCorrectTransactionAmount(): Money
    {
        return $this->correct_transaction_amount = new Money();
    }
}
