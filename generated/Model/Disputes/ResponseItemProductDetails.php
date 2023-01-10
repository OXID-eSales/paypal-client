<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The product information - item.
 *
 * generated from: response-item_product_details.json
 */
class ResponseItemProductDetails implements JsonSerializable
{
    use BaseModel;

    /** The product was damaged. */
    const SUB_REASON_DAMAGED = 'DAMAGED';

    /** The product was different from what was expected. */
    const SUB_REASON_DIFFERENT = 'DIFFERENT';

    /** The product had missing parts. */
    const SUB_REASON_MISSING_PARTS = 'MISSING_PARTS';

    /** The product was defective. */
    const SUB_REASON_DEFECTIVE = 'DEFECTIVE';

    /** The product was counterfeit. */
    const SUB_REASON_COUNTERFEIT = 'COUNTERFEIT';

    /** The package was empty. */
    const SUB_REASON_EMPTY = 'EMPTY';

    /** The product stopped functioning. */
    const SUB_REASON_NOT_WORKING = 'NOT_WORKING';

    /** The product was not delivered. */
    const SUB_REASON_NOT_DELIVERED = 'NOT_DELIVERED';

    /** The tracking info was not received. */
    const SUB_REASON_TRACKING_INFO_NOT_RECEIVED = 'TRACKING_INFO_NOT_RECEIVED';

    /** The product was not available during a store pick up. */
    const SUB_REASON_STORE_PICKUP_UNAVAILABLE = 'STORE_PICKUP_UNAVAILABLE';

    /** The product was delivered to the wrong shipping address. */
    const SUB_REASON_WRONGLY_DELIVERED = 'WRONGLY_DELIVERED';

    /** The customer was not satisfied with the delivered product. */
    const SUB_REASON_NOT_SATISFIED = 'NOT_SATISFIED';

    /** The customer received an item which is not related to the order. */
    const SUB_REASON_UNRELATED = 'UNRELATED';

    /** The product was cancelled. */
    const SUB_REASON_CANCELLED = 'CANCELLED';

    /** The product was returned. */
    const SUB_REASON_RETURNED = 'RETURNED';

    /** The product was delivered with delay. */
    const SUB_REASON_DELAYED = 'DELAYED';

    /** Computer or related accessories. */
    const CATEGORY_COMPUTERS = 'COMPUTERS';

    /** Home goods, appliances and so on. */
    const CATEGORY_HOME = 'HOME';

    /** Decorative items, ornaments, and so on. */
    const CATEGORY_JEWELRY = 'JEWELRY';

    /** Antiques and collectible items. */
    const CATEGORY_ANTIQUES = 'ANTIQUES';

    /** Entertainment goods, such as video games, DVDs, and so on. */
    const CATEGORY_ENTERTAINMENT = 'ENTERTAINMENT';

    /** Vehicle needs. */
    const CATEGORY_VEHICLE = 'VEHICLE';

    /** Gift or pre-paid cards. */
    const CATEGORY_GIFT_CARD = 'GIFT_CARD';

    /** Other material goods. */
    const CATEGORY_OTHER = 'OTHER';

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
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $expected_delivery_time;

    /**
     * The item level sub-reason for the product issue.
     *
     * use one of constants defined in this class to set the value:
     * @see SUB_REASON_DAMAGED
     * @see SUB_REASON_DIFFERENT
     * @see SUB_REASON_MISSING_PARTS
     * @see SUB_REASON_DEFECTIVE
     * @see SUB_REASON_COUNTERFEIT
     * @see SUB_REASON_EMPTY
     * @see SUB_REASON_NOT_WORKING
     * @see SUB_REASON_NOT_DELIVERED
     * @see SUB_REASON_TRACKING_INFO_NOT_RECEIVED
     * @see SUB_REASON_STORE_PICKUP_UNAVAILABLE
     * @see SUB_REASON_WRONGLY_DELIVERED
     * @see SUB_REASON_NOT_SATISFIED
     * @see SUB_REASON_UNRELATED
     * @see SUB_REASON_CANCELLED
     * @see SUB_REASON_RETURNED
     * @see SUB_REASON_DELAYED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $sub_reason;

    /**
     * The product category of the item in dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see CATEGORY_COMPUTERS
     * @see CATEGORY_HOME
     * @see CATEGORY_JEWELRY
     * @see CATEGORY_ANTIQUES
     * @see CATEGORY_ENTERTAINMENT
     * @see CATEGORY_VEHICLE
     * @see CATEGORY_GIFT_CARD
     * @see CATEGORY_OTHER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $category;

    /**
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     *
     * @var AddressPortable | null
     */
    public $expected_delivery_address;

    /**
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     *
     * @var AddressPortable | null
     */
    public $delivered_address;

    /**
     * The URL where the customer purchased the product.
     *
     * @var string | null
     */
    public $purchase_url;

    /**
     * The return details for the product - item.
     *
     * @var ResponseItemReturnDetails | null
     */
    public $return_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->product_received_time) || Assert::minLength(
            $this->product_received_time,
            20,
            "product_received_time in ResponseItemProductDetails must have minlength of 20 $within"
        );
        !isset($this->product_received_time) || Assert::maxLength(
            $this->product_received_time,
            64,
            "product_received_time in ResponseItemProductDetails must have maxlength of 64 $within"
        );
        !isset($this->expected_delivery_time) || Assert::minLength(
            $this->expected_delivery_time,
            20,
            "expected_delivery_time in ResponseItemProductDetails must have minlength of 20 $within"
        );
        !isset($this->expected_delivery_time) || Assert::maxLength(
            $this->expected_delivery_time,
            64,
            "expected_delivery_time in ResponseItemProductDetails must have maxlength of 64 $within"
        );
        !isset($this->sub_reason) || Assert::minLength(
            $this->sub_reason,
            1,
            "sub_reason in ResponseItemProductDetails must have minlength of 1 $within"
        );
        !isset($this->sub_reason) || Assert::maxLength(
            $this->sub_reason,
            255,
            "sub_reason in ResponseItemProductDetails must have maxlength of 255 $within"
        );
        !isset($this->category) || Assert::minLength(
            $this->category,
            1,
            "category in ResponseItemProductDetails must have minlength of 1 $within"
        );
        !isset($this->category) || Assert::maxLength(
            $this->category,
            255,
            "category in ResponseItemProductDetails must have maxlength of 255 $within"
        );
        !isset($this->expected_delivery_address) || Assert::isInstanceOf(
            $this->expected_delivery_address,
            AddressPortable::class,
            "expected_delivery_address in ResponseItemProductDetails must be instance of AddressPortable $within"
        );
        !isset($this->expected_delivery_address) ||  $this->expected_delivery_address->validate(ResponseItemProductDetails::class);
        !isset($this->delivered_address) || Assert::isInstanceOf(
            $this->delivered_address,
            AddressPortable::class,
            "delivered_address in ResponseItemProductDetails must be instance of AddressPortable $within"
        );
        !isset($this->delivered_address) ||  $this->delivered_address->validate(ResponseItemProductDetails::class);
        !isset($this->return_details) || Assert::isInstanceOf(
            $this->return_details,
            ResponseItemReturnDetails::class,
            "return_details in ResponseItemProductDetails must be instance of ResponseItemReturnDetails $within"
        );
        !isset($this->return_details) ||  $this->return_details->validate(ResponseItemProductDetails::class);
    }

    private function map(array $data)
    {
        if (isset($data['product_received_time'])) {
            $this->product_received_time = $data['product_received_time'];
        }
        if (isset($data['expected_delivery_time'])) {
            $this->expected_delivery_time = $data['expected_delivery_time'];
        }
        if (isset($data['sub_reason'])) {
            $this->sub_reason = $data['sub_reason'];
        }
        if (isset($data['category'])) {
            $this->category = $data['category'];
        }
        if (isset($data['expected_delivery_address'])) {
            $this->expected_delivery_address = new AddressPortable($data['expected_delivery_address']);
        }
        if (isset($data['delivered_address'])) {
            $this->delivered_address = new AddressPortable($data['delivered_address']);
        }
        if (isset($data['purchase_url'])) {
            $this->purchase_url = $data['purchase_url'];
        }
        if (isset($data['return_details'])) {
            $this->return_details = new ResponseItemReturnDetails($data['return_details']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initExpectedDeliveryAddress(): AddressPortable
    {
        return $this->expected_delivery_address = new AddressPortable();
    }

    public function initDeliveredAddress(): AddressPortable
    {
        return $this->delivered_address = new AddressPortable();
    }

    public function initReturnDetails(): ResponseItemReturnDetails
    {
        return $this->return_details = new ResponseItemReturnDetails();
    }
}
