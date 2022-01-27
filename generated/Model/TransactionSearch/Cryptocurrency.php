<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Representation of a specific amount of Cryptocurrency, denoted by its symbol and quantity.
 *
 * generated from: common_components-v4-schema-json-openapi-2.0-cryptocurrency.json
 */
class Cryptocurrency implements JsonSerializable
{
    use BaseModel;

    /** The ticker symbol for <b>Bitcoin</b>. https://en.wikipedia.org/wiki/Bitcoin */
    public const ASSET_SYMBOL_BTC = 'BTC';

    /** The ticker symbol for <b>Ethereum</b>. https://en.wikipedia.org/wiki/Ethereum */
    public const ASSET_SYMBOL_ETH = 'ETH';

    /** The ticker symbol for <b>Bitcoin Cash</b>. https://en.wikipedia.org/wiki/Bitcoin_Cash */
    public const ASSET_SYMBOL_BCH = 'BCH';

    /** The ticker symbol for <b>Litecoin</b>. https://en.wikipedia.org/wiki/Litecoin */
    public const ASSET_SYMBOL_LTC = 'LTC';

    /**
     * The Cryptocurrency ticker symbol / code as assigned by liquidity providers (exchanges).
     *
     * use one of constants defined in this class to set the value:
     * @see ASSET_SYMBOL_BTC
     * @see ASSET_SYMBOL_ETH
     * @see ASSET_SYMBOL_BCH
     * @see ASSET_SYMBOL_LTC
     * @var string
     * minLength: 1
     * maxLength: 10
     */
    public $asset_symbol;

    /**
     * Quantity of a cryptocurrency asset.<br/>This is a decimal number with scale defined for each Cryptocurrency by
     * the founders. For example, <li>Bitcoin(BTC) has 8 as scale,</li><li>Ethereum (ETH) has 18 as
     * scale.</li><br/>PayPal Cryptocurrency platform handles the scale to 8 digits for Bitcoin and its forks or
     * offshoots and Ehereum.
     *
     * @var string
     * minLength: 1
     * maxLength: 40
     */
    public $quantity;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->asset_symbol, "asset_symbol in Cryptocurrency must not be NULL $within");
        Assert::minLength(
            $this->asset_symbol,
            1,
            "asset_symbol in Cryptocurrency must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->asset_symbol,
            10,
            "asset_symbol in Cryptocurrency must have maxlength of 10 $within"
        );
        Assert::notNull($this->quantity, "quantity in Cryptocurrency must not be NULL $within");
        Assert::minLength(
            $this->quantity,
            1,
            "quantity in Cryptocurrency must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->quantity,
            40,
            "quantity in Cryptocurrency must have maxlength of 40 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['asset_symbol'])) {
            $this->asset_symbol = $data['asset_symbol'];
        }
        if (isset($data['quantity'])) {
            $this->quantity = $data['quantity'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
