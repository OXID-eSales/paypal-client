<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer's funding instrument. Returned as a funding option to external entities.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-funding_instrument_response.json
 */
class FundingInstrumentResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * The payment card to use to fund a payment. Card can be a credit or debit card.
     *
     * @var CardResponse | null
     */
    public $card;

    /**
     * The details for a bank account that can be used to fund a payment.
     *
     * @var BankAccountResponse | null
     */
    public $bank_account;

    /**
     * The Buyer credit option used to fund the payment.
     *
     * @var PaypalCredit | null
     */
    public $credit;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->card) || Assert::isInstanceOf(
            $this->card,
            CardResponse::class,
            "card in FundingInstrumentResponse must be instance of CardResponse $within"
        );
        !isset($this->card) ||  $this->card->validate(FundingInstrumentResponse::class);
        !isset($this->bank_account) || Assert::isInstanceOf(
            $this->bank_account,
            BankAccountResponse::class,
            "bank_account in FundingInstrumentResponse must be instance of BankAccountResponse $within"
        );
        !isset($this->bank_account) ||  $this->bank_account->validate(FundingInstrumentResponse::class);
        !isset($this->credit) || Assert::isInstanceOf(
            $this->credit,
            PaypalCredit::class,
            "credit in FundingInstrumentResponse must be instance of PaypalCredit $within"
        );
        !isset($this->credit) ||  $this->credit->validate(FundingInstrumentResponse::class);
    }

    private function map(array $data)
    {
        if (isset($data['card'])) {
            $this->card = new CardResponse($data['card']);
        }
        if (isset($data['bank_account'])) {
            $this->bank_account = new BankAccountResponse($data['bank_account']);
        }
        if (isset($data['credit'])) {
            $this->credit = new PaypalCredit($data['credit']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initCard(): CardResponse
    {
        return $this->card = new CardResponse();
    }

    public function initBankAccount(): BankAccountResponse
    {
        return $this->bank_account = new BankAccountResponse();
    }

    public function initCredit(): PaypalCredit
    {
        return $this->credit = new PaypalCredit();
    }
}
