<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The exchange rate that determines the amount to convert from one currency to another currency.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-exchange_rate.json
 */
class ExchangeRate implements JsonSerializable
{
    use BaseModel;

    /**
     * The [three-character ISO-4217 currency code](/docs/integration/direct/rest/currency-codes/) that identifies
     * the currency.
     *
     * @var string | null
     * minLength: 3
     * maxLength: 3
     */
    public $source_currency;

    /**
     * The [three-character ISO-4217 currency code](/docs/integration/direct/rest/currency-codes/) that identifies
     * the currency.
     *
     * @var string | null
     * minLength: 3
     * maxLength: 3
     */
    public $target_currency;

    /**
     * The target currency amount. Equivalent to one unit of the source currency. Formatted as integer or decimal
     * value with one to 15 digits to the right of the decimal point.
     *
     * @var string | null
     */
    public $value;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->source_currency) || Assert::minLength(
            $this->source_currency,
            3,
            "source_currency in ExchangeRate must have minlength of 3 $within"
        );
        !isset($this->source_currency) || Assert::maxLength(
            $this->source_currency,
            3,
            "source_currency in ExchangeRate must have maxlength of 3 $within"
        );
        !isset($this->target_currency) || Assert::minLength(
            $this->target_currency,
            3,
            "target_currency in ExchangeRate must have minlength of 3 $within"
        );
        !isset($this->target_currency) || Assert::maxLength(
            $this->target_currency,
            3,
            "target_currency in ExchangeRate must have maxlength of 3 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['source_currency'])) {
            $this->source_currency = $data['source_currency'];
        }
        if (isset($data['target_currency'])) {
            $this->target_currency = $data['target_currency'];
        }
        if (isset($data['value'])) {
            $this->value = $data['value'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
