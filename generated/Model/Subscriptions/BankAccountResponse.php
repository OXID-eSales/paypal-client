<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details for a bank account that can be used to fund a payment.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-bank_account_response.json
 */
class BankAccountResponse implements JsonSerializable
{
    use BaseModel;

    /** A savings account. */
    public const ACCOUNT_TYPE_SAVINGS = 'SAVINGS';

    /** A checking account. */
    public const ACCOUNT_TYPE_CHECKING = 'CHECKING';

    /**
     * The PayPal-generated ID for the bank account.
     *
     * @var string
     */
    public $id;

    /**
     * The last four digits of the bank account number.
     *
     * @var string
     */
    public $last_n_chars;

    /**
     * The name of the bank to which the account is linked.
     *
     * @var string
     * maxLength: 64
     */
    public $bank_name;

    /**
     * The type of bank account.
     *
     * use one of constants defined in this class to set the value:
     * @see ACCOUNT_TYPE_SAVINGS
     * @see ACCOUNT_TYPE_CHECKING
     * @var string | null
     */
    public $account_type;

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
     * The backup funding instrument to use for payment when the primary instrument fails.
     *
     * @var BackupFundingInstrument | null
     */
    public $backup_funding_instrument;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->id, "id in BankAccountResponse must not be NULL $within");
        Assert::notNull($this->last_n_chars, "last_n_chars in BankAccountResponse must not be NULL $within");
        Assert::notNull($this->bank_name, "bank_name in BankAccountResponse must not be NULL $within");
        Assert::maxLength(
            $this->bank_name,
            64,
            "bank_name in BankAccountResponse must have maxlength of 64 $within"
        );
        Assert::notNull($this->country_code, "country_code in BankAccountResponse must not be NULL $within");
        Assert::minLength(
            $this->country_code,
            2,
            "country_code in BankAccountResponse must have minlength of 2 $within"
        );
        Assert::maxLength(
            $this->country_code,
            2,
            "country_code in BankAccountResponse must have maxlength of 2 $within"
        );
        !isset($this->backup_funding_instrument) || Assert::isInstanceOf(
            $this->backup_funding_instrument,
            BackupFundingInstrument::class,
            "backup_funding_instrument in BankAccountResponse must be instance of BackupFundingInstrument $within"
        );
        !isset($this->backup_funding_instrument) ||  $this->backup_funding_instrument->validate(BankAccountResponse::class);
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['last_n_chars'])) {
            $this->last_n_chars = $data['last_n_chars'];
        }
        if (isset($data['bank_name'])) {
            $this->bank_name = $data['bank_name'];
        }
        if (isset($data['account_type'])) {
            $this->account_type = $data['account_type'];
        }
        if (isset($data['country_code'])) {
            $this->country_code = $data['country_code'];
        }
        if (isset($data['backup_funding_instrument'])) {
            $this->backup_funding_instrument = new BackupFundingInstrument($data['backup_funding_instrument']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initBackupFundingInstrument(): BackupFundingInstrument
    {
        return $this->backup_funding_instrument = new BackupFundingInstrument();
    }
}
