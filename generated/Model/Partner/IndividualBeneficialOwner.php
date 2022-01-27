<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The individual owner of the account.
 *
 * generated from: customized_x_unsupported_1812_customer_common_overrides-individual_beneficial_owner.json
 */
class IndividualBeneficialOwner extends Person implements JsonSerializable
{
    use BaseModel;

    /**
     * The percentage, as a fixed-point, signed decimal number. For example, define a 19.99% interest rate as
     * `19.99`.
     *
     * @var string | null
     */
    public $percentage_of_ownership;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    private function map(array $data)
    {
        if (isset($data['percentage_of_ownership'])) {
            $this->percentage_of_ownership = $data['percentage_of_ownership'];
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        if (isset($data)) {
            $this->map($data);
        }
    }
}
