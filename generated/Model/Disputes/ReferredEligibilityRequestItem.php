<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Information about the items in the transaction.
 *
 * generated from: referred-eligibility_request_item.json
 */
class ReferredEligibilityRequestItem implements JsonSerializable
{
    use BaseModel;

    /** Computer or related accessories. */
    public const CATEGORY_COMPUTERS = 'COMPUTERS';

    /** Home appliances. */
    public const CATEGORY_HOME = 'HOME';

    /** Decorative items, ornaments, and so on. */
    public const CATEGORY_JEWELRY = 'JEWELRY';

    /** Antiques and collectible items. */
    public const CATEGORY_ANTIQUES = 'ANTIQUES';

    /** Entertainment goods, such as video games, DVDs, and so on. */
    public const CATEGORY_ENTERTAINMENT = 'ENTERTAINMENT';

    /** Other material goods. */
    public const CATEGORY_OTHER_TANGIBLES = 'OTHER_TANGIBLES';

    /** Travel items and travel needs. */
    public const CATEGORY_TRAVEL = 'TRAVEL';

    /** Services, such as installation, repair, and so on. */
    public const CATEGORY_SERVICE = 'SERVICE';

    /** Non-physical objects, such as online games. */
    public const CATEGORY_VIRTUAL_GOODS = 'VIRTUAL_GOODS';

    /** Other intangible goods. */
    public const CATEGORY_OTHER_INTANGIBLES = 'OTHER_INTANGIBLES';

    /** Tickets for events, such as sports, concerts, and so on. */
    public const CATEGORY_TICKETS = 'TICKETS';

    /**
     * The ID of the item.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * The category of the item in dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see CATEGORY_COMPUTERS
     * @see CATEGORY_HOME
     * @see CATEGORY_JEWELRY
     * @see CATEGORY_ANTIQUES
     * @see CATEGORY_ENTERTAINMENT
     * @see CATEGORY_OTHER_TANGIBLES
     * @see CATEGORY_TRAVEL
     * @see CATEGORY_SERVICE
     * @see CATEGORY_VIRTUAL_GOODS
     * @see CATEGORY_OTHER_INTANGIBLES
     * @see CATEGORY_TICKETS
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $category;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in ReferredEligibilityRequestItem must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            255,
            "id in ReferredEligibilityRequestItem must have maxlength of 255 $within"
        );
        !isset($this->category) || Assert::minLength(
            $this->category,
            1,
            "category in ReferredEligibilityRequestItem must have minlength of 1 $within"
        );
        !isset($this->category) || Assert::maxLength(
            $this->category,
            255,
            "category in ReferredEligibilityRequestItem must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['category'])) {
            $this->category = $data['category'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
