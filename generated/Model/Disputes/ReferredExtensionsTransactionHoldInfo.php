<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The transaction hold information.
 *
 * generated from: ReferredExtensions_transaction_hold_info
 */
class ReferredExtensionsTransactionHoldInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * Indicates whether a temporary hold must be placed on the transaction.
     *
     * @var boolean | null
     */
    public $hold_required;

    /**
     * The temporary hold ID.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * The reason for the temporary hold on the dispute.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in ReferredExtensionsTransactionHoldInfo must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            255,
            "id in ReferredExtensionsTransactionHoldInfo must have maxlength of 255 $within"
        );
        !isset($this->reason) || Assert::minLength(
            $this->reason,
            1,
            "reason in ReferredExtensionsTransactionHoldInfo must have minlength of 1 $within"
        );
        !isset($this->reason) || Assert::maxLength(
            $this->reason,
            2000,
            "reason in ReferredExtensionsTransactionHoldInfo must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['hold_required'])) {
            $this->hold_required = $data['hold_required'];
        }
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
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
