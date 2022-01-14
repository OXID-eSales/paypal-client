<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The risk assessment for a customer account, merchant account, or transaction.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-risk_assessments.json
 */
class RiskAssessments implements JsonSerializable
{
    use BaseModel;

    /**
     * The risk assessment for a customer or merchant account or transaction.
     *
     * @var RiskAssessment | null
     */
    public $payer;

    /**
     * The risk assessment for a customer or merchant account or transaction.
     *
     * @var RiskAssessment | null
     */
    public $payee;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payer) || Assert::isInstanceOf(
            $this->payer,
            RiskAssessment::class,
            "payer in RiskAssessments must be instance of RiskAssessment $within"
        );
        !isset($this->payer) ||  $this->payer->validate(RiskAssessments::class);
        !isset($this->payee) || Assert::isInstanceOf(
            $this->payee,
            RiskAssessment::class,
            "payee in RiskAssessments must be instance of RiskAssessment $within"
        );
        !isset($this->payee) ||  $this->payee->validate(RiskAssessments::class);
    }

    private function map(array $data)
    {
        if (isset($data['payer'])) {
            $this->payer = new RiskAssessment($data['payer']);
        }
        if (isset($data['payee'])) {
            $this->payee = new RiskAssessment($data['payee']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPayer(): RiskAssessment
    {
        return $this->payer = new RiskAssessment();
    }

    public function initPayee(): RiskAssessment
    {
        return $this->payee = new RiskAssessment();
    }
}
