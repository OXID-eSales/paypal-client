<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The store information.
 *
 * generated from: store_info.json
 */
class StoreInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * The ID of a store for a merchant in the system of record.
     *
     * @var string | null
     * maxLength: 100
     */
    public $store_id;

    /**
     * The terminal ID for the checkout stand in a merchant store.
     *
     * @var string | null
     * maxLength: 60
     */
    public $terminal_id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->store_id) || Assert::maxLength(
            $this->store_id,
            100,
            "store_id in StoreInfo must have maxlength of 100 $within"
        );
        !isset($this->terminal_id) || Assert::maxLength(
            $this->terminal_id,
            60,
            "terminal_id in StoreInfo must have maxlength of 60 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['store_id'])) {
            $this->store_id = $data['store_id'];
        }
        if (isset($data['terminal_id'])) {
            $this->terminal_id = $data['terminal_id'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
