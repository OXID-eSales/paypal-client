<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details about a saved payment source.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-vault_response.json
 */
class VaultResponse implements JsonSerializable
{
    use BaseModel;

    /** The payment source has been saved in your customer's vault. */
    public const STATUS_CREATED = 'CREATED';

    /** Customer has approved the action of saving the specified payment_source into their vault. Use v2/vault/approval-tokens/id/confirm-payment-token to save the payment_source in the vault. */
    public const STATUS_APPROVED = 'APPROVED';

    /**
     * The PayPal-generated ID for the saved payment source.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * The vault status.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CREATED
     * @see STATUS_APPROVED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $status;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in VaultResponse must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            255,
            "id in VaultResponse must have maxlength of 255 $within"
        );
        !isset($this->status) || Assert::minLength(
            $this->status,
            1,
            "status in VaultResponse must have minlength of 1 $within"
        );
        !isset($this->status) || Assert::maxLength(
            $this->status,
            255,
            "status in VaultResponse must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
