<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Business category information. Refer:
 * https://developer.paypal.com/docs/commerce-platform/reference/categories-subcategories/.
 *
 * generated from: model-business_category.json
 */
class BusinessCategory implements JsonSerializable
{
    use BaseModel;

    /**
     * Industry standard category code of business.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 50
     */
    public $category;

    /**
     * Industry standard sub category of business.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 50
     */
    public $sub_category;

    /**
     * Industry standard merchant category code of business.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 4
     */
    public $mcc_code;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->category) || Assert::minLength(
            $this->category,
            1,
            "category in BusinessCategory must have minlength of 1 $within"
        );
        !isset($this->category) || Assert::maxLength(
            $this->category,
            50,
            "category in BusinessCategory must have maxlength of 50 $within"
        );
        !isset($this->sub_category) || Assert::minLength(
            $this->sub_category,
            1,
            "sub_category in BusinessCategory must have minlength of 1 $within"
        );
        !isset($this->sub_category) || Assert::maxLength(
            $this->sub_category,
            50,
            "sub_category in BusinessCategory must have maxlength of 50 $within"
        );
        !isset($this->mcc_code) || Assert::minLength(
            $this->mcc_code,
            1,
            "mcc_code in BusinessCategory must have minlength of 1 $within"
        );
        !isset($this->mcc_code) || Assert::maxLength(
            $this->mcc_code,
            4,
            "mcc_code in BusinessCategory must have maxlength of 4 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['category'])) {
            $this->category = $data['category'];
        }
        if (isset($data['sub_category'])) {
            $this->sub_category = $data['sub_category'];
        }
        if (isset($data['mcc_code'])) {
            $this->mcc_code = $data['mcc_code'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
