<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The airline passenger details.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-airline_passenger.json
 */
class AirlinePassenger implements JsonSerializable
{
    use BaseModel;

    /**
     * The name of the party.
     *
     * @var Name2 | null
     */
    public $name;

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
    public $date_of_birth;

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
     * The card holder-supplied code to the merchant. Can be used for passing in the frequent flyer number of the
     * customer.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 17
     */
    public $customer_code;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::isInstanceOf(
            $this->name,
            Name2::class,
            "name in AirlinePassenger must be instance of Name2 $within"
        );
        !isset($this->name) ||  $this->name->validate(AirlinePassenger::class);
        !isset($this->date_of_birth) || Assert::minLength(
            $this->date_of_birth,
            10,
            "date_of_birth in AirlinePassenger must have minlength of 10 $within"
        );
        !isset($this->date_of_birth) || Assert::maxLength(
            $this->date_of_birth,
            10,
            "date_of_birth in AirlinePassenger must have maxlength of 10 $within"
        );
        !isset($this->country_code) || Assert::minLength(
            $this->country_code,
            2,
            "country_code in AirlinePassenger must have minlength of 2 $within"
        );
        !isset($this->country_code) || Assert::maxLength(
            $this->country_code,
            2,
            "country_code in AirlinePassenger must have maxlength of 2 $within"
        );
        !isset($this->customer_code) || Assert::minLength(
            $this->customer_code,
            1,
            "customer_code in AirlinePassenger must have minlength of 1 $within"
        );
        !isset($this->customer_code) || Assert::maxLength(
            $this->customer_code,
            17,
            "customer_code in AirlinePassenger must have maxlength of 17 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = new Name2($data['name']);
        }
        if (isset($data['date_of_birth'])) {
            $this->date_of_birth = $data['date_of_birth'];
        }
        if (isset($data['country_code'])) {
            $this->country_code = $data['country_code'];
        }
        if (isset($data['customer_code'])) {
            $this->customer_code = $data['customer_code'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initName(): Name2
    {
        return $this->name = new Name2();
    }
}
