<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * ACH debit verification response object
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-ach_debit_verification_response.json
 */
class AchDebitVerificationResponse implements JsonSerializable
{
    use BaseModel;

    /** ACH Debit payment source has been verified. */
    public const STATUS_VERIFIED = 'VERIFIED';

    /** ACH Debit payment source has been not been verified. */
    public const STATUS_NOT_VERIFIED = 'NOT_VERIFIED';

    /**
     * The ach debit verification status.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_VERIFIED
     * @see STATUS_NOT_VERIFIED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $status = 'NOT_VERIFIED';

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->status) || Assert::minLength(
            $this->status,
            1,
            "status in AchDebitVerificationResponse must have minlength of 1 $within"
        );
        !isset($this->status) || Assert::maxLength(
            $this->status,
            255,
            "status in AchDebitVerificationResponse must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
