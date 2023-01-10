<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payment card to use to fund a payment. Card can be a credit or debit card.
 *
 * generated from:
 * customized_x_unsupported_9135_MerchantsCommonComponentsSpecification-v1-schema-card_response.json
 */
class CardResponse2 implements JsonSerializable
{
    use BaseModel;

    /** Visa card. */
    const BRAND_VISA = 'VISA';

    /** Mastecard card. */
    const BRAND_MASTERCARD = 'MASTERCARD';

    /** Discover card. */
    const BRAND_DISCOVER = 'DISCOVER';

    /** American Express card. */
    const BRAND_AMEX = 'AMEX';

    /** Solo debit card. */
    const BRAND_SOLO = 'SOLO';

    /** Japan Credit Bureau card. */
    const BRAND_JCB = 'JCB';

    /** Military Star card. */
    const BRAND_STAR = 'STAR';

    /** Delta Airlines card. */
    const BRAND_DELTA = 'DELTA';

    /** Switch credit card. */
    const BRAND_SWITCH = 'SWITCH';

    /** Maestro credit card. */
    const BRAND_MAESTRO = 'MAESTRO';

    /** Carte Bancaire (CB) credit card. */
    const BRAND_CB_NATIONALE = 'CB_NATIONALE';

    /** Configoga credit card. */
    const BRAND_CONFIGOGA = 'CONFIGOGA';

    /** Confidis credit card. */
    const BRAND_CONFIDIS = 'CONFIDIS';

    /** Visa Electron credit card. */
    const BRAND_ELECTRON = 'ELECTRON';

    /** Cetelem credit card. */
    const BRAND_CETELEM = 'CETELEM';

    /** China union pay credit card. */
    const BRAND_CHINA_UNION_PAY = 'CHINA_UNION_PAY';

    /** A credit card. */
    const TYPE_CREDIT = 'CREDIT';

    /** A debit card. */
    const TYPE_DEBIT = 'DEBIT';

    /** A Prepaid card. */
    const TYPE_PREPAID = 'PREPAID';

    /** Card type cannot be determined. */
    const TYPE_UNKNOWN = 'UNKNOWN';

    /**
     * The card holder's name as it appears on the card.
     *
     * @var string | null
     * minLength: 2
     * maxLength: 300
     */
    public $name;

    /**
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     *
     * @var AddressPortable3 | null
     */
    public $billing_address;

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
     * @see BRAND_VISA
     * @see BRAND_MASTERCARD
     * @see BRAND_DISCOVER
     * @see BRAND_AMEX
     * @see BRAND_SOLO
     * @see BRAND_JCB
     * @see BRAND_STAR
     * @see BRAND_DELTA
     * @see BRAND_SWITCH
     * @see BRAND_MAESTRO
     * @see BRAND_CB_NATIONALE
     * @see BRAND_CONFIGOGA
     * @see BRAND_CONFIDIS
     * @see BRAND_ELECTRON
     * @see BRAND_CETELEM
     * @see BRAND_CHINA_UNION_PAY
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $brand;

    /**
     * The payment card type.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_CREDIT
     * @see TYPE_DEBIT
     * @see TYPE_PREPAID
     * @see TYPE_UNKNOWN
     * @var string | null
     */
    public $type;

    /**
     * An acronym for Bank Identification Number (BIN), also known as IIN (Issuer Identification Number). It Is a
     * standardized global numbering scheme (6 to 8 digits) used to identify a bank / institution that issued the
     * card.
     *
     * @var string | null
     * minLength: 6
     * maxLength: 8
     */
    public $bin;

    /**
     * Results of Authentication such as 3D Secure.
     *
     * @var AuthenticationResponse | null
     */
    public $authentication_result;

    /**
     * Additional attributes associated with the use of this card.
     *
     * @var CardAttributesResponse | null
     */
    public $attributes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength(
            $this->name,
            2,
            "name in CardResponse2 must have minlength of 2 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            300,
            "name in CardResponse2 must have maxlength of 300 $within"
        );
        !isset($this->billing_address) || Assert::isInstanceOf(
            $this->billing_address,
            AddressPortable3::class,
            "billing_address in CardResponse2 must be instance of AddressPortable3 $within"
        );
        !isset($this->billing_address) ||  $this->billing_address->validate(CardResponse2::class);
        !isset($this->brand) || Assert::minLength(
            $this->brand,
            1,
            "brand in CardResponse2 must have minlength of 1 $within"
        );
        !isset($this->brand) || Assert::maxLength(
            $this->brand,
            255,
            "brand in CardResponse2 must have maxlength of 255 $within"
        );
        !isset($this->bin) || Assert::minLength(
            $this->bin,
            6,
            "bin in CardResponse2 must have minlength of 6 $within"
        );
        !isset($this->bin) || Assert::maxLength(
            $this->bin,
            8,
            "bin in CardResponse2 must have maxlength of 8 $within"
        );
        !isset($this->authentication_result) || Assert::isInstanceOf(
            $this->authentication_result,
            AuthenticationResponse::class,
            "authentication_result in CardResponse2 must be instance of AuthenticationResponse $within"
        );
        !isset($this->authentication_result) ||  $this->authentication_result->validate(CardResponse2::class);
        !isset($this->attributes) || Assert::isInstanceOf(
            $this->attributes,
            CardAttributesResponse::class,
            "attributes in CardResponse2 must be instance of CardAttributesResponse $within"
        );
        !isset($this->attributes) ||  $this->attributes->validate(CardResponse2::class);
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['billing_address'])) {
            $this->billing_address = new AddressPortable3($data['billing_address']);
        }
        if (isset($data['last_digits'])) {
            $this->last_digits = $data['last_digits'];
        }
        if (isset($data['brand'])) {
            $this->brand = $data['brand'];
        }
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['bin'])) {
            $this->bin = $data['bin'];
        }
        if (isset($data['authentication_result'])) {
            $this->authentication_result = new AuthenticationResponse($data['authentication_result']);
        }
        if (isset($data['attributes'])) {
            $this->attributes = new CardAttributesResponse($data['attributes']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initBillingAddress(): AddressPortable3
    {
        return $this->billing_address = new AddressPortable3();
    }

    public function initAuthenticationResult(): AuthenticationResponse
    {
        return $this->authentication_result = new AuthenticationResponse();
    }

    public function initAttributes(): CardAttributesResponse
    {
        return $this->attributes = new CardAttributesResponse();
    }
}
