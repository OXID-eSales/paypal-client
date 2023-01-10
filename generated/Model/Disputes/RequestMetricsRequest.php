<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * List disputes with metrics.
 *
 * generated from: request-metrics_request.json
 */
class RequestMetricsRequest implements JsonSerializable
{
    use BaseModel;

    /** Shows the results of metrics by the <code>STATUS</code> dimension. For example, if the measure is <code>COUNT</code>, shows the count of disputes by different status. */
    const DIMENSION_STATUS = 'STATUS';

    /** Shows the results of metrics by the <code>REASON</code> dimension. For example if the measure is <code>COUNT</code>, shows the count of disputes by different reason. */
    const DIMENSION_REASON = 'REASON';

    /** Shows the results of metrics by the <code>OUTCOME</code> dimension. For example if the measure is <code>COUNT</code>, shows the count of disputes by different outcome. */
    const DIMENSION_DISPUTE_OUTCOME = 'DISPUTE_OUTCOME';

    /** Shows the results of metrics by the <code>DISPUTE_STATE</code> dimension. For example if the measure is <code>COUNT</code>, shows the count of disputes by different dispute states. */
    const DIMENSION_DISPUTE_STATE = 'DISPUTE_STATE';

    /** Shows the count of disputes by the dimension in the request. */
    const MEASURE_COUNT = 'COUNT';

    /** Shows the sum of dispute amount of the disputes by the dimension in the request. */
    const MEASURE_DISPUTE_AMOUNT_SUM = 'DISPUTE_AMOUNT_SUM';

    /** Shows the sum of transaction amount of associated disputes by the dimension in the request. */
    const MEASURE_TRANSACTION_AMOUNT_SUM = 'TRANSACTION_AMOUNT_SUM';

    /** Shows the sum of refund amount of associated disputes by the dimension in the request. */
    const MEASURE_REFUND_AMOUNT_SUM = 'REFUND_AMOUNT_SUM';

    /**
     * The dimension for which to list metrics.
     *
     * use one of constants defined in this class to set the value:
     * @see DIMENSION_STATUS
     * @see DIMENSION_REASON
     * @see DIMENSION_DISPUTE_OUTCOME
     * @see DIMENSION_DISPUTE_STATE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $dimension;

    /**
     * The measure for the dimension for which to list metrics.
     *
     * use one of constants defined in this class to set the value:
     * @see MEASURE_COUNT
     * @see MEASURE_DISPUTE_AMOUNT_SUM
     * @see MEASURE_TRANSACTION_AMOUNT_SUM
     * @see MEASURE_REFUND_AMOUNT_SUM
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $measure;

    /**
     * A set of filters that you can use to filter the disputes in the response.
     *
     * @var RequestFilter | null
     */
    public $filter;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->dimension) || Assert::minLength(
            $this->dimension,
            1,
            "dimension in RequestMetricsRequest must have minlength of 1 $within"
        );
        !isset($this->dimension) || Assert::maxLength(
            $this->dimension,
            255,
            "dimension in RequestMetricsRequest must have maxlength of 255 $within"
        );
        !isset($this->measure) || Assert::minLength(
            $this->measure,
            1,
            "measure in RequestMetricsRequest must have minlength of 1 $within"
        );
        !isset($this->measure) || Assert::maxLength(
            $this->measure,
            255,
            "measure in RequestMetricsRequest must have maxlength of 255 $within"
        );
        !isset($this->filter) || Assert::isInstanceOf(
            $this->filter,
            RequestFilter::class,
            "filter in RequestMetricsRequest must be instance of RequestFilter $within"
        );
        !isset($this->filter) ||  $this->filter->validate(RequestMetricsRequest::class);
    }

    private function map(array $data)
    {
        if (isset($data['dimension'])) {
            $this->dimension = $data['dimension'];
        }
        if (isset($data['measure'])) {
            $this->measure = $data['measure'];
        }
        if (isset($data['filter'])) {
            $this->filter = new RequestFilter($data['filter']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initFilter(): RequestFilter
    {
        return $this->filter = new RequestFilter();
    }
}
