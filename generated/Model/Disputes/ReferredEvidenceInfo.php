<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The evidence-related information.
 *
 * generated from: referred-evidence_info.json
 */
class ReferredEvidenceInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of relevant tracking information for the transaction involved in this dispute.
     *
     * @var ReferredTrackingInfoItem[] | null
     */
    public $tracking_info;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->tracking_info) || Assert::isArray(
            $this->tracking_info,
            "tracking_info in ReferredEvidenceInfo must be array $within"
        );
        if (isset($this->tracking_info)) {
            foreach ($this->tracking_info as $item) {
                $item->validate(ReferredEvidenceInfo::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['tracking_info'])) {
            $this->tracking_info = [];
            foreach ($data['tracking_info'] as $item) {
                $this->tracking_info[] = new ReferredTrackingInfoItem($item);
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
