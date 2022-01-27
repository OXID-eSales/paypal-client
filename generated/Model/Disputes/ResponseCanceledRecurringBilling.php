<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The recurring billing canceled details.
 *
 * generated from: response-canceled_recurring_billing.json
 */
class ResponseCanceledRecurringBilling implements JsonSerializable
{
    use BaseModel;

    /** The customer was charged for a free trial period. */
    public const SUB_REASON_CHARGED_FOR_FREE_TRIAL = 'CHARGED_FOR_FREE_TRIAL';

    /** The customer wasn’t notified of the renewal or change in charges. */
    public const SUB_REASON_NOT_NOTIFIED_OF_CHARGES = 'NOT_NOTIFIED_OF_CHARGES';

    /** The customer was charged for a canceled automatic payment. */
    public const SUB_REASON_CHARGED_AFTER_CANCELLATION = 'CHARGED_AFTER_CANCELLATION';

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $expected_refund;

    /**
     * The cancellation details.
     *
     * @var ResponseCancellationDetails | null
     */
    public $cancellation_details;

    /**
     * The subscription details.
     *
     * @var ResponseSubscriptionDetails | null
     */
    public $subscription_details;

    /**
     * The sub-reason for the recurring billing issue.
     *
     * use one of constants defined in this class to set the value:
     * @see SUB_REASON_CHARGED_FOR_FREE_TRIAL
     * @see SUB_REASON_NOT_NOTIFIED_OF_CHARGES
     * @see SUB_REASON_CHARGED_AFTER_CANCELLATION
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $sub_reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->expected_refund) || Assert::isInstanceOf(
            $this->expected_refund,
            Money::class,
            "expected_refund in ResponseCanceledRecurringBilling must be instance of Money $within"
        );
        !isset($this->expected_refund) ||  $this->expected_refund->validate(ResponseCanceledRecurringBilling::class);
        !isset($this->cancellation_details) || Assert::isInstanceOf(
            $this->cancellation_details,
            ResponseCancellationDetails::class,
            "cancellation_details in ResponseCanceledRecurringBilling must be instance of ResponseCancellationDetails $within"
        );
        !isset($this->cancellation_details) ||  $this->cancellation_details->validate(ResponseCanceledRecurringBilling::class);
        !isset($this->subscription_details) || Assert::isInstanceOf(
            $this->subscription_details,
            ResponseSubscriptionDetails::class,
            "subscription_details in ResponseCanceledRecurringBilling must be instance of ResponseSubscriptionDetails $within"
        );
        !isset($this->subscription_details) ||  $this->subscription_details->validate(ResponseCanceledRecurringBilling::class);
        !isset($this->sub_reason) || Assert::minLength(
            $this->sub_reason,
            1,
            "sub_reason in ResponseCanceledRecurringBilling must have minlength of 1 $within"
        );
        !isset($this->sub_reason) || Assert::maxLength(
            $this->sub_reason,
            255,
            "sub_reason in ResponseCanceledRecurringBilling must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['expected_refund'])) {
            $this->expected_refund = new Money($data['expected_refund']);
        }
        if (isset($data['cancellation_details'])) {
            $this->cancellation_details = new ResponseCancellationDetails($data['cancellation_details']);
        }
        if (isset($data['subscription_details'])) {
            $this->subscription_details = new ResponseSubscriptionDetails($data['subscription_details']);
        }
        if (isset($data['sub_reason'])) {
            $this->sub_reason = $data['sub_reason'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initExpectedRefund(): Money
    {
        return $this->expected_refund = new Money();
    }

    public function initCancellationDetails(): ResponseCancellationDetails
    {
        return $this->cancellation_details = new ResponseCancellationDetails();
    }

    public function initSubscriptionDetails(): ResponseSubscriptionDetails
    {
        return $this->subscription_details = new ResponseSubscriptionDetails();
    }
}
