<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * ACH debit verification object.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-ach_debit_verification.json
 */
class AchDebitVerification implements JsonSerializable
{
    use BaseModel;

    /**
     * ACH debit external verification object
     *
     * @var AchDebitVerificationExternal | null
     */
    public $external;

    /**
     * If `true` indicates that the ach debit account should be verified, disregarding past PayPal verifications and
     * request parameters.
     *
     * @var boolean | null
     */
    public $force_verification = 'false';

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->external) || Assert::isInstanceOf(
            $this->external,
            AchDebitVerificationExternal::class,
            "external in AchDebitVerification must be instance of AchDebitVerificationExternal $within"
        );
        !isset($this->external) ||  $this->external->validate(AchDebitVerification::class);
    }

    private function map(array $data)
    {
        if (isset($data['external'])) {
            $this->external = new AchDebitVerificationExternal($data['external']);
        }
        if (isset($data['force_verification'])) {
            $this->force_verification = $data['force_verification'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initExternal(): AchDebitVerificationExternal
    {
        return $this->external = new AchDebitVerificationExternal();
    }
}
