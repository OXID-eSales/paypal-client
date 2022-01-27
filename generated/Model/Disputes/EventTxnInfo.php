<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The information about the disputed transaction.
 *
 * generated from: event-txn_info.json
 */
class EventTxnInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * The transaction reference ID, for the disputed transaction.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $reference_id;

    /**
     * An array of items that were purchased as part of the transaction.
     *
     * @var ResponseItemInfo[]
     * maxItems: 1
     * maxItems: 50
     */
    public $items;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->reference_id) || Assert::minLength(
            $this->reference_id,
            1,
            "reference_id in EventTxnInfo must have minlength of 1 $within"
        );
        !isset($this->reference_id) || Assert::maxLength(
            $this->reference_id,
            255,
            "reference_id in EventTxnInfo must have maxlength of 255 $within"
        );
        Assert::notNull($this->items, "items in EventTxnInfo must not be NULL $within");
        Assert::minCount(
            $this->items,
            1,
            "items in EventTxnInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->items,
            50,
            "items in EventTxnInfo must have max. count of 50 $within"
        );
        Assert::isArray(
            $this->items,
            "items in EventTxnInfo must be array $within"
        );
        if (isset($this->items)) {
            foreach ($this->items as $item) {
                $item->validate(EventTxnInfo::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['reference_id'])) {
            $this->reference_id = $data['reference_id'];
        }
        if (isset($data['items'])) {
            $this->items = [];
            foreach ($data['items'] as $item) {
                $this->items[] = new ResponseItemInfo($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->items = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
