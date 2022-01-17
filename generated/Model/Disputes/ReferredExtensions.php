<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The extended properties for the dispute. Includes additional information for a dispute category, such as
 * billing disputes, the original transaction ID, correct amount, and so on.
 *
 * generated from: referred-extensions.json
 */
class ReferredExtensions implements JsonSerializable
{
    use BaseModel;

    /**
     * The transaction hold information.
     *
     * @var ReferredExtensionsTransactionHoldInfo | null
     */
    public $transaction_hold_info;

    /**
     * The transaction risk information.
     *
     * @var ReferredExtensionsTransactionRiskInfo | null
     */
    public $transaction_risk_info;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->transaction_hold_info) || Assert::isInstanceOf(
            $this->transaction_hold_info,
            ReferredExtensionsTransactionHoldInfo::class,
            "transaction_hold_info in ReferredExtensions must be instance of ReferredExtensionsTransactionHoldInfo $within"
        );
        !isset($this->transaction_hold_info) ||  $this->transaction_hold_info->validate(ReferredExtensions::class);
        !isset($this->transaction_risk_info) || Assert::isInstanceOf(
            $this->transaction_risk_info,
            ReferredExtensionsTransactionRiskInfo::class,
            "transaction_risk_info in ReferredExtensions must be instance of ReferredExtensionsTransactionRiskInfo $within"
        );
        !isset($this->transaction_risk_info) ||  $this->transaction_risk_info->validate(ReferredExtensions::class);
    }

    private function map(array $data)
    {
        if (isset($data['transaction_hold_info'])) {
            $this->transaction_hold_info = new ReferredExtensionsTransactionHoldInfo($data['transaction_hold_info']);
        }
        if (isset($data['transaction_risk_info'])) {
            $this->transaction_risk_info = new ReferredExtensionsTransactionRiskInfo($data['transaction_risk_info']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initTransactionHoldInfo(): ReferredExtensionsTransactionHoldInfo
    {
        return $this->transaction_hold_info = new ReferredExtensionsTransactionHoldInfo();
    }

    public function initTransactionRiskInfo(): ReferredExtensionsTransactionRiskInfo
    {
        return $this->transaction_risk_info = new ReferredExtensionsTransactionRiskInfo();
    }
}
