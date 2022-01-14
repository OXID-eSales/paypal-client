<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details of the authorized payment status.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-authorization_status_details.json
 */
class AuthorizationStatusDetails implements JsonSerializable
{
    use BaseModel;

    /** Authorization is pending manual review. */
    public const REASON_PENDING_REVIEW = 'PENDING_REVIEW';

    /**
     * The reason why the authorized status is `PENDING`.
     *
     * use one of constants defined in this class to set the value:
     * @see REASON_PENDING_REVIEW
     * @var string | null
     */
    public $reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    private function map(array $data)
    {
        if (isset($data['reason'])) {
            $this->reason = $data['reason'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
