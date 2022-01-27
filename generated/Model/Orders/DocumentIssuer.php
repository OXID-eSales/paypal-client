<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The document-issuing authority information.
 *
 * generated from:
 * MerchantsCommonComponentsSpecification-v1-schema-common_components-v4-schema-json-openapi-2.0-document_issuer.json
 */
class DocumentIssuer implements JsonSerializable
{
    use BaseModel;

    /**
     * The [two-character ISO 3166-1 code](/docs/integration/direct/rest/country-codes/) that identifies the country
     * or region.<blockquote><strong>Note:</strong> The country code for Great Britain is <code>GB</code> and not
     * <code>UK</code> as used in the top-level domain names for that country. Use the `C2` country code for China
     * worldwide for comparable uncontrolled price (CUP) method, bank card, and cross-border
     * transactions.</blockquote>
     *
     * @var string
     * minLength: 2
     * maxLength: 2
     */
    public $country_code;

    /**
     * The [state or province code that issued the identity document](/docs/api/reference/state-codes/), as defined
     * by [ISO 3166-2:2013](https://www.iso.org/standard/63546.html).
     *
     * @var string | null
     * minLength: 5
     * maxLength: 6
     */
    public $province_code;

    /**
     * The entity that issued the identity document. For example, `registration authority`.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $authority;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->country_code, "country_code in DocumentIssuer must not be NULL $within");
        Assert::minLength(
            $this->country_code,
            2,
            "country_code in DocumentIssuer must have minlength of 2 $within"
        );
        Assert::maxLength(
            $this->country_code,
            2,
            "country_code in DocumentIssuer must have maxlength of 2 $within"
        );
        !isset($this->province_code) || Assert::minLength(
            $this->province_code,
            5,
            "province_code in DocumentIssuer must have minlength of 5 $within"
        );
        !isset($this->province_code) || Assert::maxLength(
            $this->province_code,
            6,
            "province_code in DocumentIssuer must have maxlength of 6 $within"
        );
        !isset($this->authority) || Assert::minLength(
            $this->authority,
            1,
            "authority in DocumentIssuer must have minlength of 1 $within"
        );
        !isset($this->authority) || Assert::maxLength(
            $this->authority,
            255,
            "authority in DocumentIssuer must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['country_code'])) {
            $this->country_code = $data['country_code'];
        }
        if (isset($data['province_code'])) {
            $this->province_code = $data['province_code'];
        }
        if (isset($data['authority'])) {
            $this->authority = $data['authority'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
