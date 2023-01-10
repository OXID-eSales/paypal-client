<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A request to settle a dispute in either the customer's or merchant's favor.
 *
 * generated from: request-adjudicate.json
 */
class RequestAdjudicate implements JsonSerializable
{
    use BaseModel;

    /** Resolves the case in the customer's favor. Outcome is set to <code>RESOLVED_BUYER_FAVOR</code>. */
    const ADJUDICATION_OUTCOME_BUYER_FAVOR = 'BUYER_FAVOR';

    /** Resolves the case in the merchant's favor. Outcome is set to <code>RESOLVED_SELLER_FAVOR</code>. */
    const ADJUDICATION_OUTCOME_SELLER_FAVOR = 'SELLER_FAVOR';

    /**
     * The outcome of the adjudication.
     *
     * use one of constants defined in this class to set the value:
     * @see ADJUDICATION_OUTCOME_BUYER_FAVOR
     * @see ADJUDICATION_OUTCOME_SELLER_FAVOR
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $adjudication_outcome;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->adjudication_outcome, "adjudication_outcome in RequestAdjudicate must not be NULL $within");
        Assert::minLength(
            $this->adjudication_outcome,
            1,
            "adjudication_outcome in RequestAdjudicate must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->adjudication_outcome,
            255,
            "adjudication_outcome in RequestAdjudicate must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['adjudication_outcome'])) {
            $this->adjudication_outcome = $data['adjudication_outcome'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
