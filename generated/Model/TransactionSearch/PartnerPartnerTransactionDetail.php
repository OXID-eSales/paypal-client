<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The transaction details.
 *
 * generated from: partner-partner_transaction_detail.json
 */
class PartnerPartnerTransactionDetail implements JsonSerializable
{
    use BaseModel;

    /**
     * The transaction information.
     *
     * @var PartnerPartnerTransactionInfo | null
     */
    public $transaction_info;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->transaction_info) || Assert::isInstanceOf(
            $this->transaction_info,
            PartnerPartnerTransactionInfo::class,
            "transaction_info in PartnerPartnerTransactionDetail must be instance of PartnerPartnerTransactionInfo $within"
        );
        !isset($this->transaction_info) ||  $this->transaction_info->validate(PartnerPartnerTransactionDetail::class);
    }

    private function map(array $data)
    {
        if (isset($data['transaction_info'])) {
            $this->transaction_info = new PartnerPartnerTransactionInfo($data['transaction_info']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initTransactionInfo(): PartnerPartnerTransactionInfo
    {
        return $this->transaction_info = new PartnerPartnerTransactionInfo();
    }
}
