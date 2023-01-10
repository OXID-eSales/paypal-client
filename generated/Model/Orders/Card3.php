<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payment card to use to fund a payment. Can be a credit or debit card.
 *
 * generated from:
 * customized_x_requiredOverride_91770_customized_x_unsupported_3252_MerchantsCommonComponentsSpecification-v1-schema-card.json
 */
class Card3 implements JsonSerializable
{
    use BaseModel;

    /** Visa card. */
    const CARD_TYPE_VISA = 'VISA';

    /** Mastecard card. */
    const CARD_TYPE_MASTERCARD = 'MASTERCARD';

    /** Discover card. */
    const CARD_TYPE_DISCOVER = 'DISCOVER';

    /** American Express card. */
    const CARD_TYPE_AMEX = 'AMEX';

    /** Solo debit card. */
    const CARD_TYPE_SOLO = 'SOLO';

    /** Japan Credit Bureau card. */
    const CARD_TYPE_JCB = 'JCB';

    /** Military Star card. */
    const CARD_TYPE_STAR = 'STAR';

    /** Delta Airlines card. */
    const CARD_TYPE_DELTA = 'DELTA';

    /** Switch credit card. */
    const CARD_TYPE_SWITCH = 'SWITCH';

    /** Maestro credit card. */
    const CARD_TYPE_MAESTRO = 'MAESTRO';

    /** Carte Bancaire (CB) credit card. */
    const CARD_TYPE_CB_NATIONALE = 'CB_NATIONALE';

    /** Configoga credit card. */
    const CARD_TYPE_CONFIGOGA = 'CONFIGOGA';

    /** Confidis credit card. */
    const CARD_TYPE_CONFIDIS = 'CONFIDIS';

    /** Visa Electron credit card. */
    const CARD_TYPE_ELECTRON = 'ELECTRON';

    /** Cetelem credit card. */
    const CARD_TYPE_CETELEM = 'CETELEM';

    /** China union pay credit card. */
    const CARD_TYPE_CHINA_UNION_PAY = 'CHINA_UNION_PAY';

    /** A credit card. */
    const TYPE_CREDIT = 'CREDIT';

    /** A debit card. */
    const TYPE_DEBIT = 'DEBIT';

    /** A Prepaid card. */
    const TYPE_PREPAID = 'PREPAID';

    /** A store card. */
    const TYPE_STORE = 'STORE';

    /** Card type cannot be determined. */
    const TYPE_UNKNOWN = 'UNKNOWN';

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

    /**
     * The card holder's name as it appears on the card.
     *
     * @var string | null
     * maxLength: 300
     */
    public $name;

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
     * Type of card. i.e Credit, Debit and so on.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_CREDIT
     * @see TYPE_DEBIT
     * @see TYPE_PREPAID
     * @see TYPE_STORE
     * @see TYPE_UNKNOWN
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $type;

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
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     *
     * @var AddressPortable3
     */
    public $billing_address;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::maxLength(
            $this->name,
            300,
            "name in Card3 must have maxlength of 300 $within"
        );
        !isset($this->card_type) || Assert::minLength(
            $this->card_type,
            1,
            "card_type in Card3 must have minlength of 1 $within"
        );
        !isset($this->card_type) || Assert::maxLength(
            $this->card_type,
            255,
            "card_type in Card3 must have maxlength of 255 $within"
        );
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in Card3 must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            255,
            "type in Card3 must have maxlength of 255 $within"
        );
        !isset($this->brand) || Assert::minLength(
            $this->brand,
            1,
            "brand in Card3 must have minlength of 1 $within"
        );
        !isset($this->brand) || Assert::maxLength(
            $this->brand,
            255,
            "brand in Card3 must have maxlength of 255 $within"
        );
        Assert::notNull($this->billing_address, "billing_address in Card3 must not be NULL $within");
        Assert::isInstanceOf(
            $this->billing_address,
            AddressPortable3::class,
            "billing_address in Card3 must be instance of AddressPortable3 $within"
        );
         $this->billing_address->validate(Card3::class);
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['card_type'])) {
            $this->card_type = $data['card_type'];
        }
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['brand'])) {
            $this->brand = $data['brand'];
        }
        if (isset($data['billing_address'])) {
            $this->billing_address = new AddressPortable3($data['billing_address']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->billing_address = new AddressPortable3();
        if (isset($data)) {
            $this->map($data);
        }
    }
}
