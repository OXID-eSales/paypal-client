<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Information used to pay using Pui.
 *
 */
class Pui implements JsonSerializable
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
     * The business identification code (BIC). In payments systems, a BIC is used to identify a specific business,
     * most commonly a bank.
     *
     * @var string | null
     * minLength: 8
     * maxLength: 11
     */
    public $bic;

    /**
     * The bank_name.
     *
     * @var string | null
     * minLength: 3
     * maxLength: 300
     */
    public $bank_name;

    /**
     * The IBAN.
     *
     * @var string | null
     * minLength: 22
     * maxLength: 22
     */
    public $iban;

    /**
     * The account_holder_name.
     *
     * @var string | null
     * minLength: 3
     * maxLength: 300
     */
    public $account_holder_name;

    /**
     * The payment_reference.
     *
     * @var string | null
     * minLength: 3
     * maxLength: 300
     */
    public $payment_reference;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength(
            $this->name,
            3,
            "name in Pui must have minlength of 3 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            300,
            "name in Pui must have maxlength of 300 $within"
        );
        !isset($this->country_code) || Assert::minLength(
            $this->country_code,
            2,
            "country_code in Pui must have minlength of 2 $within"
        );
        !isset($this->country_code) || Assert::maxLength(
            $this->country_code,
            2,
            "country_code in Pui must have maxlength of 2 $within"
        );
        !isset($this->bic) || Assert::minLength(
            $this->bic,
            8,
            "bic in Pui must have minlength of 8 $within"
        );
        !isset($this->bic) || Assert::maxLength(
            $this->bic,
            11,
            "bic in Pui must have maxlength of 11 $within"
        );
        !isset($this->bank_name) || Assert::minLength(
            $this->bank_name,
            3,
            "bank_name in Pui must have minlength of 3 $within"
        );
        !isset($this->bank_name) || Assert::maxLength(
            $this->bank_name,
            300,
            "bank_name in Pui must have maxlength of 300 $within"
        );
        !isset($this->iban) || Assert::minLength(
            $this->iban,
            22,
            "iban in Pui must have minlength of 22 $within"
        );
        !isset($this->iban) || Assert::maxLength(
            $this->iban,
            22,
            "iban in Pui must have maxlength of 22 $within"
        );
        !isset($this->account_holder_name) || Assert::minLength(
            $this->account_holder_name,
            3,
            "account_holder_name in Pui must have minlength of 3 $within"
        );
        !isset($this->account_holder_name) || Assert::maxLength(
            $this->account_holder_name,
            300,
            "account_holder_name in Pui must have maxlength of 300 $within"
        );
        !isset($this->payment_reference) || Assert::minLength(
            $this->payment_reference,
            3,
            "payment_reference in Pui must have minlength of 3 $within"
        );
        !isset($this->payment_reference) || Assert::maxLength(
            $this->payment_reference,
            300,
            "payment_reference in Pui must have maxlength of 300 $within"
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
        if (isset($data['deposit_bank_details']['bic'])) {
            $this->bic = $data['deposit_bank_details']['bic'];
        }
        if (isset($data['deposit_bank_details']['bank_name'])) {
            $this->bank_name = $data['deposit_bank_details']['bank_name'];
        }
        if (isset($data['deposit_bank_details']['iban'])) {
            $this->iban = $data['deposit_bank_details']['iban'];
        }
        if (isset($data['deposit_bank_details']['account_holder_name'])) {
            $this->account_holder_name = $data['deposit_bank_details']['account_holder_name'];
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
