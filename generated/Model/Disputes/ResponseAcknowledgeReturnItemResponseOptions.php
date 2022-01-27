<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The allowed response options when the seller acknowledges that the buyer has returned an item for the dispute.
 *
 * generated from: response-acknowledge_return_item_response_options.json
 */
class ResponseAcknowledgeReturnItemResponseOptions implements JsonSerializable
{
    use BaseModel;

    /**
     * The types of response when the merchant acknowledges a returned item.
     *
     * @var string[]
     * maxItems: 1
     * maxItems: 10
     */
    public $acknowledgement_types;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->acknowledgement_types, "acknowledgement_types in ResponseAcknowledgeReturnItemResponseOptions must not be NULL $within");
        Assert::minCount(
            $this->acknowledgement_types,
            1,
            "acknowledgement_types in ResponseAcknowledgeReturnItemResponseOptions must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->acknowledgement_types,
            10,
            "acknowledgement_types in ResponseAcknowledgeReturnItemResponseOptions must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->acknowledgement_types,
            "acknowledgement_types in ResponseAcknowledgeReturnItemResponseOptions must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['acknowledgement_types'])) {
            $this->acknowledgement_types = [];
            foreach ($data['acknowledgement_types'] as $item) {
                $this->acknowledgement_types[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->acknowledgement_types = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
