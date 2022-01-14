<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The transaction details.
 *
 * generated from: partner_transaction_detail.json
 */
class PartnerTransactionDetail implements JsonSerializable
{
    use BaseModel;

    /**
     * The transaction information.
     *
     * @var PartnerTransactionInfo | null
     */
    public $transaction_info;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->transaction_info) || Assert::isInstanceOf(
            $this->transaction_info,
            PartnerTransactionInfo::class,
            "transaction_info in PartnerTransactionDetail must be instance of PartnerTransactionInfo $within"
        );
        !isset($this->transaction_info) ||  $this->transaction_info->validate(PartnerTransactionDetail::class);
    }

    private function map(array $data)
    {
        if (isset($data['transaction_info'])) {
            $this->transaction_info = new PartnerTransactionInfo($data['transaction_info']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initTransactionInfo(): PartnerTransactionInfo
    {
        return $this->transaction_info = new PartnerTransactionInfo();
    }
}
