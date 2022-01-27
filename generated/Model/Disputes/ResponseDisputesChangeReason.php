<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The change reason response.
 *
 * generated from: response-disputes_change_reason.json
 */
class ResponseDisputesChangeReason implements JsonSerializable
{
    use BaseModel;

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
        Assert::notNull($this->links, "links in ResponseDisputesChangeReason must not be NULL $within");
        Assert::minCount(
            $this->links,
            1,
            "links in ResponseDisputesChangeReason must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->links,
            10,
            "links in ResponseDisputesChangeReason must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->links,
            "links in ResponseDisputesChangeReason must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['links'])) {
            $this->links = [];
            foreach ($data['links'] as $item) {
                $this->links[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->links = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
