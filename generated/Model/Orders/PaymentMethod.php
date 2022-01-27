<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer and merchant payment preferences.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-payment_method.json
 */
class PaymentMethod implements JsonSerializable
{
    use BaseModel;

    /** PayPal Credit. */
    public const PAYER_SELECTED_PAYPAL_CREDIT = 'PAYPAL_CREDIT';

    /** PayPal. */
    public const PAYER_SELECTED_PAYPAL = 'PAYPAL';

    /** PayPal Buy Now Pay Later. */
    public const PAYER_SELECTED_PAYPAL_PAY_LATER = 'PAYPAL_PAY_LATER';

    /** Accepts any type of payment from the customer. */
    public const PAYEE_PREFERRED_UNRESTRICTED = 'UNRESTRICTED';

    /** Accepts only immediate payment from the customer. For example, credit card, PayPal balance, or instant ACH. Ensures that at the time of capture, the payment does not have the `pending` status. */
    public const PAYEE_PREFERRED_IMMEDIATE_PAYMENT_REQUIRED = 'IMMEDIATE_PAYMENT_REQUIRED';

    /** The API caller (merchant/partner) accepts authorization and payment information from a consumer over the telephone. */
    public const STANDARD_ENTRY_CLASS_CODE_TEL = 'TEL';

    /** The API caller (merchant/partner) accepts Debit transactions from a consumer on their website. */
    public const STANDARD_ENTRY_CLASS_CODE_WEB = 'WEB';

    /** Cash concentration and disbursement for corporate debit transaction. Used to disburse or consolidate funds. Entries are usually Optional high-dollar, low-volume, and time-critical. (e.g. intra-company transfers or invoice payments to suppliers). */
    public const STANDARD_ENTRY_CLASS_CODE_CCD = 'CCD';

    /** Prearranged payment and deposit entries. Used for debit payments authorized by a consumer account holder, and usually initiated by a company. These are usually recurring debits (such as insurance premiums). */
    public const STANDARD_ENTRY_CLASS_CODE_PPD = 'PPD';

    /**
     * The customer-selected payment method on the merchant site.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYER_SELECTED_PAYPAL_CREDIT
     * @see PAYER_SELECTED_PAYPAL
     * @see PAYER_SELECTED_PAYPAL_PAY_LATER
     * @var string | null
     * minLength: 1
     */
    public $payer_selected = 'PAYPAL';

    /**
     * The merchant-preferred payment methods.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYEE_PREFERRED_UNRESTRICTED
     * @see PAYEE_PREFERRED_IMMEDIATE_PAYMENT_REQUIRED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $payee_preferred = 'UNRESTRICTED';

    /**
     * NACHA (the regulatory body governing the ACH network) requires that API callers (merchants, partners) obtain
     * the consumer’s explicit authorization before initiating a transaction. To stay compliant, you’ll need to
     * make sure that you retain a compliant authorization for each transaction that you originate to the ACH Network
     * using this API. ACH transactions are categorized (using SEC codes) by how you capture authorization from the
     * Receiver (the person whose bank account is being debited or credited). PayPal supports the following SEC
     * codes.
     *
     * use one of constants defined in this class to set the value:
     * @see STANDARD_ENTRY_CLASS_CODE_TEL
     * @see STANDARD_ENTRY_CLASS_CODE_WEB
     * @see STANDARD_ENTRY_CLASS_CODE_CCD
     * @see STANDARD_ENTRY_CLASS_CODE_PPD
     * @var string | null
     * minLength: 3
     * maxLength: 255
     */
    public $standard_entry_class_code = 'WEB';

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payer_selected) || Assert::minLength(
            $this->payer_selected,
            1,
            "payer_selected in PaymentMethod must have minlength of 1 $within"
        );
        !isset($this->payee_preferred) || Assert::minLength(
            $this->payee_preferred,
            1,
            "payee_preferred in PaymentMethod must have minlength of 1 $within"
        );
        !isset($this->payee_preferred) || Assert::maxLength(
            $this->payee_preferred,
            255,
            "payee_preferred in PaymentMethod must have maxlength of 255 $within"
        );
        !isset($this->standard_entry_class_code) || Assert::minLength(
            $this->standard_entry_class_code,
            3,
            "standard_entry_class_code in PaymentMethod must have minlength of 3 $within"
        );
        !isset($this->standard_entry_class_code) || Assert::maxLength(
            $this->standard_entry_class_code,
            255,
            "standard_entry_class_code in PaymentMethod must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['payer_selected'])) {
            $this->payer_selected = $data['payer_selected'];
        }
        if (isset($data['payee_preferred'])) {
            $this->payee_preferred = $data['payee_preferred'];
        }
        if (isset($data['standard_entry_class_code'])) {
            $this->standard_entry_class_code = $data['standard_entry_class_code'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
