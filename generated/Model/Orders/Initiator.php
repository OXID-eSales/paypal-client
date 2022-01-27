<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The initiator product for current transaction. This object determines the layer through which the transaction
 * is initiated.
 *
 * generated from:
 * MerchantsCommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-initiator.json
 */
class Initiator implements JsonSerializable
{
    use BaseModel;

    /** The payment acceptance solution is express checkout. */
    public const PRODUCT_CODE_EXPRESS_CHECKOUT = 'EXPRESS_CHECKOUT';

    /** The payment acceptance solution is website payment standard. */
    public const PRODUCT_CODE_WEBSITE_PAYMENTS_STANDARD = 'WEBSITE_PAYMENTS_STANDARD';

    /**
     * Types of the payment acceptance solution. The values for this field should be subset of original product_code,
     * see client_configuration#product_code.
     *
     * use one of constants defined in this class to set the value:
     * @see PRODUCT_CODE_EXPRESS_CHECKOUT
     * @see PRODUCT_CODE_WEBSITE_PAYMENTS_STANDARD
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $product_code;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->product_code) || Assert::minLength(
            $this->product_code,
            1,
            "product_code in Initiator must have minlength of 1 $within"
        );
        !isset($this->product_code) || Assert::maxLength(
            $this->product_code,
            255,
            "product_code in Initiator must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['product_code'])) {
            $this->product_code = $data['product_code'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
