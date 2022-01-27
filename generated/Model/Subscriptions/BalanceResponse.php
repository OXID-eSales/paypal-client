<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The PayPal Balance to fund a payment.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-balance_response.json
 */
class BalanceResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * The PayPal-generated ID for the Balance Funding Instrument.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 16
     */
    public $id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in BalanceResponse must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            16,
            "id in BalanceResponse must have maxlength of 16 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
