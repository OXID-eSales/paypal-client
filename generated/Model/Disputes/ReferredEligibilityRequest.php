<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * For a new third-party case, lists the eligible and ineligible dispute reasons. The customer can use the
 * eligible reasons to create a dispute. To check the eligibility of case creation, specify the encrypted
 * transaction ID.
 *
 * generated from: referred-eligibility_request.json
 */
class ReferredEligibilityRequest implements JsonSerializable
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
     * @var ReferredEligibilityRequestItem[] | null
     */
    public $disputed_items;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->transaction_id, "transaction_id in ReferredEligibilityRequest must not be NULL $within");
        Assert::minLength(
            $this->transaction_id,
            1,
            "transaction_id in ReferredEligibilityRequest must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->transaction_id,
            255,
            "transaction_id in ReferredEligibilityRequest must have maxlength of 255 $within"
        );
        !isset($this->disputed_items) || Assert::isArray(
            $this->disputed_items,
            "disputed_items in ReferredEligibilityRequest must be array $within"
        );
        if (isset($this->disputed_items)) {
            foreach ($this->disputed_items as $item) {
                $item->validate(ReferredEligibilityRequest::class);
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
                $this->disputed_items[] = new ReferredEligibilityRequestItem($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
