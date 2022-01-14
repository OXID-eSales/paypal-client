<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The refund transaction.
 *
 * generated from: referred-refund_transaction.json
 */
class ReferredRefundTransaction implements JsonSerializable
{
    use BaseModel;

    /** Refund transaction is newly created. */
    public const STATUS_CREATED = 'CREATED';

    /** The refund transaction was denied. */
    public const STATUS_DENIED = 'DENIED';

    /** The refund transaction failed. */
    public const STATUS_FAILED = 'FAILED';

    /** The refund transaction is on hold. */
    public const STATUS_HELD = 'HELD';

    /** The refund transaction is waiting to be processed. */
    public const STATUS_PENDING = 'PENDING';

    /** The refund transaction is getting processed. */
    public const STATUS_PROCESSING = 'PROCESSING';

    /** The payment for the transaction was partially refunded. */
    public const STATUS_PARTIALLY_REFUNDED = 'PARTIALLY_REFUNDED';

    /** The payment for the transaction was successfully refunded. */
    public const STATUS_REFUNDED = 'REFUNDED';

    /** The payment for the refund transaction was reversed. */
    public const STATUS_REVERSED = 'REVERSED';

    /** The payment for the transaction was canceled. */
    public const STATUS_CANCELED = 'CANCELED';

    /** The refund transaction is in some unknown status. */
    public const STATUS_OTHER = 'OTHER';

    /**
     * The ID of the PayPal refund transaction.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * The transaction status.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CREATED
     * @see STATUS_DENIED
     * @see STATUS_FAILED
     * @see STATUS_HELD
     * @see STATUS_PENDING
     * @see STATUS_PROCESSING
     * @see STATUS_PARTIALLY_REFUNDED
     * @see STATUS_REFUNDED
     * @see STATUS_REVERSED
     * @see STATUS_CANCELED
     * @see STATUS_OTHER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $status;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $gross_amount;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in ReferredRefundTransaction must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            255,
            "id in ReferredRefundTransaction must have maxlength of 255 $within"
        );
        !isset($this->status) || Assert::minLength(
            $this->status,
            1,
            "status in ReferredRefundTransaction must have minlength of 1 $within"
        );
        !isset($this->status) || Assert::maxLength(
            $this->status,
            255,
            "status in ReferredRefundTransaction must have maxlength of 255 $within"
        );
        !isset($this->gross_amount) || Assert::isInstanceOf(
            $this->gross_amount,
            Money::class,
            "gross_amount in ReferredRefundTransaction must be instance of Money $within"
        );
        !isset($this->gross_amount) ||  $this->gross_amount->validate(ReferredRefundTransaction::class);
        !isset($this->create_time) || Assert::minLength(
            $this->create_time,
            20,
            "create_time in ReferredRefundTransaction must have minlength of 20 $within"
        );
        !isset($this->create_time) || Assert::maxLength(
            $this->create_time,
            64,
            "create_time in ReferredRefundTransaction must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['gross_amount'])) {
            $this->gross_amount = new Money($data['gross_amount']);
        }
        if (isset($data['create_time'])) {
            $this->create_time = $data['create_time'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initGrossAmount(): Money
    {
        return $this->gross_amount = new Money();
    }
}
