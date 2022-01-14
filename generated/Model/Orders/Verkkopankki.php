<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Information used to pay using Verkkopankki (Finnish Online Banking).
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-verkkopankki.json
 */
class Verkkopankki implements JsonSerializable
{
    use BaseModel;

    /**
     * The full name representation like Mr J Smith
     *
     * @var string | null
     * minLength: 3
     * maxLength: 300
     */
    public $name;

    /**
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * @var string | null
     * minLength: 3
     * maxLength: 254
     */
    public $email;

    /**
     * The [two-character ISO 3166-1 code](/docs/integration/direct/rest/country-codes/) that identifies the country
     * or region.<blockquote><strong>Note:</strong> The country code for Great Britain is <code>GB</code> and not
     * <code>UK</code> as used in the top-level domain names for that country. Use the `C2` country code for China
     * worldwide for comparable uncontrolled price (CUP) method, bank card, and cross-border
     * transactions.</blockquote>
     *
     * @var string | null
     * minLength: 2
     * maxLength: 2
     */
    public $country_code;

    /**
     * The name of the bank used to fund this payment. Valid bank names at the moment are Aktia, Danske Bank,
     * Handelsbanken, Nordea, Oma Säästöpankki, Osuuspankki, POP Pankki, S-Pankki, Säästöpankki,
     * Ålandsbanken.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 300
     */
    public $bank_name;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength(
            $this->name,
            3,
            "name in Verkkopankki must have minlength of 3 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            300,
            "name in Verkkopankki must have maxlength of 300 $within"
        );
        !isset($this->email) || Assert::minLength(
            $this->email,
            3,
            "email in Verkkopankki must have minlength of 3 $within"
        );
        !isset($this->email) || Assert::maxLength(
            $this->email,
            254,
            "email in Verkkopankki must have maxlength of 254 $within"
        );
        !isset($this->country_code) || Assert::minLength(
            $this->country_code,
            2,
            "country_code in Verkkopankki must have minlength of 2 $within"
        );
        !isset($this->country_code) || Assert::maxLength(
            $this->country_code,
            2,
            "country_code in Verkkopankki must have maxlength of 2 $within"
        );
        !isset($this->bank_name) || Assert::minLength(
            $this->bank_name,
            1,
            "bank_name in Verkkopankki must have minlength of 1 $within"
        );
        !isset($this->bank_name) || Assert::maxLength(
            $this->bank_name,
            300,
            "bank_name in Verkkopankki must have maxlength of 300 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
        if (isset($data['country_code'])) {
            $this->country_code = $data['country_code'];
        }
        if (isset($data['bank_name'])) {
            $this->bank_name = $data['bank_name'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
