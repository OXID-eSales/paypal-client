<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The charge amount from the subscriber.
 *
 * generated from: subscription_capture_request.json
 */
class SubscriptionCaptureRequest implements JsonSerializable
{
    use BaseModel;

    /** The outstanding balance that the subscriber must clear. */
    public const CAPTURE_TYPE_OUTSTANDING_BALANCE = 'OUTSTANDING_BALANCE';

    /**
     * The reason or note for the subscription charge.
     *
     * @var string
     * minLength: 1
     * maxLength: 128
     */
    public $note;

    /**
     * The type of capture.
     *
     * use one of constants defined in this class to set the value:
     * @see CAPTURE_TYPE_OUTSTANDING_BALANCE
     * @var string
     * minLength: 1
     * maxLength: 24
     */
    public $capture_type;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money
     */
    public $amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->note, "note in SubscriptionCaptureRequest must not be NULL $within");
        Assert::minLength(
            $this->note,
            1,
            "note in SubscriptionCaptureRequest must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->note,
            128,
            "note in SubscriptionCaptureRequest must have maxlength of 128 $within"
        );
        Assert::notNull($this->capture_type, "capture_type in SubscriptionCaptureRequest must not be NULL $within");
        Assert::minLength(
            $this->capture_type,
            1,
            "capture_type in SubscriptionCaptureRequest must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->capture_type,
            24,
            "capture_type in SubscriptionCaptureRequest must have maxlength of 24 $within"
        );
        Assert::notNull($this->amount, "amount in SubscriptionCaptureRequest must not be NULL $within");
        Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in SubscriptionCaptureRequest must be instance of Money $within"
        );
         $this->amount->validate(SubscriptionCaptureRequest::class);
    }

    private function map(array $data)
    {
        if (isset($data['note'])) {
            $this->note = $data['note'];
        }
        if (isset($data['capture_type'])) {
            $this->capture_type = $data['capture_type'];
        }
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->amount = new Money();
        if (isset($data)) {
            $this->map($data);
        }
    }
}
