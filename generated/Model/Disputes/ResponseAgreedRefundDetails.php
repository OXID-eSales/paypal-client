<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Details of Agreed Refund between customer and merchant.
 *
 * generated from: response-agreed_refund_details.json
 */
class ResponseAgreedRefundDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * Indicates whether merchant has agreed to refund the buyer or not.
     *
     * @var boolean | null
     */
    public $merchant_agreed_refund;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $merchant_agreed_refund_time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->merchant_agreed_refund_time) || Assert::minLength(
            $this->merchant_agreed_refund_time,
            20,
            "merchant_agreed_refund_time in ResponseAgreedRefundDetails must have minlength of 20 $within"
        );
        !isset($this->merchant_agreed_refund_time) || Assert::maxLength(
            $this->merchant_agreed_refund_time,
            64,
            "merchant_agreed_refund_time in ResponseAgreedRefundDetails must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['merchant_agreed_refund'])) {
            $this->merchant_agreed_refund = $data['merchant_agreed_refund'];
        }
        if (isset($data['merchant_agreed_refund_time'])) {
            $this->merchant_agreed_refund_time = $data['merchant_agreed_refund_time'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
