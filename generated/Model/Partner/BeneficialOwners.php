<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Beneficial owners of the entity.
 *
 * generated from: customer_common_overrides-beneficial_owners.json
 */
class BeneficialOwners implements JsonSerializable
{
    use BaseModel;

    /**
     * Individual beneficial owners.
     *
     * @var IndividualBeneficialOwner[]
     * maxItems: 0
     * maxItems: 5
     */
    public $individual_beneficial_owners;

    /**
     * Business beneficial owners.
     *
     * @var BusinessBeneficialOwner[]
     * maxItems: 0
     * maxItems: 5
     */
    public $business_beneficial_owners;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->individual_beneficial_owners, "individual_beneficial_owners in BeneficialOwners must not be NULL $within");
        Assert::minCount(
            $this->individual_beneficial_owners,
            0,
            "individual_beneficial_owners in BeneficialOwners must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->individual_beneficial_owners,
            5,
            "individual_beneficial_owners in BeneficialOwners must have max. count of 5 $within"
        );
        Assert::isArray(
            $this->individual_beneficial_owners,
            "individual_beneficial_owners in BeneficialOwners must be array $within"
        );
        if (isset($this->individual_beneficial_owners)) {
            foreach ($this->individual_beneficial_owners as $item) {
                $item->validate(BeneficialOwners::class);
            }
        }
        Assert::notNull($this->business_beneficial_owners, "business_beneficial_owners in BeneficialOwners must not be NULL $within");
        Assert::minCount(
            $this->business_beneficial_owners,
            0,
            "business_beneficial_owners in BeneficialOwners must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->business_beneficial_owners,
            5,
            "business_beneficial_owners in BeneficialOwners must have max. count of 5 $within"
        );
        Assert::isArray(
            $this->business_beneficial_owners,
            "business_beneficial_owners in BeneficialOwners must be array $within"
        );
        if (isset($this->business_beneficial_owners)) {
            foreach ($this->business_beneficial_owners as $item) {
                $item->validate(BeneficialOwners::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['individual_beneficial_owners'])) {
            $this->individual_beneficial_owners = [];
            foreach ($data['individual_beneficial_owners'] as $item) {
                $this->individual_beneficial_owners[] = new IndividualBeneficialOwner($item);
            }
        }
        if (isset($data['business_beneficial_owners'])) {
            $this->business_beneficial_owners = [];
            foreach ($data['business_beneficial_owners'] as $item) {
                $this->business_beneficial_owners[] = new BusinessBeneficialOwner($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->individual_beneficial_owners = [];
        $this->business_beneficial_owners = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
