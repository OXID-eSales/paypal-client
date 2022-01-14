<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payment card to use to fund a payment. Card can be a credit or debit card.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-card_response.json
 */
class CardResponse implements JsonSerializable
{
    use BaseModel;

    /** Visa card. */
    public const BRAND_VISA = 'VISA';

    /** Mastecard card. */
    public const BRAND_MASTERCARD = 'MASTERCARD';

    /** Discover card. */
    public const BRAND_DISCOVER = 'DISCOVER';

    /** American Express card. */
    public const BRAND_AMEX = 'AMEX';

    /** Solo debit card. */
    public const BRAND_SOLO = 'SOLO';

    /** Japan Credit Bureau card. */
    public const BRAND_JCB = 'JCB';

    /** Military Star card. */
    public const BRAND_STAR = 'STAR';

    /** Delta Airlines card. */
    public const BRAND_DELTA = 'DELTA';

    /** Switch credit card. */
    public const BRAND_SWITCH = 'SWITCH';

    /** Maestro credit card. */
    public const BRAND_MAESTRO = 'MAESTRO';

    /** Carte Bancaire (CB) credit card. */
    public const BRAND_CB_NATIONALE = 'CB_NATIONALE';

    /** Configoga credit card. */
    public const BRAND_CONFIGOGA = 'CONFIGOGA';

    /** Confidis credit card. */
    public const BRAND_CONFIDIS = 'CONFIDIS';

    /** Visa Electron credit card. */
    public const BRAND_ELECTRON = 'ELECTRON';

    /** Cetelem credit card. */
    public const BRAND_CETELEM = 'CETELEM';

    /** China union pay credit card. */
    public const BRAND_CHINA_UNION_PAY = 'CHINA_UNION_PAY';

    /** A credit card. */
    public const TYPE_CREDIT = 'CREDIT';

    /** A debit card. */
    public const TYPE_DEBIT = 'DEBIT';

    /** A Prepaid card. */
    public const TYPE_PREPAID = 'PREPAID';

    /** Card type cannot be determined. */
    public const TYPE_UNKNOWN = 'UNKNOWN';

    /** A PayPal credit card. */
    public const ISSUER_PAYPAL = 'PAYPAL';

    /**
     * The PayPal-generated ID for the card.
     *
     * @var string | null
     */
    public $id;

    /**
     * The last digits of the payment card.
     *
     * @var string | null
     * minLength: 2
     */
    public $last_n_chars;

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
     * The issuer of the card instrument.
     *
     * use one of constants defined in this class to set the value:
     * @see ISSUER_PAYPAL
     * @var string | null
     */
    public $issuer;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->last_n_chars) || Assert::minLength(
            $this->last_n_chars,
            2,
            "last_n_chars in CardResponse must have minlength of 2 $within"
        );
        !isset($this->brand) || Assert::minLength(
            $this->brand,
            1,
            "brand in CardResponse must have minlength of 1 $within"
        );
        !isset($this->brand) || Assert::maxLength(
            $this->brand,
            255,
            "brand in CardResponse must have maxlength of 255 $within"
        );
        !isset($this->bin) || Assert::minLength(
            $this->bin,
            6,
            "bin in CardResponse must have minlength of 6 $within"
        );
        !isset($this->bin) || Assert::maxLength(
            $this->bin,
            8,
            "bin in CardResponse must have maxlength of 8 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['last_n_chars'])) {
            $this->last_n_chars = $data['last_n_chars'];
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
        if (isset($data['issuer'])) {
            $this->issuer = $data['issuer'];
        }
        if (isset($data['bin'])) {
            $this->bin = $data['bin'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
