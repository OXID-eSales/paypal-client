<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The merchant-proposed offer for a dispute.
 *
 * generated from: response-offer.json
 */
class ResponseOffer implements JsonSerializable
{
    use BaseModel;

    /** The merchant must refund the customer without any item replacement or return. This offer type is valid in the inquiry phase and occurs when a merchant is willing to refund a specific amount. Buyer acceptance is needed for partial refund offers and dispute is auto closed for full refunds. Include the <code>offer_amount</code> but omit the <code>return_shipping_address</code> parameters from the make offer request. */
    public const OFFER_TYPE_REFUND = 'REFUND';

    /** The customer must return the item to the merchant and then merchant will refund the money. This offer type is valid in the inquiry phase and occurs when a merchant is willing to refund a specific amount and requires the customer to return the item. Include the <code>return_shipping_address</code> parameter and the <code>offer_amount</code> parameter in the make offer request. */
    public const OFFER_TYPE_REFUND_WITH_RETURN = 'REFUND_WITH_RETURN';

    /** The merchant must do a refund and then send a replacement item to the customer. This offer type is valid in the inquiry phase when a merchant is willing to refund a specific amount and send the replacement item. Include the <code>offer_amount</code> parameter in the make offer request. */
    public const OFFER_TYPE_REFUND_WITH_REPLACEMENT = 'REFUND_WITH_REPLACEMENT';

    /** The merchant must send a replacement item to the customer with no additional refunds. This offer type is valid in the inquiry phase when a merchant is willing to replace the item without any refund. Omit the <code>offer_amount</code> parameter from the make offer request. */
    public const OFFER_TYPE_REPLACEMENT_WITHOUT_REFUND = 'REPLACEMENT_WITHOUT_REFUND';

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $buyer_requested_amount;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $seller_offered_amount;

    /**
     * The merchant-proposed offer type for the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see OFFER_TYPE_REFUND
     * @see OFFER_TYPE_REFUND_WITH_RETURN
     * @see OFFER_TYPE_REFUND_WITH_REPLACEMENT
     * @see OFFER_TYPE_REPLACEMENT_WITHOUT_REFUND
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $offer_type;

    /**
     * An array of history information for an offer.
     *
     * @var ResponseOfferHistory[] | null
     */
    public $history;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->buyer_requested_amount) || Assert::isInstanceOf(
            $this->buyer_requested_amount,
            Money::class,
            "buyer_requested_amount in ResponseOffer must be instance of Money $within"
        );
        !isset($this->buyer_requested_amount) ||  $this->buyer_requested_amount->validate(ResponseOffer::class);
        !isset($this->seller_offered_amount) || Assert::isInstanceOf(
            $this->seller_offered_amount,
            Money::class,
            "seller_offered_amount in ResponseOffer must be instance of Money $within"
        );
        !isset($this->seller_offered_amount) ||  $this->seller_offered_amount->validate(ResponseOffer::class);
        !isset($this->offer_type) || Assert::minLength(
            $this->offer_type,
            1,
            "offer_type in ResponseOffer must have minlength of 1 $within"
        );
        !isset($this->offer_type) || Assert::maxLength(
            $this->offer_type,
            255,
            "offer_type in ResponseOffer must have maxlength of 255 $within"
        );
        !isset($this->history) || Assert::isArray(
            $this->history,
            "history in ResponseOffer must be array $within"
        );
        if (isset($this->history)) {
            foreach ($this->history as $item) {
                $item->validate(ResponseOffer::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['buyer_requested_amount'])) {
            $this->buyer_requested_amount = new Money($data['buyer_requested_amount']);
        }
        if (isset($data['seller_offered_amount'])) {
            $this->seller_offered_amount = new Money($data['seller_offered_amount']);
        }
        if (isset($data['offer_type'])) {
            $this->offer_type = $data['offer_type'];
        }
        if (isset($data['history'])) {
            $this->history = [];
            foreach ($data['history'] as $item) {
                $this->history[] = new ResponseOfferHistory($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initBuyerRequestedAmount(): Money
    {
        return $this->buyer_requested_amount = new Money();
    }

    public function initSellerOfferedAmount(): Money
    {
        return $this->seller_offered_amount = new Money();
    }
}
