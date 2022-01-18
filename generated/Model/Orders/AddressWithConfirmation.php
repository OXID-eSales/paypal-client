<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Address and confirmation details.
 *
 * generated from: model-address_with_confirmation.json
 */
class AddressWithConfirmation extends AddressName implements JsonSerializable
{
    use BaseModel;

    /**
     * Unique address identifier.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 30
     */
    public $id;

    /**
     * Address confirmation status like NONE, PENDING, CONFIRMED, FAILED.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $confirmation_status;

    /**
     * What 3rd party or process has determined the current confirmation_status.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $confirmation_authority;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in AddressWithConfirmation must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            30,
            "id in AddressWithConfirmation must have maxlength of 30 $within"
        );
        !isset($this->confirmation_status) || Assert::minLength(
            $this->confirmation_status,
            1,
            "confirmation_status in AddressWithConfirmation must have minlength of 1 $within"
        );
        !isset($this->confirmation_status) || Assert::maxLength(
            $this->confirmation_status,
            127,
            "confirmation_status in AddressWithConfirmation must have maxlength of 127 $within"
        );
        !isset($this->confirmation_authority) || Assert::minLength(
            $this->confirmation_authority,
            1,
            "confirmation_authority in AddressWithConfirmation must have minlength of 1 $within"
        );
        !isset($this->confirmation_authority) || Assert::maxLength(
            $this->confirmation_authority,
            255,
            "confirmation_authority in AddressWithConfirmation must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['confirmation_status'])) {
            $this->confirmation_status = $data['confirmation_status'];
        }
        if (isset($data['confirmation_authority'])) {
            $this->confirmation_authority = $data['confirmation_authority'];
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
