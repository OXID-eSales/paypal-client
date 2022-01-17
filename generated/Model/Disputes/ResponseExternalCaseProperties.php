<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The third-party claims properties.
 *
 * generated from: response-external_case_properties.json
 */
class ResponseExternalCaseProperties implements JsonSerializable
{
    use BaseModel;

    /** The customer disputed the transaction at the issuing bank. */
    public const EXTERNAL_TYPE_BANK_RETURN = 'BANK_RETURN';

    /** The customer requested to reverse the ELV transaction at the issuing bank. */
    public const EXTERNAL_TYPE_DIRECT_DEBIT_REVERSAL = 'DIRECT_DEBIT_REVERSAL';

    /** The customer disputed the transaction with the credit card processor. */
    public const EXTERNAL_TYPE_CREDIT_CARD_DISPUTE = 'CREDIT_CARD_DISPUTE';

    /** The dispute amount is debited from the merchant. */
    public const RECOVERY_TYPE_RECOVERED_FROM_SELLER = 'RECOVERED_FROM_SELLER';

    /** The dispute amount is debited from the customer. */
    public const RECOVERY_TYPE_RECOVERED_FROM_BUYER = 'RECOVERED_FROM_BUYER';

    /** The merchant or customer is not liable for the dispute. */
    public const RECOVERY_TYPE_NO_RECOVERY = 'NO_RECOVERY';

    /**
     * The external claim ID.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $reference_id;

    /**
     * The partner-supported external type.
     *
     * use one of constants defined in this class to set the value:
     * @see EXTERNAL_TYPE_BANK_RETURN
     * @see EXTERNAL_TYPE_DIRECT_DEBIT_REVERSAL
     * @see EXTERNAL_TYPE_CREDIT_CARD_DISPUTE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $external_type;

    /**
     * The type of recovery on the external dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see RECOVERY_TYPE_RECOVERED_FROM_SELLER
     * @see RECOVERY_TYPE_RECOVERED_FROM_BUYER
     * @see RECOVERY_TYPE_NO_RECOVERY
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $recovery_type;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $reversal_fee;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->reference_id) || Assert::minLength(
            $this->reference_id,
            1,
            "reference_id in ResponseExternalCaseProperties must have minlength of 1 $within"
        );
        !isset($this->reference_id) || Assert::maxLength(
            $this->reference_id,
            255,
            "reference_id in ResponseExternalCaseProperties must have maxlength of 255 $within"
        );
        !isset($this->external_type) || Assert::minLength(
            $this->external_type,
            1,
            "external_type in ResponseExternalCaseProperties must have minlength of 1 $within"
        );
        !isset($this->external_type) || Assert::maxLength(
            $this->external_type,
            255,
            "external_type in ResponseExternalCaseProperties must have maxlength of 255 $within"
        );
        !isset($this->recovery_type) || Assert::minLength(
            $this->recovery_type,
            1,
            "recovery_type in ResponseExternalCaseProperties must have minlength of 1 $within"
        );
        !isset($this->recovery_type) || Assert::maxLength(
            $this->recovery_type,
            255,
            "recovery_type in ResponseExternalCaseProperties must have maxlength of 255 $within"
        );
        !isset($this->reversal_fee) || Assert::isInstanceOf(
            $this->reversal_fee,
            Money::class,
            "reversal_fee in ResponseExternalCaseProperties must be instance of Money $within"
        );
        !isset($this->reversal_fee) ||  $this->reversal_fee->validate(ResponseExternalCaseProperties::class);
    }

    private function map(array $data)
    {
        if (isset($data['reference_id'])) {
            $this->reference_id = $data['reference_id'];
        }
        if (isset($data['external_type'])) {
            $this->external_type = $data['external_type'];
        }
        if (isset($data['recovery_type'])) {
            $this->recovery_type = $data['recovery_type'];
        }
        if (isset($data['reversal_fee'])) {
            $this->reversal_fee = new Money($data['reversal_fee']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initReversalFee(): Money
    {
        return $this->reversal_fee = new Money();
    }
}
