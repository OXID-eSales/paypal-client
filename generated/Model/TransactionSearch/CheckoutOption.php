<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A checkout option as a name-and-value pair.
 *
 * generated from: checkout_option.json
 */
class CheckoutOption implements JsonSerializable
{
    use BaseModel;

    /**
     * The checkout option name, such as `color` or `texture`.
     *
     * @var string | null
     * maxLength: 200
     */
    public $checkout_option_name;

    /**
     * The checkout option value. For example, the checkout option `color` might be `blue` or `red` while the
     * checkout option `texture` might be `smooth` or `rippled`.
     *
     * @var string | null
     * maxLength: 200
     */
    public $checkout_option_value;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->checkout_option_name) || Assert::maxLength(
            $this->checkout_option_name,
            200,
            "checkout_option_name in CheckoutOption must have maxlength of 200 $within"
        );
        !isset($this->checkout_option_value) || Assert::maxLength(
            $this->checkout_option_value,
            200,
            "checkout_option_value in CheckoutOption must have maxlength of 200 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['checkout_option_name'])) {
            $this->checkout_option_name = $data['checkout_option_name'];
        }
        if (isset($data['checkout_option_value'])) {
            $this->checkout_option_value = $data['checkout_option_value'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
