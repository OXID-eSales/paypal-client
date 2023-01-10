<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The tokenized payment source to fund a payment.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-token.json
 */
class Token implements JsonSerializable
{
    use BaseModel;

    /** A secure, one-time-use reference to a payment source, such as payment card or PayPal account. */
    const TYPE_NONCE = 'NONCE';

    /** The payment method token, which is a reference to a transactional payment source. Typically stored on the merchant's server. */
    const TYPE_PAYMENT_METHOD_TOKEN = 'PAYMENT_METHOD_TOKEN';

    /** The PayPal billing agreement ID. References an approved recurring payment for goods or services. */
    const TYPE_BILLING_AGREEMENT = 'BILLING_AGREEMENT';

    /** The PayPal funding option ID. Represents a payment plan identifier computed based on buyer wallet, seller account and transaction currency. This value cannot be used when `payment_initiator=MERCHANT`. */
    const TYPE_FUNDING_OPTION_ID = 'FUNDING_OPTION_ID';

    /** This input is primarily aimed at providing backward compatibility to approved merchants that have previously integrated with [DoReferenceTransaction](/docs/nvp-soap-api/do-reference-transaction-nvp/). The use is analogous to the use of [ReferenceID](/docs/nvp-soap-api/do-reference-transaction-nvp/) field within the DoReferenceTransaction API. The value is typically a valid transaction ID from a previous purchase, such as a card charge using the DoDirectPayment API. Transaction IDs are valid for 4 years from the transaction date. */
    const TYPE_PAYPAL_TRANSACTION_ID = 'PAYPAL_TRANSACTION_ID';

    /** This input is primarily aimed at providing backward compatibility to approved merchants that have previously integrated with [PayFlow SubmitReferenceTransactions](https://developer.paypal.com/docs/classic/payflow/integration-guide/submit-transactions/?mark=Reference%20Transactions#submit-reference-transactions---tokenization). The [PNREF](https://developer.paypal.com/docs/classic/payflow/integration-guide/transaction-responses/?mark=pnref#pnref) is a unique transaction identification number issued by PayPal. The `PNREF` is returned in a transaction response indicating that your transaction was received by PayPal. `PNREF` is valid for 15 months from the transaction date. */
    const TYPE_PNREF = 'PNREF';

    /** This id is the authorization id from previously successful authorization call.  It is used to authorize additional amount over the previously authorized amount stored in the systems, if the requested amount is higher.  In the case that authorization id is no longer valid (e.g. voided or used), it would return an error.  For expired authorization id, it would do a fresh authorization. This value cannot be used when `payment_initiator=MERCHANT`. */
    const TYPE_AUTHORIZATION_ID = 'AUTHORIZATION_ID';

    /** This token is a reference to a bank payment source. Currently SEPA debit payment method uses this token for tokenization support, and it is also used to assist SEPA mandate management operations such as generating mandate links and revoking mandate. */
    const TYPE_BANK_REFERENCE_TOKEN = 'BANK_REFERENCE_TOKEN';

    /**
     * The PayPal-generated ID for the token.
     *
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * The tokenization method that generated the ID.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_NONCE
     * @see TYPE_PAYMENT_METHOD_TOKEN
     * @see TYPE_BILLING_AGREEMENT
     * @see TYPE_FUNDING_OPTION_ID
     * @see TYPE_PAYPAL_TRANSACTION_ID
     * @see TYPE_PNREF
     * @see TYPE_AUTHORIZATION_ID
     * @see TYPE_BANK_REFERENCE_TOKEN
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    /**
     * Additional attributes associated with the use of this token
     *
     * @var TokenAttributes | null
     */
    public $attributes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->id, "id in Token must not be NULL $within");
        Assert::minLength(
            $this->id,
            1,
            "id in Token must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->id,
            255,
            "id in Token must have maxlength of 255 $within"
        );
        Assert::notNull($this->type, "type in Token must not be NULL $within");
        Assert::minLength(
            $this->type,
            1,
            "type in Token must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->type,
            255,
            "type in Token must have maxlength of 255 $within"
        );
        !isset($this->attributes) || Assert::isInstanceOf(
            $this->attributes,
            TokenAttributes::class,
            "attributes in Token must be instance of TokenAttributes $within"
        );
        !isset($this->attributes) ||  $this->attributes->validate(Token::class);
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['attributes'])) {
            $this->attributes = new TokenAttributes($data['attributes']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAttributes(): TokenAttributes
    {
        return $this->attributes = new TokenAttributes();
    }
}
