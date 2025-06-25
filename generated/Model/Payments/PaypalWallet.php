<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A resource that identies that a PayPal Wallet is used for payment.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-paypal_wallet.json
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

    /**
     * Customizes the payer experience during the approval process for the payment with
     * PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code>
     * and <code>shipping_preference</code> during partner account setup, which overrides the request
     * values.</blockquote>
     *
     * @var \OxidSolutionCatalysts\PayPalApi\Model\Orders\OrderExperienceContext
     */
    public $experience_context;


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
