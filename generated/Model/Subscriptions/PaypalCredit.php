<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The Buyer credit option used to fund the payment.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-paypal_credit.json
 */
class PaypalCredit implements JsonSerializable
{
    use BaseModel;

    /** Bill Me Later. */
    const TYPE_BILL_ME_LATER = 'BILL_ME_LATER';

    /** PayPal Smart Connect. */
    const TYPE_PAYPAL_SMART_CONNECT = 'PAYPAL_SMART_CONNECT';

    /** EBAY MasterCard. */
    const TYPE_EBAY_MASTERCARD = 'EBAY_MASTERCARD';

    /** PayPal Extras MasterCard. */
    const TYPE_PAYPAL_EXTRAS_MASTERCARD = 'PAYPAL_EXTRAS_MASTERCARD';

    /**
     * The PayPal-generated ID for the credit instrument.
     *
     * @var string
     * minLength: 4
     * maxLength: 25
     */
    public $id;

    /**
     * The credit sub-types.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_BILL_ME_LATER
     * @see TYPE_PAYPAL_SMART_CONNECT
     * @see TYPE_EBAY_MASTERCARD
     * @see TYPE_PAYPAL_EXTRAS_MASTERCARD
     * @var string | null
     * minLength: 1
     * maxLength: 50
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->id, "id in PaypalCredit must not be NULL $within");
        Assert::minLength(
            $this->id,
            4,
            "id in PaypalCredit must have minlength of 4 $within"
        );
        Assert::maxLength(
            $this->id,
            25,
            "id in PaypalCredit must have maxlength of 25 $within"
        );
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in PaypalCredit must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            50,
            "type in PaypalCredit must have maxlength of 50 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
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
