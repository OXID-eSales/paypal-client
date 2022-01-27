<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details of the selected installment option.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-installments.json
 */
class Installments implements JsonSerializable
{
    use BaseModel;

    /**
     * The installment term chosen by the payer.
     *
     * @var int
     */
    public $term;

    /**
     * The [ISO-8601-formatted](https://www.iso.org/standard/40874.html) length of time in years, months, weeks,
     * days, hours, minutes, and seconds.<blockquote><strong>Note:</strong> The format is
     * <code>P<var>y</var>Y<var>m</var>M<var>d</var>DT<var>h</var>H<var>m</var>M<var>s</var>S</code>. When an amount
     * is zero, you can omit it. Because week cannot co-exist with other time components in ISO-8601 duration,
     * specify <code>P7D</code>. Make provisions to incorporate the effects of daylight savings
     * time.</blockquote><br/>For more information, see
     * [durations](https://en.wikipedia.org/wiki/ISO_8601#Durations).
     *
     * @var string
     */
    public $interval_duration;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->term, "term in Installments must not be NULL $within");
        Assert::notNull($this->interval_duration, "interval_duration in Installments must not be NULL $within");
    }

    private function map(array $data)
    {
        if (isset($data['term'])) {
            $this->term = $data['term'];
        }
        if (isset($data['interval_duration'])) {
            $this->interval_duration = $data['interval_duration'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
