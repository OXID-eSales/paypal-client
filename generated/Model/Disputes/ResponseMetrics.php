<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The computed metrics for disputes.
 *
 * generated from: response-metrics.json
 */
class ResponseMetrics implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of dimension and measurement metrics for disputes.
     *
     * @var ResponseMetric[]
     * maxItems: 0
     * maxItems: 50
     */
    public $metrics;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->metrics, "metrics in ResponseMetrics must not be NULL $within");
        Assert::minCount(
            $this->metrics,
            0,
            "metrics in ResponseMetrics must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->metrics,
            50,
            "metrics in ResponseMetrics must have max. count of 50 $within"
        );
        Assert::isArray(
            $this->metrics,
            "metrics in ResponseMetrics must be array $within"
        );
        if (isset($this->metrics)) {
            foreach ($this->metrics as $item) {
                $item->validate(ResponseMetrics::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['metrics'])) {
            $this->metrics = [];
            foreach ($data['metrics'] as $item) {
                $this->metrics[] = new ResponseMetric($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->metrics = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
