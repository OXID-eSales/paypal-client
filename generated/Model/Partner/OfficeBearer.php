<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The office bearer associated to the account.
 *
 * generated from: customized_x_unsupported_296_customer_common_overrides-office_bearer.json
 */
class OfficeBearer extends Person implements JsonSerializable
{
    use BaseModel;

    /** The ceo. */
    public const ROLE_CEO = 'CEO';

    /** The chairman. */
    public const ROLE_CHAIRMAN = 'CHAIRMAN';

    /** Director of the business */
    public const ROLE_DIRECTOR = 'DIRECTOR';

    /** The secretary. */
    public const ROLE_SECRETARY = 'SECRETARY';

    /** The treasurer. */
    public const ROLE_TREASURER = 'TREASURER';

    /** The trustee. */
    public const ROLE_TRUSTEE = 'TRUSTEE';

    /**
     * Role of the person party played in the business.
     *
     * use one of constants defined in this class to set the value:
     * @see ROLE_CEO
     * @see ROLE_CHAIRMAN
     * @see ROLE_DIRECTOR
     * @see ROLE_SECRETARY
     * @see ROLE_TREASURER
     * @see ROLE_TRUSTEE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $role;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->role) || Assert::minLength(
            $this->role,
            1,
            "role in OfficeBearer must have minlength of 1 $within"
        );
        !isset($this->role) || Assert::maxLength(
            $this->role,
            255,
            "role in OfficeBearer must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['role'])) {
            $this->role = $data['role'];
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
