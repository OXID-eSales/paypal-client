<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The cancel dispute request details.
 *
 * generated from: request-cancel.json
 */
class RequestCancel implements JsonSerializable
{
    use BaseModel;

    /** The customer already received the item. */
    const CANCELLATION_REASON_ITEM_RECEIVED = 'ITEM_RECEIVED';

    /** The customer already received a refund for the item. */
    const CANCELLATION_REASON_REFUND_RECEIVED = 'REFUND_RECEIVED';

    /** The customer cancelled the dispute for another reason. If OTHER is specified, customer needs to specify more information in the notes field. */
    const CANCELLATION_REASON_OTHER = 'OTHER';

    /** The customer received the provided shipping tracking information and agrees to cancel. */
    const CANCELLATION_REASON_SHIPMENT_INFO_RECEIVED = 'SHIPMENT_INFO_RECEIVED';

    /** The customer received the item replacement and agrees to cancel. */
    const CANCELLATION_REASON_REPLACEMENT_RECEIVED = 'REPLACEMENT_RECEIVED';

    /**
     * The note, if any, about why the merchant canceled the dispute.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 1048576
     */
    public $note;

    /**
     * An array of encrypted transaction IDs for a canceled unauthorized dispute. If you omit this ID for
     * unauthorized disputes, the issue is automatically canceled. Optional for other dispute types.
     *
     * @var string[]
     * maxItems: 1
     * maxItems: 1000
     */
    public $transaction_ids;

    /**
     * The reason the customer cancelled the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see CANCELLATION_REASON_ITEM_RECEIVED
     * @see CANCELLATION_REASON_REFUND_RECEIVED
     * @see CANCELLATION_REASON_OTHER
     * @see CANCELLATION_REASON_SHIPMENT_INFO_RECEIVED
     * @see CANCELLATION_REASON_REPLACEMENT_RECEIVED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $cancellation_reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->note) || Assert::minLength(
            $this->note,
            1,
            "note in RequestCancel must have minlength of 1 $within"
        );
        !isset($this->note) || Assert::maxLength(
            $this->note,
            1048576,
            "note in RequestCancel must have maxlength of 1048576 $within"
        );
        Assert::notNull($this->transaction_ids, "transaction_ids in RequestCancel must not be NULL $within");
        Assert::minCount(
            $this->transaction_ids,
            1,
            "transaction_ids in RequestCancel must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->transaction_ids,
            1000,
            "transaction_ids in RequestCancel must have max. count of 1000 $within"
        );
        Assert::isArray(
            $this->transaction_ids,
            "transaction_ids in RequestCancel must be array $within"
        );
        !isset($this->cancellation_reason) || Assert::minLength(
            $this->cancellation_reason,
            1,
            "cancellation_reason in RequestCancel must have minlength of 1 $within"
        );
        !isset($this->cancellation_reason) || Assert::maxLength(
            $this->cancellation_reason,
            255,
            "cancellation_reason in RequestCancel must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['note'])) {
            $this->note = $data['note'];
        }
        if (isset($data['transaction_ids'])) {
            $this->transaction_ids = [];
            foreach ($data['transaction_ids'] as $item) {
                $this->transaction_ids[] = $item;
            }
        }
        if (isset($data['cancellation_reason'])) {
            $this->cancellation_reason = $data['cancellation_reason'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->transaction_ids = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
