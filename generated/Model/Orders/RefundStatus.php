<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The refund status.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-refund_status.json
 */
class RefundStatus implements JsonSerializable
{
    use BaseModel;

    /** The refund was cancelled. */
    public const STATUS_CANCELLED = 'CANCELLED';

    /** The refund is pending. For more information, see <code>status_details.reason</code>. */
    public const STATUS_PENDING = 'PENDING';

    /** The funds for this transaction were debited to the customer's account. */
    public const STATUS_COMPLETED = 'COMPLETED';

    /**
     * The status of the refund.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CANCELLED
     * @see STATUS_PENDING
     * @see STATUS_COMPLETED
     * @var string | null
     */
    public $status;

    /**
     * The details of the refund status.
     *
     * @var RefundStatusDetails | null
     */
    public $status_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->status_details) || Assert::isInstanceOf(
            $this->status_details,
            RefundStatusDetails::class,
            "status_details in RefundStatus must be instance of RefundStatusDetails $within"
        );
        !isset($this->status_details) ||  $this->status_details->validate(RefundStatus::class);
    }

    private function map(array $data)
    {
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['status_details'])) {
            $this->status_details = new RefundStatusDetails($data['status_details']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initStatusDetails(): RefundStatusDetails
    {
        return $this->status_details = new RefundStatusDetails();
    }
}
