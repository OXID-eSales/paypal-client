<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The business name of the party.
 *
 * generated from:
 * MerchantsCommonComponentsSpecification-v1-schema-common_components-v4-schema-json-openapi-2.0-business_name.json
 */
class BusinessName implements JsonSerializable
{
    use BaseModel;

    /** The orthography cannot be determined. */
    const ORTHOGRAPHY_ZYYY = 'Zyyy';

    /** The orthography is unknown. */
    const ORTHOGRAPHY_ZZZZ = 'Zzzz';

    /** An angular form of Japanese writing for words of foreign origin. */
    const ORTHOGRAPHY_KANA = 'Kana';

    /** The Slavic languages alphabet. Used in eastern Europe. */
    const ORTHOGRAPHY_CYRL = 'Cyrl';

    /** The Arabic language alphabet. */
    const ORTHOGRAPHY_ARAB = 'Arab';

    /** The Armenian alphabet. */
    const ORTHOGRAPHY_ARMN = 'Armn';

    /** The Bengali alphabet. Used in eastern India. */
    const ORTHOGRAPHY_BENG = 'Beng';

    /** The Unified Canadian Aboriginal Syllabics alphabet. */
    const ORTHOGRAPHY_CANS = 'Cans';

    /** The Devanagari (Nagari) alphabet. */
    const ORTHOGRAPHY_DEVA = 'Deva';

    /** The Ethiopic alphabet. */
    const ORTHOGRAPHY_ETHI = 'Ethi';

    /** The Georgian (Mkhedruli and Mtavruli) alphabet. */
    const ORTHOGRAPHY_GEOR = 'Geor';

    /** The Greek alphabet. */
    const ORTHOGRAPHY_GREK = 'Grek';

    /** The Gujurati language alphabet. Used in western India. */
    const ORTHOGRAPHY_GUJR = 'Gujr';

    /** The Gurmukhi alphabet. Used in the northern Indian state of Punjab. */
    const ORTHOGRAPHY_GURU = 'Guru';

    /** The Han (Hanzi, Kanji, Hanja) alphabet. */
    const ORTHOGRAPHY_HANI = 'Hani';

    /** The Hebrew alphabet. */
    const ORTHOGRAPHY_HEBR = 'Hebr';

    /** The Javanese alphabet. */
    const ORTHOGRAPHY_JAVA = 'Java';

    /** The Japanese (alias for Han + Hiragana + Katakana) alphabet. */
    const ORTHOGRAPHY_JPAN = 'Jpan';

    /** The Khmer alphabet. */
    const ORTHOGRAPHY_KHMR = 'Khmr';

    /** The Kannada alphabet. Used in the southern Indian state of Karnataka. */
    const ORTHOGRAPHY_KNDA = 'Knda';

    /** Korean (alias for Hangul + Han). */
    const ORTHOGRAPHY_KORE = 'Kore';

    /** The Lao alphabet. */
    const ORTHOGRAPHY_LAOO = 'Laoo';

    /** The Latin alphabet. */
    const ORTHOGRAPHY_LATN = 'Latn';

    /** The Malayalam alphabet. Used in the southern Indian state of Kerala. */
    const ORTHOGRAPHY_MLYM = 'Mlym';

    /** The Mongolian alphabet. */
    const ORTHOGRAPHY_MONG = 'Mong';

    /** The Myanmar (Burmese) alphabet. */
    const ORTHOGRAPHY_MYMR = 'Mymr';

    /** The Oriya (Odia) alphabet. Used in the eastern Indian state of Odisha. */
    const ORTHOGRAPHY_ORYA = 'Orya';

    /** The Sinhala alphabet. */
    const ORTHOGRAPHY_SINH = 'Sinh';

    /** The Sundanese alphabet. */
    const ORTHOGRAPHY_SUND = 'Sund';

    /** The Syriac alphabet. */
    const ORTHOGRAPHY_SYRC = 'Syrc';

    /** The Tamil alphabet. Used in the southern Indian state of Tamilnadu. */
    const ORTHOGRAPHY_TAML = 'Taml';

    /** The Telugu language alphabet. Used in the southern Indian state of Andhra pradesh. */
    const ORTHOGRAPHY_TELU = 'Telu';

    /** The Thaana (Maldivian) alphabet. */
    const ORTHOGRAPHY_THAA = 'Thaa';

    /** The Thai alphabet. Used in Thailand. */
    const ORTHOGRAPHY_THAI = 'Thai';

    /** The Tibetan alphabet. */
    const ORTHOGRAPHY_TIBT = 'Tibt';

    /** The Yi alphabet. */
    const ORTHOGRAPHY_YIII = 'Yiii';

    /**
     * Required. The business name of the party.
     *
     * @var string | null
     * maxLength: 300
     */
    public $business_name;

    /**
     * The orthography type based on the ISO 15924 names for scripts. Scipts are chosen based on [most widely used
     * writing systems](https://www.worldatlas.com/articles/the-world-s-most-popular-writing-scripts.html).
     *
     * use one of constants defined in this class to set the value:
     * @see ORTHOGRAPHY_ZYYY
     * @see ORTHOGRAPHY_ZZZZ
     * @see ORTHOGRAPHY_KANA
     * @see ORTHOGRAPHY_CYRL
     * @see ORTHOGRAPHY_ARAB
     * @see ORTHOGRAPHY_ARMN
     * @see ORTHOGRAPHY_BENG
     * @see ORTHOGRAPHY_CANS
     * @see ORTHOGRAPHY_DEVA
     * @see ORTHOGRAPHY_ETHI
     * @see ORTHOGRAPHY_GEOR
     * @see ORTHOGRAPHY_GREK
     * @see ORTHOGRAPHY_GUJR
     * @see ORTHOGRAPHY_GURU
     * @see ORTHOGRAPHY_HANI
     * @see ORTHOGRAPHY_HEBR
     * @see ORTHOGRAPHY_JAVA
     * @see ORTHOGRAPHY_JPAN
     * @see ORTHOGRAPHY_KHMR
     * @see ORTHOGRAPHY_KNDA
     * @see ORTHOGRAPHY_KORE
     * @see ORTHOGRAPHY_LAOO
     * @see ORTHOGRAPHY_LATN
     * @see ORTHOGRAPHY_MLYM
     * @see ORTHOGRAPHY_MONG
     * @see ORTHOGRAPHY_MYMR
     * @see ORTHOGRAPHY_ORYA
     * @see ORTHOGRAPHY_SINH
     * @see ORTHOGRAPHY_SUND
     * @see ORTHOGRAPHY_SYRC
     * @see ORTHOGRAPHY_TAML
     * @see ORTHOGRAPHY_TELU
     * @see ORTHOGRAPHY_THAA
     * @see ORTHOGRAPHY_THAI
     * @see ORTHOGRAPHY_TIBT
     * @see ORTHOGRAPHY_YIII
     * @var string | null
     * minLength: 4
     * maxLength: 4
     */
    public $orthography;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->business_name) || Assert::maxLength(
            $this->business_name,
            300,
            "business_name in BusinessName must have maxlength of 300 $within"
        );
        !isset($this->orthography) || Assert::minLength(
            $this->orthography,
            4,
            "orthography in BusinessName must have minlength of 4 $within"
        );
        !isset($this->orthography) || Assert::maxLength(
            $this->orthography,
            4,
            "orthography in BusinessName must have maxlength of 4 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['business_name'])) {
            $this->business_name = $data['business_name'];
        }
        if (isset($data['orthography'])) {
            $this->orthography = $data['orthography'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
