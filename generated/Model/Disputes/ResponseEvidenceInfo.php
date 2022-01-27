<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The evidence-related information.
 *
 * generated from: response-evidence_info.json
 */
class ResponseEvidenceInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of relevant tracking information for the transaction involved in this dispute.
     *
     * @var ResponseTrackingInfo[]
     * maxItems: 1
     * maxItems: 10
     */
    public $tracking_info;

    /**
     * An array of refund IDs for the transaction involved in this dispute.
     *
     * @var string[]
     * maxItems: 1
     * maxItems: 100
     */
    public $refund_ids;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->tracking_info, "tracking_info in ResponseEvidenceInfo must not be NULL $within");
        Assert::minCount(
            $this->tracking_info,
            1,
            "tracking_info in ResponseEvidenceInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->tracking_info,
            10,
            "tracking_info in ResponseEvidenceInfo must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->tracking_info,
            "tracking_info in ResponseEvidenceInfo must be array $within"
        );
        if (isset($this->tracking_info)) {
            foreach ($this->tracking_info as $item) {
                $item->validate(ResponseEvidenceInfo::class);
            }
        }
        Assert::notNull($this->refund_ids, "refund_ids in ResponseEvidenceInfo must not be NULL $within");
        Assert::minCount(
            $this->refund_ids,
            1,
            "refund_ids in ResponseEvidenceInfo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->refund_ids,
            100,
            "refund_ids in ResponseEvidenceInfo must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->refund_ids,
            "refund_ids in ResponseEvidenceInfo must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['tracking_info'])) {
            $this->tracking_info = [];
            foreach ($data['tracking_info'] as $item) {
                $this->tracking_info[] = new ResponseTrackingInfo($item);
            }
        }
        if (isset($data['refund_ids'])) {
            $this->refund_ids = [];
            foreach ($data['refund_ids'] as $item) {
                $this->refund_ids[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->tracking_info = [];
        $this->refund_ids = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
