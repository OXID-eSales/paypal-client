<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The duplicate transaction details.
 *
 * generated from: response-duplicate_transaction.json
 */
class ResponseDuplicateTransaction implements JsonSerializable
{
    use BaseModel;

    /**
     * If `true`, indicates that a duplicate transaction was received.
     *
     * @var boolean | null
     */
    public $received_duplicate;

    /**
     * The information about the disputed transaction.
     *
     * @var ResponseTransactionInfo | null
     */
    public $original_transaction;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->original_transaction) || Assert::isInstanceOf(
            $this->original_transaction,
            ResponseTransactionInfo::class,
            "original_transaction in ResponseDuplicateTransaction must be instance of ResponseTransactionInfo $within"
        );
        !isset($this->original_transaction) ||  $this->original_transaction->validate(ResponseDuplicateTransaction::class);
    }

    private function map(array $data)
    {
        if (isset($data['received_duplicate'])) {
            $this->received_duplicate = $data['received_duplicate'];
        }
        if (isset($data['original_transaction'])) {
            $this->original_transaction = new ResponseTransactionInfo($data['original_transaction']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initOriginalTransaction(): ResponseTransactionInfo
    {
        return $this->original_transaction = new ResponseTransactionInfo();
    }
}
