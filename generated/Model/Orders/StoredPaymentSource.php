<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Provides additional details to process a payment using a `payment_source` that has been stored or is intended
 * to be stored (also referred to as stored_credential or card-on-file).<br/>Parameter
 * compatibility:<br/><ul><li>`payment_type=ONE_TIME` is compatible only with
 * `payment_initiator=CUSTOMER`.</li><li>`usage=FIRST` is compatible only with
 * `payment_initiator=CUSTOMER`.</li><li>`previous_transaction_reference` or
 * `previous_network_transaction_reference` is compatible only with `payment_initiator=MERCHANT`.</li><li>Only
 * one of the parameters - `previous_transaction_reference` and `previous_network_transaction_reference` - can be
 * present in the request.</li></ul>
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-stored_payment_source.json
 */
class StoredPaymentSource implements JsonSerializable
{
    use BaseModel;

    /** Payment is initiated with the active engagement of the customer. e.g. a customer checking out on a merchant website. */
    public const PAYMENT_INITIATOR_CUSTOMER = 'CUSTOMER';

    /** Payment is initiated by merchant on behalf of the customer without the active engagement of customer. e.g. a merchant charging the monthly payment of a subscription to the customer. */
    public const PAYMENT_INITIATOR_MERCHANT = 'MERCHANT';

    /** One Time payment such as online purchase or donation. (e.g. Checkout with one-click). */
    public const PAYMENT_TYPE_ONE_TIME = 'ONE_TIME';

    /** Payment which is part of a series of payments with fixed or variable amounts, following a fixed time interval. (e.g. Subscription payments). */
    public const PAYMENT_TYPE_RECURRING = 'RECURRING';

    /** Payment which is part of a series of payments that occur on a non-fixed schedule and/or have variable amounts. (e.g. Account Topup payments). */
    public const PAYMENT_TYPE_UNSCHEDULED = 'UNSCHEDULED';

    /** Indicates the Initial/First payment with a payment_source that is intended to be stored upon successful processing of the payment. */
    public const USAGE_FIRST = 'FIRST';

    /** Indicates a payment using a stored payment_source which has been successfully used previously for a payment. */
    public const USAGE_SUBSEQUENT = 'SUBSEQUENT';

    /** Indicates that PayPal will derive the value of `FIRST` or `SUBSEQUENT` based on data available to PayPal. */
    public const USAGE_DERIVED = 'DERIVED';

    /**
     * The person or party who initiated or triggered the payment.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYMENT_INITIATOR_CUSTOMER
     * @see PAYMENT_INITIATOR_MERCHANT
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $payment_initiator;

    /**
     * Indicates the type of the stored payment_source payment.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYMENT_TYPE_ONE_TIME
     * @see PAYMENT_TYPE_RECURRING
     * @see PAYMENT_TYPE_UNSCHEDULED
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $payment_type;

    /**
     * Indicates if this is a `first` or `subsequent` payment using a stored payment source (also referred to as
     * stored credential or card on file).
     *
     * use one of constants defined in this class to set the value:
     * @see USAGE_FIRST
     * @see USAGE_SUBSEQUENT
     * @see USAGE_DERIVED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $usage = 'DERIVED';

    /**
     * Identifier of the previous PayPal authorization or capture when the payment is funded using a `payment_source`
     * stored on file. In case of a Merchant Initiated Transaction, this `previous_transaction_reference` represents
     * the identifier of the corresponding Customer Initiated authorization or capture.
     *
     * @var string | null
     * minLength: 17
     * maxLength: 17
     */
    public $previous_transaction_reference;

    /**
     * Reference values used by the card network to identify a transaction.
     *
     * @var NetworkTransactionReference | null
     */
    public $previous_network_transaction_reference;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->payment_initiator, "payment_initiator in StoredPaymentSource must not be NULL $within");
        Assert::minLength(
            $this->payment_initiator,
            1,
            "payment_initiator in StoredPaymentSource must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->payment_initiator,
            255,
            "payment_initiator in StoredPaymentSource must have maxlength of 255 $within"
        );
        Assert::notNull($this->payment_type, "payment_type in StoredPaymentSource must not be NULL $within");
        Assert::minLength(
            $this->payment_type,
            1,
            "payment_type in StoredPaymentSource must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->payment_type,
            255,
            "payment_type in StoredPaymentSource must have maxlength of 255 $within"
        );
        !isset($this->usage) || Assert::minLength(
            $this->usage,
            1,
            "usage in StoredPaymentSource must have minlength of 1 $within"
        );
        !isset($this->usage) || Assert::maxLength(
            $this->usage,
            255,
            "usage in StoredPaymentSource must have maxlength of 255 $within"
        );
        !isset($this->previous_transaction_reference) || Assert::minLength(
            $this->previous_transaction_reference,
            17,
            "previous_transaction_reference in StoredPaymentSource must have minlength of 17 $within"
        );
        !isset($this->previous_transaction_reference) || Assert::maxLength(
            $this->previous_transaction_reference,
            17,
            "previous_transaction_reference in StoredPaymentSource must have maxlength of 17 $within"
        );
        !isset($this->previous_network_transaction_reference) || Assert::isInstanceOf(
            $this->previous_network_transaction_reference,
            NetworkTransactionReference::class,
            "previous_network_transaction_reference in StoredPaymentSource must be instance of NetworkTransactionReference $within"
        );
        !isset($this->previous_network_transaction_reference) ||  $this->previous_network_transaction_reference->validate(StoredPaymentSource::class);
    }

    private function map(array $data)
    {
        if (isset($data['payment_initiator'])) {
            $this->payment_initiator = $data['payment_initiator'];
        }
        if (isset($data['payment_type'])) {
            $this->payment_type = $data['payment_type'];
        }
        if (isset($data['usage'])) {
            $this->usage = $data['usage'];
        }
        if (isset($data['previous_transaction_reference'])) {
            $this->previous_transaction_reference = $data['previous_transaction_reference'];
        }
        if (isset($data['previous_network_transaction_reference'])) {
            $this->previous_network_transaction_reference = new NetworkTransactionReference($data['previous_network_transaction_reference']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPreviousNetworkTransactionReference(): NetworkTransactionReference
    {
        return $this->previous_network_transaction_reference = new NetworkTransactionReference();
    }
}
