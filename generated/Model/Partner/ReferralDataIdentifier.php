<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The bank account ID. An ID with `ROUTING_NUMBER_1` is required.
 *
 * generated from: referral_data-identifier.json
 */
class ReferralDataIdentifier implements JsonSerializable
{
    use BaseModel;

    /** The bank code. */
    public const TYPE_BANK_CODE = 'BANK_CODE';

    /** The BI code. */
    public const TYPE_BI_CODE = 'BI_CODE';

    /** Branch code. */
    public const TYPE_BRANCH_CODE = 'BRANCH_CODE';

    /** The bank routing number. */
    public const TYPE_ROUTING_NUMBER_1 = 'ROUTING_NUMBER_1';

    /** The bank routing number. */
    public const TYPE_ROUTING_NUMBER_2 = 'ROUTING_NUMBER_2';

    /** The bank routing number. */
    public const TYPE_ROUTING_NUMBER_3 = 'ROUTING_NUMBER_3';

    /** The bank swift code. */
    public const TYPE_SWIFT_CODE = 'SWIFT_CODE';

    /** Swift code. */
    public const TYPE_INTERMEDIARY_SWIFT_CODE = 'INTERMEDIARY_SWIFT_CODE';

    /** BBAN. */
    public const TYPE_BBAN = 'BBAN';

    /** BBAN enrypted. */
    public const TYPE_BBAN_ENCRYPTED = 'BBAN_ENCRYPTED';

    /** BBAN HMAC. */
    public const TYPE_BBAN_HMAC = 'BBAN_HMAC';

    /** Aggregator Yodlee. */
    public const TYPE_AGGREGATOR_YODLEE = 'AGGREGATOR_YODLEE';

    /**
     * The bank account ID type.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_BANK_CODE
     * @see TYPE_BI_CODE
     * @see TYPE_BRANCH_CODE
     * @see TYPE_ROUTING_NUMBER_1
     * @see TYPE_ROUTING_NUMBER_2
     * @see TYPE_ROUTING_NUMBER_3
     * @see TYPE_SWIFT_CODE
     * @see TYPE_BRANCH_CODE
     * @see TYPE_INTERMEDIARY_SWIFT_CODE
     * @see TYPE_BBAN
     * @see TYPE_BBAN_ENCRYPTED
     * @see TYPE_BBAN_HMAC
     * @see TYPE_AGGREGATOR_YODLEE
     * @var string | null
     * minLength: 1
     * maxLength: 125
     */
    public $type;

    /**
     * The value of account identifier.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 125
     */
    public $value;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in ReferralDataIdentifier must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            125,
            "type in ReferralDataIdentifier must have maxlength of 125 $within"
        );
        !isset($this->value) || Assert::minLength(
            $this->value,
            1,
            "value in ReferralDataIdentifier must have minlength of 1 $within"
        );
        !isset($this->value) || Assert::maxLength(
            $this->value,
            125,
            "value in ReferralDataIdentifier must have maxlength of 125 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['value'])) {
            $this->value = $data['value'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
