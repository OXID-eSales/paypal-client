<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The Balance information.
 *
 * generated from: balance_detail.json
 */
class BalanceDetail implements JsonSerializable
{
    use BaseModel;

    /**
     * Optional field representing if the currency is primary currency or not.
     *
     * @var boolean | null
     */
    public $primary;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    private function map(array $data)
    {
        if (isset($data['primary'])) {
            $this->primary = $data['primary'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
