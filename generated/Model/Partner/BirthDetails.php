<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Date of birth data provided by the user
 *
 * generated from: customer_common-v1-schema-account_model-birth_details.json
 */
class BirthDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     *
     * @var string
     * minLength: 10
     * maxLength: 10
     */
    public $date_of_birth;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->date_of_birth, "date_of_birth in BirthDetails must not be NULL $within");
        Assert::minLength(
            $this->date_of_birth,
            10,
            "date_of_birth in BirthDetails must have minlength of 10 $within"
        );
        Assert::maxLength(
            $this->date_of_birth,
            10,
            "date_of_birth in BirthDetails must have maxlength of 10 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['date_of_birth'])) {
            $this->date_of_birth = $data['date_of_birth'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
