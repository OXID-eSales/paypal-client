<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payout details for the referred dispute.
 *
 * generated from: referred-refund_info.json
 */
class ReferredRefundInfo implements JsonSerializable
{
    use BaseModel;

    /** The customer received the refund. */
    public const RECIPIENT_BUYER = 'BUYER';

    /** The merchant received the refund. */
    public const RECIPIENT_SELLER = 'SELLER';

    /** The payout was made with the reversal of the original transaction, from the merchant to the customer. */
    public const PAYOUT_TYPE_REVERSAL = 'REVERSAL';

    /** The payout was made through a courtesy credit. */
    public const PAYOUT_TYPE_COURTESY_CREDIT = 'COURTESY_CREDIT';

    /** The payout was made through Seller Protection coverage. */
    public const PAYOUT_TYPE_SELLER_PROTECTION_COVERAGE = 'SELLER_PROTECTION_COVERAGE';

    /** The transaction occurred on PayPal. */
    public const TRANSACTION_SOURCE_PAYPAL = 'PAYPAL';

    /** The transaction occurred on a third-party site other than PayPal. */
    public const TRANSACTION_SOURCE_OTHER = 'OTHER';

    /**
     * The payout recipient information.
     *
     * use one of constants defined in this class to set the value:
     * @see RECIPIENT_BUYER
     * @see RECIPIENT_SELLER
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $recipient;

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
    public $create_time;

    /**
     * The encrypted transaction ID, if available.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $transaction_id;

    /**
     * The type of payout.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYOUT_TYPE_REVERSAL
     * @see PAYOUT_TYPE_COURTESY_CREDIT
     * @see PAYOUT_TYPE_SELLER_PROTECTION_COVERAGE
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $payout_type;

    /**
     * Indicates whether the merchant is eligible for protection on the disputed transaction.
     *
     * @var boolean
     */
    public $seller_protection_eligible;

    /**
     * The site where the transaction occurred.
     *
     * use one of constants defined in this class to set the value:
     * @see TRANSACTION_SOURCE_PAYPAL
     * @see TRANSACTION_SOURCE_OTHER
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $transaction_source;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->recipient, "recipient in ReferredRefundInfo must not be NULL $within");
        Assert::minLength(
            $this->recipient,
            1,
            "recipient in ReferredRefundInfo must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->recipient,
            255,
            "recipient in ReferredRefundInfo must have maxlength of 255 $within"
        );
        Assert::notNull($this->amount, "amount in ReferredRefundInfo must not be NULL $within");
        Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in ReferredRefundInfo must be instance of Money $within"
        );
         $this->amount->validate(ReferredRefundInfo::class);
        Assert::notNull($this->create_time, "create_time in ReferredRefundInfo must not be NULL $within");
        Assert::minLength(
            $this->create_time,
            20,
            "create_time in ReferredRefundInfo must have minlength of 20 $within"
        );
        Assert::maxLength(
            $this->create_time,
            64,
            "create_time in ReferredRefundInfo must have maxlength of 64 $within"
        );
        !isset($this->transaction_id) || Assert::minLength(
            $this->transaction_id,
            1,
            "transaction_id in ReferredRefundInfo must have minlength of 1 $within"
        );
        !isset($this->transaction_id) || Assert::maxLength(
            $this->transaction_id,
            255,
            "transaction_id in ReferredRefundInfo must have maxlength of 255 $within"
        );
        Assert::notNull($this->payout_type, "payout_type in ReferredRefundInfo must not be NULL $within");
        Assert::minLength(
            $this->payout_type,
            1,
            "payout_type in ReferredRefundInfo must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->payout_type,
            255,
            "payout_type in ReferredRefundInfo must have maxlength of 255 $within"
        );
        Assert::notNull($this->seller_protection_eligible, "seller_protection_eligible in ReferredRefundInfo must not be NULL $within");
        Assert::notNull($this->transaction_source, "transaction_source in ReferredRefundInfo must not be NULL $within");
        Assert::minLength(
            $this->transaction_source,
            1,
            "transaction_source in ReferredRefundInfo must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->transaction_source,
            255,
            "transaction_source in ReferredRefundInfo must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['recipient'])) {
            $this->recipient = $data['recipient'];
        }
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
        }
        if (isset($data['create_time'])) {
            $this->create_time = $data['create_time'];
        }
        if (isset($data['transaction_id'])) {
            $this->transaction_id = $data['transaction_id'];
        }
        if (isset($data['payout_type'])) {
            $this->payout_type = $data['payout_type'];
        }
        if (isset($data['seller_protection_eligible'])) {
            $this->seller_protection_eligible = $data['seller_protection_eligible'];
        }
        if (isset($data['transaction_source'])) {
            $this->transaction_source = $data['transaction_source'];
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
