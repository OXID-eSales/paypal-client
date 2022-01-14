<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payer information.
 *
 * generated from: payer_info.json
 */
class PayerInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * The PayPal` customer account ID.
     *
     * @var string | null
     * maxLength: 13
     */
    public $account_id;

    /**
     * The address status of the payer. Value is either:<ul><li><code>Y</code>. Verified.</li><li><code>N</code>. Not
     * verified.</li></ul>
     *
     * @var string | null
     */
    public $address_status;

    /**
     * The status of the payer. Value is `Y` or `N`.
     *
     * @var string | null
     */
    public $payer_status;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->account_id) || Assert::maxLength(
            $this->account_id,
            13,
            "account_id in PayerInfo must have maxlength of 13 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['account_id'])) {
            $this->account_id = $data['account_id'];
        }
        if (isset($data['address_status'])) {
            $this->address_status = $data['address_status'];
        }
        if (isset($data['payer_status'])) {
            $this->payer_status = $data['payer_status'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
