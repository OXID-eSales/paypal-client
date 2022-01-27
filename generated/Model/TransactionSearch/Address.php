<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A simple postal address with coarse-grained fields. Do not use for an international address. Use for backward
 * compatibility only. Does not contain phone.
 *
 * generated from: common_components-v3-schema-json-openapi-2.0-address.json
 */
class Address implements JsonSerializable
{
    use BaseModel;

    /**
     * The first line of the address. For example, number or street.
     *
     * @var string
     */
    public $line1;

    /**
     * The second line of the address. For example, suite or apartment number.
     *
     * @var string | null
     */
    public $line2;

    /**
     * The city name.
     *
     * @var string
     */
    public $city;

    /**
     * The [code](/docs/api/reference/state-codes/) for a US state or the equivalent for other countries. Required
     * for transactions if the address is in one of these countries:
     * [Argentina](/docs/api/reference/state-codes/#argentina), [Brazil](/docs/api/reference/state-codes/#brazil),
     * [Canada](/docs/api/reference/state-codes/#canada), [China](/docs/api/reference/state-codes/#china),
     * [India](/docs/api/reference/state-codes/#india), [Italy](/docs/api/reference/state-codes/#italy),
     * [Japan](/docs/api/reference/state-codes/#japan), [Mexico](/docs/api/reference/state-codes/#mexico),
     * [Thailand](/docs/api/reference/state-codes/#thailand), or [United
     * States](/docs/api/reference/state-codes/#usa). Maximum length is 40 single-byte characters.
     *
     * @var string | null
     */
    public $state;

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
     * The postal code, which is the zip code or equivalent. Typically required for countries with a postal code or
     * an equivalent. See [postal code](https://en.wikipedia.org/wiki/Postal_code).
     *
     * @var string | null
     */
    public $postal_code;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->line1, "line1 in Address must not be NULL $within");
        Assert::notNull($this->city, "city in Address must not be NULL $within");
        Assert::notNull($this->country_code, "country_code in Address must not be NULL $within");
        Assert::minLength(
            $this->country_code,
            2,
            "country_code in Address must have minlength of 2 $within"
        );
        Assert::maxLength(
            $this->country_code,
            2,
            "country_code in Address must have maxlength of 2 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['line1'])) {
            $this->line1 = $data['line1'];
        }
        if (isset($data['line2'])) {
            $this->line2 = $data['line2'];
        }
        if (isset($data['city'])) {
            $this->city = $data['city'];
        }
        if (isset($data['state'])) {
            $this->state = $data['state'];
        }
        if (isset($data['country_code'])) {
            $this->country_code = $data['country_code'];
        }
        if (isset($data['postal_code'])) {
            $this->postal_code = $data['postal_code'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
