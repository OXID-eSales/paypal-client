<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer's wallet used to fund the transaction.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-wallets_response.json
 */
class WalletsResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * The Apple Pay Wallet used to fund a payment.
     *
     * @var ApplePayWalletResponse | null
     */
    public $apple_pay;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->apple_pay) || Assert::isInstanceOf(
            $this->apple_pay,
            ApplePayWalletResponse::class,
            "apple_pay in WalletsResponse must be instance of ApplePayWalletResponse $within"
        );
        !isset($this->apple_pay) ||  $this->apple_pay->validate(WalletsResponse::class);
    }

    private function map(array $data)
    {
        if (isset($data['apple_pay'])) {
            $this->apple_pay = new ApplePayWalletResponse($data['apple_pay']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initApplePay(): ApplePayWalletResponse
    {
        return $this->apple_pay = new ApplePayWalletResponse();
    }
}
