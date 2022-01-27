<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A merchant request to acknowledge receipt of the disputed item that the customer returned.
 *
 * generated from: request-acknowledge_return_item.json
 */
class RequestAcknowledgeReturnItem implements JsonSerializable
{
    use BaseModel;

    /** The merchant has received the item returned by the customer. */
    public const ACKNOWLEDGEMENT_TYPE_ITEM_RECEIVED = 'ITEM_RECEIVED';

    /** The merchant has not received the item. */
    public const ACKNOWLEDGEMENT_TYPE_ITEM_NOT_RECEIVED = 'ITEM_NOT_RECEIVED';

    /** The items returned by the customer were damaged. */
    public const ACKNOWLEDGEMENT_TYPE_DAMAGED = 'DAMAGED';

    /** The package was empty or the goods were different from what was expected. */
    public const ACKNOWLEDGEMENT_TYPE_EMPTY_PACKAGE_OR_DIFFERENT = 'EMPTY_PACKAGE_OR_DIFFERENT';

    /** The package did not have all the items that were expected. */
    public const ACKNOWLEDGEMENT_TYPE_MISSING_ITEMS = 'MISSING_ITEMS';

    /**
     * The type of acknowledgement allowed for the merchant after the customer has returned the item. The merchant
     * can update whether the item was received and is as expected or if the item was not received.
     *
     * use one of constants defined in this class to set the value:
     * @see ACKNOWLEDGEMENT_TYPE_ITEM_RECEIVED
     * @see ACKNOWLEDGEMENT_TYPE_ITEM_NOT_RECEIVED
     * @see ACKNOWLEDGEMENT_TYPE_DAMAGED
     * @see ACKNOWLEDGEMENT_TYPE_EMPTY_PACKAGE_OR_DIFFERENT
     * @see ACKNOWLEDGEMENT_TYPE_MISSING_ITEMS
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $acknowledgement_type;

    /**
     * The merchant provided notes. PayPal can but the consumer cannot view these notes.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $note;

    /**
     * An array of evidence documents.
     *
     * @var RequestAcknowledgeReturnItemEvidence[]
     * maxItems: 1
     * maxItems: 100
     */
    public $evidences;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->acknowledgement_type) || Assert::minLength(
            $this->acknowledgement_type,
            1,
            "acknowledgement_type in RequestAcknowledgeReturnItem must have minlength of 1 $within"
        );
        !isset($this->acknowledgement_type) || Assert::maxLength(
            $this->acknowledgement_type,
            255,
            "acknowledgement_type in RequestAcknowledgeReturnItem must have maxlength of 255 $within"
        );
        !isset($this->note) || Assert::minLength(
            $this->note,
            1,
            "note in RequestAcknowledgeReturnItem must have minlength of 1 $within"
        );
        !isset($this->note) || Assert::maxLength(
            $this->note,
            2000,
            "note in RequestAcknowledgeReturnItem must have maxlength of 2000 $within"
        );
        Assert::notNull($this->evidences, "evidences in RequestAcknowledgeReturnItem must not be NULL $within");
        Assert::minCount(
            $this->evidences,
            1,
            "evidences in RequestAcknowledgeReturnItem must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->evidences,
            100,
            "evidences in RequestAcknowledgeReturnItem must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->evidences,
            "evidences in RequestAcknowledgeReturnItem must be array $within"
        );
        if (isset($this->evidences)) {
            foreach ($this->evidences as $item) {
                $item->validate(RequestAcknowledgeReturnItem::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['acknowledgement_type'])) {
            $this->acknowledgement_type = $data['acknowledgement_type'];
        }
        if (isset($data['note'])) {
            $this->note = $data['note'];
        }
        if (isset($data['evidences'])) {
            $this->evidences = [];
            foreach ($data['evidences'] as $item) {
                $this->evidences[] = new RequestAcknowledgeReturnItemEvidence($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->evidences = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
