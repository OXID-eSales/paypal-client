<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A merchant- or customer-submitted evidence document.
 *
 * generated from: referred-referred_evidence.json
 */
class ReferredReferredEvidence implements JsonSerializable
{
    use BaseModel;

    /**
     * The evidence-related information.
     *
     * @var ReferredReferredEvidenceInfo | null
     */
    public $evidence_info;

    /**
     * An array of evidence documents.
     *
     * @var ReferredReferredDocument[]
     * maxItems: 1
     * maxItems: 100
     */
    public $documents;

    /**
     * Any notes about the evidence.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $notes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->evidence_info) || Assert::isInstanceOf(
            $this->evidence_info,
            ReferredReferredEvidenceInfo::class,
            "evidence_info in ReferredReferredEvidence must be instance of ReferredReferredEvidenceInfo $within"
        );
        !isset($this->evidence_info) ||  $this->evidence_info->validate(ReferredReferredEvidence::class);
        Assert::notNull($this->documents, "documents in ReferredReferredEvidence must not be NULL $within");
        Assert::minCount(
            $this->documents,
            1,
            "documents in ReferredReferredEvidence must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->documents,
            100,
            "documents in ReferredReferredEvidence must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->documents,
            "documents in ReferredReferredEvidence must be array $within"
        );
        if (isset($this->documents)) {
            foreach ($this->documents as $item) {
                $item->validate(ReferredReferredEvidence::class);
            }
        }
        !isset($this->notes) || Assert::minLength(
            $this->notes,
            1,
            "notes in ReferredReferredEvidence must have minlength of 1 $within"
        );
        !isset($this->notes) || Assert::maxLength(
            $this->notes,
            2000,
            "notes in ReferredReferredEvidence must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['evidence_info'])) {
            $this->evidence_info = new ReferredReferredEvidenceInfo($data['evidence_info']);
        }
        if (isset($data['documents'])) {
            $this->documents = [];
            foreach ($data['documents'] as $item) {
                $this->documents[] = new ReferredReferredDocument($item);
            }
        }
        if (isset($data['notes'])) {
            $this->notes = $data['notes'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->documents = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initEvidenceInfo(): ReferredReferredEvidenceInfo
    {
        return $this->evidence_info = new ReferredReferredEvidenceInfo();
    }
}
