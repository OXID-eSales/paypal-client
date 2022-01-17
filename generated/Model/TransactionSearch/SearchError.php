<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The error details.
 *
 * generated from: search_error.json
 */
class SearchError implements JsonSerializable
{
    use BaseModel;

    /**
     * The total number of transactions. Valid only for `RESULTSET_TOO_LARGE`.
     *
     * @var int | null
     */
    public $total_items;

    /**
     * The maximum number of transactions. Valid only for `RESULTSET_TOO_LARGE`.
     *
     * @var int | null
     */
    public $maximum_items;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    private function map(array $data)
    {
        if (isset($data['total_items'])) {
            $this->total_items = $data['total_items'];
        }
        if (isset($data['maximum_items'])) {
            $this->maximum_items = $data['maximum_items'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
