<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The extended properties for the dispute. Includes additional information for a dispute category, such as
 * billing disputes, the original transaction ID, correct amount, and so on.
 *
 * generated from: referred-referred_extensions.json
 */
class ReferredReferredExtensions implements JsonSerializable
{
    use BaseModel;

    /**
     * The transaction hold information.
     *
     * @var ReferredReferredExtensionsTransactionHoldInfo | null
     */
    public $transaction_hold_info;

    /**
     * The transaction risk information.
     *
     * @var ReferredReferredExtensionsTransactionRiskInfo | null
     */
    public $transaction_risk_info;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->transaction_hold_info) || Assert::isInstanceOf(
            $this->transaction_hold_info,
            ReferredReferredExtensionsTransactionHoldInfo::class,
            "transaction_hold_info in ReferredReferredExtensions must be instance of ReferredReferredExtensionsTransactionHoldInfo $within"
        );
        !isset($this->transaction_hold_info) ||  $this->transaction_hold_info->validate(ReferredReferredExtensions::class);
        !isset($this->transaction_risk_info) || Assert::isInstanceOf(
            $this->transaction_risk_info,
            ReferredReferredExtensionsTransactionRiskInfo::class,
            "transaction_risk_info in ReferredReferredExtensions must be instance of ReferredReferredExtensionsTransactionRiskInfo $within"
        );
        !isset($this->transaction_risk_info) ||  $this->transaction_risk_info->validate(ReferredReferredExtensions::class);
    }

    private function map(array $data)
    {
        if (isset($data['transaction_hold_info'])) {
            $this->transaction_hold_info = new ReferredReferredExtensionsTransactionHoldInfo($data['transaction_hold_info']);
        }
        if (isset($data['transaction_risk_info'])) {
            $this->transaction_risk_info = new ReferredReferredExtensionsTransactionRiskInfo($data['transaction_risk_info']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initTransactionHoldInfo(): ReferredReferredExtensionsTransactionHoldInfo
    {
        return $this->transaction_hold_info = new ReferredReferredExtensionsTransactionHoldInfo();
    }

    public function initTransactionRiskInfo(): ReferredReferredExtensionsTransactionRiskInfo
    {
        return $this->transaction_risk_info = new ReferredReferredExtensionsTransactionRiskInfo();
    }
}
