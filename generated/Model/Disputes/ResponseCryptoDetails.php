<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The Crypto trade details.
 *
 * generated from: response-crypto_details.json
 */
class ResponseCryptoDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * The Trade id for the crypto-currency order.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $trade_id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->trade_id) || Assert::minLength(
            $this->trade_id,
            1,
            "trade_id in ResponseCryptoDetails must have minlength of 1 $within"
        );
        !isset($this->trade_id) || Assert::maxLength(
            $this->trade_id,
            255,
            "trade_id in ResponseCryptoDetails must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['trade_id'])) {
            $this->trade_id = $data['trade_id'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
