<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The evidence-related information.
 *
 * generated from: referred-referred_evidence_info.json
 */
class ReferredReferredEvidenceInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of relevant tracking information for the transaction involved in this dispute.
     *
     * @var ReferredReferredTrackingInfo[] | null
     */
    public $tracking_info;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->tracking_info) || Assert::isArray(
            $this->tracking_info,
            "tracking_info in ReferredReferredEvidenceInfo must be array $within"
        );
        if (isset($this->tracking_info)) {
            foreach ($this->tracking_info as $item) {
                $item->validate(ReferredReferredEvidenceInfo::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['tracking_info'])) {
            $this->tracking_info = [];
            foreach ($data['tracking_info'] as $item) {
                $this->tracking_info[] = new ReferredReferredTrackingInfo($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
