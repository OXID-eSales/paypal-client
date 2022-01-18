<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Indicates the form of authentication used on the financial instrument.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-authentication_result_type.json
 */
class AuthenticationResultType implements JsonSerializable
{
    use BaseModel;

    /** The card was authenticated using 3D Secure (3DS) authentication scheme. */
    public const TYPE_THREE_DS_AUTHENTICATION = 'THREE_DS_AUTHENTICATION';

    /**
     * The type of authentication used on the financial instrument.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_THREE_DS_AUTHENTICATION
     * @var string | null
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
