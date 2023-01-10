<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The authorized payment transaction.
 *
 * generated from: model-update_authorization_request.json
 */
class UpdateAuthorizationRequest implements JsonSerializable
{
    use BaseModel;

    /** The authorized payment is created. No captured payments have been made for this authorized payment. */
    const STATUS_CREATED = 'CREATED';

    /** The authorized payment has one or more captures against it. The sum of these captured payments is greater than the amount of the original authorized payment. */
    const STATUS_CAPTURED = 'CAPTURED';

    /** PayPal cannot authorize funds for this authorized payment. */
    const STATUS_DENIED = 'DENIED';

    /** The authorized payment has expired. */
    const STATUS_EXPIRED = 'EXPIRED';

    /** A captured payment was made for the authorized payment for an amount that is less than the amount of the original authorized payment. */
    const STATUS_PARTIALLY_CAPTURED = 'PARTIALLY_CAPTURED';

    /** The authorized payment was voided. No more captured payments can be made against this authorized payment. */
    const STATUS_VOIDED = 'VOIDED';

    /** The created authorization is in pending state. For more information, see <code>status.details</code> */
    const STATUS_PENDING = 'PENDING';

    /**
     * The unique transaction ID for the authorized payment.
     *
     * @var string
     * minLength: 1
     * maxLength: 20
     */
    public $id;

    /**
     * The status for the authorized payment.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CREATED
     * @see STATUS_CAPTURED
     * @see STATUS_DENIED
     * @see STATUS_EXPIRED
     * @see STATUS_PARTIALLY_CAPTURED
     * @see STATUS_VOIDED
     * @see STATUS_PENDING
     * @var string
     * minLength: 1
     * maxLength: 127
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
        Assert::notNull($this->id, "id in UpdateAuthorizationRequest must not be NULL $within");
        Assert::minLength(
            $this->id,
            1,
            "id in UpdateAuthorizationRequest must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->id,
            20,
            "id in UpdateAuthorizationRequest must have maxlength of 20 $within"
        );
        Assert::notNull($this->status, "status in UpdateAuthorizationRequest must not be NULL $within");
        Assert::minLength(
            $this->status,
            1,
            "status in UpdateAuthorizationRequest must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->status,
            127,
            "status in UpdateAuthorizationRequest must have maxlength of 127 $within"
        );
        !isset($this->status_details) || Assert::isInstanceOf(
            $this->status_details,
            AuthorizationStatusDetails::class,
            "status_details in UpdateAuthorizationRequest must be instance of AuthorizationStatusDetails $within"
        );
        !isset($this->status_details) ||  $this->status_details->validate(UpdateAuthorizationRequest::class);
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
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
