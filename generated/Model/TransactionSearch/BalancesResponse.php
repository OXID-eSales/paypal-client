<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The balances response information.
 *
 * generated from: balances_response.json
 */
class BalancesResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of balance detail objects.
     *
     * @var BalanceDetail[]
     * maxItems: 0
     * maxItems: 200
     */
    public $balances;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->balances, "balances in BalancesResponse must not be NULL $within");
        Assert::minCount(
            $this->balances,
            0,
            "balances in BalancesResponse must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->balances,
            200,
            "balances in BalancesResponse must have max. count of 200 $within"
        );
        Assert::isArray(
            $this->balances,
            "balances in BalancesResponse must be array $within"
        );
        if (isset($this->balances)) {
            foreach ($this->balances as $item) {
                $item->validate(BalancesResponse::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['balances'])) {
            $this->balances = [];
            foreach ($data['balances'] as $item) {
                $this->balances[] = new BalanceDetail($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->balances = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
