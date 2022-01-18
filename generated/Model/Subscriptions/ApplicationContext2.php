<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The application context, which customizes the payer experience during the subscription approval process with
 * PayPal.
 *
 * generated from: customized_x_unsupported_9557_application_context.json
 */
class ApplicationContext2 implements JsonSerializable
{
    use BaseModel;

    /** Get the customer-provided shipping address on the PayPal site. */
    public const SHIPPING_PREFERENCE_GET_FROM_FILE = 'GET_FROM_FILE';

    /** Redacts the shipping address from the PayPal site. Recommended for digital goods. */
    public const SHIPPING_PREFERENCE_NO_SHIPPING = 'NO_SHIPPING';

    /** Get the merchant-provided address. The customer cannot change this address on the PayPal site. If merchant does not pass an address, customer can choose the address on PayPal pages. */
    public const SHIPPING_PREFERENCE_SET_PROVIDED_ADDRESS = 'SET_PROVIDED_ADDRESS';

    /**
     * The label that overrides the business name in the PayPal account on the PayPal site.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $brand_name;

    /**
     * The [language tag](https://tools.ietf.org/html/bcp47#section-2) for the language in which to localize the
     * error-related strings, such as messages, issues, and suggested actions. The tag is made up of the [ISO 639-2
     * language code](https://www.loc.gov/standards/iso639-2/php/code_list.php), the optional [ISO-15924 script
     * tag](https://www.unicode.org/iso15924/codelists.html), and the [ISO-3166 alpha-2 country
     * code](/docs/integration/direct/rest/country-codes/).
     *
     * @var string | null
     * minLength: 2
     * maxLength: 10
     */
    public $locale;

    /**
     * The location from which the shipping address is derived.
     *
     * use one of constants defined in this class to set the value:
     * @see SHIPPING_PREFERENCE_GET_FROM_FILE
     * @see SHIPPING_PREFERENCE_NO_SHIPPING
     * @see SHIPPING_PREFERENCE_SET_PROVIDED_ADDRESS
     * @var string | null
     * minLength: 1
     * maxLength: 24
     */
    public $shipping_preference = 'GET_FROM_FILE';

    /**
     * The customer and merchant payment preferences.
     *
     * @var PaymentMethod | null
     */
    public $payment_method;

    /**
     * The URL where the customer is redirected after the customer approves the payment.
     *
     * @var string
     * minLength: 10
     * maxLength: 4000
     */
    public $return_url;

    /**
     * The URL where the customer is redirected after the customer cancels the payment.
     *
     * @var string
     * minLength: 10
     * maxLength: 4000
     */
    public $cancel_url;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->brand_name) || Assert::minLength(
            $this->brand_name,
            1,
            "brand_name in ApplicationContext2 must have minlength of 1 $within"
        );
        !isset($this->brand_name) || Assert::maxLength(
            $this->brand_name,
            127,
            "brand_name in ApplicationContext2 must have maxlength of 127 $within"
        );
        !isset($this->locale) || Assert::minLength(
            $this->locale,
            2,
            "locale in ApplicationContext2 must have minlength of 2 $within"
        );
        !isset($this->locale) || Assert::maxLength(
            $this->locale,
            10,
            "locale in ApplicationContext2 must have maxlength of 10 $within"
        );
        !isset($this->shipping_preference) || Assert::minLength(
            $this->shipping_preference,
            1,
            "shipping_preference in ApplicationContext2 must have minlength of 1 $within"
        );
        !isset($this->shipping_preference) || Assert::maxLength(
            $this->shipping_preference,
            24,
            "shipping_preference in ApplicationContext2 must have maxlength of 24 $within"
        );
        !isset($this->payment_method) || Assert::isInstanceOf(
            $this->payment_method,
            PaymentMethod::class,
            "payment_method in ApplicationContext2 must be instance of PaymentMethod $within"
        );
        !isset($this->payment_method) ||  $this->payment_method->validate(ApplicationContext2::class);
        Assert::notNull($this->return_url, "return_url in ApplicationContext2 must not be NULL $within");
        Assert::minLength(
            $this->return_url,
            10,
            "return_url in ApplicationContext2 must have minlength of 10 $within"
        );
        Assert::maxLength(
            $this->return_url,
            4000,
            "return_url in ApplicationContext2 must have maxlength of 4000 $within"
        );
        Assert::notNull($this->cancel_url, "cancel_url in ApplicationContext2 must not be NULL $within");
        Assert::minLength(
            $this->cancel_url,
            10,
            "cancel_url in ApplicationContext2 must have minlength of 10 $within"
        );
        Assert::maxLength(
            $this->cancel_url,
            4000,
            "cancel_url in ApplicationContext2 must have maxlength of 4000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['brand_name'])) {
            $this->brand_name = $data['brand_name'];
        }
        if (isset($data['locale'])) {
            $this->locale = $data['locale'];
        }
        if (isset($data['shipping_preference'])) {
            $this->shipping_preference = $data['shipping_preference'];
        }
        if (isset($data['payment_method'])) {
            $this->payment_method = new PaymentMethod($data['payment_method']);
        }
        if (isset($data['return_url'])) {
            $this->return_url = $data['return_url'];
        }
        if (isset($data['cancel_url'])) {
            $this->cancel_url = $data['cancel_url'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPaymentMethod(): PaymentMethod
    {
        return $this->payment_method = new PaymentMethod();
    }
}
