<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The incentive details.
 *
 * generated from: incentive_info.json
 */
class IncentiveInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of incentive details.
     *
     * @var IncentiveDetail[] | null
     */
    public $incentive_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->incentive_details) || Assert::isArray(
            $this->incentive_details,
            "incentive_details in IncentiveInfo must be array $within"
        );
        if (isset($this->incentive_details)) {
            foreach ($this->incentive_details as $item) {
                $item->validate(IncentiveInfo::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['incentive_details'])) {
            $this->incentive_details = [];
            foreach ($data['incentive_details'] as $item) {
                $this->incentive_details[] = new IncentiveDetail($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
