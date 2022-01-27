<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The PayPal Wallet response.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-paypal_wallet_response.json
 */
class PaypalWalletResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * Additional attributes associated with the use of a PayPal Wallet.
     *
     * @var PaypalWalletAttributesResponse | null
     */
    public $attributes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->attributes) || Assert::isInstanceOf(
            $this->attributes,
            PaypalWalletAttributesResponse::class,
            "attributes in PaypalWalletResponse must be instance of PaypalWalletAttributesResponse $within"
        );
        !isset($this->attributes) ||  $this->attributes->validate(PaypalWalletResponse::class);
    }

    private function map(array $data)
    {
        if (isset($data['attributes'])) {
            $this->attributes = new PaypalWalletAttributesResponse($data['attributes']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAttributes(): PaypalWalletAttributesResponse
    {
        return $this->attributes = new PaypalWalletAttributesResponse();
    }
}
