<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payment preferences for a subscription.
 *
 * generated from: payment_preferences.json
 */
class PaymentPreferences implements JsonSerializable
{
    use BaseModel;

    /** A prepaid billing cycle. */
    public const SERVICE_TYPE_PREPAID = 'PREPAID';

    /** A postpaid billing cycle. */
    public const SERVICE_TYPE_POSTPAID = 'POSTPAID';

    /** Continues the subscription if the initial payment for the setup fails. */
    public const SETUP_FEE_FAILURE_ACTION_CONTINUE = 'CONTINUE';

    /** Cancels the subscription if the initial payment for the setup fails. */
    public const SETUP_FEE_FAILURE_ACTION_CANCEL = 'CANCEL';

    /**
     * A pre- or post-paid service.
     *
     * use one of constants defined in this class to set the value:
     * @see SERVICE_TYPE_PREPAID
     * @see SERVICE_TYPE_POSTPAID
     * @var string | null
     * minLength: 1
     * maxLength: 24
     */
    public $service_type = 'PREPAID';

    /**
     * Indicates whether to automatically bill the outstanding amount in the next billing cycle.
     *
     * @var boolean | null
     */
    public $auto_bill_outstanding = true;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $setup_fee;

    /**
     * The action to take on the subscription if the initial payment for the setup fails.
     *
     * use one of constants defined in this class to set the value:
     * @see SETUP_FEE_FAILURE_ACTION_CONTINUE
     * @see SETUP_FEE_FAILURE_ACTION_CANCEL
     * @var string | null
     * minLength: 1
     * maxLength: 24
     */
    public $setup_fee_failure_action = 'CANCEL';

    /**
     * The maximum number of payment failures before a subscription is suspended. For example, if
     * `payment_failure_threshold` is `2`, the subscription automatically updates to the `SUSPEND` state if two
     * consecutive payments fail.
     *
     * @var int | null
     */
    public $payment_failure_threshold = 0;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->service_type) || Assert::minLength(
            $this->service_type,
            1,
            "service_type in PaymentPreferences must have minlength of 1 $within"
        );
        !isset($this->service_type) || Assert::maxLength(
            $this->service_type,
            24,
            "service_type in PaymentPreferences must have maxlength of 24 $within"
        );
        !isset($this->setup_fee) || Assert::isInstanceOf(
            $this->setup_fee,
            Money::class,
            "setup_fee in PaymentPreferences must be instance of Money $within"
        );
        !isset($this->setup_fee) ||  $this->setup_fee->validate(PaymentPreferences::class);
        !isset($this->setup_fee_failure_action) || Assert::minLength(
            $this->setup_fee_failure_action,
            1,
            "setup_fee_failure_action in PaymentPreferences must have minlength of 1 $within"
        );
        !isset($this->setup_fee_failure_action) || Assert::maxLength(
            $this->setup_fee_failure_action,
            24,
            "setup_fee_failure_action in PaymentPreferences must have maxlength of 24 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['service_type'])) {
            $this->service_type = $data['service_type'];
        }
        if (isset($data['auto_bill_outstanding'])) {
            $this->auto_bill_outstanding = $data['auto_bill_outstanding'];
        }
        if (isset($data['setup_fee'])) {
            $this->setup_fee = new Money($data['setup_fee']);
        }
        if (isset($data['setup_fee_failure_action'])) {
            $this->setup_fee_failure_action = $data['setup_fee_failure_action'];
        }
        if (isset($data['payment_failure_threshold'])) {
            $this->payment_failure_threshold = $data['payment_failure_threshold'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initSetupFee(): Money
    {
        return $this->setup_fee = new Money();
    }
}
