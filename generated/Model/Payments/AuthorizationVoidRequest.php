<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Void authorized payment using alternate identifier.
 *
 * generated from: authorization_void_request.json
 */
class AuthorizationVoidRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The API caller-provided external invoice number for the authorization. Authorization assiciated with this
     * invoice id will be voided.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $invoice_id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->invoice_id) || Assert::minLength(
            $this->invoice_id,
            1,
            "invoice_id in AuthorizationVoidRequest must have minlength of 1 $within"
        );
        !isset($this->invoice_id) || Assert::maxLength(
            $this->invoice_id,
            127,
            "invoice_id in AuthorizationVoidRequest must have maxlength of 127 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['invoice_id'])) {
            $this->invoice_id = $data['invoice_id'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
