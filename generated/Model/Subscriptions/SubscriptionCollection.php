<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The list of subscriptions.
 *
 * generated from: subscription_collection.json
 */
class SubscriptionCollection implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of subscriptions.
     *
     * @var Subscription[]
     * maxItems: 0
     * maxItems: 32767
     */
    public $subscriptions;

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
        Assert::notNull($this->subscriptions, "subscriptions in SubscriptionCollection must not be NULL $within");
        Assert::minCount(
            $this->subscriptions,
            0,
            "subscriptions in SubscriptionCollection must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->subscriptions,
            32767,
            "subscriptions in SubscriptionCollection must have max. count of 32767 $within"
        );
        Assert::isArray(
            $this->subscriptions,
            "subscriptions in SubscriptionCollection must be array $within"
        );
        if (isset($this->subscriptions)) {
            foreach ($this->subscriptions as $item) {
                $item->validate(SubscriptionCollection::class);
            }
        }
        Assert::notNull($this->links, "links in SubscriptionCollection must not be NULL $within");
        Assert::minCount(
            $this->links,
            1,
            "links in SubscriptionCollection must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->links,
            10,
            "links in SubscriptionCollection must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->links,
            "links in SubscriptionCollection must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['subscriptions'])) {
            $this->subscriptions = [];
            foreach ($data['subscriptions'] as $item) {
                $this->subscriptions[] = new Subscription($item);
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
        $this->subscriptions = [];
        $this->links = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
