<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The create dispute response.
 *
 * generated from: response-dispute_create.json
 */
class ResponseDisputeCreate implements JsonSerializable
{
    use BaseModel;

    /**
     * The refund details.
     *
     * @var ResponseRefund | null
     */
    public $refund_info;

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
        !isset($this->refund_info) || Assert::isInstanceOf(
            $this->refund_info,
            ResponseRefund::class,
            "refund_info in ResponseDisputeCreate must be instance of ResponseRefund $within"
        );
        !isset($this->refund_info) ||  $this->refund_info->validate(ResponseDisputeCreate::class);
        Assert::notNull($this->links, "links in ResponseDisputeCreate must not be NULL $within");
        Assert::minCount(
            $this->links,
            1,
            "links in ResponseDisputeCreate must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->links,
            10,
            "links in ResponseDisputeCreate must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->links,
            "links in ResponseDisputeCreate must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['refund_info'])) {
            $this->refund_info = new ResponseRefund($data['refund_info']);
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
        $this->links = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initRefundInfo(): ResponseRefund
    {
        return $this->refund_info = new ResponseRefund();
    }
}
