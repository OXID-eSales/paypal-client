<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Business information.
 *
 * generated from: model-business.json
 */
class Business extends Party implements JsonSerializable
{
    use BaseModel;

    /** The any other business entity. */
    public const TYPE_ANY_OTHER_BUSINESS_ENTITY = 'ANY_OTHER_BUSINESS_ENTITY';

    /** The association. */
    public const TYPE_ASSOCIATION = 'ASSOCIATION';

    /** The corporation. */
    public const TYPE_CORPORATION = 'CORPORATION';

    /** The general partnership. */
    public const TYPE_GENERAL_PARTNERSHIP = 'GENERAL_PARTNERSHIP';

    /** The government. */
    public const TYPE_GOVERNMENT = 'GOVERNMENT';

    /** The individual. */
    public const TYPE_INDIVIDUAL = 'INDIVIDUAL';

    /** The limited liability partnership. */
    public const TYPE_LIMITED_LIABILITY_PARTNERSHIP = 'LIMITED_LIABILITY_PARTNERSHIP';

    /** The limited liability proprietors. */
    public const TYPE_LIMITED_LIABILITY_PROPRIETORS = 'LIMITED_LIABILITY_PROPRIETORS';

    /** The limited liability private corporation. */
    public const TYPE_LIMITED_LIABILITY_PRIVATE_CORPORATION = 'LIMITED_LIABILITY_PRIVATE_CORPORATION';

    /** The limited partnership. */
    public const TYPE_LIMITED_PARTNERSHIP = 'LIMITED_PARTNERSHIP';

    /** The limited partnership private corporation. */
    public const TYPE_LIMITED_PARTNERSHIP_PRIVATE_CORPORATION = 'LIMITED_PARTNERSHIP_PRIVATE_CORPORATION';

    /** The nonprofit. */
    public const TYPE_NONPROFIT = 'NONPROFIT';

    /** The only buy and send money. */
    public const TYPE_ONLY_BUY_OR_SEND_MONEY = 'ONLY_BUY_OR_SEND_MONEY';

    /** The other corporate body. */
    public const TYPE_OTHER_CORPORATE_BODY = 'OTHER_CORPORATE_BODY';

    /** The partnership. */
    public const TYPE_PARTNERSHIP = 'PARTNERSHIP';

    /** The private partnership. */
    public const TYPE_PRIVATE_PARTNERSHIP = 'PRIVATE_PARTNERSHIP';

    /** The proprietorship. */
    public const TYPE_PROPRIETORSHIP = 'PROPRIETORSHIP';

    /** The proprietorship craftsman. */
    public const TYPE_PROPRIETORSHIP_CRAFTSMAN = 'PROPRIETORSHIP_CRAFTSMAN';

    /** The proprietory company. */
    public const TYPE_PROPRIETORY_COMPANY = 'PROPRIETORY_COMPANY';

    /** The private corporation. */
    public const TYPE_PRIVATE_CORPORATION = 'PRIVATE_CORPORATION';

    /** The public company. */
    public const TYPE_PUBLIC_COMPANY = 'PUBLIC_COMPANY';

    /** The public corporation. */
    public const TYPE_PUBLIC_CORPORATION = 'PUBLIC_CORPORATION';

    /** The public partnership. */
    public const TYPE_PUBLIC_PARTNERSHIP = 'PUBLIC_PARTNERSHIP';

    /** A group of private owners who have registered their bsuiness. */
    public const TYPE_REGISTERED_COOPERATIVE = 'REGISTERED_COOPERATIVE';

    /**
     * Names of business.
     *
     * @var BusinessName[]
     * maxItems: 1
     * maxItems: 10
     */
    public $names;

    /**
     * The business types classified.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_ANY_OTHER_BUSINESS_ENTITY
     * @see TYPE_ASSOCIATION
     * @see TYPE_CORPORATION
     * @see TYPE_GENERAL_PARTNERSHIP
     * @see TYPE_GOVERNMENT
     * @see TYPE_INDIVIDUAL
     * @see TYPE_LIMITED_LIABILITY_PARTNERSHIP
     * @see TYPE_LIMITED_LIABILITY_PROPRIETORS
     * @see TYPE_LIMITED_LIABILITY_PRIVATE_CORPORATION
     * @see TYPE_LIMITED_PARTNERSHIP
     * @see TYPE_LIMITED_PARTNERSHIP_PRIVATE_CORPORATION
     * @see TYPE_NONPROFIT
     * @see TYPE_ONLY_BUY_OR_SEND_MONEY
     * @see TYPE_OTHER_CORPORATE_BODY
     * @see TYPE_PARTNERSHIP
     * @see TYPE_PRIVATE_PARTNERSHIP
     * @see TYPE_PROPRIETORSHIP
     * @see TYPE_PROPRIETORSHIP_CRAFTSMAN
     * @see TYPE_PROPRIETORY_COMPANY
     * @see TYPE_PRIVATE_CORPORATION
     * @see TYPE_PUBLIC_COMPANY
     * @see TYPE_PUBLIC_CORPORATION
     * @see TYPE_PUBLIC_PARTNERSHIP
     * @see TYPE_REGISTERED_COOPERATIVE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    /**
     * Business category information. Refer:
     * https://developer.paypal.com/docs/commerce-platform/reference/categories-subcategories/.
     *
     * @var BusinessCategory | null
     */
    public $category;

    /**
     * Identification details for the business.
     *
     * @var BusinessIdentification[]
     * maxItems: 1
     * maxItems: 30
     */
    public $identifications;

    /**
     * Description of business.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $description;

    /**
     * Beneficial owners of the business.
     *
     * @var Person[]
     * maxItems: 1
     * maxItems: 100
     */
    public $owners;

    /**
     * Web site url (online presence) for the business.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 100
     */
    public $url;

    /**
     * Customer care contact information.
     *
     * @var CustomerServiceContact | null
     */
    public $customer_service_contacts;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->names, "names in Business must not be NULL $within");
        Assert::minCount(
            $this->names,
            1,
            "names in Business must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->names,
            10,
            "names in Business must have max. count of 10 $within"
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
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in Business must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            255,
            "type in Business must have maxlength of 255 $within"
        );
        !isset($this->category) || Assert::isInstanceOf(
            $this->category,
            BusinessCategory::class,
            "category in Business must be instance of BusinessCategory $within"
        );
        !isset($this->category) ||  $this->category->validate(Business::class);
        Assert::notNull($this->identifications, "identifications in Business must not be NULL $within");
        Assert::minCount(
            $this->identifications,
            1,
            "identifications in Business must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->identifications,
            30,
            "identifications in Business must have max. count of 30 $within"
        );
        Assert::isArray(
            $this->identifications,
            "identifications in Business must be array $within"
        );
        if (isset($this->identifications)) {
            foreach ($this->identifications as $item) {
                $item->validate(Business::class);
            }
        }
        !isset($this->description) || Assert::minLength(
            $this->description,
            1,
            "description in Business must have minlength of 1 $within"
        );
        !isset($this->description) || Assert::maxLength(
            $this->description,
            255,
            "description in Business must have maxlength of 255 $within"
        );
        Assert::notNull($this->owners, "owners in Business must not be NULL $within");
        Assert::minCount(
            $this->owners,
            1,
            "owners in Business must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->owners,
            100,
            "owners in Business must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->owners,
            "owners in Business must be array $within"
        );
        if (isset($this->owners)) {
            foreach ($this->owners as $item) {
                $item->validate(Business::class);
            }
        }
        !isset($this->url) || Assert::minLength(
            $this->url,
            1,
            "url in Business must have minlength of 1 $within"
        );
        !isset($this->url) || Assert::maxLength(
            $this->url,
            100,
            "url in Business must have maxlength of 100 $within"
        );
        !isset($this->customer_service_contacts) || Assert::isInstanceOf(
            $this->customer_service_contacts,
            CustomerServiceContact::class,
            "customer_service_contacts in Business must be instance of CustomerServiceContact $within"
        );
        !isset($this->customer_service_contacts) ||  $this->customer_service_contacts->validate(Business::class);
    }

    private function map(array $data)
    {
        if (isset($data['names'])) {
            $this->names = [];
            foreach ($data['names'] as $item) {
                $this->names[] = new BusinessName($item);
            }
        }
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['category'])) {
            $this->category = new BusinessCategory($data['category']);
        }
        if (isset($data['identifications'])) {
            $this->identifications = [];
            foreach ($data['identifications'] as $item) {
                $this->identifications[] = new BusinessIdentification($item);
            }
        }
        if (isset($data['description'])) {
            $this->description = $data['description'];
        }
        if (isset($data['owners'])) {
            $this->owners = [];
            foreach ($data['owners'] as $item) {
                $this->owners[] = new Person($item);
            }
        }
        if (isset($data['url'])) {
            $this->url = $data['url'];
        }
        if (isset($data['customer_service_contacts'])) {
            $this->customer_service_contacts = new CustomerServiceContact($data['customer_service_contacts']);
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        $this->names = [];
        $this->identifications = [];
        $this->owners = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initCategory(): BusinessCategory
    {
        return $this->category = new BusinessCategory();
    }

    public function initCustomerServiceContacts(): CustomerServiceContact
    {
        return $this->customer_service_contacts = new CustomerServiceContact();
    }
}
