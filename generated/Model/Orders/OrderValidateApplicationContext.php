<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Customizes the payer experience during the approval process for the payment with
 * PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code>
 * and <code>shipping_preference</code> during partner account setup, which overrides the request
 * values.</blockquote>
 *
 * generated from: order_validate_application_context.json
 */
class OrderValidateApplicationContext implements JsonSerializable
{
    use BaseModel;

    /**
     * Signals to vault the payment source upon successful validation. The payment source is vaulted upon successful
     * capture when INTENT=SALE and authorization when INTENT=AUTHORIZE.
     *
     * @var boolean | null
     */
    public $vault = false;

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
     * The URL where the customer is redirected after the customer approves the payment.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2048
     */
    public $return_url;

    /**
     * The URL where the customer is redirected after the customer cancels the payment.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2048
     */
    public $cancel_url;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->locale) || Assert::minLength(
            $this->locale,
            2,
            "locale in OrderValidateApplicationContext must have minlength of 2 $within"
        );
        !isset($this->locale) || Assert::maxLength(
            $this->locale,
            10,
            "locale in OrderValidateApplicationContext must have maxlength of 10 $within"
        );
        !isset($this->return_url) || Assert::minLength(
            $this->return_url,
            1,
            "return_url in OrderValidateApplicationContext must have minlength of 1 $within"
        );
        !isset($this->return_url) || Assert::maxLength(
            $this->return_url,
            2048,
            "return_url in OrderValidateApplicationContext must have maxlength of 2048 $within"
        );
        !isset($this->cancel_url) || Assert::minLength(
            $this->cancel_url,
            1,
            "cancel_url in OrderValidateApplicationContext must have minlength of 1 $within"
        );
        !isset($this->cancel_url) || Assert::maxLength(
            $this->cancel_url,
            2048,
            "cancel_url in OrderValidateApplicationContext must have maxlength of 2048 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['vault'])) {
            $this->vault = $data['vault'];
        }
        if (isset($data['locale'])) {
            $this->locale = $data['locale'];
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
}
