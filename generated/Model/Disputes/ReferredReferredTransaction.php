<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The transaction for which to create a case.
 *
 * generated from: referred-referred_transaction.json
 */
class ReferredReferredTransaction implements JsonSerializable
{
    use BaseModel;

    /** The transaction processing is complete. */
    const STATUS_COMPLETED = 'COMPLETED';

    /** The items in the transaction are unclaimed. If they are not claimed within 30 days, the funds are returned to the sender. */
    const STATUS_UNCLAIMED = 'UNCLAIMED';

    /** The transaction was denied. */
    const STATUS_DENIED = 'DENIED';

    /** The transaction failed. */
    const STATUS_FAILED = 'FAILED';

    /** The transaction is on hold. */
    const STATUS_HELD = 'HELD';

    /** The transaction is waiting to be processed. */
    const STATUS_PENDING = 'PENDING';

    /** The payment for the transaction was partially refunded. */
    const STATUS_PARTIALLY_REFUNDED = 'PARTIALLY_REFUNDED';

    /** The payment for the transaction was successfully refunded. */
    const STATUS_REFUNDED = 'REFUNDED';

    /** The payment for the transaction was reversed due to a chargeback or another type of reversal. */
    const STATUS_REVERSED = 'REVERSED';

    /** The payment for the transaction was canceled. */
    const STATUS_CANCELED = 'CANCELED';

    /**
     * The ID of the PayPal transaction.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * An array of items in the transaction in the dispute.
     *
     * @var ReferredReferredItemInfo[] | null
     */
    public $items;

    /**
     * The transaction status.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_COMPLETED
     * @see STATUS_UNCLAIMED
     * @see STATUS_DENIED
     * @see STATUS_FAILED
     * @see STATUS_HELD
     * @see STATUS_PENDING
     * @see STATUS_PARTIALLY_REFUNDED
     * @see STATUS_REFUNDED
     * @see STATUS_REVERSED
     * @see STATUS_CANCELED
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
            "id in ReferredReferredTransaction must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            255,
            "id in ReferredReferredTransaction must have maxlength of 255 $within"
        );
        !isset($this->items) || Assert::isArray(
            $this->items,
            "items in ReferredReferredTransaction must be array $within"
        );
        if (isset($this->items)) {
            foreach ($this->items as $item) {
                $item->validate(ReferredReferredTransaction::class);
            }
        }
        !isset($this->status) || Assert::minLength(
            $this->status,
            1,
            "status in ReferredReferredTransaction must have minlength of 1 $within"
        );
        !isset($this->status) || Assert::maxLength(
            $this->status,
            255,
            "status in ReferredReferredTransaction must have maxlength of 255 $within"
        );
        !isset($this->gross_amount) || Assert::isInstanceOf(
            $this->gross_amount,
            Money::class,
            "gross_amount in ReferredReferredTransaction must be instance of Money $within"
        );
        !isset($this->gross_amount) ||  $this->gross_amount->validate(ReferredReferredTransaction::class);
        !isset($this->create_time) || Assert::minLength(
            $this->create_time,
            20,
            "create_time in ReferredReferredTransaction must have minlength of 20 $within"
        );
        !isset($this->create_time) || Assert::maxLength(
            $this->create_time,
            64,
            "create_time in ReferredReferredTransaction must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['items'])) {
            $this->items = [];
            foreach ($data['items'] as $item) {
                $this->items[] = new ReferredReferredItemInfo($item);
            }
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
