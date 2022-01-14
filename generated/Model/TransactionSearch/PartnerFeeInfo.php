<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The transaction fee details.
 *
 * generated from: partner_fee_info.json
 */
class PartnerFeeInfo implements JsonSerializable
{
    use BaseModel;

    /** Partner fee on transaction amount. */
    public const TYPE_PARTNER = 'PARTNER';

    /** PayPal fee on transaction amount. */
    public const TYPE_PAYPAL = 'PAYPAL';

    /** Chargeback fee on transaction amount. */
    public const TYPE_CHARGEBACK = 'CHARGEBACK';

    /**
     * Type of the Fee. E.g. `PARTNER` or `PAYPAL` or `CHARGEBACK`.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_PARTNER
     * @see TYPE_PAYPAL
     * @see TYPE_CHARGEBACK
     * @var string | null
     * minLength: 1
     * maxLength: 50
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in PartnerFeeInfo must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            50,
            "type in PartnerFeeInfo must have maxlength of 50 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
