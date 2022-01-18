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
    }

    private function map(array $data)
    {
        if (isset($data['expected_refund'])) {
            $this->expected_refund = new Money($data['expected_refund']);
        }
        if (isset($data['cancellation_details'])) {
            $this->cancellation_details = new ResponseCancellationDetails($data['cancellation_details']);
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
}
