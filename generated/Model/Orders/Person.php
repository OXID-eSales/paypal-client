<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Person information.
 *
 * generated from: model-person.json
 */
class Person extends Party implements JsonSerializable
{
    use BaseModel;

    /**
     * Names of person.
     *
     * @var Name2[]
     * maxItems: 1
     * maxItems: 10
     */
    public $names;

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
    public $citizenship;

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
    public $birth_date;

    /**
     * Identity documents for the entity like passport number.
     *
     * @var IdentityDocument[]
     * maxItems: 1
     * maxItems: 10
     */
    public $identifications;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->names, "names in Person must not be NULL $within");
        Assert::minCount(
            $this->names,
            1,
            "names in Person must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->names,
            10,
            "names in Person must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->names,
            "names in Person must be array $within"
        );
        if (isset($this->names)) {
            foreach ($this->names as $item) {
                $item->validate(Person::class);
            }
        }
        !isset($this->citizenship) || Assert::minLength(
            $this->citizenship,
            2,
            "citizenship in Person must have minlength of 2 $within"
        );
        !isset($this->citizenship) || Assert::maxLength(
            $this->citizenship,
            2,
            "citizenship in Person must have maxlength of 2 $within"
        );
        !isset($this->birth_date) || Assert::minLength(
            $this->birth_date,
            10,
            "birth_date in Person must have minlength of 10 $within"
        );
        !isset($this->birth_date) || Assert::maxLength(
            $this->birth_date,
            10,
            "birth_date in Person must have maxlength of 10 $within"
        );
        Assert::notNull($this->identifications, "identifications in Person must not be NULL $within");
        Assert::minCount(
            $this->identifications,
            1,
            "identifications in Person must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->identifications,
            10,
            "identifications in Person must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->identifications,
            "identifications in Person must be array $within"
        );
        if (isset($this->identifications)) {
            foreach ($this->identifications as $item) {
                $item->validate(Person::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['names'])) {
            $this->names = [];
            foreach ($data['names'] as $item) {
                $this->names[] = new Name2($item);
            }
        }
        if (isset($data['citizenship'])) {
            $this->citizenship = $data['citizenship'];
        }
        if (isset($data['birth_date'])) {
            $this->birth_date = $data['birth_date'];
        }
        if (isset($data['identifications'])) {
            $this->identifications = [];
            foreach ($data['identifications'] as $item) {
                $this->identifications[] = new IdentityDocument($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        $this->names = [];
        $this->identifications = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
