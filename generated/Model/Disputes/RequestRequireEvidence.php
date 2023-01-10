<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Sandbox only. Updates the state of a dispute, by ID, to either <code>WAITING_FOR_BUYER_RESPONSE</code> or
 * <code>WAITING_FOR_SELLER_RESPONSE</code>. This state change enables either the customer or merchant to submit
 * evidence for the dispute. Specify an <code>action</code> value in the JSON request body to indicate whether
 * the state change enables the customer or merchant to submit evidence.
 *
 * generated from: request-require_evidence.json
 */
class RequestRequireEvidence implements JsonSerializable
{
    use BaseModel;

    /** Changes the status of the dispute to <code>WAITING_FOR_BUYER_RESPONSE</code>. */
    const ACTION_BUYER_EVIDENCE = 'BUYER_EVIDENCE';

    /** Changes the status of the dispute to <code>WAITING_FOR_SELLER_RESPONSE</code>. */
    const ACTION_SELLER_EVIDENCE = 'SELLER_EVIDENCE';

    /**
     * The action. Indicates whether the state change enables the customer or merchant to submit evidence.
     *
     * use one of constants defined in this class to set the value:
     * @see ACTION_BUYER_EVIDENCE
     * @see ACTION_SELLER_EVIDENCE
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $action;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->action, "action in RequestRequireEvidence must not be NULL $within");
        Assert::minLength(
            $this->action,
            1,
            "action in RequestRequireEvidence must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->action,
            255,
            "action in RequestRequireEvidence must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['action'])) {
            $this->action = $data['action'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
