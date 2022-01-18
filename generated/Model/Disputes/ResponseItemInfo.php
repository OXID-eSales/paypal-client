<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The information for a purchased item in a disputed transaction.
 *
 * generated from: response-item_info.json
 */
class ResponseItemInfo implements JsonSerializable
{
    use BaseModel;

    /** The customer did not receive the merchandise or service. */
    public const REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';

    /** The customer reports that the merchandise or service is not as described. */
    public const REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';

    /** The customer did not authorize purchase of the merchandise or service. */
    public const REASON_UNAUTHORISED = 'UNAUTHORISED';

    /** The refund or credit was not processed for the customer. */
    public const REASON_CREDIT_NOT_PROCESSED = 'CREDIT_NOT_PROCESSED';

    /** The transaction was a duplicate. */
    public const REASON_DUPLICATE_TRANSACTION = 'DUPLICATE_TRANSACTION';

    /** The customer was charged an incorrect amount. */
    public const REASON_INCORRECT_AMOUNT = 'INCORRECT_AMOUNT';

    /** The customer paid for the transaction through other means. */
    public const REASON_PAYMENT_BY_OTHER_MEANS = 'PAYMENT_BY_OTHER_MEANS';

    /** The customer was being charged for a subscription or a recurring transaction that was canceled. */
    public const REASON_CANCELED_RECURRING_BILLING = 'CANCELED_RECURRING_BILLING';

    /** A problem occurred with the remittance. */
    public const REASON_PROBLEM_WITH_REMITTANCE = 'PROBLEM_WITH_REMITTANCE';

    /** Other. */
    public const REASON_OTHER = 'OTHER';

    /**
     * The item ID. If the merchant provides multiple pieces of evidence and the transaction has multiple item IDs,
     * the merchant can use this value to associate a piece of evidence with an item ID.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $item_id;

    /**
     * The item description.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $item_description;

    /**
     * The count of the item in the dispute. Must be a whole number.
     *
     * @var string | null
     * maxLength: 10
     */
    public $item_quantity;

    /**
     * The ID of the transaction in the partner system. The partner transaction ID is returned at an item level
     * because the partner might show different transactions for different items in the cart.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $partner_transaction_id;

    /**
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     *
     * use one of constants defined in this class to set the value:
     * @see REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED
     * @see REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED
     * @see REASON_UNAUTHORISED
     * @see REASON_CREDIT_NOT_PROCESSED
     * @see REASON_DUPLICATE_TRANSACTION
     * @see REASON_INCORRECT_AMOUNT
     * @see REASON_PAYMENT_BY_OTHER_MEANS
     * @see REASON_CANCELED_RECURRING_BILLING
     * @see REASON_PROBLEM_WITH_REMITTANCE
     * @see REASON_OTHER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $reason;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $dispute_amount;

    /**
     * Any notes provided with the item.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $notes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->item_id) || Assert::minLength(
            $this->item_id,
            1,
            "item_id in ResponseItemInfo must have minlength of 1 $within"
        );
        !isset($this->item_id) || Assert::maxLength(
            $this->item_id,
            255,
            "item_id in ResponseItemInfo must have maxlength of 255 $within"
        );
        !isset($this->item_description) || Assert::minLength(
            $this->item_description,
            1,
            "item_description in ResponseItemInfo must have minlength of 1 $within"
        );
        !isset($this->item_description) || Assert::maxLength(
            $this->item_description,
            2000,
            "item_description in ResponseItemInfo must have maxlength of 2000 $within"
        );
        !isset($this->item_quantity) || Assert::maxLength(
            $this->item_quantity,
            10,
            "item_quantity in ResponseItemInfo must have maxlength of 10 $within"
        );
        !isset($this->partner_transaction_id) || Assert::minLength(
            $this->partner_transaction_id,
            1,
            "partner_transaction_id in ResponseItemInfo must have minlength of 1 $within"
        );
        !isset($this->partner_transaction_id) || Assert::maxLength(
            $this->partner_transaction_id,
            255,
            "partner_transaction_id in ResponseItemInfo must have maxlength of 255 $within"
        );
        !isset($this->reason) || Assert::minLength(
            $this->reason,
            1,
            "reason in ResponseItemInfo must have minlength of 1 $within"
        );
        !isset($this->reason) || Assert::maxLength(
            $this->reason,
            255,
            "reason in ResponseItemInfo must have maxlength of 255 $within"
        );
        !isset($this->dispute_amount) || Assert::isInstanceOf(
            $this->dispute_amount,
            Money::class,
            "dispute_amount in ResponseItemInfo must be instance of Money $within"
        );
        !isset($this->dispute_amount) ||  $this->dispute_amount->validate(ResponseItemInfo::class);
        !isset($this->notes) || Assert::minLength(
            $this->notes,
            1,
            "notes in ResponseItemInfo must have minlength of 1 $within"
        );
        !isset($this->notes) || Assert::maxLength(
            $this->notes,
            2000,
            "notes in ResponseItemInfo must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['item_id'])) {
            $this->item_id = $data['item_id'];
        }
        if (isset($data['item_description'])) {
            $this->item_description = $data['item_description'];
        }
        if (isset($data['item_quantity'])) {
            $this->item_quantity = $data['item_quantity'];
        }
        if (isset($data['partner_transaction_id'])) {
            $this->partner_transaction_id = $data['partner_transaction_id'];
        }
        if (isset($data['reason'])) {
            $this->reason = $data['reason'];
        }
        if (isset($data['dispute_amount'])) {
            $this->dispute_amount = new Money($data['dispute_amount']);
        }
        if (isset($data['notes'])) {
            $this->notes = $data['notes'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initDisputeAmount(): Money
    {
        return $this->dispute_amount = new Money();
    }
}
