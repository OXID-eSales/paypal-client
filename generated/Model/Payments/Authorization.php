<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The authorized payment transaction.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-authorization.json
 */
class Authorization extends AuthorizationStatus implements JsonSerializable
{
    use BaseModel;

    /**
     * The PayPal-generated ID for the authorized payment.
     *
     * @var string | null
     */
    public $id;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount;

    /**
     * The API caller-provided external invoice number for this order. Appears in both the payer's transaction
     * history and the emails that the payer receives.
     *
     * @var string | null
     */
    public $invoice_id;

    /**
     * The API caller-provided external ID. Used to reconcile API caller-initiated transactions with PayPal
     * transactions. Appears in transaction and settlement reports.
     *
     * @var string | null
     * maxLength: 127
     */
    public $custom_id;

    /**
     * The PayPal-generated alternate ID for the authorized payment. For example, used for UATP airline integration.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 22
     */
    public $alternate_id;

    /**
     * The sender side ID of the authorization transaction. This ID will be populated only for Cross GEO
     * transactions.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 22
     */
    public $sender_transaction_id;

    /**
     * Consolidated verification results(encoded in base64) for instruments provided by the instrument issuing
     * system. Sample - Id:1&AVS:A&CVV:M|Id:2&AVS:A&CVV:M . Encoded string:
     * SWQ6MSZBVlM6QSZDVlY6TXxJZDoyJkFWUzpBJkNWVjpN.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 250
     */
    public $instrument_verification_results;

    /**
     * The level of protection offered as defined by [PayPal Seller Protection for
     * Merchants](https://www.paypal.com/us/webapps/mpp/security/seller-protection).
     *
     * @var SellerProtection | null
     */
    public $seller_protection;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $expiration_time;

    /**
     * An array of related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     *
     * @var array | null
     */
    public $links;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $update_time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in Authorization must be instance of Money $within"
        );
        !isset($this->amount) ||  $this->amount->validate(Authorization::class);
        !isset($this->custom_id) || Assert::maxLength(
            $this->custom_id,
            127,
            "custom_id in Authorization must have maxlength of 127 $within"
        );
        !isset($this->alternate_id) || Assert::minLength(
            $this->alternate_id,
            1,
            "alternate_id in Authorization must have minlength of 1 $within"
        );
        !isset($this->alternate_id) || Assert::maxLength(
            $this->alternate_id,
            22,
            "alternate_id in Authorization must have maxlength of 22 $within"
        );
        !isset($this->sender_transaction_id) || Assert::minLength(
            $this->sender_transaction_id,
            1,
            "sender_transaction_id in Authorization must have minlength of 1 $within"
        );
        !isset($this->sender_transaction_id) || Assert::maxLength(
            $this->sender_transaction_id,
            22,
            "sender_transaction_id in Authorization must have maxlength of 22 $within"
        );
        !isset($this->instrument_verification_results) || Assert::minLength(
            $this->instrument_verification_results,
            1,
            "instrument_verification_results in Authorization must have minlength of 1 $within"
        );
        !isset($this->instrument_verification_results) || Assert::maxLength(
            $this->instrument_verification_results,
            250,
            "instrument_verification_results in Authorization must have maxlength of 250 $within"
        );
        !isset($this->seller_protection) || Assert::isInstanceOf(
            $this->seller_protection,
            SellerProtection::class,
            "seller_protection in Authorization must be instance of SellerProtection $within"
        );
        !isset($this->seller_protection) ||  $this->seller_protection->validate(Authorization::class);
        !isset($this->expiration_time) || Assert::minLength(
            $this->expiration_time,
            20,
            "expiration_time in Authorization must have minlength of 20 $within"
        );
        !isset($this->expiration_time) || Assert::maxLength(
            $this->expiration_time,
            64,
            "expiration_time in Authorization must have maxlength of 64 $within"
        );
        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in Authorization must be array $within"
        );
        !isset($this->create_time) || Assert::minLength(
            $this->create_time,
            20,
            "create_time in Authorization must have minlength of 20 $within"
        );
        !isset($this->create_time) || Assert::maxLength(
            $this->create_time,
            64,
            "create_time in Authorization must have maxlength of 64 $within"
        );
        !isset($this->update_time) || Assert::minLength(
            $this->update_time,
            20,
            "update_time in Authorization must have minlength of 20 $within"
        );
        !isset($this->update_time) || Assert::maxLength(
            $this->update_time,
            64,
            "update_time in Authorization must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
        }
        if (isset($data['invoice_id'])) {
            $this->invoice_id = $data['invoice_id'];
        }
        if (isset($data['custom_id'])) {
            $this->custom_id = $data['custom_id'];
        }
        if (isset($data['alternate_id'])) {
            $this->alternate_id = $data['alternate_id'];
        }
        if (isset($data['sender_transaction_id'])) {
            $this->sender_transaction_id = $data['sender_transaction_id'];
        }
        if (isset($data['instrument_verification_results'])) {
            $this->instrument_verification_results = $data['instrument_verification_results'];
        }
        if (isset($data['seller_protection'])) {
            $this->seller_protection = new SellerProtection($data['seller_protection']);
        }
        if (isset($data['expiration_time'])) {
            $this->expiration_time = $data['expiration_time'];
        }
        if (isset($data['links'])) {
            $this->links = [];
            foreach ($data['links'] as $item) {
                $this->links[] = $item;
            }
        }
        if (isset($data['create_time'])) {
            $this->create_time = $data['create_time'];
        }
        if (isset($data['update_time'])) {
            $this->update_time = $data['update_time'];
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAmount(): Money
    {
        return $this->amount = new Money();
    }

    public function initSellerProtection(): SellerProtection
    {
        return $this->seller_protection = new SellerProtection();
    }
}
