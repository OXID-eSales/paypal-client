<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Information needed to pay using Verkkopankki (Finnish Online Banking).
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-verkkopankki_request.json
 */
class VerkkopankkiRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The full name representation like Mr J Smith
     *
     * @var string
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
     * @var string
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
     * @var string
     * minLength: 2
     * maxLength: 2
     */
    public $country_code;

    /**
     * The numeric bank identifier of the account holder associated with this payment method. Valid bank ids at the
     * moment are 50 (Aktia), 3 (Danske Bank), 6 (Handelsbanken), 1 Nordea, 61 (Oma Säästöpankki), 2
     * (Osuuspankki), 51 (POP Pankki), (10) S-Pankki, (52) Säästöpankki, (5) Ålandsbanken
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $bank_id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->name, "name in VerkkopankkiRequest must not be NULL $within");
        Assert::minLength(
            $this->name,
            3,
            "name in VerkkopankkiRequest must have minlength of 3 $within"
        );
        Assert::maxLength(
            $this->name,
            300,
            "name in VerkkopankkiRequest must have maxlength of 300 $within"
        );
        Assert::notNull($this->email, "email in VerkkopankkiRequest must not be NULL $within");
        Assert::minLength(
            $this->email,
            3,
            "email in VerkkopankkiRequest must have minlength of 3 $within"
        );
        Assert::maxLength(
            $this->email,
            254,
            "email in VerkkopankkiRequest must have maxlength of 254 $within"
        );
        Assert::notNull($this->country_code, "country_code in VerkkopankkiRequest must not be NULL $within");
        Assert::minLength(
            $this->country_code,
            2,
            "country_code in VerkkopankkiRequest must have minlength of 2 $within"
        );
        Assert::maxLength(
            $this->country_code,
            2,
            "country_code in VerkkopankkiRequest must have maxlength of 2 $within"
        );
        !isset($this->bank_id) || Assert::minLength(
            $this->bank_id,
            1,
            "bank_id in VerkkopankkiRequest must have minlength of 1 $within"
        );
        !isset($this->bank_id) || Assert::maxLength(
            $this->bank_id,
            255,
            "bank_id in VerkkopankkiRequest must have maxlength of 255 $within"
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
        if (isset($data['bank_id'])) {
            $this->bank_id = $data['bank_id'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
