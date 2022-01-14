<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The incentive details.
 *
 * generated from: incentive_detail.json
 */
class IncentiveDetail implements JsonSerializable
{
    use BaseModel;

    /**
     * The type of incentive, such as a special offer or coupon.
     *
     * @var string | null
     * maxLength: 500
     */
    public $incentive_type;

    /**
     * The code that identifies an incentive, such as a coupon.
     *
     * @var string | null
     * maxLength: 200
     */
    public $incentive_code;

    /**
     * The incentive program code that identifies a merchant loyalty or incentive program.
     *
     * @var string | null
     * maxLength: 100
     */
    public $incentive_program_code;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->incentive_type) || Assert::maxLength(
            $this->incentive_type,
            500,
            "incentive_type in IncentiveDetail must have maxlength of 500 $within"
        );
        !isset($this->incentive_code) || Assert::maxLength(
            $this->incentive_code,
            200,
            "incentive_code in IncentiveDetail must have maxlength of 200 $within"
        );
        !isset($this->incentive_program_code) || Assert::maxLength(
            $this->incentive_program_code,
            100,
            "incentive_program_code in IncentiveDetail must have maxlength of 100 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['incentive_type'])) {
            $this->incentive_type = $data['incentive_type'];
        }
        if (isset($data['incentive_code'])) {
            $this->incentive_code = $data['incentive_code'];
        }
        if (isset($data['incentive_program_code'])) {
            $this->incentive_program_code = $data['incentive_program_code'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
