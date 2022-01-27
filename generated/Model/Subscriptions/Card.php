<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payment card to use to fund a payment. Can be a credit or debit card.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-card.json
 */
class Card implements JsonSerializable
{
    use BaseModel;

    /** Visa card. */
    public const CARD_TYPE_VISA = 'VISA';

    /** Mastecard card. */
    public const CARD_TYPE_MASTERCARD = 'MASTERCARD';

    /** Discover card. */
    public const CARD_TYPE_DISCOVER = 'DISCOVER';

    /** American Express card. */
    public const CARD_TYPE_AMEX = 'AMEX';

    /** Solo debit card. */
    public const CARD_TYPE_SOLO = 'SOLO';

    /** Japan Credit Bureau card. */
    public const CARD_TYPE_JCB = 'JCB';

    /** Military Star card. */
    public const CARD_TYPE_STAR = 'STAR';

    /** Delta Airlines card. */
    public const CARD_TYPE_DELTA = 'DELTA';

    /** Switch credit card. */
    public const CARD_TYPE_SWITCH = 'SWITCH';

    /** Maestro credit card. */
    public const CARD_TYPE_MAESTRO = 'MAESTRO';

    /** Carte Bancaire (CB) credit card. */
    public const CARD_TYPE_CB_NATIONALE = 'CB_NATIONALE';

    /** Configoga credit card. */
    public const CARD_TYPE_CONFIGOGA = 'CONFIGOGA';

    /** Confidis credit card. */
    public const CARD_TYPE_CONFIDIS = 'CONFIDIS';

    /** Visa Electron credit card. */
    public const CARD_TYPE_ELECTRON = 'ELECTRON';

    /** Cetelem credit card. */
    public const CARD_TYPE_CETELEM = 'CETELEM';

    /** China union pay credit card. */
    public const CARD_TYPE_CHINA_UNION_PAY = 'CHINA_UNION_PAY';

    /**
     * The PayPal-generated ID for the card.
     *
     * @var string | null
     */
    public $id;

    /**
     * The card holder's name as it appears on the card.
     *
     * @var string | null
     * maxLength: 300
     */
    public $name;

    /**
     * The primary account number (PAN) for the payment card.
     *
     * @var string
     * minLength: 13
     * maxLength: 19
     */
    public $number;

    /**
     * The year and month, in ISO-8601 `YYYY-MM` date format. See [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @var string
     * minLength: 7
     * maxLength: 7
     */
    public $expiry;

    /**
     * The three- or four-digit security code of the card. Also known as the CVV, CVC, CVN, CVE, or CID. This
     * parameter cannot be present in the request when `payment_initiator=MERCHANT`.
     *
     * @var string | null
     */
    public $security_code;

    /**
     * The last digits of the payment card.
     *
     * @var string | null
     */
    public $last_digits;

    /**
     * The card network or brand. Applies to credit, debit, gift, and payment cards.
     *
     * use one of constants defined in this class to set the value:
     * @see CARD_TYPE_VISA
     * @see CARD_TYPE_MASTERCARD
     * @see CARD_TYPE_DISCOVER
     * @see CARD_TYPE_AMEX
     * @see CARD_TYPE_SOLO
     * @see CARD_TYPE_JCB
     * @see CARD_TYPE_STAR
     * @see CARD_TYPE_DELTA
     * @see CARD_TYPE_SWITCH
     * @see CARD_TYPE_MAESTRO
     * @see CARD_TYPE_CB_NATIONALE
     * @see CARD_TYPE_CONFIGOGA
     * @see CARD_TYPE_CONFIDIS
     * @see CARD_TYPE_ELECTRON
     * @see CARD_TYPE_CETELEM
     * @see CARD_TYPE_CHINA_UNION_PAY
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $card_type;

    /**
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     *
     * @var AddressPortable2 | null
     */
    public $billing_address;

    /**
     * A list of authentication results. This parameter cannot be present in the request when
     * `payment_initiator=MERCHANT`.
     *
     * @var ThreedsResult[] | null
     * maxItems: 1
     */
    public $authentication_results;

    /**
     * Additional attributes associated with the use of this card.
     *
     * @var CardAttributes | null
     */
    public $attributes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::maxLength(
            $this->name,
            300,
            "name in Card must have maxlength of 300 $within"
        );
        Assert::notNull($this->number, "number in Card must not be NULL $within");
        Assert::minLength(
            $this->number,
            13,
            "number in Card must have minlength of 13 $within"
        );
        Assert::maxLength(
            $this->number,
            19,
            "number in Card must have maxlength of 19 $within"
        );
        Assert::notNull($this->expiry, "expiry in Card must not be NULL $within");
        Assert::minLength(
            $this->expiry,
            7,
            "expiry in Card must have minlength of 7 $within"
        );
        Assert::maxLength(
            $this->expiry,
            7,
            "expiry in Card must have maxlength of 7 $within"
        );
        !isset($this->card_type) || Assert::minLength(
            $this->card_type,
            1,
            "card_type in Card must have minlength of 1 $within"
        );
        !isset($this->card_type) || Assert::maxLength(
            $this->card_type,
            255,
            "card_type in Card must have maxlength of 255 $within"
        );
        !isset($this->billing_address) || Assert::isInstanceOf(
            $this->billing_address,
            AddressPortable2::class,
            "billing_address in Card must be instance of AddressPortable2 $within"
        );
        !isset($this->billing_address) ||  $this->billing_address->validate(Card::class);
        !isset($this->authentication_results) || Assert::maxCount(
            $this->authentication_results,
            1,
            "authentication_results in Card must have max. count of 1 $within"
        );
        !isset($this->authentication_results) || Assert::isArray(
            $this->authentication_results,
            "authentication_results in Card must be array $within"
        );
        if (isset($this->authentication_results)) {
            foreach ($this->authentication_results as $item) {
                $item->validate(Card::class);
            }
        }
        !isset($this->attributes) || Assert::isInstanceOf(
            $this->attributes,
            CardAttributes::class,
            "attributes in Card must be instance of CardAttributes $within"
        );
        !isset($this->attributes) ||  $this->attributes->validate(Card::class);
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['number'])) {
            $this->number = $data['number'];
        }
        if (isset($data['expiry'])) {
            $this->expiry = $data['expiry'];
        }
        if (isset($data['security_code'])) {
            $this->security_code = $data['security_code'];
        }
        if (isset($data['last_digits'])) {
            $this->last_digits = $data['last_digits'];
        }
        if (isset($data['card_type'])) {
            $this->card_type = $data['card_type'];
        }
        if (isset($data['billing_address'])) {
            $this->billing_address = new AddressPortable2($data['billing_address']);
        }
        if (isset($data['authentication_results'])) {
            $this->authentication_results = [];
            foreach ($data['authentication_results'] as $item) {
                $this->authentication_results[] = new ThreedsResult($item);
            }
        }
        if (isset($data['attributes'])) {
            $this->attributes = new CardAttributes($data['attributes']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initBillingAddress(): AddressPortable2
    {
        return $this->billing_address = new AddressPortable2();
    }

    public function initAttributes(): CardAttributes
    {
        return $this->attributes = new CardAttributes();
    }
}
