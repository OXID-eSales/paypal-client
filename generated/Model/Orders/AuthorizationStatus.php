<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The status fields for an authorized payment.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-authorization_status.json
 */
class AuthorizationStatus implements JsonSerializable
{
    use BaseModel;

    /** The authorized payment is created. No captured payments have been made for this authorized payment. */
    public const STATUS_CREATED = 'CREATED';

    /** The authorized payment has one or more captures against it. The sum of these captured payments is greater than the amount of the original authorized payment. */
    public const STATUS_CAPTURED = 'CAPTURED';

    /** PayPal cannot authorize funds for this authorized payment. */
    public const STATUS_DENIED = 'DENIED';

    /** The authorized payment has expired. */
    public const STATUS_EXPIRED = 'EXPIRED';

    /** A captured payment was made for the authorized payment for an amount that is less than the amount of the original authorized payment. */
    public const STATUS_PARTIALLY_CAPTURED = 'PARTIALLY_CAPTURED';

    /** The payment which was authorized for an amount that is less than the originally requested amount. */
    public const STATUS_PARTIALLY_CREATED = 'PARTIALLY_CREATED';

    /** The authorized payment was voided. No more captured payments can be made against this authorized payment. */
    public const STATUS_VOIDED = 'VOIDED';

    /** The created authorization is in pending state. For more information, see <code>status.details</code>. */
    public const STATUS_PENDING = 'PENDING';

    /**
     * The status for the authorized payment.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CREATED
     * @see STATUS_CAPTURED
     * @see STATUS_DENIED
     * @see STATUS_EXPIRED
     * @see STATUS_PARTIALLY_CAPTURED
     * @see STATUS_PARTIALLY_CREATED
     * @see STATUS_VOIDED
     * @see STATUS_PENDING
     * @var string | null
     */
    public $status;

    /**
     * The details of the authorized payment status.
     *
     * @var AuthorizationStatusDetails | null
     */
    public $status_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->status_details) || Assert::isInstanceOf(
            $this->status_details,
            AuthorizationStatusDetails::class,
            "status_details in AuthorizationStatus must be instance of AuthorizationStatusDetails $within"
        );
        !isset($this->status_details) ||  $this->status_details->validate(AuthorizationStatus::class);
    }

    private function map(array $data)
    {
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['status_details'])) {
            $this->status_details = new AuthorizationStatusDetails($data['status_details']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initStatusDetails(): AuthorizationStatusDetails
    {
        return $this->status_details = new AuthorizationStatusDetails();
    }
}
