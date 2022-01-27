<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Common account object to hold the account related details of the customer.
 *
 * generated from: customer_common_overrides-account.json
 */
class Account implements JsonSerializable
{
    use BaseModel;

    /**
     * List of owners in the account. There should be only one primary account owner which is mentioned in their
     * role_type.
     *
     * @var IndividualOwner[]
     * maxItems: 0
     * maxItems: 2
     */
    public $individual_owners;

    /**
     * Business entity of the account.
     *
     * @var AccountBusinessEntity | null
     */
    public $business_entity;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->individual_owners, "individual_owners in Account must not be NULL $within");
        Assert::minCount(
            $this->individual_owners,
            0,
            "individual_owners in Account must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->individual_owners,
            2,
            "individual_owners in Account must have max. count of 2 $within"
        );
        Assert::isArray(
            $this->individual_owners,
            "individual_owners in Account must be array $within"
        );
        if (isset($this->individual_owners)) {
            foreach ($this->individual_owners as $item) {
                $item->validate(Account::class);
            }
        }
        !isset($this->business_entity) || Assert::isInstanceOf(
            $this->business_entity,
            AccountBusinessEntity::class,
            "business_entity in Account must be instance of AccountBusinessEntity $within"
        );
        !isset($this->business_entity) ||  $this->business_entity->validate(Account::class);
    }

    private function map(array $data)
    {
        if (isset($data['individual_owners'])) {
            $this->individual_owners = [];
            foreach ($data['individual_owners'] as $item) {
                $this->individual_owners[] = new IndividualOwner($item);
            }
        }
        if (isset($data['business_entity'])) {
            $this->business_entity = new AccountBusinessEntity($data['business_entity']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->individual_owners = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initBusinessEntity(): AccountBusinessEntity
    {
        return $this->business_entity = new AccountBusinessEntity();
    }
}
