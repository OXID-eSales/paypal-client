<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A resource that identifies that a PayPal Wallet is used for payment.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-paypal_wallet.json
 */
class PaypalWallet implements JsonSerializable
{
    use BaseModel;

    /**
     * Additional attributes associated with the use of this PayPal Wallet.
     *
     * @var PaypalWalletAttributes | null
     */
    public $attributes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->attributes) || Assert::isInstanceOf(
            $this->attributes,
            PaypalWalletAttributes::class,
            "attributes in PaypalWallet must be instance of PaypalWalletAttributes $within"
        );
        !isset($this->attributes) ||  $this->attributes->validate(PaypalWallet::class);
    }

    private function map(array $data)
    {
        if (isset($data['attributes'])) {
            $this->attributes = new PaypalWalletAttributes($data['attributes']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAttributes(): PaypalWalletAttributes
    {
        return $this->attributes = new PaypalWalletAttributes();
    }
}
