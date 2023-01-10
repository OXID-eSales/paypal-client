<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The transaction fee details.
 *
 * generated from: partner-partner_fee_info.json
 */
class PartnerPartnerFeeInfo implements JsonSerializable
{
    use BaseModel;

    /** Partner fee on transaction amount. */
    const TYPE_PARTNER = 'PARTNER';

    /** PayPal fee on transaction amount. */
    const TYPE_PAYPAL = 'PAYPAL';

    /** Chargeback fee on transaction amount. */
    const TYPE_CHARGEBACK = 'CHARGEBACK';

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

    /**
     * The PayPal payer ID, which is a masked version of the PayPal account number intended for use with third
     * parties. The account number is reversibly encrypted and a proprietary variant of Base32 is used to encode the
     * result.
     *
     * @var string | null
     * minLength: 13
     * maxLength: 13
     */
    public $account_id;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in PartnerPartnerFeeInfo must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            50,
            "type in PartnerPartnerFeeInfo must have maxlength of 50 $within"
        );
        !isset($this->account_id) || Assert::minLength(
            $this->account_id,
            13,
            "account_id in PartnerPartnerFeeInfo must have minlength of 13 $within"
        );
        !isset($this->account_id) || Assert::maxLength(
            $this->account_id,
            13,
            "account_id in PartnerPartnerFeeInfo must have maxlength of 13 $within"
        );
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in PartnerPartnerFeeInfo must be instance of Money $within"
        );
        !isset($this->amount) ||  $this->amount->validate(PartnerPartnerFeeInfo::class);
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['account_id'])) {
            $this->account_id = $data['account_id'];
        }
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAmount(): Money
    {
        return $this->amount = new Money();
    }
}
