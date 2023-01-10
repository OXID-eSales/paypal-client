<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer and merchant payment preferences.
 *
 * generated from:
 * customized_x_unsupported_7330_merchant.CommonComponentsSpecification-v1-schema-payment_method.json
 */
class PaymentMethod2 implements JsonSerializable
{
    use BaseModel;

    /** PayPal Credit. */
    const PAYER_SELECTED_PAYPAL_CREDIT = 'PAYPAL_CREDIT';

    /** PayPal. */
    const PAYER_SELECTED_PAYPAL = 'PAYPAL';

    /** PayPal Buy Now Pay Later. */
    const PAYER_SELECTED_PAYPAL_PAY_LATER = 'PAYPAL_PAY_LATER';

    /** Accepts any type of payment from the customer. */
    const PAYEE_PREFERRED_UNRESTRICTED = 'UNRESTRICTED';

    /** Accepts only immediate payment from the customer. For example, credit card, PayPal balance, or instant ACH. Ensures that at the time of capture, the payment does not have the `pending` status. */
    const PAYEE_PREFERRED_IMMEDIATE_PAYMENT_REQUIRED = 'IMMEDIATE_PAYMENT_REQUIRED';

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payer_selected) || Assert::minLength(
            $this->payer_selected,
            1,
            "payer_selected in PaymentMethod2 must have minlength of 1 $within"
        );
        !isset($this->payee_preferred) || Assert::minLength(
            $this->payee_preferred,
            1,
            "payee_preferred in PaymentMethod2 must have minlength of 1 $within"
        );
        !isset($this->payee_preferred) || Assert::maxLength(
            $this->payee_preferred,
            255,
            "payee_preferred in PaymentMethod2 must have maxlength of 255 $within"
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
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
