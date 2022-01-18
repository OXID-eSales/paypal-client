<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * generated from: customer_common_overrides-business.json
 */
class Business implements JsonSerializable
{
    use BaseModel;

    /**
     * The type and subtype of the business.
     *
     * @var BusinessTypeInfo | null
     */
    public $business_type;

    /**
     * The category, subcategory and MCC code of the business.
     *
     * @var BusinessIndustry | null
     */
    public $business_industry;

    /**
     * Business incorporation information.
     *
     * @var BusinessIncorporation2 | null
     */
    public $business_incorporation;

    /**
     * Name of the business.
     *
     * @var BusinessNameDetail2[]
     * maxItems: 0
     * maxItems: 5
     */
    public $names;

    /**
     * Email addresses of the business.
     *
     * @var Email[]
     * maxItems: 0
     * maxItems: 5
     */
    public $emails;

    /**
     * Website of the business.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 50
     */
    public $website;

    /**
     * List of addresses associated with the business entity.
     *
     * @var BusinessAddressDetail2[]
     * maxItems: 0
     * maxItems: 5
     */
    public $addresses;

    /**
     * List of phone number associated with the business.
     *
     * @var BusinessPhoneDetail2[]
     * maxItems: 0
     * maxItems: 5
     */
    public $phones;

    /**
     * Business Party related Document data collected from the customer.. For example SSN, ITIN, Business
     * registration number that were collected from the user.
     *
     * @var BusinessDocument[]
     * maxItems: 0
     * maxItems: 20
     */
    public $documents;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->business_type) || Assert::isInstanceOf(
            $this->business_type,
            BusinessTypeInfo::class,
            "business_type in Business must be instance of BusinessTypeInfo $within"
        );
        !isset($this->business_type) ||  $this->business_type->validate(Business::class);
        !isset($this->business_industry) || Assert::isInstanceOf(
            $this->business_industry,
            BusinessIndustry::class,
            "business_industry in Business must be instance of BusinessIndustry $within"
        );
        !isset($this->business_industry) ||  $this->business_industry->validate(Business::class);
        !isset($this->business_incorporation) || Assert::isInstanceOf(
            $this->business_incorporation,
            BusinessIncorporation2::class,
            "business_incorporation in Business must be instance of BusinessIncorporation2 $within"
        );
        !isset($this->business_incorporation) ||  $this->business_incorporation->validate(Business::class);
        Assert::notNull($this->names, "names in Business must not be NULL $within");
        Assert::minCount(
            $this->names,
            0,
            "names in Business must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->names,
            5,
            "names in Business must have max. count of 5 $within"
        );
        Assert::isArray(
            $this->names,
            "names in Business must be array $within"
        );
        if (isset($this->names)) {
            foreach ($this->names as $item) {
                $item->validate(Business::class);
            }
        }
        Assert::notNull($this->emails, "emails in Business must not be NULL $within");
        Assert::minCount(
            $this->emails,
            0,
            "emails in Business must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->emails,
            5,
            "emails in Business must have max. count of 5 $within"
        );
        Assert::isArray(
            $this->emails,
            "emails in Business must be array $within"
        );
        if (isset($this->emails)) {
            foreach ($this->emails as $item) {
                $item->validate(Business::class);
            }
        }
        !isset($this->website) || Assert::minLength(
            $this->website,
            1,
            "website in Business must have minlength of 1 $within"
        );
        !isset($this->website) || Assert::maxLength(
            $this->website,
            50,
            "website in Business must have maxlength of 50 $within"
        );
        Assert::notNull($this->addresses, "addresses in Business must not be NULL $within");
        Assert::minCount(
            $this->addresses,
            0,
            "addresses in Business must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->addresses,
            5,
            "addresses in Business must have max. count of 5 $within"
        );
        Assert::isArray(
            $this->addresses,
            "addresses in Business must be array $within"
        );
        if (isset($this->addresses)) {
            foreach ($this->addresses as $item) {
                $item->validate(Business::class);
            }
        }
        Assert::notNull($this->phones, "phones in Business must not be NULL $within");
        Assert::minCount(
            $this->phones,
            0,
            "phones in Business must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->phones,
            5,
            "phones in Business must have max. count of 5 $within"
        );
        Assert::isArray(
            $this->phones,
            "phones in Business must be array $within"
        );
        if (isset($this->phones)) {
            foreach ($this->phones as $item) {
                $item->validate(Business::class);
            }
        }
        Assert::notNull($this->documents, "documents in Business must not be NULL $within");
        Assert::minCount(
            $this->documents,
            0,
            "documents in Business must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->documents,
            20,
            "documents in Business must have max. count of 20 $within"
        );
        Assert::isArray(
            $this->documents,
            "documents in Business must be array $within"
        );
        if (isset($this->documents)) {
            foreach ($this->documents as $item) {
                $item->validate(Business::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['business_type'])) {
            $this->business_type = new BusinessTypeInfo($data['business_type']);
        }
        if (isset($data['business_industry'])) {
            $this->business_industry = new BusinessIndustry($data['business_industry']);
        }
        if (isset($data['business_incorporation'])) {
            $this->business_incorporation = new BusinessIncorporation2($data['business_incorporation']);
        }
        if (isset($data['names'])) {
            $this->names = [];
            foreach ($data['names'] as $item) {
                $this->names[] = new BusinessNameDetail2($item);
            }
        }
        if (isset($data['emails'])) {
            $this->emails = [];
            foreach ($data['emails'] as $item) {
                $this->emails[] = new Email($item);
            }
        }
        if (isset($data['website'])) {
            $this->website = $data['website'];
        }
        if (isset($data['addresses'])) {
            $this->addresses = [];
            foreach ($data['addresses'] as $item) {
                $this->addresses[] = new BusinessAddressDetail2($item);
            }
        }
        if (isset($data['phones'])) {
            $this->phones = [];
            foreach ($data['phones'] as $item) {
                $this->phones[] = new BusinessPhoneDetail2($item);
            }
        }
        if (isset($data['documents'])) {
            $this->documents = [];
            foreach ($data['documents'] as $item) {
                $this->documents[] = new BusinessDocument($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->names = [];
        $this->emails = [];
        $this->addresses = [];
        $this->phones = [];
        $this->documents = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initBusinessType(): BusinessTypeInfo
    {
        return $this->business_type = new BusinessTypeInfo();
    }

    public function initBusinessIndustry(): BusinessIndustry
    {
        return $this->business_industry = new BusinessIndustry();
    }

    public function initBusinessIncorporation(): BusinessIncorporation2
    {
        return $this->business_incorporation = new BusinessIncorporation2();
    }
}
