<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The merchant information. The merchant is also known as the payee. Appears to the customer in checkout,
 * transactions, email receipts, and transaction history.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-payee_displayable.json
 */
class PayeeDisplayable implements JsonSerializable
{
    use BaseModel;

    /**
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * @var string | null
     * maxLength: 254
     */
    public $business_email;

    /**
     * The phone number, in its canonical international [E.164 numbering plan
     * format](https://www.itu.int/rec/T-REC-E.164/en).
     *
     * @var Phone | null
     */
    public $business_phone;

    /**
     * The name of the merchant. Appears to the customer in checkout, payment transactions, email receipts, and
     * transaction history.
     *
     * @var string | null
     * maxLength: 127
     */
    public $brand_name;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->business_email) || Assert::maxLength(
            $this->business_email,
            254,
            "business_email in PayeeDisplayable must have maxlength of 254 $within"
        );
        !isset($this->business_phone) || Assert::isInstanceOf(
            $this->business_phone,
            Phone::class,
            "business_phone in PayeeDisplayable must be instance of Phone $within"
        );
        !isset($this->business_phone) ||  $this->business_phone->validate(PayeeDisplayable::class);
        !isset($this->brand_name) || Assert::maxLength(
            $this->brand_name,
            127,
            "brand_name in PayeeDisplayable must have maxlength of 127 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['business_email'])) {
            $this->business_email = $data['business_email'];
        }
        if (isset($data['business_phone'])) {
            $this->business_phone = new Phone($data['business_phone']);
        }
        if (isset($data['brand_name'])) {
            $this->brand_name = $data['brand_name'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initBusinessPhone(): Phone
    {
        return $this->business_phone = new Phone();
    }
}
