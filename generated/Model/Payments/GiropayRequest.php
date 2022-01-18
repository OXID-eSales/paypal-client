<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Information needed to pay using giropay.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-giropay_request.json
 */
class GiropayRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The full name representation like Mr J Smith
     *
     * @var string
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
     * @var string
     * minLength: 2
     * maxLength: 2
     */
    public $country_code;

    /**
     * The business identification code (BIC). In payments systems, a BIC is used to identify a specific business,
     * most commonly a bank
     *
     * @var string | null
     * minLength: 8
     * maxLength: 11
     */
    public $bic;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->name, "name in GiropayRequest must not be NULL $within");
        Assert::minLength(
            $this->name,
            3,
            "name in GiropayRequest must have minlength of 3 $within"
        );
        Assert::maxLength(
            $this->name,
            300,
            "name in GiropayRequest must have maxlength of 300 $within"
        );
        Assert::notNull($this->country_code, "country_code in GiropayRequest must not be NULL $within");
        Assert::minLength(
            $this->country_code,
            2,
            "country_code in GiropayRequest must have minlength of 2 $within"
        );
        Assert::maxLength(
            $this->country_code,
            2,
            "country_code in GiropayRequest must have maxlength of 2 $within"
        );
        !isset($this->bic) || Assert::minLength(
            $this->bic,
            8,
            "bic in GiropayRequest must have minlength of 8 $within"
        );
        !isset($this->bic) || Assert::maxLength(
            $this->bic,
            11,
            "bic in GiropayRequest must have maxlength of 11 $within"
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
        if (isset($data['bic'])) {
            $this->bic = $data['bic'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
