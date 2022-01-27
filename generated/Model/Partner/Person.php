<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Details of the person or party.
 *
 * generated from: customer_common_overrides-person.json
 */
class Person implements JsonSerializable
{
    use BaseModel;

    /**
     * The encrypted party ID.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 20
     */
    public $id;

    /**
     * The internal PayPal party ID.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 20
     */
    public $party_id;

    /**
     * The name of the person.
     *
     * @var PersonName[]
     * maxItems: 0
     * maxItems: 5
     */
    public $names;

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
    public $citizenship;

    /**
     * The list of addresses associated with the person.
     *
     * @var PersonAddressDetail2[]
     * maxItems: 0
     * maxItems: 5
     */
    public $addresses;

    /**
     * The list of phone numbers associated with the person.
     *
     * @var PersonPhoneDetail2[]
     * maxItems: 0
     * maxItems: 5
     */
    public $phones;

    /**
     * Date of birth data provided by the user
     *
     * @var BirthDetails | null
     */
    public $birth_details;

    /**
     * A person's or party's related document data collected from the customer. For example SSN, ITIN, or business
     * registration number collected from the user. <blockquote><strong>Note:</strong> This field is not applicable
     * for POST [/v2/customer/partner-referrals](/docs/api/partner-referrals/v2/#partner-referrals_create) API
     * calls.</blockquote>
     *
     * @var PersonDocument[]
     * maxItems: 0
     * maxItems: 20
     */
    public $documents;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in Person must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            20,
            "id in Person must have maxlength of 20 $within"
        );
        !isset($this->party_id) || Assert::minLength(
            $this->party_id,
            1,
            "party_id in Person must have minlength of 1 $within"
        );
        !isset($this->party_id) || Assert::maxLength(
            $this->party_id,
            20,
            "party_id in Person must have maxlength of 20 $within"
        );
        Assert::notNull($this->names, "names in Person must not be NULL $within");
        Assert::minCount(
            $this->names,
            0,
            "names in Person must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->names,
            5,
            "names in Person must have max. count of 5 $within"
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
        Assert::notNull($this->addresses, "addresses in Person must not be NULL $within");
        Assert::minCount(
            $this->addresses,
            0,
            "addresses in Person must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->addresses,
            5,
            "addresses in Person must have max. count of 5 $within"
        );
        Assert::isArray(
            $this->addresses,
            "addresses in Person must be array $within"
        );
        if (isset($this->addresses)) {
            foreach ($this->addresses as $item) {
                $item->validate(Person::class);
            }
        }
        Assert::notNull($this->phones, "phones in Person must not be NULL $within");
        Assert::minCount(
            $this->phones,
            0,
            "phones in Person must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->phones,
            5,
            "phones in Person must have max. count of 5 $within"
        );
        Assert::isArray(
            $this->phones,
            "phones in Person must be array $within"
        );
        if (isset($this->phones)) {
            foreach ($this->phones as $item) {
                $item->validate(Person::class);
            }
        }
        !isset($this->birth_details) || Assert::isInstanceOf(
            $this->birth_details,
            BirthDetails::class,
            "birth_details in Person must be instance of BirthDetails $within"
        );
        !isset($this->birth_details) ||  $this->birth_details->validate(Person::class);
        Assert::notNull($this->documents, "documents in Person must not be NULL $within");
        Assert::minCount(
            $this->documents,
            0,
            "documents in Person must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->documents,
            20,
            "documents in Person must have max. count of 20 $within"
        );
        Assert::isArray(
            $this->documents,
            "documents in Person must be array $within"
        );
        if (isset($this->documents)) {
            foreach ($this->documents as $item) {
                $item->validate(Person::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['party_id'])) {
            $this->party_id = $data['party_id'];
        }
        if (isset($data['names'])) {
            $this->names = [];
            foreach ($data['names'] as $item) {
                $this->names[] = new PersonName($item);
            }
        }
        if (isset($data['citizenship'])) {
            $this->citizenship = $data['citizenship'];
        }
        if (isset($data['addresses'])) {
            $this->addresses = [];
            foreach ($data['addresses'] as $item) {
                $this->addresses[] = new PersonAddressDetail2($item);
            }
        }
        if (isset($data['phones'])) {
            $this->phones = [];
            foreach ($data['phones'] as $item) {
                $this->phones[] = new PersonPhoneDetail2($item);
            }
        }
        if (isset($data['birth_details'])) {
            $this->birth_details = new BirthDetails($data['birth_details']);
        }
        if (isset($data['documents'])) {
            $this->documents = [];
            foreach ($data['documents'] as $item) {
                $this->documents[] = new PersonDocument($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->names = [];
        $this->addresses = [];
        $this->phones = [];
        $this->documents = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initBirthDetails(): BirthDetails
    {
        return $this->birth_details = new BirthDetails();
    }
}
