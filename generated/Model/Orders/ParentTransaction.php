<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Information about the parent transaction.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-parent_transaction.json
 */
class ParentTransaction implements JsonSerializable
{
    use BaseModel;

    /** The parent transaction is an authorization. */
    public const TYPE_AUTHORIZATION = 'AUTHORIZATION';

    /** The parent transaction is an order. */
    public const TYPE_ORDER = 'ORDER';

    /**
     * The PayPal-generated ID for Authorization or Order this transaction is capturing.
     *
     * @var string | null
     */
    public $id;

    /**
     * The payment type the parent transaction.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_AUTHORIZATION
     * @see TYPE_ORDER
     * @var string | null
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
