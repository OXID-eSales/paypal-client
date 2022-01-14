<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The API caller can opt in to verify the card through PayPal offered verification services (e.g. Smart Dollar
 * Auth, 3DS).
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-card_verification.json
 */
class CardVerification implements JsonSerializable
{
    use BaseModel;

    /** The contingency surfaced as an additional security layer that helps prevent unauthorized card-not-present transactions and protects the merchant from exposure to fraud. */
    public const METHOD_3D_SECURE = '3D_SECURE';

    /** Places a temporary hold on the card to ensure its validity. This process protects the merchant from exposure to fraud. This verification method will confirm that the address information or CVV included matches what the issuing bank has on file for the associated card, ensuring that only authorized card users are able to make purchases from you. */
    public const METHOD_AVS_CVV = 'AVS_CVV';

    /**
     * use one of constants defined in this class to set the value:
     * @see METHOD_3D_SECURE
     * @see METHOD_AVS_CVV
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $method;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->method) || Assert::minLength(
            $this->method,
            1,
            "method in CardVerification must have minlength of 1 $within"
        );
        !isset($this->method) || Assert::maxLength(
            $this->method,
            255,
            "method in CardVerification must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['method'])) {
            $this->method = $data['method'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
