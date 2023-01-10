<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The eligible and ineligible disputes with reasons. Disputes and refund information are returned, if
 * applicable.
 *
 * generated from: referred-referred_eligibility_response.json
 */
class ReferredReferredEligibilityResponse implements JsonSerializable
{
    use BaseModel;

    /** A customer and merchant interact in an attempt to resolve a dispute without escalation to PayPal. Occurs when a customer has not received goods or a service, the goods or service are not as described, or the customer needs additional details on a transaction, such as a copy of the transaction or a receipt */
    const ALLOWABLE_LIFE_CYCLE_INQUIRY = 'INQUIRY';

    /** This stage occurs when a customer or merchant escalates an inquiry to a claim. Claims give PayPal the authority to investigate the case and determine an outcome if the dispute channel is `INTERNAL`. This state is a PayPal dispute lifecycle stage and is not to be interpreted as a credit card or debit card charge back */
    const ALLOWABLE_LIFE_CYCLE_CHARGEBACK = 'CHARGEBACK';

    /** The item category passed in is not disputable. */
    const INELIGIBILITY_REASON_ITEM_CATEGORY_NOT_DISPUTABLE = 'ITEM_CATEGORY_NOT_DISPUTABLE';

    /** Transaction Type is not disputable. */
    const INELIGIBILITY_REASON_TRANSACTION_TYPE_NOT_DISPUTABLE = 'TRANSACTION_TYPE_NOT_DISPUTABLE';

    /** Counterparty transaction is not disputable */
    const INELIGIBILITY_REASON_COUNTERPARTY_NOT_DISPUTABLE = 'COUNTERPARTY_NOT_DISPUTABLE';

    /** Dispute already exists for a Transaction. */
    const INELIGIBILITY_REASON_DISPUTE_ALREADY_EXISTS = 'DISPUTE_ALREADY_EXISTS';

    /** Invalid Transaction Status. */
    const INELIGIBILITY_REASON_INVALID_TRANSACTION_STATUS = 'INVALID_TRANSACTION_STATUS';

    /**
     * Indicates whether the transaction can be disputed.
     *
     * @var boolean | null
     */
    public $eligible;

    /**
     * The details about the allowable life cycle stage and the reason why it is allowed.
     *
     * use one of constants defined in this class to set the value:
     * @see ALLOWABLE_LIFE_CYCLE_INQUIRY
     * @see ALLOWABLE_LIFE_CYCLE_CHARGEBACK
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $allowable_life_cycle;

    /**
     * The reason that the dispute could not be created.
     *
     * use one of constants defined in this class to set the value:
     * @see INELIGIBILITY_REASON_ITEM_CATEGORY_NOT_DISPUTABLE
     * @see INELIGIBILITY_REASON_TRANSACTION_TYPE_NOT_DISPUTABLE
     * @see INELIGIBILITY_REASON_COUNTERPARTY_NOT_DISPUTABLE
     * @see INELIGIBILITY_REASON_DISPUTE_ALREADY_EXISTS
     * @see INELIGIBILITY_REASON_INVALID_TRANSACTION_STATUS
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $ineligibility_reason;

    /**
     * An array of details about the disputes on the transaction.
     *
     * @var ReferredExistingDispute[]
     * maxItems: 1
     * maxItems: 100
     */
    public $existing_disputes;

    /**
     * An array of details about the refunds on the disputed transaction, if applicable.
     *
     * @var ReferredExistingRefund[]
     * maxItems: 1
     * maxItems: 100
     */
    public $existing_refunds;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->allowable_life_cycle) || Assert::minLength(
            $this->allowable_life_cycle,
            1,
            "allowable_life_cycle in ReferredReferredEligibilityResponse must have minlength of 1 $within"
        );
        !isset($this->allowable_life_cycle) || Assert::maxLength(
            $this->allowable_life_cycle,
            255,
            "allowable_life_cycle in ReferredReferredEligibilityResponse must have maxlength of 255 $within"
        );
        !isset($this->ineligibility_reason) || Assert::minLength(
            $this->ineligibility_reason,
            1,
            "ineligibility_reason in ReferredReferredEligibilityResponse must have minlength of 1 $within"
        );
        !isset($this->ineligibility_reason) || Assert::maxLength(
            $this->ineligibility_reason,
            255,
            "ineligibility_reason in ReferredReferredEligibilityResponse must have maxlength of 255 $within"
        );
        Assert::notNull($this->existing_disputes, "existing_disputes in ReferredReferredEligibilityResponse must not be NULL $within");
        Assert::minCount(
            $this->existing_disputes,
            1,
            "existing_disputes in ReferredReferredEligibilityResponse must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->existing_disputes,
            100,
            "existing_disputes in ReferredReferredEligibilityResponse must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->existing_disputes,
            "existing_disputes in ReferredReferredEligibilityResponse must be array $within"
        );
        if (isset($this->existing_disputes)) {
            foreach ($this->existing_disputes as $item) {
                $item->validate(ReferredReferredEligibilityResponse::class);
            }
        }
        Assert::notNull($this->existing_refunds, "existing_refunds in ReferredReferredEligibilityResponse must not be NULL $within");
        Assert::minCount(
            $this->existing_refunds,
            1,
            "existing_refunds in ReferredReferredEligibilityResponse must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->existing_refunds,
            100,
            "existing_refunds in ReferredReferredEligibilityResponse must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->existing_refunds,
            "existing_refunds in ReferredReferredEligibilityResponse must be array $within"
        );
        if (isset($this->existing_refunds)) {
            foreach ($this->existing_refunds as $item) {
                $item->validate(ReferredReferredEligibilityResponse::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['eligible'])) {
            $this->eligible = $data['eligible'];
        }
        if (isset($data['allowable_life_cycle'])) {
            $this->allowable_life_cycle = $data['allowable_life_cycle'];
        }
        if (isset($data['ineligibility_reason'])) {
            $this->ineligibility_reason = $data['ineligibility_reason'];
        }
        if (isset($data['existing_disputes'])) {
            $this->existing_disputes = [];
            foreach ($data['existing_disputes'] as $item) {
                $this->existing_disputes[] = new ReferredExistingDispute($item);
            }
        }
        if (isset($data['existing_refunds'])) {
            $this->existing_refunds = [];
            foreach ($data['existing_refunds'] as $item) {
                $this->existing_refunds[] = new ReferredExistingRefund($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->existing_disputes = [];
        $this->existing_refunds = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
