<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The allowed response options for the buyer/seller update actions.
 *
 * generated from: response-allowed_response_options.json
 */
class ResponseAllowedResponseOptions implements JsonSerializable
{
    use BaseModel;

    /**
     * The allowed response options when the seller acknowledges that the buyer has returned an item for the dispute.
     *
     * @var ResponseAcknowledgeReturnItemResponseOptions | null
     */
    public $acknowledge_return_item;

    /**
     * The allowed response options when the merchant is accepting the claim.
     *
     * @var ResponseAcceptClaimResponseOptions | null
     */
    public $accept_claim;

    /**
     * The allowed response options when the merchant makes offer to the customer.
     *
     * @var ResponseMakeOfferResponseOptions | null
     */
    public $make_offer;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->acknowledge_return_item) || Assert::isInstanceOf(
            $this->acknowledge_return_item,
            ResponseAcknowledgeReturnItemResponseOptions::class,
            "acknowledge_return_item in ResponseAllowedResponseOptions must be instance of ResponseAcknowledgeReturnItemResponseOptions $within"
        );
        !isset($this->acknowledge_return_item) ||  $this->acknowledge_return_item->validate(ResponseAllowedResponseOptions::class);
        !isset($this->accept_claim) || Assert::isInstanceOf(
            $this->accept_claim,
            ResponseAcceptClaimResponseOptions::class,
            "accept_claim in ResponseAllowedResponseOptions must be instance of ResponseAcceptClaimResponseOptions $within"
        );
        !isset($this->accept_claim) ||  $this->accept_claim->validate(ResponseAllowedResponseOptions::class);
        !isset($this->make_offer) || Assert::isInstanceOf(
            $this->make_offer,
            ResponseMakeOfferResponseOptions::class,
            "make_offer in ResponseAllowedResponseOptions must be instance of ResponseMakeOfferResponseOptions $within"
        );
        !isset($this->make_offer) ||  $this->make_offer->validate(ResponseAllowedResponseOptions::class);
    }

    private function map(array $data)
    {
        if (isset($data['acknowledge_return_item'])) {
            $this->acknowledge_return_item = new ResponseAcknowledgeReturnItemResponseOptions($data['acknowledge_return_item']);
        }
        if (isset($data['accept_claim'])) {
            $this->accept_claim = new ResponseAcceptClaimResponseOptions($data['accept_claim']);
        }
        if (isset($data['make_offer'])) {
            $this->make_offer = new ResponseMakeOfferResponseOptions($data['make_offer']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAcknowledgeReturnItem(): ResponseAcknowledgeReturnItemResponseOptions
    {
        return $this->acknowledge_return_item = new ResponseAcknowledgeReturnItemResponseOptions();
    }

    public function initAcceptClaim(): ResponseAcceptClaimResponseOptions
    {
        return $this->accept_claim = new ResponseAcceptClaimResponseOptions();
    }

    public function initMakeOffer(): ResponseMakeOfferResponseOptions
    {
        return $this->make_offer = new ResponseMakeOfferResponseOptions();
    }
}
