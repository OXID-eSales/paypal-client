<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The Apple Pay Wallet used to fund a payment.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-apple_pay_wallet_response.json
 */
class ApplePayWalletResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * The Card from Apple Pay Wallet used to fund the payment.
     *
     * @var ApplePayCardResponse | null
     */
    public $card;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->card) || Assert::isInstanceOf(
            $this->card,
            ApplePayCardResponse::class,
            "card in ApplePayWalletResponse must be instance of ApplePayCardResponse $within"
        );
        !isset($this->card) ||  $this->card->validate(ApplePayWalletResponse::class);
    }

    private function map(array $data)
    {
        if (isset($data['card'])) {
            $this->card = new ApplePayCardResponse($data['card']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initCard(): ApplePayCardResponse
    {
        return $this->card = new ApplePayCardResponse();
    }
}
