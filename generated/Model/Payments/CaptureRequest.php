<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Captures either a portion or the full authorized amount of an authorized payment.
 *
 * generated from: capture_request.json
 */
class CaptureRequest extends SupplementaryPurchaseData implements JsonSerializable
{
    use BaseModel;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount;

    /**
     * Indicates whether you can make additional captures against the authorized payment. Set to `true` if you do not
     * intend to capture additional payments against the authorization. Set to `false` if you intend to capture
     * additional payments against the authorization.
     *
     * @var boolean | null
     */
    public $final_capture = 'false';

    /**
     * Any additional payment instructions for PayPal Commerce Platform customers. Enables features for the PayPal
     * Commerce Platform, such as delayed disbursement and collection of a platform fee. Applies during order
     * creation for captured payments or during capture of authorized payments.
     *
     * @var PaymentInstruction | null
     */
    public $payment_instruction;

    /**
     * The supplementary data.
     *
     * @var SupplementaryData | null
     */
    public $supplementary_data;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in CaptureRequest must be instance of Money $within"
        );
        !isset($this->amount) ||  $this->amount->validate(CaptureRequest::class);
        !isset($this->payment_instruction) || Assert::isInstanceOf(
            $this->payment_instruction,
            PaymentInstruction::class,
            "payment_instruction in CaptureRequest must be instance of PaymentInstruction $within"
        );
        !isset($this->payment_instruction) ||  $this->payment_instruction->validate(CaptureRequest::class);
        !isset($this->supplementary_data) || Assert::isInstanceOf(
            $this->supplementary_data,
            SupplementaryData::class,
            "supplementary_data in CaptureRequest must be instance of SupplementaryData $within"
        );
        !isset($this->supplementary_data) ||  $this->supplementary_data->validate(CaptureRequest::class);
    }

    private function map(array $data)
    {
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
        }
        if (isset($data['final_capture'])) {
            $this->final_capture = $data['final_capture'];
        }
        if (isset($data['payment_instruction'])) {
            $this->payment_instruction = new PaymentInstruction($data['payment_instruction']);
        }
        if (isset($data['supplementary_data'])) {
            $this->supplementary_data = new SupplementaryData($data['supplementary_data']);
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAmount(): Money
    {
        return $this->amount = new Money();
    }

    public function initPaymentInstruction(): PaymentInstruction
    {
        return $this->payment_instruction = new PaymentInstruction();
    }

    public function initSupplementaryData(): SupplementaryData
    {
        return $this->supplementary_data = new SupplementaryData();
    }
}
