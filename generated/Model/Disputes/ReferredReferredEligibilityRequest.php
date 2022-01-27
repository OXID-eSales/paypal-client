<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * For a new third-party case, lists the eligible and ineligible dispute reasons. The customer can use the
 * eligible reasons to create a dispute. To check the eligibility of case creation, specify the encrypted
 * transaction ID.
 *
 * generated from: referred-referred_eligibility_request.json
 */
class ReferredReferredEligibilityRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The encrypted transaction ID.
     *
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $transaction_id;

    /**
     * An array of the items in the disputed transaction.
     *
     * @var ReferredReferredEligibilityRequestItem[]
     * maxItems: 1
     * maxItems: 1000
     */
    public $disputed_items;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->transaction_id, "transaction_id in ReferredReferredEligibilityRequest must not be NULL $within");
        Assert::minLength(
            $this->transaction_id,
            1,
            "transaction_id in ReferredReferredEligibilityRequest must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->transaction_id,
            255,
            "transaction_id in ReferredReferredEligibilityRequest must have maxlength of 255 $within"
        );
        Assert::notNull($this->disputed_items, "disputed_items in ReferredReferredEligibilityRequest must not be NULL $within");
        Assert::minCount(
            $this->disputed_items,
            1,
            "disputed_items in ReferredReferredEligibilityRequest must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->disputed_items,
            1000,
            "disputed_items in ReferredReferredEligibilityRequest must have max. count of 1000 $within"
        );
        Assert::isArray(
            $this->disputed_items,
            "disputed_items in ReferredReferredEligibilityRequest must be array $within"
        );
        if (isset($this->disputed_items)) {
            foreach ($this->disputed_items as $item) {
                $item->validate(ReferredReferredEligibilityRequest::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['transaction_id'])) {
            $this->transaction_id = $data['transaction_id'];
        }
        if (isset($data['disputed_items'])) {
            $this->disputed_items = [];
            foreach ($data['disputed_items'] as $item) {
                $this->disputed_items[] = new ReferredReferredEligibilityRequestItem($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->disputed_items = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
