<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Additional attributes associated with the use of this token
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-token_attributes.json
 */
class TokenAttributes implements JsonSerializable
{
    use BaseModel;

    /**
     * The details of the selected installment option.
     *
     * @var Installments | null
     */
    public $installments;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->installments) || Assert::isInstanceOf(
            $this->installments,
            Installments::class,
            "installments in TokenAttributes must be instance of Installments $within"
        );
        !isset($this->installments) ||  $this->installments->validate(TokenAttributes::class);
    }

    private function map(array $data)
    {
        if (isset($data['installments'])) {
            $this->installments = new Installments($data['installments']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initInstallments(): Installments
    {
        return $this->installments = new Installments();
    }
}
