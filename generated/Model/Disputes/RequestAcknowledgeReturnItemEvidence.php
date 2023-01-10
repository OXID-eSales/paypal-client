<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * An evidence submitted by the merchant when acknowledging a returned item.
 *
 * generated from: request-acknowledge_return_item_evidence.json
 */
class RequestAcknowledgeReturnItemEvidence implements JsonSerializable
{
    use BaseModel;

    /** Documentation supporting the claim that the item is damaged. */
    const EVIDENCE_TYPE_PROOF_OF_DAMAGE = 'PROOF_OF_DAMAGE';

    /** Proof should be provided by an unbiased third-party, such as a dealer, appraiser or another individual or organisation that's qualified in the area of the item in question (other than yourself), and detail the extent of the damage or clearly explain how the item received significantly differs from the item advertised. */
    const EVIDENCE_TYPE_THIRDPARTY_PROOF_FOR_DAMAGE_OR_SIGNIFICANT_DIFFERENCE = 'THIRDPARTY_PROOF_FOR_DAMAGE_OR_SIGNIFICANT_DIFFERENCE';

    /** Signed declaration about the information provided. */
    const EVIDENCE_TYPE_DECLARATION = 'DECLARATION';

    /** Image of open box with returned items and shipping label clearly visible. */
    const EVIDENCE_TYPE_PROOF_OF_MISSING_ITEMS = 'PROOF_OF_MISSING_ITEMS';

    /** Image of empty box or returned items that are different from what were expected and shipping label clearly visible. */
    const EVIDENCE_TYPE_PROOF_OF_EMPTY_PACKAGE_OR_DIFFERENT_ITEM = 'PROOF_OF_EMPTY_PACKAGE_OR_DIFFERENT_ITEM';

    /** Any proof about the non receipt of the item, such as screenshot of tracking info. */
    const EVIDENCE_TYPE_PROOF_OF_ITEM_NOT_RECEIVED = 'PROOF_OF_ITEM_NOT_RECEIVED';

    /**
     * The evidence type.
     *
     * use one of constants defined in this class to set the value:
     * @see EVIDENCE_TYPE_PROOF_OF_DAMAGE
     * @see EVIDENCE_TYPE_THIRDPARTY_PROOF_FOR_DAMAGE_OR_SIGNIFICANT_DIFFERENCE
     * @see EVIDENCE_TYPE_DECLARATION
     * @see EVIDENCE_TYPE_PROOF_OF_MISSING_ITEMS
     * @see EVIDENCE_TYPE_PROOF_OF_EMPTY_PACKAGE_OR_DIFFERENT_ITEM
     * @see EVIDENCE_TYPE_PROOF_OF_ITEM_NOT_RECEIVED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $evidence_type;

    /**
     * An array of evidence documents.
     *
     * @var ResponseDocument[]
     * maxItems: 1
     * maxItems: 100
     */
    public $documents;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->evidence_type) || Assert::minLength(
            $this->evidence_type,
            1,
            "evidence_type in RequestAcknowledgeReturnItemEvidence must have minlength of 1 $within"
        );
        !isset($this->evidence_type) || Assert::maxLength(
            $this->evidence_type,
            255,
            "evidence_type in RequestAcknowledgeReturnItemEvidence must have maxlength of 255 $within"
        );
        Assert::notNull($this->documents, "documents in RequestAcknowledgeReturnItemEvidence must not be NULL $within");
        Assert::minCount(
            $this->documents,
            1,
            "documents in RequestAcknowledgeReturnItemEvidence must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->documents,
            100,
            "documents in RequestAcknowledgeReturnItemEvidence must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->documents,
            "documents in RequestAcknowledgeReturnItemEvidence must be array $within"
        );
        if (isset($this->documents)) {
            foreach ($this->documents as $item) {
                $item->validate(RequestAcknowledgeReturnItemEvidence::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['evidence_type'])) {
            $this->evidence_type = $data['evidence_type'];
        }
        if (isset($data['documents'])) {
            $this->documents = [];
            foreach ($data['documents'] as $item) {
                $this->documents[] = new ResponseDocument($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->documents = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
