<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The allowed response options when the merchant is accepting the claim.
 *
 * generated from: response-accept_claim_response_options.json
 */
class ResponseAcceptClaimResponseOptions implements JsonSerializable
{
    use BaseModel;

    /**
     * The types of refund the merchant can provide the customer.
     *
     * @var string[]
     * maxItems: 1
     * maxItems: 10
     */
    public $accept_claim_types;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->accept_claim_types, "accept_claim_types in ResponseAcceptClaimResponseOptions must not be NULL $within");
        Assert::minCount(
            $this->accept_claim_types,
            1,
            "accept_claim_types in ResponseAcceptClaimResponseOptions must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->accept_claim_types,
            10,
            "accept_claim_types in ResponseAcceptClaimResponseOptions must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->accept_claim_types,
            "accept_claim_types in ResponseAcceptClaimResponseOptions must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['accept_claim_types'])) {
            $this->accept_claim_types = [];
            foreach ($data['accept_claim_types'] as $item) {
                $this->accept_claim_types[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->accept_claim_types = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
