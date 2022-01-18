<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized
 * payments, captured payments, and refunds.
 *
 * generated from: payment_collection.json
 */
class PaymentCollection implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of authorized payments for a purchase unit. A purchase unit can have zero or more authorized
     * payments.
     *
     * @var AuthorizationWithAdditionalData[] | null
     */
    public $authorizations;

    /**
     * An array of captured payments for a purchase unit. A purchase unit can have zero or more captured payments.
     *
     * @var Capture[] | null
     */
    public $captures;

    /**
     * An array of refunds for a purchase unit. A purchase unit can have zero or more refunds.
     *
     * @var Refund[] | null
     */
    public $refunds;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->authorizations) || Assert::isArray(
            $this->authorizations,
            "authorizations in PaymentCollection must be array $within"
        );
        if (isset($this->authorizations)) {
            foreach ($this->authorizations as $item) {
                $item->validate(PaymentCollection::class);
            }
        }
        !isset($this->captures) || Assert::isArray(
            $this->captures,
            "captures in PaymentCollection must be array $within"
        );
        if (isset($this->captures)) {
            foreach ($this->captures as $item) {
                $item->validate(PaymentCollection::class);
            }
        }
        !isset($this->refunds) || Assert::isArray(
            $this->refunds,
            "refunds in PaymentCollection must be array $within"
        );
        if (isset($this->refunds)) {
            foreach ($this->refunds as $item) {
                $item->validate(PaymentCollection::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['authorizations'])) {
            $this->authorizations = [];
            foreach ($data['authorizations'] as $item) {
                $this->authorizations[] = new AuthorizationWithAdditionalData($item);
            }
        }
        if (isset($data['captures'])) {
            $this->captures = [];
            foreach ($data['captures'] as $item) {
                $this->captures[] = new Capture($item);
            }
        }
        if (isset($data['refunds'])) {
            $this->refunds = [];
            foreach ($data['refunds'] as $item) {
                $this->refunds[] = new Refund($item);
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
