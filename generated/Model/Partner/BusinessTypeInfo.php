<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The type and subtype of the business.
 *
 * generated from: customer_common-v1-schema-account_model-business_type_info.json
 */
class BusinessTypeInfo implements JsonSerializable
{
    use BaseModel;

    /** The any other business entity. */
    public const TYPE_ANY_OTHER_BUSINESS_ENTITY = 'ANY_OTHER_BUSINESS_ENTITY';

    /** The association. */
    public const TYPE_ASSOCIATION = 'ASSOCIATION';

    /** The corporation. */
    public const TYPE_CORPORATION = 'CORPORATION';

    /** The general partnership. */
    public const TYPE_GENERAL_PARTNERSHIP = 'GENERAL_PARTNERSHIP';

    /** The government. */
    public const TYPE_GOVERNMENT = 'GOVERNMENT';

    /** The individual. */
    public const TYPE_INDIVIDUAL = 'INDIVIDUAL';

    /** The limited liability partnership. */
    public const TYPE_LIMITED_LIABILITY_PARTNERSHIP = 'LIMITED_LIABILITY_PARTNERSHIP';

    /** The limited liability proprietors. */
    public const TYPE_LIMITED_LIABILITY_PROPRIETORS = 'LIMITED_LIABILITY_PROPRIETORS';

    /** The limited liability private corporation. */
    public const TYPE_LIMITED_LIABILITY_PRIVATE_CORPORATION = 'LIMITED_LIABILITY_PRIVATE_CORPORATION';

    /** The limited partnership. */
    public const TYPE_LIMITED_PARTNERSHIP = 'LIMITED_PARTNERSHIP';

    /** The limited partnership private corporation. */
    public const TYPE_LIMITED_PARTNERSHIP_PRIVATE_CORPORATION = 'LIMITED_PARTNERSHIP_PRIVATE_CORPORATION';

    /** The nonprofit. */
    public const TYPE_NONPROFIT = 'NONPROFIT';

    /** The only buy and send money. */
    public const TYPE_ONLY_BUY_OR_SEND_MONEY = 'ONLY_BUY_OR_SEND_MONEY';

    /** The other corporate body. */
    public const TYPE_OTHER_CORPORATE_BODY = 'OTHER_CORPORATE_BODY';

    /** The partnership. */
    public const TYPE_PARTNERSHIP = 'PARTNERSHIP';

    /** The private partnership. */
    public const TYPE_PRIVATE_PARTNERSHIP = 'PRIVATE_PARTNERSHIP';

    /** The proprietorship. */
    public const TYPE_PROPRIETORSHIP = 'PROPRIETORSHIP';

    /** The proprietorship craftsman. */
    public const TYPE_PROPRIETORSHIP_CRAFTSMAN = 'PROPRIETORSHIP_CRAFTSMAN';

    /** The proprietory company. */
    public const TYPE_PROPRIETORY_COMPANY = 'PROPRIETORY_COMPANY';

    /** The private corporation. */
    public const TYPE_PRIVATE_CORPORATION = 'PRIVATE_CORPORATION';

    /** The public company. */
    public const TYPE_PUBLIC_COMPANY = 'PUBLIC_COMPANY';

    /** The public corporation. */
    public const TYPE_PUBLIC_CORPORATION = 'PUBLIC_CORPORATION';

    /** The public partnership. */
    public const TYPE_PUBLIC_PARTNERSHIP = 'PUBLIC_PARTNERSHIP';

    /** Registered Co-operative. */
    public const TYPE_REGISTERED_COOPERATIVE = 'REGISTERED_COOPERATIVE';

    /** The asso type incorporated. */
    public const SUBTYPE_ASSO_TYPE_INCORPORATED = 'ASSO_TYPE_INCORPORATED';

    /** The asso type non incorporated. */
    public const SUBTYPE_ASSO_TYPE_NON_INCORPORATED = 'ASSO_TYPE_NON_INCORPORATED';

    /** The govt type entity. */
    public const SUBTYPE_GOVT_TYPE_ENTITY = 'GOVT_TYPE_ENTITY';

    /** The govt type emanation. */
    public const SUBTYPE_GOVT_TYPE_EMANATION = 'GOVT_TYPE_EMANATION';

    /** The govt type estd comm. */
    public const SUBTYPE_GOVT_TYPE_ESTD_COMM = 'GOVT_TYPE_ESTD_COMM';

    /** The govt type estd fc. */
    public const SUBTYPE_GOVT_TYPE_ESTD_FC = 'GOVT_TYPE_ESTD_FC';

    /** The govt type estd st tr. */
    public const SUBTYPE_GOVT_TYPE_ESTD_ST_TR = 'GOVT_TYPE_ESTD_ST_TR';

    /**
     * The business types classified
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_ANY_OTHER_BUSINESS_ENTITY
     * @see TYPE_ASSOCIATION
     * @see TYPE_CORPORATION
     * @see TYPE_GENERAL_PARTNERSHIP
     * @see TYPE_GOVERNMENT
     * @see TYPE_INDIVIDUAL
     * @see TYPE_LIMITED_LIABILITY_PARTNERSHIP
     * @see TYPE_LIMITED_LIABILITY_PROPRIETORS
     * @see TYPE_LIMITED_LIABILITY_PRIVATE_CORPORATION
     * @see TYPE_LIMITED_PARTNERSHIP
     * @see TYPE_LIMITED_PARTNERSHIP_PRIVATE_CORPORATION
     * @see TYPE_NONPROFIT
     * @see TYPE_ONLY_BUY_OR_SEND_MONEY
     * @see TYPE_OTHER_CORPORATE_BODY
     * @see TYPE_PARTNERSHIP
     * @see TYPE_PRIVATE_PARTNERSHIP
     * @see TYPE_PROPRIETORSHIP
     * @see TYPE_PROPRIETORSHIP_CRAFTSMAN
     * @see TYPE_PROPRIETORY_COMPANY
     * @see TYPE_PRIVATE_CORPORATION
     * @see TYPE_PUBLIC_COMPANY
     * @see TYPE_PUBLIC_CORPORATION
     * @see TYPE_PUBLIC_PARTNERSHIP
     * @see TYPE_REGISTERED_COOPERATIVE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    /**
     * Sub classification of the business type
     *
     * use one of constants defined in this class to set the value:
     * @see SUBTYPE_ASSO_TYPE_INCORPORATED
     * @see SUBTYPE_ASSO_TYPE_NON_INCORPORATED
     * @see SUBTYPE_GOVT_TYPE_ENTITY
     * @see SUBTYPE_GOVT_TYPE_EMANATION
     * @see SUBTYPE_GOVT_TYPE_ESTD_COMM
     * @see SUBTYPE_GOVT_TYPE_ESTD_FC
     * @see SUBTYPE_GOVT_TYPE_ESTD_ST_TR
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $subtype;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in BusinessTypeInfo must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            255,
            "type in BusinessTypeInfo must have maxlength of 255 $within"
        );
        !isset($this->subtype) || Assert::minLength(
            $this->subtype,
            1,
            "subtype in BusinessTypeInfo must have minlength of 1 $within"
        );
        !isset($this->subtype) || Assert::maxLength(
            $this->subtype,
            255,
            "subtype in BusinessTypeInfo must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['subtype'])) {
            $this->subtype = $data['subtype'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
