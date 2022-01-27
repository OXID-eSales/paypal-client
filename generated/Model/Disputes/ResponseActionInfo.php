<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The extended properties for a evidence. Includes additional information such as the action for which the
 * evidence was requested/submitted, and whether the evidence is mandatory.
 *
 * generated from: response-action_info.json
 */
class ResponseActionInfo implements JsonSerializable
{
    use BaseModel;

    /** The evidence corresponds to action `acknowledge_return_item`. */
    public const ACTION_ACKNOWLEDGE_RETURN_ITEM = 'ACKNOWLEDGE_RETURN_ITEM';

    /** The evidence corresponds to action `accept_claim`. */
    public const ACTION_ACCEPT_CLAIM = 'ACCEPT_CLAIM';

    /** The evidence corresponds to action `provide_evidence`. */
    public const ACTION_PROVIDE_EVIDENCE = 'PROVIDE_EVIDENCE';

    /** The evidence corresponds to action `appeal`. */
    public const ACTION_APPEAL = 'APPEAL';

    /** The evidence corresponds to action `cancel`. */
    public const ACTION_CANCEL = 'CANCEL';

    /** The evidence corresponds to action `change_reason`. */
    public const ACTION_CHANGE_REASON = 'CHANGE_REASON';

    /** The evidence corresponds to action `escalate`. */
    public const ACTION_ESCALATE = 'ESCALATE';

    /**
     * The action for which the evidence was requested or submitted.
     *
     * use one of constants defined in this class to set the value:
     * @see ACTION_ACKNOWLEDGE_RETURN_ITEM
     * @see ACTION_ACCEPT_CLAIM
     * @see ACTION_PROVIDE_EVIDENCE
     * @see ACTION_APPEAL
     * @see ACTION_CANCEL
     * @see ACTION_CHANGE_REASON
     * @see ACTION_ESCALATE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $action;

    /**
     * The response option for the corresponding action. Possible values:<ul><li><a
     * href="/docs/api/customer-disputes/v1/#definition-acknowledgement_type">Acknowledgement Types</a></li><li><a
     * href="/docs/api/customer-disputes/v1/#definition-response-accept_claim_type">Accept Claim types</a></li></ul>.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $response_option;

    /**
     * Indicates whether the evidence is mandatory for the corresponding action and response option.
     *
     * @var boolean | null
     */
    public $mandatory;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->action) || Assert::minLength(
            $this->action,
            1,
            "action in ResponseActionInfo must have minlength of 1 $within"
        );
        !isset($this->action) || Assert::maxLength(
            $this->action,
            255,
            "action in ResponseActionInfo must have maxlength of 255 $within"
        );
        !isset($this->response_option) || Assert::minLength(
            $this->response_option,
            1,
            "response_option in ResponseActionInfo must have minlength of 1 $within"
        );
        !isset($this->response_option) || Assert::maxLength(
            $this->response_option,
            255,
            "response_option in ResponseActionInfo must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['action'])) {
            $this->action = $data['action'];
        }
        if (isset($data['response_option'])) {
            $this->response_option = $data['response_option'];
        }
        if (isset($data['mandatory'])) {
            $this->mandatory = $data['mandatory'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
