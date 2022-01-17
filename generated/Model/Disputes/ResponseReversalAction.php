<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The system action that reverses the impact of the unauthorized event. Includes the system-defined details of
 * the reversal action.
 *
 * generated from: response-reversal_action.json
 */
class ResponseReversalAction implements JsonSerializable
{
    use BaseModel;

    /** An email address. */
    public const ENTITY_TYPE_EMAIL = 'EMAIL';

    /** A phone numbr. */
    public const ENTITY_TYPE_PHONE = 'PHONE';

    /** An address. */
    public const ENTITY_TYPE_ADDRESS = 'ADDRESS';

    /** An account. */
    public const ENTITY_TYPE_ACCOUNT = 'ACCOUNT';

    /** A funding instrument. */
    public const ENTITY_TYPE_FUNDING_INSTRUMENT = 'FUNDING_INSTRUMENT';

    /** A credit card. */
    public const ENTITY_SUBTYPE_CREDIT_CARD = 'CREDIT_CARD';

    /** A bank account. */
    public const ENTITY_SUBTYPE_BANK_ACCOUNT = 'BANK_ACCOUNT';

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

    /**
     * The ID of the entity that was changed as part of the reversal action.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * The ID of the activity log entry that was created for the reversal action that was carried out by the system.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $original_activity_id;

    /**
     * The entity type on which some activity is completed.
     *
     * use one of constants defined in this class to set the value:
     * @see ENTITY_TYPE_EMAIL
     * @see ENTITY_TYPE_PHONE
     * @see ENTITY_TYPE_ADDRESS
     * @see ENTITY_TYPE_ACCOUNT
     * @see ENTITY_TYPE_FUNDING_INSTRUMENT
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $entity_type;

    /**
     * The entity subtype on which the activity is completed. For example, `CREDIT_CARD` is a subtype of
     * `FUNDING_INSTRUMENT`, `PAYPAL_SMART_CONNECT` is a subtype of `CREDIT_LINE`, and so on.
     *
     * use one of constants defined in this class to set the value:
     * @see ENTITY_SUBTYPE_CREDIT_CARD
     * @see ENTITY_SUBTYPE_BANK_ACCOUNT
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $entity_subtype;

    /**
     * The action completed on the entity type.
     *
     * use one of constants defined in this class to set the value:
     * @see ACTION_PERFORMED_ADDED
     * @see ACTION_PERFORMED_REMOVED
     * @see ACTION_PERFORMED_MARKED_PRIMARY
     * @see ACTION_PERFORMED_EDITED
     * @see ACTION_PERFORMED_UPGRADED
     * @see ACTION_PERFORMED_DOWNGRADED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $action_performed;

    /**
     * The status.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $status;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in ResponseReversalAction must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            255,
            "id in ResponseReversalAction must have maxlength of 255 $within"
        );
        !isset($this->original_activity_id) || Assert::minLength(
            $this->original_activity_id,
            1,
            "original_activity_id in ResponseReversalAction must have minlength of 1 $within"
        );
        !isset($this->original_activity_id) || Assert::maxLength(
            $this->original_activity_id,
            255,
            "original_activity_id in ResponseReversalAction must have maxlength of 255 $within"
        );
        !isset($this->entity_type) || Assert::minLength(
            $this->entity_type,
            1,
            "entity_type in ResponseReversalAction must have minlength of 1 $within"
        );
        !isset($this->entity_type) || Assert::maxLength(
            $this->entity_type,
            255,
            "entity_type in ResponseReversalAction must have maxlength of 255 $within"
        );
        !isset($this->entity_subtype) || Assert::minLength(
            $this->entity_subtype,
            1,
            "entity_subtype in ResponseReversalAction must have minlength of 1 $within"
        );
        !isset($this->entity_subtype) || Assert::maxLength(
            $this->entity_subtype,
            255,
            "entity_subtype in ResponseReversalAction must have maxlength of 255 $within"
        );
        !isset($this->action_performed) || Assert::minLength(
            $this->action_performed,
            1,
            "action_performed in ResponseReversalAction must have minlength of 1 $within"
        );
        !isset($this->action_performed) || Assert::maxLength(
            $this->action_performed,
            255,
            "action_performed in ResponseReversalAction must have maxlength of 255 $within"
        );
        !isset($this->status) || Assert::minLength(
            $this->status,
            1,
            "status in ResponseReversalAction must have minlength of 1 $within"
        );
        !isset($this->status) || Assert::maxLength(
            $this->status,
            2000,
            "status in ResponseReversalAction must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['original_activity_id'])) {
            $this->original_activity_id = $data['original_activity_id'];
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
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
