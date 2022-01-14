<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The refund details.
 *
 * generated from: response-refund_details.json
 */
class ResponseRefundDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $allowed_refund_amount;

    /**
     * An array of refund objects.
     *
     * @var ResponseRefund[] | null
     */
    public $refunds;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->allowed_refund_amount) || Assert::isInstanceOf(
            $this->allowed_refund_amount,
            Money::class,
            "allowed_refund_amount in ResponseRefundDetails must be instance of Money $within"
        );
        !isset($this->allowed_refund_amount) ||  $this->allowed_refund_amount->validate(ResponseRefundDetails::class);
        !isset($this->refunds) || Assert::isArray(
            $this->refunds,
            "refunds in ResponseRefundDetails must be array $within"
        );
        if (isset($this->refunds)) {
            foreach ($this->refunds as $item) {
                $item->validate(ResponseRefundDetails::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['allowed_refund_amount'])) {
            $this->allowed_refund_amount = new Money($data['allowed_refund_amount']);
        }
        if (isset($data['refunds'])) {
            $this->refunds = [];
            foreach ($data['refunds'] as $item) {
                $this->refunds[] = new ResponseRefund($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAllowedRefundAmount(): Money
    {
        return $this->allowed_refund_amount = new Money();
    }
}
