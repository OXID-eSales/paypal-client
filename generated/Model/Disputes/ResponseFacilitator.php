<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A resource representing a Facilitator/Partner who facilitates a transaction.
 *
 * generated from: response-facilitator.json
 */
class ResponseFacilitator implements JsonSerializable
{
    use BaseModel;

    /**
     * The name of the Facilitator.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $name;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength(
            $this->name,
            1,
            "name in ResponseFacilitator must have minlength of 1 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            2000,
            "name in ResponseFacilitator must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
