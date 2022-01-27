<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The information for a purchased item in a disputed transaction.
 *
 * generated from: referred-referred_item_info.json
 */
class ReferredReferredItemInfo implements JsonSerializable
{
    use BaseModel;

    /** Computer or related accessories. */
    public const CATEGORY_COMPUTERS = 'COMPUTERS';

    /** Home appliances. */
    public const CATEGORY_HOME = 'HOME';

    /** Decorative items, ornaments, and so on. */
    public const CATEGORY_JEWELRY = 'JEWELRY';

    /** Antiques and collectible items. */
    public const CATEGORY_ANTIQUES = 'ANTIQUES';

    /** Entertainment goods, such as video games, DVDs, and so on. */
    public const CATEGORY_ENTERTAINMENT = 'ENTERTAINMENT';

    /** Other material goods. */
    public const CATEGORY_OTHER_TANGIBLES = 'OTHER_TANGIBLES';

    /** Travel items and travel needs. */
    public const CATEGORY_TRAVEL = 'TRAVEL';

    /** Services, such as installation, repair, and so on. */
    public const CATEGORY_SERVICE = 'SERVICE';

    /** Non-physical objects, such as online games. */
    public const CATEGORY_VIRTUAL_GOODS = 'VIRTUAL_GOODS';

    /** Other intangible goods. */
    public const CATEGORY_OTHER_INTANGIBLES = 'OTHER_INTANGIBLES';

    /** Tickets for events, such as sports, concerts, and so on. */
    public const CATEGORY_TICKETS = 'TICKETS';

    /** The customer did not receive the merchandise or service. */
    public const REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';

    /** The customer reports that the merchandise or service is not as described. */
    public const REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';

    /** The order is incomplete. It has missing parts or an incorrect quantity. */
    public const SUB_REASON_INCOMPLETE_ORDER = 'INCOMPLETE_ORDER';

    /** The goods are damaged. */
    public const SUB_REASON_DAMAGED = 'DAMAGED';

    /** The item is fake. */
    public const SUB_REASON_FAKE = 'FAKE';

    /** The item is materially different. It is a different item, the wrong size or model,the wrong color, or used instead of new. */
    public const SUB_REASON_MATERIALLY_DIFFERENT = 'MATERIALLY_DIFFERENT';

    /** The item is unusable or ruined. */
    public const SUB_REASON_UNUSABLE = 'UNUSABLE';

    /** The surcharge is incorrect. */
    public const SUB_REASON_EXCESSIVE_SURCHARGE = 'EXCESSIVE_SURCHARGE';

    /**
     * The ID of the item.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * The category of the item in dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see CATEGORY_COMPUTERS
     * @see CATEGORY_HOME
     * @see CATEGORY_JEWELRY
     * @see CATEGORY_ANTIQUES
     * @see CATEGORY_ENTERTAINMENT
     * @see CATEGORY_OTHER_TANGIBLES
     * @see CATEGORY_TRAVEL
     * @see CATEGORY_SERVICE
     * @see CATEGORY_VIRTUAL_GOODS
     * @see CATEGORY_OTHER_INTANGIBLES
     * @see CATEGORY_TICKETS
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $category;

    /**
     * The description of the item.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $description;

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
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $reason;

    /**
     * The dispute sub-reason.
     *
     * use one of constants defined in this class to set the value:
     * @see SUB_REASON_INCOMPLETE_ORDER
     * @see SUB_REASON_DAMAGED
     * @see SUB_REASON_FAKE
     * @see SUB_REASON_MATERIALLY_DIFFERENT
     * @see SUB_REASON_UNUSABLE
     * @see SUB_REASON_EXCESSIVE_SURCHARGE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $sub_reason;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount;

    /**
     * Any notes provided with the item.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $note;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in ReferredReferredItemInfo must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            255,
            "id in ReferredReferredItemInfo must have maxlength of 255 $within"
        );
        !isset($this->category) || Assert::minLength(
            $this->category,
            1,
            "category in ReferredReferredItemInfo must have minlength of 1 $within"
        );
        !isset($this->category) || Assert::maxLength(
            $this->category,
            255,
            "category in ReferredReferredItemInfo must have maxlength of 255 $within"
        );
        !isset($this->description) || Assert::minLength(
            $this->description,
            1,
            "description in ReferredReferredItemInfo must have minlength of 1 $within"
        );
        !isset($this->description) || Assert::maxLength(
            $this->description,
            2000,
            "description in ReferredReferredItemInfo must have maxlength of 2000 $within"
        );
        !isset($this->partner_transaction_id) || Assert::minLength(
            $this->partner_transaction_id,
            1,
            "partner_transaction_id in ReferredReferredItemInfo must have minlength of 1 $within"
        );
        !isset($this->partner_transaction_id) || Assert::maxLength(
            $this->partner_transaction_id,
            255,
            "partner_transaction_id in ReferredReferredItemInfo must have maxlength of 255 $within"
        );
        !isset($this->reason) || Assert::minLength(
            $this->reason,
            1,
            "reason in ReferredReferredItemInfo must have minlength of 1 $within"
        );
        !isset($this->reason) || Assert::maxLength(
            $this->reason,
            255,
            "reason in ReferredReferredItemInfo must have maxlength of 255 $within"
        );
        !isset($this->sub_reason) || Assert::minLength(
            $this->sub_reason,
            1,
            "sub_reason in ReferredReferredItemInfo must have minlength of 1 $within"
        );
        !isset($this->sub_reason) || Assert::maxLength(
            $this->sub_reason,
            255,
            "sub_reason in ReferredReferredItemInfo must have maxlength of 255 $within"
        );
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in ReferredReferredItemInfo must be instance of Money $within"
        );
        !isset($this->amount) ||  $this->amount->validate(ReferredReferredItemInfo::class);
        !isset($this->note) || Assert::minLength(
            $this->note,
            1,
            "note in ReferredReferredItemInfo must have minlength of 1 $within"
        );
        !isset($this->note) || Assert::maxLength(
            $this->note,
            2000,
            "note in ReferredReferredItemInfo must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['category'])) {
            $this->category = $data['category'];
        }
        if (isset($data['description'])) {
            $this->description = $data['description'];
        }
        if (isset($data['partner_transaction_id'])) {
            $this->partner_transaction_id = $data['partner_transaction_id'];
        }
        if (isset($data['reason'])) {
            $this->reason = $data['reason'];
        }
        if (isset($data['sub_reason'])) {
            $this->sub_reason = $data['sub_reason'];
        }
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
        }
        if (isset($data['note'])) {
            $this->note = $data['note'];
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
