<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The information about the disputed transaction.
 *
 * generated from: response-transaction_info.json
 */
class ResponseTransactionInfo implements JsonSerializable
{
    use BaseModel;

    /** The transaction processing completed. */
    public const TRANSACTION_STATUS_COMPLETED = 'COMPLETED';

    /** The items in the transaction are unclaimed. If they are not claimed within 30 days, the funds are returned to the sender. */
    public const TRANSACTION_STATUS_UNCLAIMED = 'UNCLAIMED';

    /** The transaction was denied. */
    public const TRANSACTION_STATUS_DENIED = 'DENIED';

    /** The transaction failed. */
    public const TRANSACTION_STATUS_FAILED = 'FAILED';

    /** The transaction is on hold. */
    public const TRANSACTION_STATUS_HELD = 'HELD';

    /** The transaction is waiting to be processed. */
    public const TRANSACTION_STATUS_PENDING = 'PENDING';

    /** The payment for the transaction was partially refunded. */
    public const TRANSACTION_STATUS_PARTIALLY_REFUNDED = 'PARTIALLY_REFUNDED';

    /** The payment for the transaction was successfully refunded. */
    public const TRANSACTION_STATUS_REFUNDED = 'REFUNDED';

    /** The payment for the transaction was reversed due to a chargeback or other reversal type. */
    public const TRANSACTION_STATUS_REVERSED = 'REVERSED';

    /** The transaction is cancelled. */
    public const TRANSACTION_STATUS_CANCELLED = 'CANCELLED';

    /** Merchants are covered under seller protection provided they have responded with valid evidence. */
    public const SELLER_PROTECTION_TYPE_EXPANDED_SELLER_PROTECTION = 'EXPANDED_SELLER_PROTECTION';

    /** Merchants are eligible for seller protection irrespective of them responding with the proof of shipment/delivery. */
    public const SELLER_PROTECTION_TYPE_EFFORTLESS_SELLER_PROTECTION = 'EFFORTLESS_SELLER_PROTECTION';

    /** Merchants are protected in the subsequent case if an internal case is communicated as resolved in merchant favor. */
    public const SELLER_PROTECTION_TYPE_DOUBLE_JEOPARDY_PROTECTION = 'DOUBLE_JEOPARDY_PROTECTION';

    /** Not applicable. */
    public const PROVISIONAL_CREDIT_STATUS_NOT_APPLICABLE = 'NOT_APPLICABLE';

    /** The provisional credit was applied. */
    public const PROVISIONAL_CREDIT_STATUS_APPLIED = 'APPLIED';

    /** The provisional credit was not applied. */
    public const PROVISIONAL_CREDIT_STATUS_NOT_APPLIED = 'NOT_APPLIED';

    /** The provisional credit was refunded. */
    public const PROVISIONAL_CREDIT_STATUS_REVERSED = 'REVERSED';

    /** The provisional credit in pending debit. */
    public const PROVISIONAL_CREDIT_STATUS_PENDING_DEBIT = 'PENDING_DEBIT';

    /**
     * The ID, as seen by the customer, for this transaction.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $buyer_transaction_id;

    /**
     * The ID, as seen by the merchant, for this transaction.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $seller_transaction_id;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * The transaction status.
     *
     * use one of constants defined in this class to set the value:
     * @see TRANSACTION_STATUS_COMPLETED
     * @see TRANSACTION_STATUS_UNCLAIMED
     * @see TRANSACTION_STATUS_DENIED
     * @see TRANSACTION_STATUS_FAILED
     * @see TRANSACTION_STATUS_HELD
     * @see TRANSACTION_STATUS_PENDING
     * @see TRANSACTION_STATUS_PARTIALLY_REFUNDED
     * @see TRANSACTION_STATUS_REFUNDED
     * @see TRANSACTION_STATUS_REVERSED
     * @see TRANSACTION_STATUS_CANCELLED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $transaction_status;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $gross_amount;

    /**
     * The ID of the invoice for the payment.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $invoice_number;

    /**
     * A free-text field that is entered by the merchant during checkout.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $custom;

    /**
     * The details for the customer who funds the payment. For example, the customer's first name, last name, and
     * email address.
     *
     * @var ResponseBuyer | null
     */
    public $buyer;

    /**
     * The details for the merchant who receives the funds and fulfills the order. For example, merchant ID, and
     * contact email address.
     *
     * @var ResponseSeller | null
     */
    public $seller;

    /**
     * A resource representing a Facilitator/Partner who facilitates a transaction.
     *
     * @var ResponseFacilitator | null
     */
    public $facilitator;

    /**
     * An array of items that were purchased as part of the transaction.
     *
     * @var ResponseItemInfo[] | null
     */
    public $items;

    /**
     * Indicates whether the merchant is eligible for protection on the disputed transaction.
     *
     * @var boolean | null
     */
    public $seller_protection_eligible;

    /**
     * Indicates the type of protection the merchant is eligible on the disputed transaction.
     *
     * use one of constants defined in this class to set the value:
     * @see SELLER_PROTECTION_TYPE_EXPANDED_SELLER_PROTECTION
     * @see SELLER_PROTECTION_TYPE_EFFORTLESS_SELLER_PROTECTION
     * @see SELLER_PROTECTION_TYPE_DOUBLE_JEOPARDY_PROTECTION
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $seller_protection_type;

    /**
     * The details for the regulation under which the transaction is covered.
     *
     * @var ResponseRegulationInfo | null
     */
    public $regulation_info;

    /**
     * The provisional credit status.
     *
     * use one of constants defined in this class to set the value:
     * @see PROVISIONAL_CREDIT_STATUS_NOT_APPLICABLE
     * @see PROVISIONAL_CREDIT_STATUS_APPLIED
     * @see PROVISIONAL_CREDIT_STATUS_NOT_APPLIED
     * @see PROVISIONAL_CREDIT_STATUS_REVERSED
     * @see PROVISIONAL_CREDIT_STATUS_PENDING_DEBIT
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $provisional_credit_status;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->buyer_transaction_id) || Assert::minLength(
            $this->buyer_transaction_id,
            1,
            "buyer_transaction_id in ResponseTransactionInfo must have minlength of 1 $within"
        );
        !isset($this->buyer_transaction_id) || Assert::maxLength(
            $this->buyer_transaction_id,
            255,
            "buyer_transaction_id in ResponseTransactionInfo must have maxlength of 255 $within"
        );
        !isset($this->seller_transaction_id) || Assert::minLength(
            $this->seller_transaction_id,
            1,
            "seller_transaction_id in ResponseTransactionInfo must have minlength of 1 $within"
        );
        !isset($this->seller_transaction_id) || Assert::maxLength(
            $this->seller_transaction_id,
            255,
            "seller_transaction_id in ResponseTransactionInfo must have maxlength of 255 $within"
        );
        !isset($this->create_time) || Assert::minLength(
            $this->create_time,
            20,
            "create_time in ResponseTransactionInfo must have minlength of 20 $within"
        );
        !isset($this->create_time) || Assert::maxLength(
            $this->create_time,
            64,
            "create_time in ResponseTransactionInfo must have maxlength of 64 $within"
        );
        !isset($this->transaction_status) || Assert::minLength(
            $this->transaction_status,
            1,
            "transaction_status in ResponseTransactionInfo must have minlength of 1 $within"
        );
        !isset($this->transaction_status) || Assert::maxLength(
            $this->transaction_status,
            255,
            "transaction_status in ResponseTransactionInfo must have maxlength of 255 $within"
        );
        !isset($this->gross_amount) || Assert::isInstanceOf(
            $this->gross_amount,
            Money::class,
            "gross_amount in ResponseTransactionInfo must be instance of Money $within"
        );
        !isset($this->gross_amount) ||  $this->gross_amount->validate(ResponseTransactionInfo::class);
        !isset($this->invoice_number) || Assert::minLength(
            $this->invoice_number,
            1,
            "invoice_number in ResponseTransactionInfo must have minlength of 1 $within"
        );
        !isset($this->invoice_number) || Assert::maxLength(
            $this->invoice_number,
            127,
            "invoice_number in ResponseTransactionInfo must have maxlength of 127 $within"
        );
        !isset($this->custom) || Assert::minLength(
            $this->custom,
            1,
            "custom in ResponseTransactionInfo must have minlength of 1 $within"
        );
        !isset($this->custom) || Assert::maxLength(
            $this->custom,
            2000,
            "custom in ResponseTransactionInfo must have maxlength of 2000 $within"
        );
        !isset($this->buyer) || Assert::isInstanceOf(
            $this->buyer,
            ResponseBuyer::class,
            "buyer in ResponseTransactionInfo must be instance of ResponseBuyer $within"
        );
        !isset($this->buyer) ||  $this->buyer->validate(ResponseTransactionInfo::class);
        !isset($this->seller) || Assert::isInstanceOf(
            $this->seller,
            ResponseSeller::class,
            "seller in ResponseTransactionInfo must be instance of ResponseSeller $within"
        );
        !isset($this->seller) ||  $this->seller->validate(ResponseTransactionInfo::class);
        !isset($this->facilitator) || Assert::isInstanceOf(
            $this->facilitator,
            ResponseFacilitator::class,
            "facilitator in ResponseTransactionInfo must be instance of ResponseFacilitator $within"
        );
        !isset($this->facilitator) ||  $this->facilitator->validate(ResponseTransactionInfo::class);
        !isset($this->items) || Assert::isArray(
            $this->items,
            "items in ResponseTransactionInfo must be array $within"
        );
        if (isset($this->items)) {
            foreach ($this->items as $item) {
                $item->validate(ResponseTransactionInfo::class);
            }
        }
        !isset($this->seller_protection_type) || Assert::minLength(
            $this->seller_protection_type,
            1,
            "seller_protection_type in ResponseTransactionInfo must have minlength of 1 $within"
        );
        !isset($this->seller_protection_type) || Assert::maxLength(
            $this->seller_protection_type,
            255,
            "seller_protection_type in ResponseTransactionInfo must have maxlength of 255 $within"
        );
        !isset($this->regulation_info) || Assert::isInstanceOf(
            $this->regulation_info,
            ResponseRegulationInfo::class,
            "regulation_info in ResponseTransactionInfo must be instance of ResponseRegulationInfo $within"
        );
        !isset($this->regulation_info) ||  $this->regulation_info->validate(ResponseTransactionInfo::class);
        !isset($this->provisional_credit_status) || Assert::minLength(
            $this->provisional_credit_status,
            1,
            "provisional_credit_status in ResponseTransactionInfo must have minlength of 1 $within"
        );
        !isset($this->provisional_credit_status) || Assert::maxLength(
            $this->provisional_credit_status,
            255,
            "provisional_credit_status in ResponseTransactionInfo must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['buyer_transaction_id'])) {
            $this->buyer_transaction_id = $data['buyer_transaction_id'];
        }
        if (isset($data['seller_transaction_id'])) {
            $this->seller_transaction_id = $data['seller_transaction_id'];
        }
        if (isset($data['create_time'])) {
            $this->create_time = $data['create_time'];
        }
        if (isset($data['transaction_status'])) {
            $this->transaction_status = $data['transaction_status'];
        }
        if (isset($data['gross_amount'])) {
            $this->gross_amount = new Money($data['gross_amount']);
        }
        if (isset($data['invoice_number'])) {
            $this->invoice_number = $data['invoice_number'];
        }
        if (isset($data['custom'])) {
            $this->custom = $data['custom'];
        }
        if (isset($data['buyer'])) {
            $this->buyer = new ResponseBuyer($data['buyer']);
        }
        if (isset($data['seller'])) {
            $this->seller = new ResponseSeller($data['seller']);
        }
        if (isset($data['facilitator'])) {
            $this->facilitator = new ResponseFacilitator($data['facilitator']);
        }
        if (isset($data['items'])) {
            $this->items = [];
            foreach ($data['items'] as $item) {
                $this->items[] = new ResponseItemInfo($item);
            }
        }
        if (isset($data['seller_protection_eligible'])) {
            $this->seller_protection_eligible = $data['seller_protection_eligible'];
        }
        if (isset($data['seller_protection_type'])) {
            $this->seller_protection_type = $data['seller_protection_type'];
        }
        if (isset($data['regulation_info'])) {
            $this->regulation_info = new ResponseRegulationInfo($data['regulation_info']);
        }
        if (isset($data['provisional_credit_status'])) {
            $this->provisional_credit_status = $data['provisional_credit_status'];
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

    public function initBuyer(): ResponseBuyer
    {
        return $this->buyer = new ResponseBuyer();
    }

    public function initSeller(): ResponseSeller
    {
        return $this->seller = new ResponseSeller();
    }

    public function initFacilitator(): ResponseFacilitator
    {
        return $this->facilitator = new ResponseFacilitator();
    }

    public function initRegulationInfo(): ResponseRegulationInfo
    {
        return $this->regulation_info = new ResponseRegulationInfo();
    }
}
