<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized
 * payments, captured payments.
 *
 * generated from: model-update_payment_collection_request.json
 */
class UpdatePaymentCollectionRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of authorized payments for a purchase unit. A purchase unit can have zero or more authorized
     * payments.
     *
     * @var UpdateAuthorizationRequest[]
     * maxItems: 1
     * maxItems: 50
     */
    public $authorizations;

    /**
     * An array of captured payments for a purchase unit. A purchase unit can have zero or more captured payments.
     *
     * @var UpdateCaptureRequest[]
     * maxItems: 1
     * maxItems: 50
     */
    public $captures;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->authorizations, "authorizations in UpdatePaymentCollectionRequest must not be NULL $within");
        Assert::minCount(
            $this->authorizations,
            1,
            "authorizations in UpdatePaymentCollectionRequest must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->authorizations,
            50,
            "authorizations in UpdatePaymentCollectionRequest must have max. count of 50 $within"
        );
        Assert::isArray(
            $this->authorizations,
            "authorizations in UpdatePaymentCollectionRequest must be array $within"
        );
        if (isset($this->authorizations)) {
            foreach ($this->authorizations as $item) {
                $item->validate(UpdatePaymentCollectionRequest::class);
            }
        }
        Assert::notNull($this->captures, "captures in UpdatePaymentCollectionRequest must not be NULL $within");
        Assert::minCount(
            $this->captures,
            1,
            "captures in UpdatePaymentCollectionRequest must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->captures,
            50,
            "captures in UpdatePaymentCollectionRequest must have max. count of 50 $within"
        );
        Assert::isArray(
            $this->captures,
            "captures in UpdatePaymentCollectionRequest must be array $within"
        );
        if (isset($this->captures)) {
            foreach ($this->captures as $item) {
                $item->validate(UpdatePaymentCollectionRequest::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['authorizations'])) {
            $this->authorizations = [];
            foreach ($data['authorizations'] as $item) {
                $this->authorizations[] = new UpdateAuthorizationRequest($item);
            }
        }
        if (isset($data['captures'])) {
            $this->captures = [];
            foreach ($data['captures'] as $item) {
                $this->captures[] = new UpdateCaptureRequest($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->authorizations = [];
        $this->captures = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
