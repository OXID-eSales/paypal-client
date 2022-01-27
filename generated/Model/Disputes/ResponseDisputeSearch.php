<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * An array of disputes. Includes links that enable you to navigate through the response.
 *
 * generated from: response-dispute_search.json
 */
class ResponseDisputeSearch implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of disputes that match the filter criteria. Sorted in latest to earliest creation time order.
     *
     * @var ResponseDisputeInfo[]
     * maxItems: 1
     * maxItems: 100
     */
    public $items;

    /**
     * The total number of items. If the request specifies `total_required=true`, appears in the response.
     *
     * @var int | null
     */
    public $total_items;

    /**
     * The total number of pages. If the request specifies `total_required=true`, appears in the response.
     *
     * @var int | null
     */
    public $total_pages;

    /**
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links/).
     *
     * @var array
     * maxItems: 1
     * maxItems: 10
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->items, "items in ResponseDisputeSearch must not be NULL $within");
        Assert::minCount(
            $this->items,
            1,
            "items in ResponseDisputeSearch must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->items,
            100,
            "items in ResponseDisputeSearch must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->items,
            "items in ResponseDisputeSearch must be array $within"
        );
        if (isset($this->items)) {
            foreach ($this->items as $item) {
                $item->validate(ResponseDisputeSearch::class);
            }
        }
        Assert::notNull($this->links, "links in ResponseDisputeSearch must not be NULL $within");
        Assert::minCount(
            $this->links,
            1,
            "links in ResponseDisputeSearch must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->links,
            10,
            "links in ResponseDisputeSearch must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->links,
            "links in ResponseDisputeSearch must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['items'])) {
            $this->items = [];
            foreach ($data['items'] as $item) {
                $this->items[] = new ResponseDisputeInfo($item);
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
        $this->items = [];
        $this->links = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
