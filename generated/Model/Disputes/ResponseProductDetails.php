<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The product information.
 *
 * generated from: response-product_details.json
 */
class ResponseProductDetails implements JsonSerializable
{
    use BaseModel;

    /** The product was received. */
    public const PRODUCT_RECEIVED_YES = 'YES';

    /** The product was not received. */
    public const PRODUCT_RECEIVED_NO = 'NO';

    /** The product was returned. */
    public const PRODUCT_RECEIVED_RETURNED = 'RETURNED';

    /**
     * The product description.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $description;

    /**
     * Indicates whether the product was, or was not, received or returned.
     *
     * use one of constants defined in this class to set the value:
     * @see PRODUCT_RECEIVED_YES
     * @see PRODUCT_RECEIVED_NO
     * @see PRODUCT_RECEIVED_RETURNED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $product_received;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $product_received_time;

    /**
     * An array of sub-reasons for the product issue.
     *
     * @var string[] | null
     */
    public $sub_reasons;

    /**
     * The URL where the customer purchased the product.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $purchase_url;

    /**
     * The return details for the product.
     *
     * @var ResponseReturnDetails | null
     */
    public $return_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->description) || Assert::minLength(
            $this->description,
            1,
            "description in ResponseProductDetails must have minlength of 1 $within"
        );
        !isset($this->description) || Assert::maxLength(
            $this->description,
            2000,
            "description in ResponseProductDetails must have maxlength of 2000 $within"
        );
        !isset($this->product_received) || Assert::minLength(
            $this->product_received,
            1,
            "product_received in ResponseProductDetails must have minlength of 1 $within"
        );
        !isset($this->product_received) || Assert::maxLength(
            $this->product_received,
            255,
            "product_received in ResponseProductDetails must have maxlength of 255 $within"
        );
        !isset($this->product_received_time) || Assert::minLength(
            $this->product_received_time,
            20,
            "product_received_time in ResponseProductDetails must have minlength of 20 $within"
        );
        !isset($this->product_received_time) || Assert::maxLength(
            $this->product_received_time,
            64,
            "product_received_time in ResponseProductDetails must have maxlength of 64 $within"
        );
        !isset($this->sub_reasons) || Assert::isArray(
            $this->sub_reasons,
            "sub_reasons in ResponseProductDetails must be array $within"
        );
        !isset($this->purchase_url) || Assert::minLength(
            $this->purchase_url,
            1,
            "purchase_url in ResponseProductDetails must have minlength of 1 $within"
        );
        !isset($this->purchase_url) || Assert::maxLength(
            $this->purchase_url,
            2000,
            "purchase_url in ResponseProductDetails must have maxlength of 2000 $within"
        );
        !isset($this->return_details) || Assert::isInstanceOf(
            $this->return_details,
            ResponseReturnDetails::class,
            "return_details in ResponseProductDetails must be instance of ResponseReturnDetails $within"
        );
        !isset($this->return_details) ||  $this->return_details->validate(ResponseProductDetails::class);
    }

    private function map(array $data)
    {
        if (isset($data['description'])) {
            $this->description = $data['description'];
        }
        if (isset($data['product_received'])) {
            $this->product_received = $data['product_received'];
        }
        if (isset($data['product_received_time'])) {
            $this->product_received_time = $data['product_received_time'];
        }
        if (isset($data['sub_reasons'])) {
            $this->sub_reasons = [];
            foreach ($data['sub_reasons'] as $item) {
                $this->sub_reasons[] = $item;
            }
        }
        if (isset($data['purchase_url'])) {
            $this->purchase_url = $data['purchase_url'];
        }
        if (isset($data['return_details'])) {
            $this->return_details = new ResponseReturnDetails($data['return_details']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initReturnDetails(): ResponseReturnDetails
    {
        return $this->return_details = new ResponseReturnDetails();
    }
}
