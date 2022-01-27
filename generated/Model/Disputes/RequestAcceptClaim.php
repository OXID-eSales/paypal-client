<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A request by a merchant to accept a customer's merchandise claim.
 *
 * generated from: request-accept_claim.json
 */
class RequestAcceptClaim implements JsonSerializable
{
    use BaseModel;

    /** Merchant is accepting customer's claim as they could not ship the item back to the customer */
    public const ACCEPT_CLAIM_REASON_DID_NOT_SHIP_ITEM = 'DID_NOT_SHIP_ITEM';

    /** Merchant is accepting customer's claim as it is taking too long for merchant to fulfil the order */
    public const ACCEPT_CLAIM_REASON_TOO_TIME_CONSUMING = 'TOO_TIME_CONSUMING';

    /** Merchant is accepting customer's claim as the item is lost in mail or transit */
    public const ACCEPT_CLAIM_REASON_LOST_IN_MAIL = 'LOST_IN_MAIL';

    /** Merchant is accepting customer's claim as the merchant is not able to find sufficient evidence to win this dispute */
    public const ACCEPT_CLAIM_REASON_NOT_ABLE_TO_WIN = 'NOT_ABLE_TO_WIN';

    /** Merchant is accepting customer’s claims to follow their internal company policy */
    public const ACCEPT_CLAIM_REASON_COMPANY_POLICY = 'COMPANY_POLICY';

    /** This is the default value merchant can use if none of the above reasons apply */
    public const ACCEPT_CLAIM_REASON_REASON_NOT_SET = 'REASON_NOT_SET';

    /** The merchant must refund the customer without any item replacement or return. This type is applicable when a merchant is willing to refund the entire dispute amount without any further action from customer. Omit the <code>refund_amount</code> and <code>return_shipping_address</code> parameters from the <a href="/docs/api/customer-disputes/v1/#disputes-actions_accept-claim">accept claim</a> call. */
    public const ACCEPT_CLAIM_TYPE_REFUND = 'REFUND';

    /** The customer must return the item to the merchant and then merchant will refund the money. This type is applicable when a merchant is willing to refund the dispute amount and requires the customer to return the item. Include the <code>return_shipping_address</code> parameter in but omit the <code>refund_amount</code> parameter from the <a href="/docs/api/customer-disputes/v1/#disputes-actions_accept-claim">accept claim</a> call. */
    public const ACCEPT_CLAIM_TYPE_REFUND_WITH_RETURN = 'REFUND_WITH_RETURN';

    /** The merchant proposes a partial refund for the dispute.This type is applicable when a merchant is willing to refund an amount lesser than dispute amount. Include the <code>refund_amount</code> parameter. */
    public const ACCEPT_CLAIM_TYPE_PARTIAL_REFUND = 'PARTIAL_REFUND';

    /**
     * The merchant's notes about the claim. PayPal can, but the customer cannot, view these notes.
     *
     * @var string
     * minLength: 1
     * maxLength: 2000
     */
    public $note;

    /**
     * The merchant's reason for acceptance of the customer's claim.
     *
     * use one of constants defined in this class to set the value:
     * @see ACCEPT_CLAIM_REASON_DID_NOT_SHIP_ITEM
     * @see ACCEPT_CLAIM_REASON_TOO_TIME_CONSUMING
     * @see ACCEPT_CLAIM_REASON_LOST_IN_MAIL
     * @see ACCEPT_CLAIM_REASON_NOT_ABLE_TO_WIN
     * @see ACCEPT_CLAIM_REASON_COMPANY_POLICY
     * @see ACCEPT_CLAIM_REASON_REASON_NOT_SET
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $accept_claim_reason;

    /**
     * The merchant-provided ID of the invoice for the refund. This optional value is used to map the refund to an
     * invoice ID in the merchant's system.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $invoice_id;

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
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $refund_amount;

    /**
     * The refund type proposed by the merchant for the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see ACCEPT_CLAIM_TYPE_REFUND
     * @see ACCEPT_CLAIM_TYPE_REFUND_WITH_RETURN
     * @see ACCEPT_CLAIM_TYPE_PARTIAL_REFUND
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $accept_claim_type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->note, "note in RequestAcceptClaim must not be NULL $within");
        Assert::minLength(
            $this->note,
            1,
            "note in RequestAcceptClaim must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->note,
            2000,
            "note in RequestAcceptClaim must have maxlength of 2000 $within"
        );
        !isset($this->accept_claim_reason) || Assert::minLength(
            $this->accept_claim_reason,
            1,
            "accept_claim_reason in RequestAcceptClaim must have minlength of 1 $within"
        );
        !isset($this->accept_claim_reason) || Assert::maxLength(
            $this->accept_claim_reason,
            255,
            "accept_claim_reason in RequestAcceptClaim must have maxlength of 255 $within"
        );
        !isset($this->invoice_id) || Assert::minLength(
            $this->invoice_id,
            1,
            "invoice_id in RequestAcceptClaim must have minlength of 1 $within"
        );
        !isset($this->invoice_id) || Assert::maxLength(
            $this->invoice_id,
            127,
            "invoice_id in RequestAcceptClaim must have maxlength of 127 $within"
        );
        !isset($this->return_shipping_address) || Assert::isInstanceOf(
            $this->return_shipping_address,
            AddressPortable::class,
            "return_shipping_address in RequestAcceptClaim must be instance of AddressPortable $within"
        );
        !isset($this->return_shipping_address) ||  $this->return_shipping_address->validate(RequestAcceptClaim::class);
        !isset($this->refund_amount) || Assert::isInstanceOf(
            $this->refund_amount,
            Money::class,
            "refund_amount in RequestAcceptClaim must be instance of Money $within"
        );
        !isset($this->refund_amount) ||  $this->refund_amount->validate(RequestAcceptClaim::class);
        !isset($this->accept_claim_type) || Assert::minLength(
            $this->accept_claim_type,
            1,
            "accept_claim_type in RequestAcceptClaim must have minlength of 1 $within"
        );
        !isset($this->accept_claim_type) || Assert::maxLength(
            $this->accept_claim_type,
            255,
            "accept_claim_type in RequestAcceptClaim must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['note'])) {
            $this->note = $data['note'];
        }
        if (isset($data['accept_claim_reason'])) {
            $this->accept_claim_reason = $data['accept_claim_reason'];
        }
        if (isset($data['invoice_id'])) {
            $this->invoice_id = $data['invoice_id'];
        }
        if (isset($data['return_shipping_address'])) {
            $this->return_shipping_address = new AddressPortable($data['return_shipping_address']);
        }
        if (isset($data['refund_amount'])) {
            $this->refund_amount = new Money($data['refund_amount']);
        }
        if (isset($data['accept_claim_type'])) {
            $this->accept_claim_type = $data['accept_claim_type'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initReturnShippingAddress(): AddressPortable
    {
        return $this->return_shipping_address = new AddressPortable();
    }

    public function initRefundAmount(): Money
    {
        return $this->refund_amount = new Money();
    }
}
