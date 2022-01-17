<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Additional attributes associated with the use of this card.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-card_attributes_response.json
 */
class CardAttributesResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * The details about a saved payment source.
     *
     * @var VaultResponse | null
     */
    public $vault;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->vault) || Assert::isInstanceOf(
            $this->vault,
            VaultResponse::class,
            "vault in CardAttributesResponse must be instance of VaultResponse $within"
        );
        !isset($this->vault) ||  $this->vault->validate(CardAttributesResponse::class);
    }

    private function map(array $data)
    {
        if (isset($data['vault'])) {
            $this->vault = new VaultResponse($data['vault']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initVault(): VaultResponse
    {
        return $this->vault = new VaultResponse();
    }
}
