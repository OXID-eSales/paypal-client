<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use OxidSolutionCatalysts\PayPalApi\Model\Subscriptions\Money;
use stdClass;
use Webmozart\Assert\Assert;

/**
 * The Balance information.
 *
 * generated from: balance_detail.json
 */
class BalanceDetail implements JsonSerializable
{
    use BaseModel;

    /**
     * Optional field representing if the currency is primary currency or not.
     *
     * @var boolean | null
     */
    public $primary;

    public $currency;

    public $total_balance;

    public $available_balance;

    public $withheld_balance;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    private function map(array $data)
    {
        if (isset($data['primary'])) {
            $this->primary = $data['primary'];
        }

        if (isset($data['currency'])) {
            $this->currency = $data['currency'];
        }

        if (isset($data['total_balance'])) {
            $money = new Money();
            $money->currency_code = $data['total_balance']['currency_code'];
            $money->value = $data['total_balance']['value'];
            $this->total_balance = $money;
        }

        if (isset($data['available_balance'])) {
            $money = new Money();
            $money->currency_code = $data['available_balance']['currency_code'];
            $money->value = $data['available_balance']['value'];
            $this->available_balance = $money;
        }

        if (isset($data['withheld_balance'])) {
            $money = new Money();
            $money->currency_code = $data['withheld_balance']['currency_code'];
            $money->value = $data['withheld_balance']['value'];
            $this->withheld_balance = $money;
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
