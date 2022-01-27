<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * SEPA debit attributes response object.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-sepa_debit_attributes_response.json
 */
class SepaDebitAttributesResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * The tokenized payment source to fund a payment.
     *
     * @var Token | null
     */
    public $token;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->token) || Assert::isInstanceOf(
            $this->token,
            Token::class,
            "token in SepaDebitAttributesResponse must be instance of Token $within"
        );
        !isset($this->token) ||  $this->token->validate(SepaDebitAttributesResponse::class);
    }

    private function map(array $data)
    {
        if (isset($data['token'])) {
            $this->token = new Token($data['token']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initToken(): Token
    {
        return $this->token = new Token();
    }
}
