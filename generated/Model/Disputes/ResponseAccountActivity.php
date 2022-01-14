<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The information about the account-related activities.
 *
 * generated from: response-account_activity.json
 */
class ResponseAccountActivity implements JsonSerializable
{
    use BaseModel;

    /** The account change occurred to an email. */
    public const ENTITY_TYPE_EMAIL = 'EMAIL';

    /** The account change occurred to a phone number. */
    public const ENTITY_TYPE_PHONE = 'PHONE';

    /** The account change occurred to an address. */
    public const ENTITY_TYPE_ADDRESS = 'ADDRESS';

    /** The account change occurred to the account itself. */
    public const ENTITY_TYPE_ACCOUNT = 'ACCOUNT';

    /** The account change occurred to a funding instrument. */
    public const ENTITY_TYPE_FUNDING_INSTRUMENT = 'FUNDING_INSTRUMENT';

    /** The account change was other. */
    public const ENTITY_TYPE_OTHER = 'OTHER';

    /** The account change occurred to a device. */
    public const ENTITY_TYPE_DEVICE = 'DEVICE';

    /** The account change occurred to a credit card. */
    public const ENTITY_SUBTYPE_CREDIT_CARD = 'CREDIT_CARD';

    /** The account change occurred to a bank account. */
    public const ENTITY_SUBTYPE_BANK_ACCOUNT = 'BANK_ACCOUNT';

    /** The account change occurred to a debit card. */
    public const ENTITY_SUBTYPE_DEBIT_CARD = 'DEBIT_CARD';

    /** The account change occurred to customer credit. */
    public const ENTITY_SUBTYPE_BUYER_CREDIT = 'BUYER_CREDIT';

    /** The account change occurred to PayPal Smart Connect. */
    public const ENTITY_SUBTYPE_PAYPAL_SMART_CONNECT = 'PAYPAL_SMART_CONNECT';

    /** The account change occurred to an ebay card. */
    public const ENTITY_SUBTYPE_EBAY_CARD = 'EBAY_CARD';

    /** The account change occurred to a Plus card. */
    public const ENTITY_SUBTYPE_PLUS_CARD = 'PLUS_CARD';

    /** The account change occurred to working capital. */
    public const ENTITY_SUBTYPE_WORKING_CAPITAL = 'WORKING_CAPITAL';

    /** The account change occurred to revolving credit. */
    public const ENTITY_SUBTYPE_REVOLVING_CREDIT = 'REVOLVING_CREDIT';

    /** The account change occurred to close-ended credit. */
    public const ENTITY_SUBTYPE_CLOSE_ENDED_CREDIT = 'CLOSE_ENDED_CREDIT';

    /** The entity was added. */
    public const ACTION_PERFORMED_ADDED = 'ADDED';

    /** The entity was removed. */
    public const ACTION_PERFORMED_REMOVED = 'REMOVED';

    /** The entity was marked as primary. */
    public const ACTION_PERFORMED_MARKED_PRIMARY = 'MARKED_PRIMARY';

    /** The entity was edited. */
    public const ACTION_PERFORMED_EDITED = 'EDITED';

    /** The entity was upgraded. */
    public const ACTION_PERFORMED_UPGRADED = 'UPGRADED';

    /** The entity was downgraded. */
    public const ACTION_PERFORMED_DOWNGRADED = 'DOWNGRADED';

    /** The entity was stolen or lost. */
    public const ACTION_PERFORMED_STOLEN_OR_LOST = 'STOLEN_OR_LOST';

    /** The entity was closed. */
    public const ACTION_PERFORMED_CLOSED = 'CLOSED';

    /** The entity was deactivated. */
    public const ACTION_PERFORMED_DEACTIVATED = 'DEACTIVATED';

    /** The entity was reactivated. */
    public const ACTION_PERFORMED_REACTIVATED = 'REACTIVATED';

    /** The entity was reopened. */
    public const ACTION_PERFORMED_REOPENED = 'REOPENED';

    /**
     * The ID of the activity log entry.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $id;

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
     * The entity type on which the activity was completed.
     *
     * use one of constants defined in this class to set the value:
     * @see ENTITY_TYPE_EMAIL
     * @see ENTITY_TYPE_PHONE
     * @see ENTITY_TYPE_ADDRESS
     * @see ENTITY_TYPE_ACCOUNT
     * @see ENTITY_TYPE_FUNDING_INSTRUMENT
     * @see ENTITY_TYPE_OTHER
     * @see ENTITY_TYPE_DEVICE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $entity_type;

    /**
     * The entity subtype on which the activity was completed. For example, `CREDIT_CARD` is a subtype of
     * `FUNDING_INSTRUMENT`, `PAYPAL_SMART_CONNECT` is subtype of `CREDIT_LINE`, and so on.
     *
     * use one of constants defined in this class to set the value:
     * @see ENTITY_SUBTYPE_CREDIT_CARD
     * @see ENTITY_SUBTYPE_BANK_ACCOUNT
     * @see ENTITY_SUBTYPE_DEBIT_CARD
     * @see ENTITY_SUBTYPE_BUYER_CREDIT
     * @see ENTITY_SUBTYPE_PAYPAL_SMART_CONNECT
     * @see ENTITY_SUBTYPE_EBAY_CARD
     * @see ENTITY_SUBTYPE_PLUS_CARD
     * @see ENTITY_SUBTYPE_WORKING_CAPITAL
     * @see ENTITY_SUBTYPE_REVOLVING_CREDIT
     * @see ENTITY_SUBTYPE_CLOSE_ENDED_CREDIT
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $entity_subtype;

    /**
     * The action that was completed on the entity type.
     *
     * use one of constants defined in this class to set the value:
     * @see ACTION_PERFORMED_ADDED
     * @see ACTION_PERFORMED_REMOVED
     * @see ACTION_PERFORMED_MARKED_PRIMARY
     * @see ACTION_PERFORMED_EDITED
     * @see ACTION_PERFORMED_UPGRADED
     * @see ACTION_PERFORMED_DOWNGRADED
     * @see ACTION_PERFORMED_STOLEN_OR_LOST
     * @see ACTION_PERFORMED_CLOSED
     * @see ACTION_PERFORMED_DEACTIVATED
     * @see ACTION_PERFORMED_REACTIVATED
     * @see ACTION_PERFORMED_REOPENED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $action_performed;

    /**
     * The entity ID of the reported item. For example, the card ID.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $entity_id;

    /**
     * The date and time of the last known transaction or when other entity-related information was updated, in
     * [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @var ResponseActivityEntityInfo | null
     */
    public $activity_entity_info;

    /**
     * An array of system actions that reversed the impact of the unauthorized event. Includes the system-defined
     * details of the reversal action.
     *
     * @var ResponseReversalAction[] | null
     */
    public $reversal_actions;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in ResponseAccountActivity must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            255,
            "id in ResponseAccountActivity must have maxlength of 255 $within"
        );
        !isset($this->create_time) || Assert::minLength(
            $this->create_time,
            20,
            "create_time in ResponseAccountActivity must have minlength of 20 $within"
        );
        !isset($this->create_time) || Assert::maxLength(
            $this->create_time,
            64,
            "create_time in ResponseAccountActivity must have maxlength of 64 $within"
        );
        !isset($this->entity_type) || Assert::minLength(
            $this->entity_type,
            1,
            "entity_type in ResponseAccountActivity must have minlength of 1 $within"
        );
        !isset($this->entity_type) || Assert::maxLength(
            $this->entity_type,
            255,
            "entity_type in ResponseAccountActivity must have maxlength of 255 $within"
        );
        !isset($this->entity_subtype) || Assert::minLength(
            $this->entity_subtype,
            1,
            "entity_subtype in ResponseAccountActivity must have minlength of 1 $within"
        );
        !isset($this->entity_subtype) || Assert::maxLength(
            $this->entity_subtype,
            255,
            "entity_subtype in ResponseAccountActivity must have maxlength of 255 $within"
        );
        !isset($this->action_performed) || Assert::minLength(
            $this->action_performed,
            1,
            "action_performed in ResponseAccountActivity must have minlength of 1 $within"
        );
        !isset($this->action_performed) || Assert::maxLength(
            $this->action_performed,
            255,
            "action_performed in ResponseAccountActivity must have maxlength of 255 $within"
        );
        !isset($this->entity_id) || Assert::minLength(
            $this->entity_id,
            1,
            "entity_id in ResponseAccountActivity must have minlength of 1 $within"
        );
        !isset($this->entity_id) || Assert::maxLength(
            $this->entity_id,
            255,
            "entity_id in ResponseAccountActivity must have maxlength of 255 $within"
        );
        !isset($this->activity_entity_info) || Assert::isInstanceOf(
            $this->activity_entity_info,
            ResponseActivityEntityInfo::class,
            "activity_entity_info in ResponseAccountActivity must be instance of ResponseActivityEntityInfo $within"
        );
        !isset($this->activity_entity_info) ||  $this->activity_entity_info->validate(ResponseAccountActivity::class);
        !isset($this->reversal_actions) || Assert::isArray(
            $this->reversal_actions,
            "reversal_actions in ResponseAccountActivity must be array $within"
        );
        if (isset($this->reversal_actions)) {
            foreach ($this->reversal_actions as $item) {
                $item->validate(ResponseAccountActivity::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['create_time'])) {
            $this->create_time = $data['create_time'];
        }
        if (isset($data['entity_type'])) {
            $this->entity_type = $data['entity_type'];
        }
        if (isset($data['entity_subtype'])) {
            $this->entity_subtype = $data['entity_subtype'];
        }
        if (isset($data['action_performed'])) {
            $this->action_performed = $data['action_performed'];
        }
        if (isset($data['entity_id'])) {
            $this->entity_id = $data['entity_id'];
        }
        if (isset($data['activity_entity_info'])) {
            $this->activity_entity_info = new ResponseActivityEntityInfo($data['activity_entity_info']);
        }
        if (isset($data['reversal_actions'])) {
            $this->reversal_actions = [];
            foreach ($data['reversal_actions'] as $item) {
                $this->reversal_actions[] = new ResponseReversalAction($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initActivityEntityInfo(): ResponseActivityEntityInfo
    {
        return $this->activity_entity_info = new ResponseActivityEntityInfo();
    }
}
