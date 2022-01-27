<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * ACH debit attributes response object.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-ach_debit_attributes_response.json
 */
class AchDebitAttributesResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * ACH debit verification response object
     *
     * @var AchDebitVerificationResponse | null
     */
    public $verification;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->verification) || Assert::isInstanceOf(
            $this->verification,
            AchDebitVerificationResponse::class,
            "verification in AchDebitAttributesResponse must be instance of AchDebitVerificationResponse $within"
        );
        !isset($this->verification) ||  $this->verification->validate(AchDebitAttributesResponse::class);
    }

    private function map(array $data)
    {
        if (isset($data['verification'])) {
            $this->verification = new AchDebitVerificationResponse($data['verification']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initVerification(): AchDebitVerificationResponse
    {
        return $this->verification = new AchDebitVerificationResponse();
    }
}
