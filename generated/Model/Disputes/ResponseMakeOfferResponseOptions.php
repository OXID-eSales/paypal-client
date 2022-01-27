<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The allowed response options when the merchant makes offer to the customer.
 *
 * generated from: response-make_offer_response_options.json
 */
class ResponseMakeOfferResponseOptions implements JsonSerializable
{
    use BaseModel;

    /**
     * The types of offer the merchant can offer the customer.
     *
     * @var string[]
     * maxItems: 1
     * maxItems: 10
     */
    public $offer_types;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->offer_types, "offer_types in ResponseMakeOfferResponseOptions must not be NULL $within");
        Assert::minCount(
            $this->offer_types,
            1,
            "offer_types in ResponseMakeOfferResponseOptions must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->offer_types,
            10,
            "offer_types in ResponseMakeOfferResponseOptions must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->offer_types,
            "offer_types in ResponseMakeOfferResponseOptions must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['offer_types'])) {
            $this->offer_types = [];
            foreach ($data['offer_types'] as $item) {
                $this->offer_types[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->offer_types = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
