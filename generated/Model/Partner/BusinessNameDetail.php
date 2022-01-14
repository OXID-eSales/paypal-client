<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Name of the business provided.
 *
 * generated from: customer_common-v1-schema-account_model-business_name_detail.json
 */
class BusinessNameDetail extends BusinessName implements JsonSerializable
{
    use BaseModel;

    /** The trading name of the business. */
    public const TYPE_DOING_BUSINESS_AS = 'DOING_BUSINESS_AS';

    /** The legal name of the business. */
    public const TYPE_LEGAL_NAME = 'LEGAL_NAME';

    /**
     * The encrypted ID for the business name.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 20
     */
    public $id;

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
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in BusinessNameDetail must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            20,
            "id in BusinessNameDetail must have maxlength of 20 $within"
        );
        Assert::notNull($this->type, "type in BusinessNameDetail must not be NULL $within");
        Assert::minLength(
            $this->type,
            1,
            "type in BusinessNameDetail must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->type,
            255,
            "type in BusinessNameDetail must have maxlength of 255 $within"
        );
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
        parent::__construct($data);
        if (isset($data)) {
            $this->map($data);
        }
    }
}
