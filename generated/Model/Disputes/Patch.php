<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The JSON patch object to apply partial updates to resources.
 *
 * generated from: common_components-v3-schema-json-openapi-2.0-patch.json
 */
class Patch implements JsonSerializable
{
    use BaseModel;

    /**
     * The operation to complete.
     *
     * @var string
     */
    public $op;

    /**
     * The JSON pointer to the target document location at which to complete the operation.
     *
     * @var string | null
     */
    public $path;

    /**
     * The value to apply. The `remove` operation does not require a value.
     *
     * @var number|integer|string|boolean|null|array|object | null
     */
    public $value;

    /**
     * The JSON pointer to the target document location from which to move the value. Required for the `move`
     * operation.
     *
     * @var string | null
     */
    public $from;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->op, "op in Patch must not be NULL $within");
    }

    private function map(array $data)
    {
        if (isset($data['op'])) {
            $this->op = $data['op'];
        }
        if (isset($data['path'])) {
            $this->path = $data['path'];
        }
        if (isset($data['value'])) {
            $this->value = $data['value'];
        }
        if (isset($data['from'])) {
            $this->from = $data['from'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
