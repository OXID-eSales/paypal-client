<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The transaction risk information.
 *
 * generated from: ReferredExtensions_transaction_risk_info
 */
class ReferredExtensionsTransactionRiskInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * Indicates whether the transaction is high risk and money must be recovered.
     *
     * @var boolean | null
     */
    public $high_risk;

    /**
     * The recoup ID.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * The reason for recoup for the dispute.
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
            "id in ReferredExtensionsTransactionRiskInfo must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            255,
            "id in ReferredExtensionsTransactionRiskInfo must have maxlength of 255 $within"
        );
        !isset($this->reason) || Assert::minLength(
            $this->reason,
            1,
            "reason in ReferredExtensionsTransactionRiskInfo must have minlength of 1 $within"
        );
        !isset($this->reason) || Assert::maxLength(
            $this->reason,
            2000,
            "reason in ReferredExtensionsTransactionRiskInfo must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['high_risk'])) {
            $this->high_risk = $data['high_risk'];
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
