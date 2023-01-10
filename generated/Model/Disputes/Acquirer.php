<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Details of the acquirer.
 *
 * generated from: common_components-v4-schema-json-openapi-2.0-payment-acquirer.json
 */
class Acquirer implements JsonSerializable
{
    use BaseModel;

    /** Acquirer American Express. */
    const NAME_AMEX = 'AMEX';

    /** Acquirer BBVA Bancomer. */
    const NAME_BANCOMER = 'BANCOMER';

    /** Acquirer El Banco Fuerte de México. */
    const NAME_BANORTE = 'BANORTE';

    /** Acquirer Cielo SA. */
    const NAME_CIELO = 'CIELO';

    /** Acquirer Hongkong and Shanghai Banking Corporation. */
    const NAME_HSBC = 'HSBC';

    /** Acquirer Japan Credit Bureau. */
    const NAME_JAPAN_CREDIT_BUREAU = 'JAPAN_CREDIT_BUREAU';

    /** Acquirer Phnom Penh Commercial Bank. */
    const NAME_PHNOM_PENH_COMMERCIAL = 'PHNOM_PENH_COMMERCIAL';

    /** Acquirer Royal Bank Of Scotland. */
    const NAME_ROYAL_BANK_OF_SCOTLAND = 'ROYAL_BANK_OF_SCOTLAND';

    /** Acquirer Rede Card. */
    const NAME_REDE_CARD = 'REDE_CARD';

    /** Acquirer Bancorp. */
    const NAME_BANCORP = 'BANCORP';

    /** Acquirer Wells Fargo. */
    const NAME_WELLS_FARGO = 'WELLS_FARGO';

    /** Acquirer Westpac. */
    const NAME_WESTPAC = 'WESTPAC';

    /** Acquirer Türk Ekonomi Bankası(Turkish Economy Bank). */
    const NAME_TURKISH_ECONOMY_BANK = 'TURKISH_ECONOMY_BANK';

    /** Acquirer VTB Bank Russia. */
    const NAME_VTB24 = 'VTB24';

    /** Acquirer Pulse Payments Network. */
    const NAME_PULSE = 'PULSE';

    /** Acquirer Accel Interbank Network. */
    const NAME_ACCEL = 'ACCEL';

    /** Acquirer Sumitomo Mitsui Card Company. */
    const NAME_SMCC = 'SMCC';

    /** Acquirer Industrial Credit and Investment Corporation of India Bank. */
    const NAME_ICICI = 'ICICI';

    /** Acquirer Infrastructure Development Finance Company Bank. */
    const NAME_IDFC = 'IDFC';

    /** Acquirer Getnet - internet banking Santender. */
    const NAME_GETNET = 'GETNET';

    /** Acquirer Mercado Libre. */
    const NAME_MERCADO_LIBRE = 'MERCADO_LIBRE';

    /** Acquirer Ratepay. */
    const NAME_RATEPAY = 'RATEPAY';

    /**
     * The name of the acquirer.
     *
     * use one of constants defined in this class to set the value:
     * @see NAME_AMEX
     * @see NAME_BANCOMER
     * @see NAME_BANORTE
     * @see NAME_CIELO
     * @see NAME_HSBC
     * @see NAME_JAPAN_CREDIT_BUREAU
     * @see NAME_PHNOM_PENH_COMMERCIAL
     * @see NAME_ROYAL_BANK_OF_SCOTLAND
     * @see NAME_REDE_CARD
     * @see NAME_BANCORP
     * @see NAME_WELLS_FARGO
     * @see NAME_WESTPAC
     * @see NAME_TURKISH_ECONOMY_BANK
     * @see NAME_VTB24
     * @see NAME_PULSE
     * @see NAME_ACCEL
     * @see NAME_SMCC
     * @see NAME_ICICI
     * @see NAME_IDFC
     * @see NAME_GETNET
     * @see NAME_MERCADO_LIBRE
     * @see NAME_RATEPAY
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $name;

    /**
     * The [two-character ISO 3166-1 code](/docs/api/reference/country-codes/) that identifies the country or
     * region.<blockquote><strong>Note:</strong> The country code for Great Britain is <code>GB</code> and not
     * <code>UK</code> as used in the top-level domain names for that country. Use the `C2` country code for China
     * worldwide for comparable uncontrolled price (CUP) method, bank card, and cross-border
     * transactions.</blockquote>
     *
     * @var string | null
     * minLength: 2
     * maxLength: 2
     */
    public $country_code;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength(
            $this->name,
            1,
            "name in Acquirer must have minlength of 1 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            255,
            "name in Acquirer must have maxlength of 255 $within"
        );
        !isset($this->country_code) || Assert::minLength(
            $this->country_code,
            2,
            "country_code in Acquirer must have minlength of 2 $within"
        );
        !isset($this->country_code) || Assert::maxLength(
            $this->country_code,
            2,
            "country_code in Acquirer must have maxlength of 2 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['country_code'])) {
            $this->country_code = $data['country_code'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
