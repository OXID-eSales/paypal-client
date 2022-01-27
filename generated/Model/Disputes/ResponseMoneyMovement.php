<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The Money movement details with party.
 *
 * generated from: response-money_movement.json
 */
class ResponseMoneyMovement implements JsonSerializable
{
    use BaseModel;

    /** The money movement is related to the seller. */
    public const AFFECTED_PARTY_SELLER = 'SELLER';

    /** The money movement is related to the buyer. */
    public const AFFECTED_PARTY_BUYER = 'BUYER';

    /** The money movement is related to the payment processing tenants such as PayPal, Venmo, Braintree etc. */
    public const AFFECTED_PARTY_PAYMENT_PROCESSOR = 'PAYMENT_PROCESSOR';

    /** The money movement is a debit transaction. */
    public const TYPE_DEBIT = 'DEBIT';

    /** The money movement is a credit transaction. */
    public const TYPE_CREDIT = 'CREDIT';

    /** The fee is for dispute settlement. */
    public const REASON_DISPUTE_SETTLEMENT_FEE = 'DISPUTE_SETTLEMENT_FEE';

    /** The money movement is for dispute settlement. */
    public const REASON_DISPUTE_SETTLEMENT = 'DISPUTE_SETTLEMENT';

    /** The money movement is for dispute fee which PayPal charges to sellers for facilitating the online dispute resolution process for transactions that are processed either through a buyer’s PayPal account or through a PayPal guest checkout. */
    public const REASON_DISPUTE_FEE = 'DISPUTE_FEE';

    /** The money movement is for chargeback fee which PayPal charges to sellers for facilitating the chargeback process for transactions that are not processed either through a buyer’s PayPal account or through a guest checkout, and where the buyer pursues a chargeback for the transaction with their card issuer. */
    public const REASON_CHARGEBACK_FEE = 'CHARGEBACK_FEE';

    /**
     * The affected party in the money movement.
     *
     * use one of constants defined in this class to set the value:
     * @see AFFECTED_PARTY_SELLER
     * @see AFFECTED_PARTY_BUYER
     * @see AFFECTED_PARTY_PAYMENT_PROCESSOR
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $affected_party;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $initiated_time;

    /**
     * The type of the money movement.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_DEBIT
     * @see TYPE_CREDIT
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    /**
     * The reason for the money movement.
     *
     * use one of constants defined in this class to set the value:
     * @see REASON_DISPUTE_SETTLEMENT_FEE
     * @see REASON_DISPUTE_SETTLEMENT
     * @see REASON_DISPUTE_FEE
     * @see REASON_CHARGEBACK_FEE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->affected_party) || Assert::minLength(
            $this->affected_party,
            1,
            "affected_party in ResponseMoneyMovement must have minlength of 1 $within"
        );
        !isset($this->affected_party) || Assert::maxLength(
            $this->affected_party,
            255,
            "affected_party in ResponseMoneyMovement must have maxlength of 255 $within"
        );
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in ResponseMoneyMovement must be instance of Money $within"
        );
        !isset($this->amount) ||  $this->amount->validate(ResponseMoneyMovement::class);
        !isset($this->initiated_time) || Assert::minLength(
            $this->initiated_time,
            20,
            "initiated_time in ResponseMoneyMovement must have minlength of 20 $within"
        );
        !isset($this->initiated_time) || Assert::maxLength(
            $this->initiated_time,
            64,
            "initiated_time in ResponseMoneyMovement must have maxlength of 64 $within"
        );
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in ResponseMoneyMovement must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            255,
            "type in ResponseMoneyMovement must have maxlength of 255 $within"
        );
        !isset($this->reason) || Assert::minLength(
            $this->reason,
            1,
            "reason in ResponseMoneyMovement must have minlength of 1 $within"
        );
        !isset($this->reason) || Assert::maxLength(
            $this->reason,
            255,
            "reason in ResponseMoneyMovement must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['affected_party'])) {
            $this->affected_party = $data['affected_party'];
        }
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
        }
        if (isset($data['initiated_time'])) {
            $this->initiated_time = $data['initiated_time'];
        }
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['reason'])) {
            $this->reason = $data['reason'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAmount(): Money
    {
        return $this->amount = new Money();
    }
}
