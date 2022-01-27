<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The tax ID of the customer. The customer is also known as the payer. Both `tax_id` and `tax_id_type` are
 * required.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-tax_info.json
 */
class TaxInfo implements JsonSerializable
{
    use BaseModel;

    /** The individual tax ID type, typically is 11 characters long. */
    public const TAX_ID_TYPE_BR_CPF = 'BR_CPF';

    /** The business tax ID type, typically is 14 characters long. */
    public const TAX_ID_TYPE_BR_CNPJ = 'BR_CNPJ';

    /**
     * The customer's tax ID value.
     *
     * @var string
     * maxLength: 14
     */
    public $tax_id;

    /**
     * The customer's tax ID type.
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
