<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer-entered issue details for an unauthorized dispute.
 *
 * generated from: response-unauthorized_dispute_properties.json
 */
class ResponseUnauthorizedDisputeProperties implements JsonSerializable
{
    use BaseModel;

    /**
     * Indicates whether the customer changed their password after a spoof incident.
     *
     * @var boolean | null
     */
    public $password_changed;

    /**
     * Indicates whether the customer changed their PIN after a spoof incident.
     *
     * @var boolean | null
     */
    public $pin_changed;

    /**
     * Indicates whether the customer changed their answers to security questions after a spoof incident.
     *
     * @var boolean | null
     */
    public $security_questions_changed;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $review_sla;

    /**
     * An array of transaction IDs that the user reported as unauthorized but that PayPal rejected.
     *
     * @var string[]
     * maxItems: 1
     * maxItems: 1000
     */
    public $rejected_dispute_transactions;

    /**
     * The Fraud reversal details.
     *
     * @var ResponseFraudReversal | null
     */
    public $fraud_reversal;

    /**
     * An array of cancelled order ID.
     *
     * @var string[]
     * maxItems: 1
     * maxItems: 1000
     */
    public $cancelled_orders;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->review_sla) || Assert::minLength(
            $this->review_sla,
            20,
            "review_sla in ResponseUnauthorizedDisputeProperties must have minlength of 20 $within"
        );
        !isset($this->review_sla) || Assert::maxLength(
            $this->review_sla,
            64,
            "review_sla in ResponseUnauthorizedDisputeProperties must have maxlength of 64 $within"
        );
        Assert::notNull($this->rejected_dispute_transactions, "rejected_dispute_transactions in ResponseUnauthorizedDisputeProperties must not be NULL $within");
        Assert::minCount(
            $this->rejected_dispute_transactions,
            1,
            "rejected_dispute_transactions in ResponseUnauthorizedDisputeProperties must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->rejected_dispute_transactions,
            1000,
            "rejected_dispute_transactions in ResponseUnauthorizedDisputeProperties must have max. count of 1000 $within"
        );
        Assert::isArray(
            $this->rejected_dispute_transactions,
            "rejected_dispute_transactions in ResponseUnauthorizedDisputeProperties must be array $within"
        );
        !isset($this->fraud_reversal) || Assert::isInstanceOf(
            $this->fraud_reversal,
            ResponseFraudReversal::class,
            "fraud_reversal in ResponseUnauthorizedDisputeProperties must be instance of ResponseFraudReversal $within"
        );
        !isset($this->fraud_reversal) ||  $this->fraud_reversal->validate(ResponseUnauthorizedDisputeProperties::class);
        Assert::notNull($this->cancelled_orders, "cancelled_orders in ResponseUnauthorizedDisputeProperties must not be NULL $within");
        Assert::minCount(
            $this->cancelled_orders,
            1,
            "cancelled_orders in ResponseUnauthorizedDisputeProperties must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->cancelled_orders,
            1000,
            "cancelled_orders in ResponseUnauthorizedDisputeProperties must have max. count of 1000 $within"
        );
        Assert::isArray(
            $this->cancelled_orders,
            "cancelled_orders in ResponseUnauthorizedDisputeProperties must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['password_changed'])) {
            $this->password_changed = $data['password_changed'];
        }
        if (isset($data['pin_changed'])) {
            $this->pin_changed = $data['pin_changed'];
        }
        if (isset($data['security_questions_changed'])) {
            $this->security_questions_changed = $data['security_questions_changed'];
        }
        if (isset($data['review_sla'])) {
            $this->review_sla = $data['review_sla'];
        }
        if (isset($data['rejected_dispute_transactions'])) {
            $this->rejected_dispute_transactions = [];
            foreach ($data['rejected_dispute_transactions'] as $item) {
                $this->rejected_dispute_transactions[] = $item;
            }
        }
        if (isset($data['fraud_reversal'])) {
            $this->fraud_reversal = new ResponseFraudReversal($data['fraud_reversal']);
        }
        if (isset($data['cancelled_orders'])) {
            $this->cancelled_orders = [];
            foreach ($data['cancelled_orders'] as $item) {
                $this->cancelled_orders[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->rejected_dispute_transactions = [];
        $this->cancelled_orders = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initFraudReversal(): ResponseFraudReversal
    {
        return $this->fraud_reversal = new ResponseFraudReversal();
    }
}
