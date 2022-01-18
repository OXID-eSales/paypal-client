<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The credit not processed details.
 *
 * generated from: response-credit_not_processed.json
 */
class ResponseCreditNotProcessed implements JsonSerializable
{
    use BaseModel;

    /** The product has an issue. */
    public const ISSUE_TYPE_PRODUCT = 'PRODUCT';

    /** The service has an issue. */
    public const ISSUE_TYPE_SERVICE = 'SERVICE';

    /**
     * The issue type.
     *
     * use one of constants defined in this class to set the value:
     * @see ISSUE_TYPE_PRODUCT
     * @see ISSUE_TYPE_SERVICE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $issue_type;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $expected_refund;

    /**
     * The cancellation details.
     *
     * @var ResponseCancellationDetails | null
     */
    public $cancellation_details;

    /**
     * The product information.
     *
     * @var ResponseProductDetails | null
     */
    public $product_details;

    /**
     * The service details.
     *
     * @var ResponseServiceDetails | null
     */
    public $service_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->issue_type) || Assert::minLength(
            $this->issue_type,
            1,
            "issue_type in ResponseCreditNotProcessed must have minlength of 1 $within"
        );
        !isset($this->issue_type) || Assert::maxLength(
            $this->issue_type,
            255,
            "issue_type in ResponseCreditNotProcessed must have maxlength of 255 $within"
        );
        !isset($this->expected_refund) || Assert::isInstanceOf(
            $this->expected_refund,
            Money::class,
            "expected_refund in ResponseCreditNotProcessed must be instance of Money $within"
        );
        !isset($this->expected_refund) ||  $this->expected_refund->validate(ResponseCreditNotProcessed::class);
        !isset($this->cancellation_details) || Assert::isInstanceOf(
            $this->cancellation_details,
            ResponseCancellationDetails::class,
            "cancellation_details in ResponseCreditNotProcessed must be instance of ResponseCancellationDetails $within"
        );
        !isset($this->cancellation_details) ||  $this->cancellation_details->validate(ResponseCreditNotProcessed::class);
        !isset($this->product_details) || Assert::isInstanceOf(
            $this->product_details,
            ResponseProductDetails::class,
            "product_details in ResponseCreditNotProcessed must be instance of ResponseProductDetails $within"
        );
        !isset($this->product_details) ||  $this->product_details->validate(ResponseCreditNotProcessed::class);
        !isset($this->service_details) || Assert::isInstanceOf(
            $this->service_details,
            ResponseServiceDetails::class,
            "service_details in ResponseCreditNotProcessed must be instance of ResponseServiceDetails $within"
        );
        !isset($this->service_details) ||  $this->service_details->validate(ResponseCreditNotProcessed::class);
    }

    private function map(array $data)
    {
        if (isset($data['issue_type'])) {
            $this->issue_type = $data['issue_type'];
        }
        if (isset($data['expected_refund'])) {
            $this->expected_refund = new Money($data['expected_refund']);
        }
        if (isset($data['cancellation_details'])) {
            $this->cancellation_details = new ResponseCancellationDetails($data['cancellation_details']);
        }
        if (isset($data['product_details'])) {
            $this->product_details = new ResponseProductDetails($data['product_details']);
        }
        if (isset($data['service_details'])) {
            $this->service_details = new ResponseServiceDetails($data['service_details']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initExpectedRefund(): Money
    {
        return $this->expected_refund = new Money();
    }

    public function initCancellationDetails(): ResponseCancellationDetails
    {
        return $this->cancellation_details = new ResponseCancellationDetails();
    }

    public function initProductDetails(): ResponseProductDetails
    {
        return $this->product_details = new ResponseProductDetails();
    }

    public function initServiceDetails(): ResponseServiceDetails
    {
        return $this->service_details = new ResponseServiceDetails();
    }
}
