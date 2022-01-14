<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The search response information.
 *
 * generated from: partner_search_response.json
 */
class PartnerSearchResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of transaction detail objects.
     *
     * @var PartnerTransactionDetail[]
     * maxItems: 0
     * maxItems: 2147483647
     */
    public $transaction_details;

    /**
     * The total number of transactions as an integer beginning with the specified `page` in the full result and not
     * just in this response.
     *
     * @var int | null
     */
    public $total_items;

    /**
     * The total number of pages, as an `integer`, when the `total_items` is divided into pages of the specified
     * `page_size`.
     *
     * @var int | null
     */
    public $total_pages;

    /**
     * An array of request-related [HATEOAS links](/docs/api/overview/#hateoas-links).
     *
     * @var array | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->transaction_details, "transaction_details in PartnerSearchResponse must not be NULL $within");
        Assert::minCount(
            $this->transaction_details,
            0,
            "transaction_details in PartnerSearchResponse must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->transaction_details,
            2147483647,
            "transaction_details in PartnerSearchResponse must have max. count of 2147483647 $within"
        );
        Assert::isArray(
            $this->transaction_details,
            "transaction_details in PartnerSearchResponse must be array $within"
        );
        if (isset($this->transaction_details)) {
            foreach ($this->transaction_details as $item) {
                $item->validate(PartnerSearchResponse::class);
            }
        }
        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in PartnerSearchResponse must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['transaction_details'])) {
            $this->transaction_details = [];
            foreach ($data['transaction_details'] as $item) {
                $this->transaction_details[] = new PartnerTransactionDetail($item);
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
        $this->transaction_details = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
