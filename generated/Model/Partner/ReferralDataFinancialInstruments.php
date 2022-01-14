<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Financial instruments attached to this account.
 *
 * generated from: referral_data-financial_instruments.json
 */
class ReferralDataFinancialInstruments implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of banks attached to this managed account.
     *
     * @var ReferralDataBank[]
     * maxItems: 0
     * maxItems: 5
     */
    public $banks;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->banks, "banks in ReferralDataFinancialInstruments must not be NULL $within");
        Assert::minCount(
            $this->banks,
            0,
            "banks in ReferralDataFinancialInstruments must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->banks,
            5,
            "banks in ReferralDataFinancialInstruments must have max. count of 5 $within"
        );
        Assert::isArray(
            $this->banks,
            "banks in ReferralDataFinancialInstruments must be array $within"
        );
        if (isset($this->banks)) {
            foreach ($this->banks as $item) {
                $item->validate(ReferralDataFinancialInstruments::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['banks'])) {
            $this->banks = [];
            foreach ($data['banks'] as $item) {
                $this->banks[] = new ReferralDataBank($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->banks = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
