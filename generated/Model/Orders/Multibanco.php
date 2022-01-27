<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Information used to pay using Multibanco.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-multibanco.json
 */
class Multibanco implements JsonSerializable
{
    use BaseModel;

    /**
     * The full name representation like Mr J Smith.
     *
     * @var string | null
     * minLength: 3
     * maxLength: 300
     */
    public $name;

    /**
     * The [two-character ISO 3166-1 code](/docs/integration/direct/rest/country-codes/) that identifies the country
     * or region.<blockquote><strong>Note:</strong> The country code for Great Britain is <code>GB</code> and not
     * <code>UK</code> as used in the top-level domain names for that country. Use the `C2` country code for China
     * worldwide for comparable uncontrolled price (CUP) method, bank card, and cross-border
     * transactions.</blockquote>
     *
     * @var string | null
     * minLength: 2
     * maxLength: 2
     */
    public $country_code;

    /**
     * Payment entity ID required by the account holder to complete the payment.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $payment_entity;

    /**
     * Payment reference number required by the account holder to complete the payment.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $payment_reference;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength(
            $this->name,
            3,
            "name in Multibanco must have minlength of 3 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            300,
            "name in Multibanco must have maxlength of 300 $within"
        );
        !isset($this->country_code) || Assert::minLength(
            $this->country_code,
            2,
            "country_code in Multibanco must have minlength of 2 $within"
        );
        !isset($this->country_code) || Assert::maxLength(
            $this->country_code,
            2,
            "country_code in Multibanco must have maxlength of 2 $within"
        );
        !isset($this->payment_entity) || Assert::minLength(
            $this->payment_entity,
            1,
            "payment_entity in Multibanco must have minlength of 1 $within"
        );
        !isset($this->payment_entity) || Assert::maxLength(
            $this->payment_entity,
            255,
            "payment_entity in Multibanco must have maxlength of 255 $within"
        );
        !isset($this->payment_reference) || Assert::minLength(
            $this->payment_reference,
            1,
            "payment_reference in Multibanco must have minlength of 1 $within"
        );
        !isset($this->payment_reference) || Assert::maxLength(
            $this->payment_reference,
            255,
            "payment_reference in Multibanco must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['country_code'])) {
            $this->country_code = $data['country_code'];
        }
        if (isset($data['payment_entity'])) {
            $this->payment_entity = $data['payment_entity'];
        }
        if (isset($data['payment_reference'])) {
            $this->payment_reference = $data['payment_reference'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
