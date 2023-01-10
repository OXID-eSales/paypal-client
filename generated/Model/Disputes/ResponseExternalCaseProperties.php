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
    const EXTERNAL_TYPE_BANK_RETURN = 'BANK_RETURN';

    /** The customer requested to reverse the ELV transaction at the issuing bank. */
    const EXTERNAL_TYPE_DIRECT_DEBIT_REVERSAL = 'DIRECT_DEBIT_REVERSAL';

    /** The customer disputed the transaction with the credit card processor. */
    const EXTERNAL_TYPE_CREDIT_CARD_DISPUTE = 'CREDIT_CARD_DISPUTE';

    /** The dispute amount is debited from the merchant. */
    const RECOVERY_TYPE_RECOVERED_FROM_SELLER = 'RECOVERED_FROM_SELLER';

    /** The dispute amount is debited from the customer. */
    const RECOVERY_TYPE_RECOVERED_FROM_BUYER = 'RECOVERED_FROM_BUYER';

    /** The merchant or customer is not liable for the dispute. */
    const RECOVERY_TYPE_NO_RECOVERY = 'NO_RECOVERY';

    /** Card Brand Amex. */
    const CARD_BRAND_AMEX = 'AMEX';

    /** Card Brand CB_NATIONALE. */
    const CARD_BRAND_CB_NATIONALE = 'CB_NATIONALE';

    /** Card Brand CETELEM. */
    const CARD_BRAND_CETELEM = 'CETELEM';

    /** Card Brand COFIDIS. */
    const CARD_BRAND_COFIDIS = 'COFIDIS';

    /** Card Brand COFINOGA. */
    const CARD_BRAND_COFINOGA = 'COFINOGA';

    /** Card Brand CHINA_UNION_PAY. */
    const CARD_BRAND_CHINA_UNION_PAY = 'CHINA_UNION_PAY';

    /** Card Brand DELTA. */
    const CARD_BRAND_DELTA = 'DELTA';

    /** Card Brand DISCOVER. */
    const CARD_BRAND_DISCOVER = 'DISCOVER';

    /** Card Brand ELECTRON. */
    const CARD_BRAND_ELECTRON = 'ELECTRON';

    /** Card Brand ELO. */
    const CARD_BRAND_ELO = 'ELO';

    /** Card Brand HIPER. */
    const CARD_BRAND_HIPER = 'HIPER';

    /** Card Brand HIPERCARD. */
    const CARD_BRAND_HIPERCARD = 'HIPERCARD';

    /** Card Brand JCB. */
    const CARD_BRAND_JCB = 'JCB';

    /** Card Brand MAESTRO. */
    const CARD_BRAND_MAESTRO = 'MAESTRO';

    /** Card Brand MASTER_CARD. */
    const CARD_BRAND_MASTER_CARD = 'MASTER_CARD';

    /** Card Brand SOLO. */
    const CARD_BRAND_SOLO = 'SOLO';

    /** Card Brand STAR. */
    const CARD_BRAND_STAR = 'STAR';

    /** Card Brand SWITCH. */
    const CARD_BRAND_SWITCH = 'SWITCH';

    /** Card Brand VISA. */
    const CARD_BRAND_VISA = 'VISA';

    /** Card Brand GE. */
    const CARD_BRAND_GE = 'GE';

    /** Card Brand RUPAY. */
    const CARD_BRAND_RUPAY = 'RUPAY';

    /** Card Brand SYNCHRONY. */
    const CARD_BRAND_SYNCHRONY = 'SYNCHRONY';

    /** Card Brand DINERS. */
    const CARD_BRAND_DINERS = 'DINERS';

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

    /**
     * Details of the processor.
     *
     * @var Processor | null
     */
    public $processor;

    /**
     * Details of the acquirer.
     *
     * @var Acquirer | null
     */
    public $acquirer;

    /**
     * The card brand.
     *
     * use one of constants defined in this class to set the value:
     * @see CARD_BRAND_AMEX
     * @see CARD_BRAND_CB_NATIONALE
     * @see CARD_BRAND_CETELEM
     * @see CARD_BRAND_COFIDIS
     * @see CARD_BRAND_COFINOGA
     * @see CARD_BRAND_CHINA_UNION_PAY
     * @see CARD_BRAND_DELTA
     * @see CARD_BRAND_DISCOVER
     * @see CARD_BRAND_ELECTRON
     * @see CARD_BRAND_ELO
     * @see CARD_BRAND_HIPER
     * @see CARD_BRAND_HIPERCARD
     * @see CARD_BRAND_JCB
     * @see CARD_BRAND_MAESTRO
     * @see CARD_BRAND_MASTER_CARD
     * @see CARD_BRAND_SOLO
     * @see CARD_BRAND_STAR
     * @see CARD_BRAND_SWITCH
     * @see CARD_BRAND_VISA
     * @see CARD_BRAND_GE
     * @see CARD_BRAND_RUPAY
     * @see CARD_BRAND_SYNCHRONY
     * @see CARD_BRAND_DINERS
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $card_brand;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $received_time;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $response_due_time;

    /**
     * An array of contestations that have been generated by PayPal during the case lifecycle. The array will be
     * sorted based on `create_time` in chronological order. The last item in the array would represent the latest
     * contestation which should be patched when updating the status of the contestation.
     *
     * @var ResponseContestation[]
     * maxItems: 1
     * maxItems: 100
     */
    public $contestations;

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
        !isset($this->processor) || Assert::isInstanceOf(
            $this->processor,
            Processor::class,
            "processor in ResponseExternalCaseProperties must be instance of Processor $within"
        );
        !isset($this->processor) ||  $this->processor->validate(ResponseExternalCaseProperties::class);
        !isset($this->acquirer) || Assert::isInstanceOf(
            $this->acquirer,
            Acquirer::class,
            "acquirer in ResponseExternalCaseProperties must be instance of Acquirer $within"
        );
        !isset($this->acquirer) ||  $this->acquirer->validate(ResponseExternalCaseProperties::class);
        !isset($this->card_brand) || Assert::minLength(
            $this->card_brand,
            1,
            "card_brand in ResponseExternalCaseProperties must have minlength of 1 $within"
        );
        !isset($this->card_brand) || Assert::maxLength(
            $this->card_brand,
            255,
            "card_brand in ResponseExternalCaseProperties must have maxlength of 255 $within"
        );
        !isset($this->received_time) || Assert::minLength(
            $this->received_time,
            20,
            "received_time in ResponseExternalCaseProperties must have minlength of 20 $within"
        );
        !isset($this->received_time) || Assert::maxLength(
            $this->received_time,
            64,
            "received_time in ResponseExternalCaseProperties must have maxlength of 64 $within"
        );
        !isset($this->response_due_time) || Assert::minLength(
            $this->response_due_time,
            20,
            "response_due_time in ResponseExternalCaseProperties must have minlength of 20 $within"
        );
        !isset($this->response_due_time) || Assert::maxLength(
            $this->response_due_time,
            64,
            "response_due_time in ResponseExternalCaseProperties must have maxlength of 64 $within"
        );
        Assert::notNull($this->contestations, "contestations in ResponseExternalCaseProperties must not be NULL $within");
        Assert::minCount(
            $this->contestations,
            1,
            "contestations in ResponseExternalCaseProperties must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->contestations,
            100,
            "contestations in ResponseExternalCaseProperties must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->contestations,
            "contestations in ResponseExternalCaseProperties must be array $within"
        );
        if (isset($this->contestations)) {
            foreach ($this->contestations as $item) {
                $item->validate(ResponseExternalCaseProperties::class);
            }
        }
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
        if (isset($data['processor'])) {
            $this->processor = new Processor($data['processor']);
        }
        if (isset($data['acquirer'])) {
            $this->acquirer = new Acquirer($data['acquirer']);
        }
        if (isset($data['card_brand'])) {
            $this->card_brand = $data['card_brand'];
        }
        if (isset($data['received_time'])) {
            $this->received_time = $data['received_time'];
        }
        if (isset($data['response_due_time'])) {
            $this->response_due_time = $data['response_due_time'];
        }
        if (isset($data['contestations'])) {
            $this->contestations = [];
            foreach ($data['contestations'] as $item) {
                $this->contestations[] = new ResponseContestation($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->contestations = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initReversalFee(): Money
    {
        return $this->reversal_fee = new Money();
    }

    public function initProcessor(): Processor
    {
        return $this->processor = new Processor();
    }

    public function initAcquirer(): Acquirer
    {
        return $this->acquirer = new Acquirer();
    }
}
