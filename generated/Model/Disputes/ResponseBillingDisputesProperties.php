<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The billing issue details.
 *
 * generated from: response-billing_disputes_properties.json
 */
class ResponseBillingDisputesProperties implements JsonSerializable
{
    use BaseModel;

    /**
     * The duplicate transaction details.
     *
     * @var ResponseDuplicateTransaction | null
     */
    public $duplicate_transaction;

    /**
     * The incorrect transaction amount details.
     *
     * @var ResponseIncorrectTransactionAmount | null
     */
    public $incorrect_transaction_amount;

    /**
     * The payment by other means details.
     *
     * @var ResponsePaymentByOtherMeans | null
     */
    public $payment_by_other_means;

    /**
     * The credit not processed details.
     *
     * @var ResponseCreditNotProcessed | null
     */
    public $credit_not_processed;

    /**
     * The recurring billing canceled details.
     *
     * @var ResponseCanceledRecurringBilling | null
     */
    public $canceled_recurring_billing;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->duplicate_transaction) || Assert::isInstanceOf(
            $this->duplicate_transaction,
            ResponseDuplicateTransaction::class,
            "duplicate_transaction in ResponseBillingDisputesProperties must be instance of ResponseDuplicateTransaction $within"
        );
        !isset($this->duplicate_transaction) ||  $this->duplicate_transaction->validate(ResponseBillingDisputesProperties::class);
        !isset($this->incorrect_transaction_amount) || Assert::isInstanceOf(
            $this->incorrect_transaction_amount,
            ResponseIncorrectTransactionAmount::class,
            "incorrect_transaction_amount in ResponseBillingDisputesProperties must be instance of ResponseIncorrectTransactionAmount $within"
        );
        !isset($this->incorrect_transaction_amount) ||  $this->incorrect_transaction_amount->validate(ResponseBillingDisputesProperties::class);
        !isset($this->payment_by_other_means) || Assert::isInstanceOf(
            $this->payment_by_other_means,
            ResponsePaymentByOtherMeans::class,
            "payment_by_other_means in ResponseBillingDisputesProperties must be instance of ResponsePaymentByOtherMeans $within"
        );
        !isset($this->payment_by_other_means) ||  $this->payment_by_other_means->validate(ResponseBillingDisputesProperties::class);
        !isset($this->credit_not_processed) || Assert::isInstanceOf(
            $this->credit_not_processed,
            ResponseCreditNotProcessed::class,
            "credit_not_processed in ResponseBillingDisputesProperties must be instance of ResponseCreditNotProcessed $within"
        );
        !isset($this->credit_not_processed) ||  $this->credit_not_processed->validate(ResponseBillingDisputesProperties::class);
        !isset($this->canceled_recurring_billing) || Assert::isInstanceOf(
            $this->canceled_recurring_billing,
            ResponseCanceledRecurringBilling::class,
            "canceled_recurring_billing in ResponseBillingDisputesProperties must be instance of ResponseCanceledRecurringBilling $within"
        );
        !isset($this->canceled_recurring_billing) ||  $this->canceled_recurring_billing->validate(ResponseBillingDisputesProperties::class);
    }

    private function map(array $data)
    {
        if (isset($data['duplicate_transaction'])) {
            $this->duplicate_transaction = new ResponseDuplicateTransaction($data['duplicate_transaction']);
        }
        if (isset($data['incorrect_transaction_amount'])) {
            $this->incorrect_transaction_amount = new ResponseIncorrectTransactionAmount($data['incorrect_transaction_amount']);
        }
        if (isset($data['payment_by_other_means'])) {
            $this->payment_by_other_means = new ResponsePaymentByOtherMeans($data['payment_by_other_means']);
        }
        if (isset($data['credit_not_processed'])) {
            $this->credit_not_processed = new ResponseCreditNotProcessed($data['credit_not_processed']);
        }
        if (isset($data['canceled_recurring_billing'])) {
            $this->canceled_recurring_billing = new ResponseCanceledRecurringBilling($data['canceled_recurring_billing']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initDuplicateTransaction(): ResponseDuplicateTransaction
    {
        return $this->duplicate_transaction = new ResponseDuplicateTransaction();
    }

    public function initIncorrectTransactionAmount(): ResponseIncorrectTransactionAmount
    {
        return $this->incorrect_transaction_amount = new ResponseIncorrectTransactionAmount();
    }

    public function initPaymentByOtherMeans(): ResponsePaymentByOtherMeans
    {
        return $this->payment_by_other_means = new ResponsePaymentByOtherMeans();
    }

    public function initCreditNotProcessed(): ResponseCreditNotProcessed
    {
        return $this->credit_not_processed = new ResponseCreditNotProcessed();
    }

    public function initCanceledRecurringBilling(): ResponseCanceledRecurringBilling
    {
        return $this->canceled_recurring_billing = new ResponseCanceledRecurringBilling();
    }
}
