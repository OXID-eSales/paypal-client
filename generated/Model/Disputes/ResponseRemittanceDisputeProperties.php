<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer-entered issue details for a remittance dispute.
 *
 * generated from: response-remittance_dispute_properties.json
 */
class ResponseRemittanceDisputeProperties implements JsonSerializable
{
    use BaseModel;

    /** Refund is preferred by the customer. */
    public const PREFERRED_RESOLUTION_REFUND = 'REFUND';

    /** The remittance should be retried as the preferred resolution. */
    public const PREFERRED_RESOLUTION_RETRY_REMITTANCE = 'RETRY_REMITTANCE';

    /** The remittance amount sent is incorrect. */
    public const ISSUE_TYPE_INCORRECT_AMOUNT_SENT = 'INCORRECT_AMOUNT_SENT';

    /** The remittance amount received is incorrect. */
    public const ISSUE_TYPE_INCORRECT_AMOUNT_RECEIVED = 'INCORRECT_AMOUNT_RECEIVED';

    /** The exchange rate applied on the remittance is incorrect. */
    public const ISSUE_TYPE_INCORRECT_EXCHANGE_RATE = 'INCORRECT_EXCHANGE_RATE';

    /** The remittance fees is incorrect. */
    public const ISSUE_TYPE_INCORRECT_TAX_AND_FEES = 'INCORRECT_TAX_AND_FEES';

    /** The remittance amount received late. */
    public const ISSUE_TYPE_FUNDS_RECEIVED_LATE = 'FUNDS_RECEIVED_LATE';

    /** The remittance transaction was done twice. */
    public const ISSUE_TYPE_DUPLICATE_PAYMENT = 'DUPLICATE_PAYMENT';

    /** Amount is not credited after remittance cancellation. */
    public const ISSUE_TYPE_REMITTANCE_CANCELLED_CREDIT_NOT_PROCESSED = 'REMITTANCE_CANCELLED_CREDIT_NOT_PROCESSED';

    /** The remittance amount is not received. */
    public const ISSUE_TYPE_FUNDS_NOT_RECEIVED = 'FUNDS_NOT_RECEIVED';

    /** The remittance recipient is incorrect. */
    public const ISSUE_TYPE_MONEY_REMITTED_TO_WRONG_RECIPIENT = 'MONEY_REMITTED_TO_WRONG_RECIPIENT';

    /** Transaction details is missing for the remittance. */
    public const ISSUE_TYPE_MISSING_TRANSACTION_DETAILS = 'MISSING_TRANSACTION_DETAILS';

    /** Transaction receipt is missing for the remittance. */
    public const ISSUE_TYPE_MISSING_TRANSACTION_RECEIPT = 'MISSING_TRANSACTION_RECEIPT';

    /** The issue in remittance is due to an error from sender. */
    public const ISSUE_TYPE_SENDER_ERROR = 'SENDER_ERROR';

    /** Other remittance issues. */
    public const ISSUE_TYPE_OTHER = 'OTHER';

    /**
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * @var string | null
     * minLength: 3
     * maxLength: 254
     */
    public $correct_recipient_email;

    /**
     * The expected exchange rate for the remittance.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 32
     */
    public $expected_exchange_rate;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $expected_fee_amount;

    /**
     * The customer preferred remittance resolution.
     *
     * use one of constants defined in this class to set the value:
     * @see PREFERRED_RESOLUTION_REFUND
     * @see PREFERRED_RESOLUTION_RETRY_REMITTANCE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $preferred_resolution = 'REFUND';

    /**
     * The remittance issue type.
     *
     * use one of constants defined in this class to set the value:
     * @see ISSUE_TYPE_INCORRECT_AMOUNT_SENT
     * @see ISSUE_TYPE_INCORRECT_AMOUNT_RECEIVED
     * @see ISSUE_TYPE_INCORRECT_EXCHANGE_RATE
     * @see ISSUE_TYPE_INCORRECT_TAX_AND_FEES
     * @see ISSUE_TYPE_FUNDS_RECEIVED_LATE
     * @see ISSUE_TYPE_DUPLICATE_PAYMENT
     * @see ISSUE_TYPE_REMITTANCE_CANCELLED_CREDIT_NOT_PROCESSED
     * @see ISSUE_TYPE_FUNDS_NOT_RECEIVED
     * @see ISSUE_TYPE_MONEY_REMITTED_TO_WRONG_RECIPIENT
     * @see ISSUE_TYPE_MISSING_TRANSACTION_DETAILS
     * @see ISSUE_TYPE_MISSING_TRANSACTION_RECEIPT
     * @see ISSUE_TYPE_SENDER_ERROR
     * @see ISSUE_TYPE_OTHER
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $issue_type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->correct_recipient_email) || Assert::minLength(
            $this->correct_recipient_email,
            3,
            "correct_recipient_email in ResponseRemittanceDisputeProperties must have minlength of 3 $within"
        );
        !isset($this->correct_recipient_email) || Assert::maxLength(
            $this->correct_recipient_email,
            254,
            "correct_recipient_email in ResponseRemittanceDisputeProperties must have maxlength of 254 $within"
        );
        !isset($this->expected_exchange_rate) || Assert::minLength(
            $this->expected_exchange_rate,
            1,
            "expected_exchange_rate in ResponseRemittanceDisputeProperties must have minlength of 1 $within"
        );
        !isset($this->expected_exchange_rate) || Assert::maxLength(
            $this->expected_exchange_rate,
            32,
            "expected_exchange_rate in ResponseRemittanceDisputeProperties must have maxlength of 32 $within"
        );
        !isset($this->expected_fee_amount) || Assert::isInstanceOf(
            $this->expected_fee_amount,
            Money::class,
            "expected_fee_amount in ResponseRemittanceDisputeProperties must be instance of Money $within"
        );
        !isset($this->expected_fee_amount) ||  $this->expected_fee_amount->validate(ResponseRemittanceDisputeProperties::class);
        !isset($this->preferred_resolution) || Assert::minLength(
            $this->preferred_resolution,
            1,
            "preferred_resolution in ResponseRemittanceDisputeProperties must have minlength of 1 $within"
        );
        !isset($this->preferred_resolution) || Assert::maxLength(
            $this->preferred_resolution,
            255,
            "preferred_resolution in ResponseRemittanceDisputeProperties must have maxlength of 255 $within"
        );
        Assert::notNull($this->issue_type, "issue_type in ResponseRemittanceDisputeProperties must not be NULL $within");
        Assert::minLength(
            $this->issue_type,
            1,
            "issue_type in ResponseRemittanceDisputeProperties must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->issue_type,
            255,
            "issue_type in ResponseRemittanceDisputeProperties must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['correct_recipient_email'])) {
            $this->correct_recipient_email = $data['correct_recipient_email'];
        }
        if (isset($data['expected_exchange_rate'])) {
            $this->expected_exchange_rate = $data['expected_exchange_rate'];
        }
        if (isset($data['expected_fee_amount'])) {
            $this->expected_fee_amount = new Money($data['expected_fee_amount']);
        }
        if (isset($data['preferred_resolution'])) {
            $this->preferred_resolution = $data['preferred_resolution'];
        }
        if (isset($data['issue_type'])) {
            $this->issue_type = $data['issue_type'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initExpectedFeeAmount(): Money
    {
        return $this->expected_fee_amount = new Money();
    }
}
