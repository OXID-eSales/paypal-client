<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
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

    /**
     * The merchant's notes about the claim. PayPal can, but the customer cannot, view these notes.
     *
     * @var string | null
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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->note) || Assert::minLength(
            $this->note,
            1,
            "note in RequestAcceptClaim must have minlength of 1 $within"
        );
        !isset($this->note) || Assert::maxLength(
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
