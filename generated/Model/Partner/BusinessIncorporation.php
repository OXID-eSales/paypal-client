<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Business incorporation information.
 *
 * generated from: customer_common-v1-schema-account_model-business_incorporation.json
 */
class BusinessIncorporation implements JsonSerializable
{
    use BaseModel;

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
    public $incorporation_country_code;

    /**
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     *
     * @var string | null
     * minLength: 10
     * maxLength: 10
     */
    public $incorporation_date;

    /**
     * The province of incorporation.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 50
     */
    public $incorporation_province_code;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->incorporation_country_code) || Assert::minLength(
            $this->incorporation_country_code,
            2,
            "incorporation_country_code in BusinessIncorporation must have minlength of 2 $within"
        );
        !isset($this->incorporation_country_code) || Assert::maxLength(
            $this->incorporation_country_code,
            2,
            "incorporation_country_code in BusinessIncorporation must have maxlength of 2 $within"
        );
        !isset($this->incorporation_date) || Assert::minLength(
            $this->incorporation_date,
            10,
            "incorporation_date in BusinessIncorporation must have minlength of 10 $within"
        );
        !isset($this->incorporation_date) || Assert::maxLength(
            $this->incorporation_date,
            10,
            "incorporation_date in BusinessIncorporation must have maxlength of 10 $within"
        );
        !isset($this->incorporation_province_code) || Assert::minLength(
            $this->incorporation_province_code,
            1,
            "incorporation_province_code in BusinessIncorporation must have minlength of 1 $within"
        );
        !isset($this->incorporation_province_code) || Assert::maxLength(
            $this->incorporation_province_code,
            50,
            "incorporation_province_code in BusinessIncorporation must have maxlength of 50 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['incorporation_country_code'])) {
            $this->incorporation_country_code = $data['incorporation_country_code'];
        }
        if (isset($data['incorporation_date'])) {
            $this->incorporation_date = $data['incorporation_date'];
        }
        if (isset($data['incorporation_province_code'])) {
            $this->incorporation_province_code = $data['incorporation_province_code'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
