<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Provides variety of different references to document. The document may be referenced as voucher in some
 * geographies.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-document_reference.json
 */
class DocumentReference implements JsonSerializable
{
    use BaseModel;

    /** The unique identifier of the document. Consumers can use this identifier to pay with, for example, a banking app. */
    public const TYPE_DOCUMENT_ID = 'DOCUMENT_ID';

    /** Numeric code of the document. This number needs to be displayed as a [Code 128 type barcode](https://www.iso.org/standard/43896.html). */
    public const TYPE_BARCODE = 'BARCODE';

    /** URL to the landing page that would render the document code. */
    public const TYPE_BARCODE_URL = 'BARCODE_URL';

    /**
     * The document reference type such as BARCODE or BARCODE_URL.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_DOCUMENT_ID
     * @see TYPE_BARCODE
     * @see TYPE_BARCODE_URL
     * @var string | null
     * minLength: 1
     * maxLength: 20
     */
    public $type;

    /**
     * The documents reference value.
     *
     * @var string | null
     * minLength: 10
     * maxLength: 4000
     */
    public $value;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in DocumentReference must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            20,
            "type in DocumentReference must have maxlength of 20 $within"
        );
        !isset($this->value) || Assert::minLength(
            $this->value,
            10,
            "value in DocumentReference must have minlength of 10 $within"
        );
        !isset($this->value) || Assert::maxLength(
            $this->value,
            4000,
            "value in DocumentReference must have maxlength of 4000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['value'])) {
            $this->value = $data['value'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
