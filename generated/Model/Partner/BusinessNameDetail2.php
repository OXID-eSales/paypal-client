<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Name of the business provided.
 *
 * generated from:
 * customized_x_unsupported_1503_customer_common-v1-schema-account_model-business_name_detail.json
 */
class BusinessNameDetail2 extends BusinessName implements JsonSerializable
{
    use BaseModel;

    /** The trading name of the business. */
    public const TYPE_DOING_BUSINESS_AS = 'DOING_BUSINESS_AS';

    /** The legal name of the business. */
    public const TYPE_LEGAL_NAME = 'LEGAL_NAME';

    /**
     * Business name type
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_DOING_BUSINESS_AS
     * @see TYPE_LEGAL_NAME
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->type, "type in BusinessNameDetail2 must not be NULL $within");
        Assert::minLength(
            $this->type,
            1,
            "type in BusinessNameDetail2 must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->type,
            255,
            "type in BusinessNameDetail2 must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        if (isset($data)) {
            $this->map($data);
        }
    }
}
