<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The transaction information.
 *
 * generated from: partner_transaction_info.json
 */
class PartnerTransactionInfo implements JsonSerializable
{
    use BaseModel;

    /** Auth type transactions for Auth or Auth void. */
    public const TYPE_AUTH = 'AUTH';

    /** Bonus type transactions. */
    public const TYPE_BONUS = 'BONUS';

    /** Chargeback type transactions for Chargeback fee or Chargeback fee reversal. */
    public const TYPE_CHARGEBACK = 'CHARGEBACK';

    /** Correction type transactions. */
    public const TYPE_CORRECTION = 'CORRECTION';

    /** Currency conversion type transactions. */
    public const TYPE_CURRENCY_CONVERSION = 'CURRENCY_CONVERSION';

    /** Deposit type transactions. */
    public const TYPE_DEPOSIT = 'DEPOSIT';

    /** Disbursement type transactions. */
    public const TYPE_DISBURSEMENT = 'DISBURSEMENT';

    /** Dispute type transactions. */
    public const TYPE_DISPUTE = 'DISPUTE';

    /** Fees type transactions for Partner Fee, Payment Fee or Fee Reversal. */
    public const TYPE_FEES = 'FEES';

    /** Hold type transactions. */
    public const TYPE_HOLD = 'HOLD';

    /** Hold release type transactions. */
    public const TYPE_HOLD_RELEASE = 'HOLD_RELEASE';

    /** Incentives type transactions. */
    public const TYPE_INCENTIVES = 'INCENTIVES';

    /** Others type transactions. */
    public const TYPE_OTHERS = 'OTHERS';

    /** Payment type transactions. */
    public const TYPE_PAYMENT = 'PAYMENT';

    /** Recoup type transactions done either from Bank or Loss Accounts */
    public const TYPE_RECOUP = 'RECOUP';

    /** Refund type transactions. */
    public const TYPE_REFUND = 'REFUND';

    /** Reversal type transactions. */
    public const TYPE_REVERSAL = 'REVERSAL';

    /** Withdrawal type transactions. */
    public const TYPE_WITHDRAWAL = 'WITHDRAWAL';

    /** Void subtype transactions, applicable for transaction type Auth. */
    public const SUB_TYPE_VOID = 'VOID';

    /** Fee subtype transactions, applicable for transaction type Chargeback. */
    public const SUB_TYPE_FEE = 'FEE';

    /** Reversal subtype transactions, applicable for transaction types Chargeback, Fees and Withdrawal. */
    public const SUB_TYPE_REVERSAL = 'REVERSAL';

    /** Partner fee subtype transactions, applicable for transaction type Fees. */
    public const SUB_TYPE_PARTNER_FEE = 'PARTNER_FEE';

    /** Payment fee subtype transactions, applicable for transaction type Fees. */
    public const SUB_TYPE_PAYMENT_FEE = 'PAYMENT_FEE';

    /** Masspay subtype transactions, applicable for transaction type Payment. */
    public const SUB_TYPE_MASSPAY = 'MASSPAY';

    /** Bank subtype transactions, applicable for transaction type Withdrawal. */
    public const SUB_TYPE_BANK = 'BANK';

    /** Loss account subtype transactions, applicable for transaction type Recoup. */
    public const SUB_TYPE_LOSS_ACCOUNT = 'LOSS_ACCOUNT';

    /** To subtype transactions, applicable for transaction type Currency conversion */
    public const SUB_TYPE_TO = 'TO';

    /** From subtype transactions, applicable for transaction type Currency conversion */
    public const SUB_TYPE_FROM = 'FROM';

    /** Refund subtype transactions, applicable for transaction type Fees. */
    public const SUB_TYPE_REFUND = 'REFUND';

    /** AMEX card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_AMEX = 'AMEX';

    /** CB_NATIONALE card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_CB_NATIONALE = 'CB_NATIONALE';

    /** CETELEM card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_CETELEM = 'CETELEM';

    /** COFIDIS card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_COFIDIS = 'COFIDIS';

    /** COFINOGA card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_COFINOGA = 'COFINOGA';

    /** CHINA_UNION_PAY card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_CHINA_UNION_PAY = 'CHINA_UNION_PAY';

    /** DELTA card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_DELTA = 'DELTA';

    /** DISCOVER card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_DISCOVER = 'DISCOVER';

    /** ELECTRON card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_ELECTRON = 'ELECTRON';

    /** ELO card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_ELO = 'ELO';

    /** HIPER card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_HIPER = 'HIPER';

    /** HIPERCARD card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_HIPERCARD = 'HIPERCARD';

    /** JCB card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_JCB = 'JCB';

    /** MAESTRO card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_MAESTRO = 'MAESTRO';

    /** MASTER_CARD card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_MASTER_CARD = 'MASTER_CARD';

    /** SOLO card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_SOLO = 'SOLO';

    /** STAR card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_STAR = 'STAR';

    /** SWITCH card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_SWITCH = 'SWITCH';

    /** VISA card transaction */
    public const PAYMENT_INSTRUMENT_SUB_TYPE_VISA = 'VISA';

    /** Payout to Bank Account. */
    public const PAYOUT_INSTRUMENT_TYPE_BANK = 'BANK';

    /** Payment made using PayPal Here device. */
    public const CHECKOUT_CHANNEL_POS_PPH = 'POS_PPH';

    /** Online payment using e-commerce platform. */
    public const CHECKOUT_CHANNEL_ONLINE_PAYMENT = 'ONLINE_PAYMENT';

    /** Partial disbursement of amount. */
    public const DISBURSEMENT_TYPE_PARTIAL = 'PARTIAL';

    /** Full disbursement of amount. */
    public const DISBURSEMENT_TYPE_FULL = 'FULL';

    /** The transaction is pending. The transaction was created but waits for another payment process to complete, such as an ACH transaction, before the status changes to <code>S</code> */
    public const STATUS_PENDING = 'PENDING';

    /** The transaction successfully completed without a denial and after any pending statuses. */
    public const STATUS_SUCCESS = 'SUCCESS';

    /**
     * The PayPal-generated transaction ID.
     *
     * @var string | null
     * minLength: 12
     * maxLength: 24
     */
    public $id;

    /**
     * The PayPal-generated base ID. PayPal exclusive. Cannot be altered. Defined as a related, pre-existing
     * transaction or event.
     *
     * @var string | null
     * maxLength: 24
     */
    public $reference_id;

    /**
     * The PayPal reference ID type. Value is:<ul><li><code>ODR</code>. An order
     * ID.</li><li><code>TXN</code>.</li></ul>
     *
     * @var string | null
     * maxLength: 3
     */
    public $reference_id_type;

    /**
     * Transaction event type Name.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_AUTH
     * @see TYPE_BONUS
     * @see TYPE_CHARGEBACK
     * @see TYPE_CORRECTION
     * @see TYPE_CURRENCY_CONVERSION
     * @see TYPE_DEPOSIT
     * @see TYPE_DISBURSEMENT
     * @see TYPE_DISPUTE
     * @see TYPE_FEES
     * @see TYPE_HOLD
     * @see TYPE_HOLD_RELEASE
     * @see TYPE_INCENTIVES
     * @see TYPE_OTHERS
     * @see TYPE_PAYMENT
     * @see TYPE_RECOUP
     * @see TYPE_REFUND
     * @see TYPE_REVERSAL
     * @see TYPE_WITHDRAWAL
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    /**
     * Transaction event subtype Name.
     *
     * use one of constants defined in this class to set the value:
     * @see SUB_TYPE_VOID
     * @see SUB_TYPE_FEE
     * @see SUB_TYPE_REVERSAL
     * @see SUB_TYPE_PARTNER_FEE
     * @see SUB_TYPE_PAYMENT_FEE
     * @see SUB_TYPE_MASSPAY
     * @see SUB_TYPE_BANK
     * @see SUB_TYPE_LOSS_ACCOUNT
     * @see SUB_TYPE_TO
     * @see SUB_TYPE_FROM
     * @see SUB_TYPE_REFUND
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $sub_type;

    /**
     * A high-level classification of the type of financial instrument that was used to fund a payment. E.g. PAYPAL,
     * CREDIT_CARD, DEBIT_CARD, APPLE_PAY, BANK or <a
     * href="https://developer.paypal.com/docs/checkout/integration-features/alternative-payment-methods/"
     * title="Link to available APM list">Alternative Payment Methods (APM)</a>.
     *
     * @var string | null
     * maxLength: 30
     */
    public $payment_instrument_type;

    /**
     * The payment instrument sub type.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_AMEX
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_CB_NATIONALE
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_CETELEM
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_COFIDIS
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_COFINOGA
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_CHINA_UNION_PAY
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_DELTA
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_DISCOVER
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_ELECTRON
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_ELO
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_HIPER
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_HIPERCARD
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_JCB
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_MAESTRO
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_MASTER_CARD
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_SOLO
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_STAR
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_SWITCH
     * @see PAYMENT_INSTRUMENT_SUB_TYPE_VISA
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $payment_instrument_sub_type;

    /**
     * A high-level classification of the type of financial instrument that was used for Payout. E.g. `BANK`.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYOUT_INSTRUMENT_TYPE_BANK
     * @var string | null
     * maxLength: 30
     */
    public $payout_instrument_type;

    /**
     * A finer-grained classification of the financial instrument that was used for Payout.
     *
     * @var string | null
     * maxLength: 30
     */
    public $payout_instrument_sub_type;

    /**
     * Indicates if the payment happened through online or offline channel.
     *
     * use one of constants defined in this class to set the value:
     * @see CHECKOUT_CHANNEL_POS_PPH
     * @see CHECKOUT_CHANNEL_ONLINE_PAYMENT
     * @var string | null
     * maxLength: 100
     */
    public $checkout_channel;

    /**
     * Indicates whether the transcation is delayed disbursement or not. Values are `true` or `false`.
     *
     * @var boolean | null
     */
    public $delayed_disbursement;

    /**
     * Disbursement type - PARTIAL or FULL.
     *
     * use one of constants defined in this class to set the value:
     * @see DISBURSEMENT_TYPE_PARTIAL
     * @see DISBURSEMENT_TYPE_FULL
     * @var string | null
     * maxLength: 30
     */
    public $disbursement_type;

    /**
     * Indicates if money has been credited to the account. Values are `true` or empty.
     *
     * @var boolean | null
     */
    public $credit_transaction;

    /**
     * Indicates if money has been debited from the account. Values are `true` or empty.
     *
     * @var boolean | null
     */
    public $debit_transaction;

    /**
     * An array of transaction fee objects.
     *
     * @var PartnerFeeInfo[]
     * maxItems: 0
     * maxItems: 10
     */
    public $fees;

    /**
     * A code that indicates the transaction status.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_PENDING
     * @see STATUS_SUCCESS
     * @var string | null
     * minLength: 1
     * maxLength: 30
     */
    public $status;

    /**
     * The invoice ID that is sent by the partner with the transaction.
     *
     * @var string | null
     * maxLength: 127
     */
    public $invoice_id;

    /**
     * The partner-provided custom text.
     *
     * @var string | null
     * maxLength: 127
     */
    public $custom_field;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            12,
            "id in PartnerTransactionInfo must have minlength of 12 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            24,
            "id in PartnerTransactionInfo must have maxlength of 24 $within"
        );
        !isset($this->reference_id) || Assert::maxLength(
            $this->reference_id,
            24,
            "reference_id in PartnerTransactionInfo must have maxlength of 24 $within"
        );
        !isset($this->reference_id_type) || Assert::maxLength(
            $this->reference_id_type,
            3,
            "reference_id_type in PartnerTransactionInfo must have maxlength of 3 $within"
        );
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in PartnerTransactionInfo must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            255,
            "type in PartnerTransactionInfo must have maxlength of 255 $within"
        );
        !isset($this->sub_type) || Assert::minLength(
            $this->sub_type,
            1,
            "sub_type in PartnerTransactionInfo must have minlength of 1 $within"
        );
        !isset($this->sub_type) || Assert::maxLength(
            $this->sub_type,
            255,
            "sub_type in PartnerTransactionInfo must have maxlength of 255 $within"
        );
        !isset($this->payment_instrument_type) || Assert::maxLength(
            $this->payment_instrument_type,
            30,
            "payment_instrument_type in PartnerTransactionInfo must have maxlength of 30 $within"
        );
        !isset($this->payment_instrument_sub_type) || Assert::minLength(
            $this->payment_instrument_sub_type,
            1,
            "payment_instrument_sub_type in PartnerTransactionInfo must have minlength of 1 $within"
        );
        !isset($this->payment_instrument_sub_type) || Assert::maxLength(
            $this->payment_instrument_sub_type,
            255,
            "payment_instrument_sub_type in PartnerTransactionInfo must have maxlength of 255 $within"
        );
        !isset($this->payout_instrument_type) || Assert::maxLength(
            $this->payout_instrument_type,
            30,
            "payout_instrument_type in PartnerTransactionInfo must have maxlength of 30 $within"
        );
        !isset($this->payout_instrument_sub_type) || Assert::maxLength(
            $this->payout_instrument_sub_type,
            30,
            "payout_instrument_sub_type in PartnerTransactionInfo must have maxlength of 30 $within"
        );
        !isset($this->checkout_channel) || Assert::maxLength(
            $this->checkout_channel,
            100,
            "checkout_channel in PartnerTransactionInfo must have maxlength of 100 $within"
        );
        !isset($this->disbursement_type) || Assert::maxLength(
            $this->disbursement_type,
            30,
            "disbursement_type in PartnerTransactionInfo must have maxlength of 30 $within"
        );
        Assert::notNull($this->fees, "fees in PartnerTransactionInfo must not be NULL $within");
        Assert::minCount(
            $this->fees,
            0,
            "fees in PartnerTransactionInfo must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->fees,
            10,
            "fees in PartnerTransactionInfo must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->fees,
            "fees in PartnerTransactionInfo must be array $within"
        );
        if (isset($this->fees)) {
            foreach ($this->fees as $item) {
                $item->validate(PartnerTransactionInfo::class);
            }
        }
        !isset($this->status) || Assert::minLength(
            $this->status,
            1,
            "status in PartnerTransactionInfo must have minlength of 1 $within"
        );
        !isset($this->status) || Assert::maxLength(
            $this->status,
            30,
            "status in PartnerTransactionInfo must have maxlength of 30 $within"
        );
        !isset($this->invoice_id) || Assert::maxLength(
            $this->invoice_id,
            127,
            "invoice_id in PartnerTransactionInfo must have maxlength of 127 $within"
        );
        !isset($this->custom_field) || Assert::maxLength(
            $this->custom_field,
            127,
            "custom_field in PartnerTransactionInfo must have maxlength of 127 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['reference_id'])) {
            $this->reference_id = $data['reference_id'];
        }
        if (isset($data['reference_id_type'])) {
            $this->reference_id_type = $data['reference_id_type'];
        }
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['sub_type'])) {
            $this->sub_type = $data['sub_type'];
        }
        if (isset($data['payment_instrument_type'])) {
            $this->payment_instrument_type = $data['payment_instrument_type'];
        }
        if (isset($data['payment_instrument_sub_type'])) {
            $this->payment_instrument_sub_type = $data['payment_instrument_sub_type'];
        }
        if (isset($data['payout_instrument_type'])) {
            $this->payout_instrument_type = $data['payout_instrument_type'];
        }
        if (isset($data['payout_instrument_sub_type'])) {
            $this->payout_instrument_sub_type = $data['payout_instrument_sub_type'];
        }
        if (isset($data['checkout_channel'])) {
            $this->checkout_channel = $data['checkout_channel'];
        }
        if (isset($data['delayed_disbursement'])) {
            $this->delayed_disbursement = $data['delayed_disbursement'];
        }
        if (isset($data['disbursement_type'])) {
            $this->disbursement_type = $data['disbursement_type'];
        }
        if (isset($data['credit_transaction'])) {
            $this->credit_transaction = $data['credit_transaction'];
        }
        if (isset($data['debit_transaction'])) {
            $this->debit_transaction = $data['debit_transaction'];
        }
        if (isset($data['fees'])) {
            $this->fees = [];
            foreach ($data['fees'] as $item) {
                $this->fees[] = new PartnerFeeInfo($item);
            }
        }
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['invoice_id'])) {
            $this->invoice_id = $data['invoice_id'];
        }
        if (isset($data['custom_field'])) {
            $this->custom_field = $data['custom_field'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->fees = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
