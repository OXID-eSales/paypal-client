<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Auth directives for the transaction.
 *
 * generated from: model-authorization_directives.json
 */
class AuthorizationDirectives implements JsonSerializable
{
    use BaseModel;

    /**
     * Honor period offset. This is the offset period (in seconds) starting from time of authorization after which
     * held funds (if any) will be released automatically.
     *
     * @var int | null
     */
    public $honor_time_offset;

    /**
     * Expiry period offset. This is the offset period (in seconds) starting from time of authorization after which
     * authorization is voided automatically.
     *
     * @var int | null
     */
    public $expiry_time_offset;

    /**
     * Indicates if multiple captures can be allowed on an Authorization.
     *
     * @var boolean | null
     */
    public $allow_multiple_captures;

    /**
     * Auth-Capture Tolerance details.
     *
     * @var AuthTolerance | null
     */
    public $tolerance;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->tolerance) || Assert::isInstanceOf(
            $this->tolerance,
            AuthTolerance::class,
            "tolerance in AuthorizationDirectives must be instance of AuthTolerance $within"
        );
        !isset($this->tolerance) ||  $this->tolerance->validate(AuthorizationDirectives::class);
    }

    private function map(array $data)
    {
        if (isset($data['honor_time_offset'])) {
            $this->honor_time_offset = $data['honor_time_offset'];
        }
        if (isset($data['expiry_time_offset'])) {
            $this->expiry_time_offset = $data['expiry_time_offset'];
        }
        if (isset($data['allow_multiple_captures'])) {
            $this->allow_multiple_captures = $data['allow_multiple_captures'];
        }
        if (isset($data['tolerance'])) {
            $this->tolerance = new AuthTolerance($data['tolerance']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initTolerance(): AuthTolerance
    {
        return $this->tolerance = new AuthTolerance();
    }
}
