<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The documents associated with the business.
 *
 * generated from: customized_x_unsupported_4705_customer_common_overrides-business_document.json
 */
class BusinessDocument extends Document implements JsonSerializable
{
    use BaseModel;

    /** A social security number. */
    public const TYPE_SOCIAL_SECURITY_NUMBER = 'SOCIAL_SECURITY_NUMBER';

    /** The employee identification number. */
    public const TYPE_EMPLOYMENT_IDENTIFICATION_NUMBER = 'EMPLOYMENT_IDENTIFICATION_NUMBER';

    /** The tax identification number. */
    public const TYPE_TAX_IDENTIFICATION_NUMBER = 'TAX_IDENTIFICATION_NUMBER';

    /** A passport number. */
    public const TYPE_PASSPORT_NUMBER = 'PASSPORT_NUMBER';

    /** A pension fund ID. */
    public const TYPE_PENSION_FUND_ID = 'PENSION_FUND_ID';

    /** A medical insurance ID. */
    public const TYPE_MEDICAL_INSURANCE_ID = 'MEDICAL_INSURANCE_ID';

    /** The identification number issued to Brazilian companies by the Department of Federal Revenue of Brazil. */
    public const TYPE_CNPJ = 'CNPJ';

    /** A Brazilian individual's taxpayer registry identification number. */
    public const TYPE_CPF = 'CPF';

    /** The Permanent account number issued by the Indian Income Tax Department. */
    public const TYPE_PAN = 'PAN';

    /**
     * The type of documents.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_SOCIAL_SECURITY_NUMBER
     * @see TYPE_EMPLOYMENT_IDENTIFICATION_NUMBER
     * @see TYPE_TAX_IDENTIFICATION_NUMBER
     * @see TYPE_PASSPORT_NUMBER
     * @see TYPE_PENSION_FUND_ID
     * @see TYPE_MEDICAL_INSURANCE_ID
     * @see TYPE_CNPJ
     * @see TYPE_CPF
     * @see TYPE_PAN
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in BusinessDocument must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            255,
            "type in BusinessDocument must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
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
