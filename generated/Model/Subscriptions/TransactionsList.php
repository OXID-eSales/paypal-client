<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The list transactions for a subscription request details.
 *
 * generated from: transactions_list.json
 */
class TransactionsList implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of transactions.
     *
     * @var Transaction[]
     * maxItems: 0
     * maxItems: 32767
     */
    public $transactions;

    /**
     * The total number of items.
     *
     * @var int | null
     */
    public $total_items;

    /**
     * The total number of pages.
     *
     * @var int | null
     */
    public $total_pages;

    /**
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     *
     * @var array
     * maxItems: 1
     * maxItems: 10
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->transactions, "transactions in TransactionsList must not be NULL $within");
        Assert::minCount(
            $this->transactions,
            0,
            "transactions in TransactionsList must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->transactions,
            32767,
            "transactions in TransactionsList must have max. count of 32767 $within"
        );
        Assert::isArray(
            $this->transactions,
            "transactions in TransactionsList must be array $within"
        );
        if (isset($this->transactions)) {
            foreach ($this->transactions as $item) {
                $item->validate(TransactionsList::class);
            }
        }
        Assert::notNull($this->links, "links in TransactionsList must not be NULL $within");
        Assert::minCount(
            $this->links,
            1,
            "links in TransactionsList must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->links,
            10,
            "links in TransactionsList must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->links,
            "links in TransactionsList must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['transactions'])) {
            $this->transactions = [];
            foreach ($data['transactions'] as $item) {
                $this->transactions[] = new Transaction($item);
            }
        }
        if (isset($data['total_items'])) {
            $this->total_items = $data['total_items'];
        }
        if (isset($data['total_pages'])) {
            $this->total_pages = $data['total_pages'];
        }
        if (isset($data['links'])) {
            $this->links = [];
            foreach ($data['links'] as $item) {
                $this->links[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->transactions = [];
        $this->links = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
