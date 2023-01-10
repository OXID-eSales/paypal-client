<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The identity document.
 *
 * generated from:
 * MerchantsCommonComponentsSpecification-v1-schema-common_components-v4-schema-json-openapi-2.0-identity_document.json
 */
class IdentityDocument implements JsonSerializable
{
    use BaseModel;

    /** Social security number. */
    const TYPE_SOCIAL_SECURITY_NUMBER = 'SOCIAL_SECURITY_NUMBER';

    /** Individual tax identification number. */
    const TYPE_INDIVIDUAL_TAXPAYER_IDENTIFICATION_NUMBER = 'INDIVIDUAL_TAXPAYER_IDENTIFICATION_NUMBER';

    /** National identification number, such as CPF or AADHAR. */
    const TYPE_NATIONAL_IDENTIFICATION_NUMBER = 'NATIONAL_IDENTIFICATION_NUMBER';

    /** The tax identification number, such as PAN CARD. */
    const TYPE_TAX_IDENTIFICATION_NUMBER = 'TAX_IDENTIFICATION_NUMBER';

    /** The passport number. */
    const TYPE_PASSPORT_NUMBER = 'PASSPORT_NUMBER';

    /** Last 4 digits of the social security number. */
    const TYPE_SSN4 = 'SSN4';

    /**
     * The identity document type.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_SOCIAL_SECURITY_NUMBER
     * @see TYPE_INDIVIDUAL_TAXPAYER_IDENTIFICATION_NUMBER
     * @see TYPE_NATIONAL_IDENTIFICATION_NUMBER
     * @see TYPE_TAX_IDENTIFICATION_NUMBER
     * @see TYPE_PASSPORT_NUMBER
     * @see TYPE_SSN4
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    /**
     * The document-issuing authority information.
     *
     * @var DocumentIssuer | null
     */
    public $issuer;

    /**
     * The document number, such as the passport number.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 100
     */
    public $id_number;

    /**
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     *
     * @var string | null
     * minLength: 10
     * maxLength: 10
     */
    public $issued_date;

    /**
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     *
     * @var string | null
     * minLength: 10
     * maxLength: 10
     */
    public $expiration_date;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in IdentityDocument must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            255,
            "type in IdentityDocument must have maxlength of 255 $within"
        );
        !isset($this->issuer) || Assert::isInstanceOf(
            $this->issuer,
            DocumentIssuer::class,
            "issuer in IdentityDocument must be instance of DocumentIssuer $within"
        );
        !isset($this->issuer) ||  $this->issuer->validate(IdentityDocument::class);
        !isset($this->id_number) || Assert::minLength(
            $this->id_number,
            1,
            "id_number in IdentityDocument must have minlength of 1 $within"
        );
        !isset($this->id_number) || Assert::maxLength(
            $this->id_number,
            100,
            "id_number in IdentityDocument must have maxlength of 100 $within"
        );
        !isset($this->issued_date) || Assert::minLength(
            $this->issued_date,
            10,
            "issued_date in IdentityDocument must have minlength of 10 $within"
        );
        !isset($this->issued_date) || Assert::maxLength(
            $this->issued_date,
            10,
            "issued_date in IdentityDocument must have maxlength of 10 $within"
        );
        !isset($this->expiration_date) || Assert::minLength(
            $this->expiration_date,
            10,
            "expiration_date in IdentityDocument must have minlength of 10 $within"
        );
        !isset($this->expiration_date) || Assert::maxLength(
            $this->expiration_date,
            10,
            "expiration_date in IdentityDocument must have maxlength of 10 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['issuer'])) {
            $this->issuer = new DocumentIssuer($data['issuer']);
        }
        if (isset($data['id_number'])) {
            $this->id_number = $data['id_number'];
        }
        if (isset($data['issued_date'])) {
            $this->issued_date = $data['issued_date'];
        }
        if (isset($data['expiration_date'])) {
            $this->expiration_date = $data['expiration_date'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initIssuer(): DocumentIssuer
    {
        return $this->issuer = new DocumentIssuer();
    }
}
