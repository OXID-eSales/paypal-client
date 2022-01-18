<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payment preferences to override at subscription level.
 *
 * generated from: payment_preferences_override.json
 */
class PaymentPreferencesOverride implements JsonSerializable
{
    use BaseModel;

    /** Continues the subscription if the initial payment for the setup fails. */
    public const SETUP_FEE_FAILURE_ACTION_CONTINUE = 'CONTINUE';

    /** Cancels the subscription if the initial payment for the setup fails. */
    public const SETUP_FEE_FAILURE_ACTION_CANCEL = 'CANCEL';

    /**
     * Indicates whether to automatically bill the outstanding amount in the next billing cycle.
     *
     * @var boolean | null
     */
    public $auto_bill_outstanding;

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
    public $setup_fee_failure_action;

    /**
     * The maximum number of payment failures before a subscription is suspended. For example, if
     * `payment_failure_threshold` is `2`, the subscription automatically updates to the `SUSPEND` state if two
     * consecutive payments fail.
     *
     * @var int | null
     */
    public $payment_failure_threshold;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->setup_fee) || Assert::isInstanceOf(
            $this->setup_fee,
            Money::class,
            "setup_fee in PaymentPreferencesOverride must be instance of Money $within"
        );
        !isset($this->setup_fee) ||  $this->setup_fee->validate(PaymentPreferencesOverride::class);
        !isset($this->setup_fee_failure_action) || Assert::minLength(
            $this->setup_fee_failure_action,
            1,
            "setup_fee_failure_action in PaymentPreferencesOverride must have minlength of 1 $within"
        );
        !isset($this->setup_fee_failure_action) || Assert::maxLength(
            $this->setup_fee_failure_action,
            24,
            "setup_fee_failure_action in PaymentPreferencesOverride must have maxlength of 24 $within"
        );
    }

    private function map(array $data)
    {
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
