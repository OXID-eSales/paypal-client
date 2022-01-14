<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The auction information.
 *
 * generated from: auction_info.json
 */
class AuctionInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * The name of the auction site.
     *
     * @var string | null
     * maxLength: 200
     */
    public $auction_site;

    /**
     * The auction site URL.
     *
     * @var string | null
     * maxLength: 4000
     */
    public $auction_item_site;

    /**
     * The ID of the buyer who makes the purchase in the auction. This ID might be different from the payer ID
     * provided for the payment.
     *
     * @var string | null
     * maxLength: 500
     */
    public $auction_buyer_id;

    /**
     * The date and time when the auction closes, in [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @var string | null
     */
    public $auction_closing_date;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->auction_site) || Assert::maxLength(
            $this->auction_site,
            200,
            "auction_site in AuctionInfo must have maxlength of 200 $within"
        );
        !isset($this->auction_item_site) || Assert::maxLength(
            $this->auction_item_site,
            4000,
            "auction_item_site in AuctionInfo must have maxlength of 4000 $within"
        );
        !isset($this->auction_buyer_id) || Assert::maxLength(
            $this->auction_buyer_id,
            500,
            "auction_buyer_id in AuctionInfo must have maxlength of 500 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['auction_site'])) {
            $this->auction_site = $data['auction_site'];
        }
        if (isset($data['auction_item_site'])) {
            $this->auction_item_site = $data['auction_item_site'];
        }
        if (isset($data['auction_buyer_id'])) {
            $this->auction_buyer_id = $data['auction_buyer_id'];
        }
        if (isset($data['auction_closing_date'])) {
            $this->auction_closing_date = $data['auction_closing_date'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
