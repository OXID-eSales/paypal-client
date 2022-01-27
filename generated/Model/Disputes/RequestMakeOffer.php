<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A merchant request to make an offer to resolve a dispute.
 *
 * generated from: request-make_offer.json
 */
class RequestMakeOffer implements JsonSerializable
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
     * The merchant's notes about the offer.
     *
     * @var string
     * minLength: 1
     * maxLength: 2000
     */
    public $note;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $offer_amount;

    /**
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     *
     * @var AddressPortable | null
     */
    public $return_shipping_address;

    /**
     * The merchant-provided ID of the invoice for the refund. This optional value maps the refund to an invoice ID
     * in the merchant's system.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $invoice_id;

    /**
     * The merchant-proposed offer type for the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see OFFER_TYPE_REFUND
     * @see OFFER_TYPE_REFUND_WITH_RETURN
     * @see OFFER_TYPE_REFUND_WITH_REPLACEMENT
     * @see OFFER_TYPE_REPLACEMENT_WITHOUT_REFUND
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $offer_type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->note, "note in RequestMakeOffer must not be NULL $within");
        Assert::minLength(
            $this->note,
            1,
            "note in RequestMakeOffer must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->note,
            2000,
            "note in RequestMakeOffer must have maxlength of 2000 $within"
        );
        !isset($this->offer_amount) || Assert::isInstanceOf(
            $this->offer_amount,
            Money::class,
            "offer_amount in RequestMakeOffer must be instance of Money $within"
        );
        !isset($this->offer_amount) ||  $this->offer_amount->validate(RequestMakeOffer::class);
        !isset($this->return_shipping_address) || Assert::isInstanceOf(
            $this->return_shipping_address,
            AddressPortable::class,
            "return_shipping_address in RequestMakeOffer must be instance of AddressPortable $within"
        );
        !isset($this->return_shipping_address) ||  $this->return_shipping_address->validate(RequestMakeOffer::class);
        !isset($this->invoice_id) || Assert::minLength(
            $this->invoice_id,
            1,
            "invoice_id in RequestMakeOffer must have minlength of 1 $within"
        );
        !isset($this->invoice_id) || Assert::maxLength(
            $this->invoice_id,
            127,
            "invoice_id in RequestMakeOffer must have maxlength of 127 $within"
        );
        Assert::notNull($this->offer_type, "offer_type in RequestMakeOffer must not be NULL $within");
        Assert::minLength(
            $this->offer_type,
            1,
            "offer_type in RequestMakeOffer must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->offer_type,
            255,
            "offer_type in RequestMakeOffer must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['note'])) {
            $this->note = $data['note'];
        }
        if (isset($data['offer_amount'])) {
            $this->offer_amount = new Money($data['offer_amount']);
        }
        if (isset($data['return_shipping_address'])) {
            $this->return_shipping_address = new AddressPortable($data['return_shipping_address']);
        }
        if (isset($data['invoice_id'])) {
            $this->invoice_id = $data['invoice_id'];
        }
        if (isset($data['offer_type'])) {
            $this->offer_type = $data['offer_type'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initOfferAmount(): Money
    {
        return $this->offer_amount = new Money();
    }

    public function initReturnShippingAddress(): AddressPortable
    {
        return $this->return_shipping_address = new AddressPortable();
    }
}
