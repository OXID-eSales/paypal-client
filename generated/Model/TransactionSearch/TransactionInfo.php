<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The transaction information.
 *
 * generated from: transaction_info.json
 */
class TransactionInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * The ID of the PayPal account of the counterparty.
     *
     * @var string | null
     * maxLength: 24
     */
    public $paypal_account_id;

    /**
     * The PayPal-generated transaction ID.
     *
     * @var string | null
     * maxLength: 24
     */
    public $transaction_id;

    /**
     * The PayPal-generated base ID. PayPal exclusive. Cannot be altered. Defined as a related, pre-existing
     * transaction or event.
     *
     * @var string | null
     * maxLength: 24
     */
    public $paypal_reference_id;

    /**
     * The PayPal reference ID type. Value is:<ul><li><code>ODR</code>. An order ID.</li><li><code>TXN</code>. A
     * transaction ID.</li><li><code>SUB</code>. A subscription ID.</li><li><code>PAP</code>. A pre-approved payment
     * ID.</li></ul>
     *
     * @var string | null
     * minLength: 3
     * maxLength: 3
     */
    public $paypal_reference_id_type;

    /**
     * A five-digit transaction event code that classifies the transaction type based on money movement and debit or
     * credit. For example, <code>T0001</code>. See [Transaction event
     * codes](/docs/integration/direct/transaction-search/transaction-event-codes/).
     *
     * @var string | null
     */
    public $transaction_event_code;

    /**
     * The date and time when work on a transaction began in the PayPal system, as expressed in the time zone of the
     * account on this side of the payment. Specify the value in [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @var string | null
     * maxLength: 25
     */
    public $transaction_initiation_date;

    /**
     * The date and time when the transaction was last changed, as expressed in the time zone of the account on this
     * side of the payment. Specify the value in [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @var string | null
     * maxLength: 25
     */
    public $transaction_updated_date;

    /**
     * A code that indicates the transaction status. Value
     * is:<table><thead><tr><th>Status&nbsp;code</th><th>Description</th></tr></thead><tbody><tr><td><code>D</code></td><td>PayPal
     * or merchant rules denied the transaction.</td></tr><tr><td><code>F</code></td><td>The original recipient
     * partially refunded the transaction.</td></tr><tr><td><code>P</code></td><td>The transaction is pending. The
     * transaction was created but waits for another payment process to complete, such as an ACH transaction, before
     * the status changes to <code>S</code>.</td></tr><tr><td><code>S</code></td><td>The transaction successfully
     * completed without a denial and after any pending statuses.</td></tr><tr><td><code>V</code></td><td>A
     * successful transaction was reversed and funds were refunded to the original sender.</td></tr></tbody></table>
     *
     * @var string | null
     */
    public $transaction_status;

    /**
     * The subject of payment. The payer passes this value to the payee. The payer controls this data through the
     * interface through which he or she sends the data.
     *
     * @var string | null
     * maxLength: 256
     */
    public $transaction_subject;

    /**
     * A special note that the payer passes to the payee. Might contain special customer requests, such as shipping
     * instructions.
     *
     * @var string | null
     * maxLength: 4000
     */
    public $transaction_note;

    /**
     * The payment tracking ID, which is a unique ID that partners specify to either get information about a payment
     * or request a refund.
     *
     * @var string | null
     * maxLength: 127
     */
    public $payment_tracking_id;

    /**
     * The bank reference ID. The bank provides this value for an ACH transaction.
     *
     * @var string | null
     * maxLength: 127
     */
    public $bank_reference_id;

    /**
     * The invoice ID that is sent by the merchant with the transaction.<blockquote><strong>Note:</strong> If an
     * invoice ID was sent with the capture request, the value is reported. Otherwise, the invoice ID of the
     * authorizing transaction is reported.</blockquote>
     *
     * @var string | null
     * maxLength: 127
     */
    public $invoice_id;

    /**
     * The merchant-provided custom text.<blockquote><strong>Note:</strong> Usually, this field includes the unique
     * ID for payments made with MassPay type transaction.</blockquote>
     *
     * @var string | null
     * maxLength: 127
     */
    public $custom_field;

    /**
     * Indicates whether the transaction is eligible for protection. Value is:<ul><li><code>01</code>.
     * Eligible.</li><li><code>02</code>. Not eligible</li><li><code>03</code>. Partially eligible.</li></ul>
     *
     * @var string | null
     */
    public $protection_eligibility;

    /**
     * The credit term. The time span covered by the installment payments as expressed in the term length plus the
     * length time unit code.
     *
     * @var string | null
     * maxLength: 25
     */
    public $credit_term;

    /**
     * The payment method that was used for a transaction. Value is <code>PUI</code>, <code>installment</code>, or
     * <code>mEFT</code>.<blockquote><strong>Note:</strong> Appears only for pay upon invoice (PUI), installment, and
     * mEFT transactions. Merchants and partners in the EMEA region can use this attribute to note transactions that
     * attract turn-over tax.</blockquote>
     *
     * @var string | null
     */
    public $payment_method_type;

    /**
     * A high-level classification of the type of financial instrument that was used to fund a payment.
     *
     * @var string | null
     */
    public $instrument_type;

    /**
     * A finer-grained classification of the financial instrument that was used to fund a payment. For example, `Visa
     * card` or a `Mastercard` for a credit card.
     *
     * @var string | null
     */
    public $instrument_sub_type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->paypal_account_id) || Assert::maxLength(
            $this->paypal_account_id,
            24,
            "paypal_account_id in TransactionInfo must have maxlength of 24 $within"
        );
        !isset($this->transaction_id) || Assert::maxLength(
            $this->transaction_id,
            24,
            "transaction_id in TransactionInfo must have maxlength of 24 $within"
        );
        !isset($this->paypal_reference_id) || Assert::maxLength(
            $this->paypal_reference_id,
            24,
            "paypal_reference_id in TransactionInfo must have maxlength of 24 $within"
        );
        !isset($this->paypal_reference_id_type) || Assert::minLength(
            $this->paypal_reference_id_type,
            3,
            "paypal_reference_id_type in TransactionInfo must have minlength of 3 $within"
        );
        !isset($this->paypal_reference_id_type) || Assert::maxLength(
            $this->paypal_reference_id_type,
            3,
            "paypal_reference_id_type in TransactionInfo must have maxlength of 3 $within"
        );
        !isset($this->transaction_initiation_date) || Assert::maxLength(
            $this->transaction_initiation_date,
            25,
            "transaction_initiation_date in TransactionInfo must have maxlength of 25 $within"
        );
        !isset($this->transaction_updated_date) || Assert::maxLength(
            $this->transaction_updated_date,
            25,
            "transaction_updated_date in TransactionInfo must have maxlength of 25 $within"
        );
        !isset($this->transaction_subject) || Assert::maxLength(
            $this->transaction_subject,
            256,
            "transaction_subject in TransactionInfo must have maxlength of 256 $within"
        );
        !isset($this->transaction_note) || Assert::maxLength(
            $this->transaction_note,
            4000,
            "transaction_note in TransactionInfo must have maxlength of 4000 $within"
        );
        !isset($this->payment_tracking_id) || Assert::maxLength(
            $this->payment_tracking_id,
            127,
            "payment_tracking_id in TransactionInfo must have maxlength of 127 $within"
        );
        !isset($this->bank_reference_id) || Assert::maxLength(
            $this->bank_reference_id,
            127,
            "bank_reference_id in TransactionInfo must have maxlength of 127 $within"
        );
        !isset($this->invoice_id) || Assert::maxLength(
            $this->invoice_id,
            127,
            "invoice_id in TransactionInfo must have maxlength of 127 $within"
        );
        !isset($this->custom_field) || Assert::maxLength(
            $this->custom_field,
            127,
            "custom_field in TransactionInfo must have maxlength of 127 $within"
        );
        !isset($this->credit_term) || Assert::maxLength(
            $this->credit_term,
            25,
            "credit_term in TransactionInfo must have maxlength of 25 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['paypal_account_id'])) {
            $this->paypal_account_id = $data['paypal_account_id'];
        }
        if (isset($data['transaction_id'])) {
            $this->transaction_id = $data['transaction_id'];
        }
        if (isset($data['paypal_reference_id'])) {
            $this->paypal_reference_id = $data['paypal_reference_id'];
        }
        if (isset($data['paypal_reference_id_type'])) {
            $this->paypal_reference_id_type = $data['paypal_reference_id_type'];
        }
        if (isset($data['transaction_event_code'])) {
            $this->transaction_event_code = $data['transaction_event_code'];
        }
        if (isset($data['transaction_initiation_date'])) {
            $this->transaction_initiation_date = $data['transaction_initiation_date'];
        }
        if (isset($data['transaction_updated_date'])) {
            $this->transaction_updated_date = $data['transaction_updated_date'];
        }
        if (isset($data['transaction_status'])) {
            $this->transaction_status = $data['transaction_status'];
        }
        if (isset($data['transaction_subject'])) {
            $this->transaction_subject = $data['transaction_subject'];
        }
        if (isset($data['transaction_note'])) {
            $this->transaction_note = $data['transaction_note'];
        }
        if (isset($data['payment_tracking_id'])) {
            $this->payment_tracking_id = $data['payment_tracking_id'];
        }
        if (isset($data['bank_reference_id'])) {
            $this->bank_reference_id = $data['bank_reference_id'];
        }
        if (isset($data['invoice_id'])) {
            $this->invoice_id = $data['invoice_id'];
        }
        if (isset($data['custom_field'])) {
            $this->custom_field = $data['custom_field'];
        }
        if (isset($data['protection_eligibility'])) {
            $this->protection_eligibility = $data['protection_eligibility'];
        }
        if (isset($data['credit_term'])) {
            $this->credit_term = $data['credit_term'];
        }
        if (isset($data['payment_method_type'])) {
            $this->payment_method_type = $data['payment_method_type'];
        }
        if (isset($data['instrument_type'])) {
            $this->instrument_type = $data['instrument_type'];
        }
        if (isset($data['instrument_sub_type'])) {
            $this->instrument_sub_type = $data['instrument_sub_type'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
