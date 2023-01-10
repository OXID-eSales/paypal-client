<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The level of protection offered as defined by [PayPal Seller Protection for
 * Merchants](https://www.paypal.com/us/webapps/mpp/security/seller-protection).
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-seller_protection.json
 */
class SellerProtection implements JsonSerializable
{
    use BaseModel;

    /** Your PayPal balance remains intact if the customer claims that they did not receive an item or the account holder claims that they did not authorize the payment. */
    const STATUS_ELIGIBLE = 'ELIGIBLE';

    /** Your PayPal balance remains intact if the customer claims that they did not receive an item. */
    const STATUS_PARTIALLY_ELIGIBLE = 'PARTIALLY_ELIGIBLE';

    /** This transaction is not eligible for seller protection. */
    const STATUS_NOT_ELIGIBLE = 'NOT_ELIGIBLE';

    /**
     * Indicates whether the transaction is eligible for seller protection. For information, see [PayPal Seller
     * Protection for Merchants](https://www.paypal.com/us/webapps/mpp/security/seller-protection).
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_ELIGIBLE
     * @see STATUS_PARTIALLY_ELIGIBLE
     * @see STATUS_NOT_ELIGIBLE
     * @var string | null
     */
    public $status;

    /**
     * An array of conditions that are covered for the transaction.
     *
     * @var string[] | null
     */
    public $dispute_categories;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->dispute_categories) || Assert::isArray(
            $this->dispute_categories,
            "dispute_categories in SellerProtection must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['dispute_categories'])) {
            $this->dispute_categories = [];
            foreach ($data['dispute_categories'] as $item) {
                $this->dispute_categories[] = $item;
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
