<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Catalog;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The list of products, with details.
 *
 * generated from: product_collection.json
 */
class ProductCollection implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of products.
     *
     * @var ProductCollectionElement[]
     * maxItems: 1
     * maxItems: 32767
     */
    public $products;

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
     * An array of request-related [HATEOAS links](/docs/api/overview/#hateoas-links).
     *
     * @var array | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->products, "products in ProductCollection must not be NULL $within");
        Assert::minCount(
            $this->products,
            1,
            "products in ProductCollection must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->products,
            32767,
            "products in ProductCollection must have max. count of 32767 $within"
        );
        Assert::isArray(
            $this->products,
            "products in ProductCollection must be array $within"
        );
        if (isset($this->products)) {
            foreach ($this->products as $item) {
                $item->validate(ProductCollection::class);
            }
        }
        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in ProductCollection must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['products'])) {
            $this->products = [];
            foreach ($data['products'] as $item) {
                $this->products[] = new ProductCollectionElement($item);
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
        $this->products = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
