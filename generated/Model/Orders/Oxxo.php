<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Information used to pay using OXXO.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-oxxo.json
 */
class Oxxo implements JsonSerializable
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
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * @var string | null
     * minLength: 3
     * maxLength: 254
     */
    public $email;

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
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     *
     * @var string | null
     * minLength: 10
     * maxLength: 10
     */
    public $expiry_date;

    /**
     * Document references of the OXXO voucher. This is required by the account holder to complete the payment with
     * OXXO voucher. The account holder can use these document references to pay the OXXO voucher with, for example,
     * a banking app. For OXXO payment method DOCUMENT_ID, BARCODE and BARCODE_URL document types are available.
     *
     * @var DocumentReference[]
     * maxItems: 1
     * maxItems: 10
     */
    public $document_references;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength(
            $this->name,
            3,
            "name in Oxxo must have minlength of 3 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            300,
            "name in Oxxo must have maxlength of 300 $within"
        );
        !isset($this->email) || Assert::minLength(
            $this->email,
            3,
            "email in Oxxo must have minlength of 3 $within"
        );
        !isset($this->email) || Assert::maxLength(
            $this->email,
            254,
            "email in Oxxo must have maxlength of 254 $within"
        );
        !isset($this->country_code) || Assert::minLength(
            $this->country_code,
            2,
            "country_code in Oxxo must have minlength of 2 $within"
        );
        !isset($this->country_code) || Assert::maxLength(
            $this->country_code,
            2,
            "country_code in Oxxo must have maxlength of 2 $within"
        );
        !isset($this->expiry_date) || Assert::minLength(
            $this->expiry_date,
            10,
            "expiry_date in Oxxo must have minlength of 10 $within"
        );
        !isset($this->expiry_date) || Assert::maxLength(
            $this->expiry_date,
            10,
            "expiry_date in Oxxo must have maxlength of 10 $within"
        );
        Assert::notNull($this->document_references, "document_references in Oxxo must not be NULL $within");
        Assert::minCount(
            $this->document_references,
            1,
            "document_references in Oxxo must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->document_references,
            10,
            "document_references in Oxxo must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->document_references,
            "document_references in Oxxo must be array $within"
        );
        if (isset($this->document_references)) {
            foreach ($this->document_references as $item) {
                $item->validate(Oxxo::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
        if (isset($data['country_code'])) {
            $this->country_code = $data['country_code'];
        }
        if (isset($data['expiry_date'])) {
            $this->expiry_date = $data['expiry_date'];
        }
        if (isset($data['document_references'])) {
            $this->document_references = [];
            foreach ($data['document_references'] as $item) {
                $this->document_references[] = new DocumentReference($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->document_references = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
