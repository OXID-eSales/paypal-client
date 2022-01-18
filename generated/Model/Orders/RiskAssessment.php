<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The risk assessment for a customer or merchant account or transaction.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-risk_assessment.json
 */
class RiskAssessment implements JsonSerializable
{
    use BaseModel;

    /**
     * The fine-grained numeric evaluation. Value is from `0` to `999`.
     *
     * @var int | null
     */
    public $score;

    /**
     * An array of risk assessment reasons.
     *
     * @var string[]
     * maxItems: 0
     * maxItems: 9
     */
    public $reasons;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->reasons, "reasons in RiskAssessment must not be NULL $within");
        Assert::minCount(
            $this->reasons,
            0,
            "reasons in RiskAssessment must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->reasons,
            9,
            "reasons in RiskAssessment must have max. count of 9 $within"
        );
        Assert::isArray(
            $this->reasons,
            "reasons in RiskAssessment must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['score'])) {
            $this->score = $data['score'];
        }
        if (isset($data['reasons'])) {
            $this->reasons = [];
            foreach ($data['reasons'] as $item) {
                $this->reasons[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->reasons = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
