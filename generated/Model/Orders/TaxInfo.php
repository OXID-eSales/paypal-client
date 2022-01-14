<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The tax ID of the customer. The customer is also known as the payer. Both `tax_id` and `tax_id_type` are
 * required.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-tax_info.json
 */
class TaxInfo implements JsonSerializable
{
    use BaseModel;

    /** The individual tax ID type. */
    public const TAX_ID_TYPE_BR_CPF = 'BR_CPF';

    /** The business tax ID type. */
    public const TAX_ID_TYPE_BR_CNPJ = 'BR_CNPJ';

    /**
     * The customer's tax ID. Supported for the PayPal payment method only. Typically, the tax ID is 11 characters
     * long for individuals and 14 characters long for businesses.
     *
     * @var string
     * maxLength: 14
     */
    public $tax_id;

    /**
     * The customer's tax ID type. Supported for the PayPal payment method only.
     *
     * use one of constants defined in this class to set the value:
     * @see TAX_ID_TYPE_BR_CPF
     * @see TAX_ID_TYPE_BR_CNPJ
     * @var string
     */
    public $tax_id_type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->tax_id, "tax_id in TaxInfo must not be NULL $within");
        Assert::maxLength(
            $this->tax_id,
            14,
            "tax_id in TaxInfo must have maxlength of 14 $within"
        );
        Assert::notNull($this->tax_id_type, "tax_id_type in TaxInfo must not be NULL $within");
    }

    private function map(array $data)
    {
        if (isset($data['tax_id'])) {
            $this->tax_id = $data['tax_id'];
        }
        if (isset($data['tax_id_type'])) {
            $this->tax_id_type = $data['tax_id_type'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
