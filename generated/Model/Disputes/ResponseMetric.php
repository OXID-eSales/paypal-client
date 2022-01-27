<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A metric.
 *
 * generated from: response-metric.json
 */
class ResponseMetric implements JsonSerializable
{
    use BaseModel;

    /**
     * The group name for a dimension.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $key;

    /**
     * The count of items in a group.
     *
     * @var int | null
     */
    public $count;

    /**
     * An array of the sums of amounts for each currency.
     *
     * @var Money[]
     * maxItems: 1
     * maxItems: 200
     */
    public $amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->key) || Assert::minLength(
            $this->key,
            1,
            "key in ResponseMetric must have minlength of 1 $within"
        );
        !isset($this->key) || Assert::maxLength(
            $this->key,
            255,
            "key in ResponseMetric must have maxlength of 255 $within"
        );
        Assert::notNull($this->amount, "amount in ResponseMetric must not be NULL $within");
        Assert::minCount(
            $this->amount,
            1,
            "amount in ResponseMetric must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->amount,
            200,
            "amount in ResponseMetric must have max. count of 200 $within"
        );
        Assert::isArray(
            $this->amount,
            "amount in ResponseMetric must be array $within"
        );
        if (isset($this->amount)) {
            foreach ($this->amount as $item) {
                $item->validate(ResponseMetric::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['key'])) {
            $this->key = $data['key'];
        }
        if (isset($data['count'])) {
            $this->count = $data['count'];
        }
        if (isset($data['amount'])) {
            $this->amount = [];
            foreach ($data['amount'] as $item) {
                $this->amount[] = new Money($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->amount = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
