<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The bank source used to fund the payment
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-bank_response.json
 */
class BankResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * ACH bank details response object
     *
     * @var AchDebitResponse | null
     */
    public $ach_debit;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->ach_debit) || Assert::isInstanceOf(
            $this->ach_debit,
            AchDebitResponse::class,
            "ach_debit in BankResponse must be instance of AchDebitResponse $within"
        );
        !isset($this->ach_debit) ||  $this->ach_debit->validate(BankResponse::class);
    }

    private function map(array $data)
    {
        if (isset($data['ach_debit'])) {
            $this->ach_debit = new AchDebitResponse($data['ach_debit']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAchDebit(): AchDebitResponse
    {
        return $this->ach_debit = new AchDebitResponse();
    }
}
