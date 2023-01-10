<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The Fraud reversal details.
 *
 * generated from: response-fraud_reversal.json
 */
class ResponseFraudReversal implements JsonSerializable
{
    use BaseModel;

    /** The reversal is due to suspicious credit card use. */
    const REVERSAL_REASON_SUSPICIOUS_CREDIT_CARD_USE = 'SUSPICIOUS_CREDIT_CARD_USE';

    /** The reversal is due to suspicious bank account. */
    const REVERSAL_REASON_SUSPICIOUS_BANK_ACCOUNT_USE = 'SUSPICIOUS_BANK_ACCOUNT_USE';

    /** The reversal is due to suspicious balance payment. */
    const REVERSAL_REASON_SUSPICIOUS_BALANCE_PAYMENT = 'SUSPICIOUS_BALANCE_PAYMENT';

    /** The reversal is due to probable Not as Described seller. */
    const REVERSAL_REASON_PROBABLE_NOT_AS_DESCRIBED_SELLER = 'PROBABLE_NOT_AS_DESCRIBED_SELLER';

    /** The reversal is due to probable Non-Receipt seller. */
    const REVERSAL_REASON_PROBABLE_NON_RECEIPT_SELLER = 'PROBABLE_NON_RECEIPT_SELLER';

    /** The reversal is due to probable unauthorized account access. */
    const REVERSAL_REASON_PROBABLE_UNAUTHORIZED_ACCOUNT_ACCESS = 'PROBABLE_UNAUTHORIZED_ACCOUNT_ACCESS';

    /** The reversal is due to stolen credit card. */
    const REVERSAL_REASON_STOLEN_CREDIT_CARD = 'STOLEN_CREDIT_CARD';

    /** The reversal is due to stolen bank account. */
    const REVERSAL_REASON_STOLEN_BANK_ACCOUNT = 'STOLEN_BANK_ACCOUNT';

    /** The reversal is due to stolen other funding instruments such as buyer credit etc. */
    const REVERSAL_REASON_STOLEN_OTHER_FUNDING_INSTRUMENT = 'STOLEN_OTHER_FUNDING_INSTRUMENT';

    /** The reversal is due to Marketplace Item Removal. */
    const REVERSAL_REASON_MARKETPLACE_ITEM_REMOVAL = 'MARKETPLACE_ITEM_REMOVAL';

    /** The reversal is due to capture fraud. */
    const REVERSAL_REASON_CAPTURE_FRAUD = 'CAPTURE_FRAUD';

    /** The reversal is due to suspicious capture fraud. */
    const REVERSAL_REASON_SUSPICIOUS_CAPTURE_FRAUD = 'SUSPICIOUS_CAPTURE_FRAUD';

    /** The reversal is due to capture credit. */
    const REVERSAL_REASON_CAPTURE_CREDIT = 'CAPTURE_CREDIT';

    /** The reversal is due to chargeback alert. */
    const REVERSAL_REASON_CHARGEBACK_ALERT = 'CHARGEBACK_ALERT';

    /**
     * The fraud reversal reason.
     *
     * use one of constants defined in this class to set the value:
     * @see REVERSAL_REASON_SUSPICIOUS_CREDIT_CARD_USE
     * @see REVERSAL_REASON_SUSPICIOUS_BANK_ACCOUNT_USE
     * @see REVERSAL_REASON_SUSPICIOUS_BALANCE_PAYMENT
     * @see REVERSAL_REASON_PROBABLE_NOT_AS_DESCRIBED_SELLER
     * @see REVERSAL_REASON_PROBABLE_NON_RECEIPT_SELLER
     * @see REVERSAL_REASON_PROBABLE_UNAUTHORIZED_ACCOUNT_ACCESS
     * @see REVERSAL_REASON_STOLEN_CREDIT_CARD
     * @see REVERSAL_REASON_STOLEN_BANK_ACCOUNT
     * @see REVERSAL_REASON_STOLEN_OTHER_FUNDING_INSTRUMENT
     * @see REVERSAL_REASON_MARKETPLACE_ITEM_REMOVAL
     * @see REVERSAL_REASON_CAPTURE_FRAUD
     * @see REVERSAL_REASON_SUSPICIOUS_CAPTURE_FRAUD
     * @see REVERSAL_REASON_CAPTURE_CREDIT
     * @see REVERSAL_REASON_CHARGEBACK_ALERT
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $reversal_reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->reversal_reason) || Assert::minLength(
            $this->reversal_reason,
            1,
            "reversal_reason in ResponseFraudReversal must have minlength of 1 $within"
        );
        !isset($this->reversal_reason) || Assert::maxLength(
            $this->reversal_reason,
            255,
            "reversal_reason in ResponseFraudReversal must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['reversal_reason'])) {
            $this->reversal_reason = $data['reversal_reason'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
