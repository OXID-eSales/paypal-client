<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * For a new case, lists the eligible and ineligible dispute reasons. For an existing dispute, lists the eligible
 * and ineligible dispute reasons; the eligible reasons are the ones that the customer can use to update the
 * dispute. To check the eligibility of case creation, specify the encrypted transaction ID. To check the
 * eligibility of dispute reason modification, specify the dispute ID.
 *
 * generated from: request-eligibility_request.json
 */
class RequestEligibilityRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The encrypted transaction ID. The response lists the eligible and ineligible dispute reasons.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $encrypted_transaction_id;

    /**
     * The ID of the dispute. The response lists the eligible and ineligible dispute reasons. The customer can use
     * the eligible reasons to update the dispute.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_id;

    /**
     * Customer provided description of the issue.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $buyer_note;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->encrypted_transaction_id) || Assert::minLength(
            $this->encrypted_transaction_id,
            1,
            "encrypted_transaction_id in RequestEligibilityRequest must have minlength of 1 $within"
        );
        !isset($this->encrypted_transaction_id) || Assert::maxLength(
            $this->encrypted_transaction_id,
            255,
            "encrypted_transaction_id in RequestEligibilityRequest must have maxlength of 255 $within"
        );
        !isset($this->dispute_id) || Assert::minLength(
            $this->dispute_id,
            1,
            "dispute_id in RequestEligibilityRequest must have minlength of 1 $within"
        );
        !isset($this->dispute_id) || Assert::maxLength(
            $this->dispute_id,
            255,
            "dispute_id in RequestEligibilityRequest must have maxlength of 255 $within"
        );
        !isset($this->buyer_note) || Assert::minLength(
            $this->buyer_note,
            1,
            "buyer_note in RequestEligibilityRequest must have minlength of 1 $within"
        );
        !isset($this->buyer_note) || Assert::maxLength(
            $this->buyer_note,
            2000,
            "buyer_note in RequestEligibilityRequest must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['encrypted_transaction_id'])) {
            $this->encrypted_transaction_id = $data['encrypted_transaction_id'];
        }
        if (isset($data['dispute_id'])) {
            $this->dispute_id = $data['dispute_id'];
        }
        if (isset($data['buyer_note'])) {
            $this->buyer_note = $data['buyer_note'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
