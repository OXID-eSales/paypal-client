<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The bank source used to fund the payment
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-bank.json
 */
class Bank implements JsonSerializable
{
    use BaseModel;

    /**
     * ACH bank details required to fund the payment.
     *
     * @var AchDebit | null
     */
    public $ach_debit;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->ach_debit) || Assert::isInstanceOf(
            $this->ach_debit,
            AchDebit::class,
            "ach_debit in Bank must be instance of AchDebit $within"
        );
        !isset($this->ach_debit) ||  $this->ach_debit->validate(Bank::class);
    }

    private function map(array $data)
    {
        if (isset($data['ach_debit'])) {
            $this->ach_debit = new AchDebit($data['ach_debit']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAchDebit(): AchDebit
    {
        return $this->ach_debit = new AchDebit();
    }
}
