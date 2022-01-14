<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The business name of the party.
 *
 * generated from: customer_common-v1-schema-common_components-v4-schema-json-openapi-2.0-business_name.json
 */
class BusinessName implements JsonSerializable
{
    use BaseModel;

    /**
     * Required. The business name of the party.
     *
     * @var string | null
     * maxLength: 300
     */
    public $business_name;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->business_name) || Assert::maxLength(
            $this->business_name,
            300,
            "business_name in BusinessName must have maxlength of 300 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['business_name'])) {
            $this->business_name = $data['business_name'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
