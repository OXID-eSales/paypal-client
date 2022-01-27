<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The product experiences that a user completes on a PayPal transaction.
 *
 * generated from:
 * MerchantsCommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-product_experience.json
 */
class ProductExperience implements JsonSerializable
{
    use BaseModel;

    /** The consumer's browser does a 302 redirect to <a href="https://www.paypal.com/us/home">paypal.com</a> from the third-party site. */
    public const USER_EXPERIENCE_FLOW_FULL_PAGE_REDIRECT = 'FULL_PAGE_REDIRECT';

    /** The buyer interacts with <a href="https://www.paypal.com/us/home">paypal.com</a> in an iframe or pop up window, which is a modal that is outside or hovers over the existing merchant experience. */
    public const USER_EXPERIENCE_FLOW_INCONTEXT = 'INCONTEXT';

    /** The buyer interacts with <a href="https://www.paypal.com/us/home">paypal.com</a> through an iframe on the merchant site, and is in line with the existing merchant experience. */
    public const USER_EXPERIENCE_FLOW_INLINE = 'INLINE';

    /** The buyer interacts with PayPal through PayPal's native SDK. */
    public const USER_EXPERIENCE_FLOW_NATIVE = 'NATIVE';

    /** The buyer interacts with PayPal by opening PayPal.com directly on browser */
    public const USER_EXPERIENCE_FLOW_FULL_PAGE = 'FULL_PAGE';

    /** The transaction is initiated from Venmo. */
    public const ENTRY_POINT_PAY_WITH_VENMO = 'PAY_WITH_VENMO';

    /** The transaction is initiated from a credit card. */
    public const ENTRY_POINT_PAY_WITH_CARD = 'PAY_WITH_CARD';

    /** The transaction is initiated from PayPal. */
    public const ENTRY_POINT_PAY_WITH_PAYPAL = 'PAY_WITH_PAYPAL';

    /** The transaction is initiated from PayPal credit. */
    public const ENTRY_POINT_PAY_WITH_PAYPAL_CREDIT = 'PAY_WITH_PAYPAL_CREDIT';

    /** The transaction is initiated from Pay With SEPA. */
    public const ENTRY_POINT_PAY_WITH_SEPA = 'PAY_WITH_SEPA';

    /** The transaction is initiated from Alternative Payment AliPay. */
    public const ENTRY_POINT_PAY_WITH_ALTPAY_ALIPAY = 'PAY_WITH_ALTPAY_ALIPAY';

    /** The transaction is initiated from Alternative Payment Bancontact. */
    public const ENTRY_POINT_PAY_WITH_ALTPAY_BANCONTACT = 'PAY_WITH_ALTPAY_BANCONTACT';

    /** The transaction is initiated from Alternative Payment Boleto. */
    public const ENTRY_POINT_PAY_WITH_ALTPAY_BOLETO = 'PAY_WITH_ALTPAY_BOLETO';

    /** The transaction is initiated from Alternative Payment EPS. */
    public const ENTRY_POINT_PAY_WITH_ALTPAY_EPS = 'PAY_WITH_ALTPAY_EPS';

    /** The transaction is initiated from Alternative Payment Giropay. */
    public const ENTRY_POINT_PAY_WITH_ALTPAY_GIROPAY = 'PAY_WITH_ALTPAY_GIROPAY';

    /** The transaction is initiated from Alternative Payment iDeal. */
    public const ENTRY_POINT_PAY_WITH_ALTPAY_IDEAL = 'PAY_WITH_ALTPAY_IDEAL';

    /** The transaction is initiated from Alternative Payment MyBank. */
    public const ENTRY_POINT_PAY_WITH_ALTPAY_MYBANK = 'PAY_WITH_ALTPAY_MYBANK';

    /** The transaction is initiated from Alternative Payment OXXO. */
    public const ENTRY_POINT_PAY_WITH_ALTPAY_OXXO = 'PAY_WITH_ALTPAY_OXXO';

    /** The transaction is initiated from Alternative Payment P24. */
    public const ENTRY_POINT_PAY_WITH_ALTPAY_P24 = 'PAY_WITH_ALTPAY_P24';

    /** The transaction is initiated from Alternative Payment Sofort. */
    public const ENTRY_POINT_PAY_WITH_ALTPAY_SOFORT = 'PAY_WITH_ALTPAY_SOFORT';

    /** The transaction is initiated from Alternative Payment WeChatPay. */
    public const ENTRY_POINT_PAY_WITH_ALTPAY_WECHATPAY = 'PAY_WITH_ALTPAY_WECHATPAY';

    /** The transaction is initiated from Alternative Payment Zimpler. */
    public const ENTRY_POINT_PAY_WITH_ALTPAY_ZIMPLER = 'PAY_WITH_ALTPAY_ZIMPLER';

    /** The transaction source is unknown. */
    public const ENTRY_POINT_UNKNOWN = 'UNKNOWN';

    /** The transaction is completed through Venmo. */
    public const PAYMENT_METHOD_PAY_WITH_VENMO = 'PAY_WITH_VENMO';

    /** The transaction is completed through a credit card. */
    public const PAYMENT_METHOD_PAY_WITH_CARD = 'PAY_WITH_CARD';

    /** The transaction is completed through PayPal. */
    public const PAYMENT_METHOD_PAY_WITH_PAYPAL = 'PAY_WITH_PAYPAL';

    /** The transaction is completed through PayPal credit. */
    public const PAYMENT_METHOD_PAY_WITH_PAYPAL_CREDIT = 'PAY_WITH_PAYPAL_CREDIT';

    /** The transaction is completed through Pay With SEPA. */
    public const PAYMENT_METHOD_PAY_WITH_SEPA = 'PAY_WITH_SEPA';

    /** The transaction is completed through Alternative Payment AliPay. */
    public const PAYMENT_METHOD_PAY_WITH_ALTPAY_ALIPAY = 'PAY_WITH_ALTPAY_ALIPAY';

    /** The transaction is completed through Alternative Payment Bancontact. */
    public const PAYMENT_METHOD_PAY_WITH_ALTPAY_BANCONTACT = 'PAY_WITH_ALTPAY_BANCONTACT';

    /** The transaction is completed through Alternative Payment Boleto. */
    public const PAYMENT_METHOD_PAY_WITH_ALTPAY_BOLETO = 'PAY_WITH_ALTPAY_BOLETO';

    /** The transaction is completed through Alternative Payment EPS. */
    public const PAYMENT_METHOD_PAY_WITH_ALTPAY_EPS = 'PAY_WITH_ALTPAY_EPS';

    /** The transaction is completed through Alternative Payment Giropay. */
    public const PAYMENT_METHOD_PAY_WITH_ALTPAY_GIROPAY = 'PAY_WITH_ALTPAY_GIROPAY';

    /** The transaction is completed through Alternative Payment iDeal. */
    public const PAYMENT_METHOD_PAY_WITH_ALTPAY_IDEAL = 'PAY_WITH_ALTPAY_IDEAL';

    /** The transaction is completed through Alternative Payment MyBank. */
    public const PAYMENT_METHOD_PAY_WITH_ALTPAY_MYBANK = 'PAY_WITH_ALTPAY_MYBANK';

    /** The transaction is completed through Alternative Payment OXXO. */
    public const PAYMENT_METHOD_PAY_WITH_ALTPAY_OXXO = 'PAY_WITH_ALTPAY_OXXO';

    /** The transaction is completed through Alternative Payment P24. */
    public const PAYMENT_METHOD_PAY_WITH_ALTPAY_P24 = 'PAY_WITH_ALTPAY_P24';

    /** The transaction is completed through Alternative Payment Sofort. */
    public const PAYMENT_METHOD_PAY_WITH_ALTPAY_SOFORT = 'PAY_WITH_ALTPAY_SOFORT';

    /** The transaction is completed through Alternative Payment WeChatPay. */
    public const PAYMENT_METHOD_PAY_WITH_ALTPAY_WECHATPAY = 'PAY_WITH_ALTPAY_WECHATPAY';

    /** The transaction is completed through Alternative Payment Zimpler. */
    public const PAYMENT_METHOD_PAY_WITH_ALTPAY_ZIMPLER = 'PAY_WITH_ALTPAY_ZIMPLER';

    /** The transaction is essentially funded by Crypto. */
    public const PAYMENT_METHOD_PAY_WITH_CRYPTO = 'PAY_WITH_CRYPTO';

    /** The transaction payment method is unknown. */
    public const PAYMENT_METHOD_UNKNOWN = 'UNKNOWN';

    /** A browser on a PC. */
    public const CHANNEL_WEB = 'WEB';

    /** A browser on a mobile device. */
    public const CHANNEL_MOBILE_WEB = 'MOBILE_WEB';

    /** A native app in a mobile device. */
    public const CHANNEL_MOBILE_APP = 'MOBILE_APP';

    /** A batch invocation */
    public const CHANNEL_BATCH = 'BATCH';

    /** A legacy checkout API flow. */
    public const PRODUCT_FLOW_CLASSIC = 'CLASSIC';

    /** A web application handles the user's checkout interaction. */
    public const PRODUCT_FLOW_HERMES = 'HERMES';

    /** An eBay application handles the user's PayPal checkout experience. */
    public const PRODUCT_FLOW_PROX = 'PROX';

    /** A web application handles the user's checkout interaction. */
    public const PRODUCT_FLOW_SMART_PAYMENT_BUTTONS = 'SMART_PAYMENT_BUTTONS';

    /** A buyer signing up for a billing agreement */
    public const PRODUCT_FLOW_BUYER_APPROVAL_BILLING_AGREEMENT_CREATE = 'BUYER_APPROVAL_BILLING_AGREEMENT_CREATE';

    /** A billing agreement modification flow initiated by consumer on paypal.com */
    public const PRODUCT_FLOW_CONSUMER_EXP_BILLING_AGREEMENT_MODIFY = 'CONSUMER_EXP_BILLING_AGREEMENT_MODIFY';

    /** A flow allowing consumer to change funding for a transaction, while buyer is present for the transaction */
    public const PRODUCT_FLOW_ONE_TIME_PAYMENT_USING_BILLING_AGREEMENT = 'ONE_TIME_PAYMENT_USING_BILLING_AGREEMENT';

    /** A purchase flow which buyer also approves creation of a billing agreement */
    public const PRODUCT_FLOW_BUYER_APPROVAL_BILLING_AGREEMENT_WITH_PURCHASE = 'BUYER_APPROVAL_BILLING_AGREEMENT_WITH_PURCHASE';

    /** A buyer signing up for a Subscription. */
    public const PRODUCT_FLOW_BUYER_APPROVAL_SUBSCRIPTIONS = 'BUYER_APPROVAL_SUBSCRIPTIONS';

    /** A subscription modification flow intiated by consumer on paypal.com. */
    public const PRODUCT_FLOW_CONSUMER_EXP_SUBSCRIPTIONS_MODIFY = 'CONSUMER_EXP_SUBSCRIPTIONS_MODIFY';

    /** A subscription modification flow intiated by consumer on merchant site. */
    public const PRODUCT_FLOW_BUYER_APPROVAL_SUBSCRIPTIONS_REVISE = 'BUYER_APPROVAL_SUBSCRIPTIONS_REVISE';

    /** A buyer consenting changes made to a plan of the subscription */
    public const PRODUCT_FLOW_BUYER_APPROVAL_SUBSCRIPTIONS_PRICING_CHANGE = 'BUYER_APPROVAL_SUBSCRIPTIONS_PRICING_CHANGE';

    /** Additional factor authentication flow for Billing Agreements. */
    public const PRODUCT_FLOW_BUYER_INSTRUMENT_AUTHENTICATION_BILLING_AGREEMENT = 'BUYER_INSTRUMENT_AUTHENTICATION_BILLING_AGREEMENT';

    /** Collection flow with the system initiating payments to resolve negative balance on sink accounts. */
    public const PRODUCT_FLOW_NEGATIVE_BALANCE_COLLECTION = 'NEGATIVE_BALANCE_COLLECTION';

    /** Identifies give at checkout transactions - customer consents and initiates a donation when checkout with paypal. */
    public const PRODUCT_FLOW_GIVE_AT_CHECKOUT = 'GIVE_AT_CHECKOUT';

    /**
     * The user experience flow for the PayPal transaction.
     *
     * use one of constants defined in this class to set the value:
     * @see USER_EXPERIENCE_FLOW_FULL_PAGE_REDIRECT
     * @see USER_EXPERIENCE_FLOW_INCONTEXT
     * @see USER_EXPERIENCE_FLOW_INLINE
     * @see USER_EXPERIENCE_FLOW_NATIVE
     * @see USER_EXPERIENCE_FLOW_FULL_PAGE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $user_experience_flow;

    /**
     * The payment method user chose to start the payment process.
     *
     * use one of constants defined in this class to set the value:
     * @see ENTRY_POINT_PAY_WITH_VENMO
     * @see ENTRY_POINT_PAY_WITH_CARD
     * @see ENTRY_POINT_PAY_WITH_PAYPAL
     * @see ENTRY_POINT_PAY_WITH_PAYPAL_CREDIT
     * @see ENTRY_POINT_PAY_WITH_SEPA
     * @see ENTRY_POINT_PAY_WITH_ALTPAY_ALIPAY
     * @see ENTRY_POINT_PAY_WITH_ALTPAY_BANCONTACT
     * @see ENTRY_POINT_PAY_WITH_ALTPAY_BOLETO
     * @see ENTRY_POINT_PAY_WITH_ALTPAY_EPS
     * @see ENTRY_POINT_PAY_WITH_ALTPAY_GIROPAY
     * @see ENTRY_POINT_PAY_WITH_ALTPAY_IDEAL
     * @see ENTRY_POINT_PAY_WITH_ALTPAY_MYBANK
     * @see ENTRY_POINT_PAY_WITH_ALTPAY_OXXO
     * @see ENTRY_POINT_PAY_WITH_ALTPAY_P24
     * @see ENTRY_POINT_PAY_WITH_ALTPAY_SOFORT
     * @see ENTRY_POINT_PAY_WITH_ALTPAY_WECHATPAY
     * @see ENTRY_POINT_PAY_WITH_ALTPAY_ZIMPLER
     * @see ENTRY_POINT_UNKNOWN
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $entry_point;

    /**
     * Payment method used to complete the transaction. This can sometimes be different than the entry point if user
     * changed their mind during the checkout flow.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYMENT_METHOD_PAY_WITH_VENMO
     * @see PAYMENT_METHOD_PAY_WITH_CARD
     * @see PAYMENT_METHOD_PAY_WITH_PAYPAL
     * @see PAYMENT_METHOD_PAY_WITH_PAYPAL_CREDIT
     * @see PAYMENT_METHOD_PAY_WITH_SEPA
     * @see PAYMENT_METHOD_PAY_WITH_ALTPAY_ALIPAY
     * @see PAYMENT_METHOD_PAY_WITH_ALTPAY_BANCONTACT
     * @see PAYMENT_METHOD_PAY_WITH_ALTPAY_BOLETO
     * @see PAYMENT_METHOD_PAY_WITH_ALTPAY_EPS
     * @see PAYMENT_METHOD_PAY_WITH_ALTPAY_GIROPAY
     * @see PAYMENT_METHOD_PAY_WITH_ALTPAY_IDEAL
     * @see PAYMENT_METHOD_PAY_WITH_ALTPAY_MYBANK
     * @see PAYMENT_METHOD_PAY_WITH_ALTPAY_OXXO
     * @see PAYMENT_METHOD_PAY_WITH_ALTPAY_P24
     * @see PAYMENT_METHOD_PAY_WITH_ALTPAY_SOFORT
     * @see PAYMENT_METHOD_PAY_WITH_ALTPAY_WECHATPAY
     * @see PAYMENT_METHOD_PAY_WITH_ALTPAY_ZIMPLER
     * @see PAYMENT_METHOD_PAY_WITH_CRYPTO
     * @see PAYMENT_METHOD_UNKNOWN
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $payment_method;

    /**
     * The payment flow channel type.
     *
     * use one of constants defined in this class to set the value:
     * @see CHANNEL_WEB
     * @see CHANNEL_MOBILE_WEB
     * @see CHANNEL_MOBILE_APP
     * @see CHANNEL_BATCH
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $channel;

    /**
     * The product flow type.
     *
     * use one of constants defined in this class to set the value:
     * @see PRODUCT_FLOW_CLASSIC
     * @see PRODUCT_FLOW_HERMES
     * @see PRODUCT_FLOW_PROX
     * @see PRODUCT_FLOW_SMART_PAYMENT_BUTTONS
     * @see PRODUCT_FLOW_BUYER_APPROVAL_BILLING_AGREEMENT_CREATE
     * @see PRODUCT_FLOW_CONSUMER_EXP_BILLING_AGREEMENT_MODIFY
     * @see PRODUCT_FLOW_ONE_TIME_PAYMENT_USING_BILLING_AGREEMENT
     * @see PRODUCT_FLOW_BUYER_APPROVAL_BILLING_AGREEMENT_WITH_PURCHASE
     * @see PRODUCT_FLOW_BUYER_APPROVAL_SUBSCRIPTIONS
     * @see PRODUCT_FLOW_CONSUMER_EXP_SUBSCRIPTIONS_MODIFY
     * @see PRODUCT_FLOW_BUYER_APPROVAL_SUBSCRIPTIONS_REVISE
     * @see PRODUCT_FLOW_BUYER_APPROVAL_SUBSCRIPTIONS_PRICING_CHANGE
     * @see PRODUCT_FLOW_BUYER_INSTRUMENT_AUTHENTICATION_BILLING_AGREEMENT
     * @see PRODUCT_FLOW_NEGATIVE_BALANCE_COLLECTION
     * @see PRODUCT_FLOW_GIVE_AT_CHECKOUT
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $product_flow;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->user_experience_flow) || Assert::minLength(
            $this->user_experience_flow,
            1,
            "user_experience_flow in ProductExperience must have minlength of 1 $within"
        );
        !isset($this->user_experience_flow) || Assert::maxLength(
            $this->user_experience_flow,
            255,
            "user_experience_flow in ProductExperience must have maxlength of 255 $within"
        );
        !isset($this->entry_point) || Assert::minLength(
            $this->entry_point,
            1,
            "entry_point in ProductExperience must have minlength of 1 $within"
        );
        !isset($this->entry_point) || Assert::maxLength(
            $this->entry_point,
            255,
            "entry_point in ProductExperience must have maxlength of 255 $within"
        );
        !isset($this->payment_method) || Assert::minLength(
            $this->payment_method,
            1,
            "payment_method in ProductExperience must have minlength of 1 $within"
        );
        !isset($this->payment_method) || Assert::maxLength(
            $this->payment_method,
            255,
            "payment_method in ProductExperience must have maxlength of 255 $within"
        );
        !isset($this->channel) || Assert::minLength(
            $this->channel,
            1,
            "channel in ProductExperience must have minlength of 1 $within"
        );
        !isset($this->channel) || Assert::maxLength(
            $this->channel,
            255,
            "channel in ProductExperience must have maxlength of 255 $within"
        );
        !isset($this->product_flow) || Assert::minLength(
            $this->product_flow,
            1,
            "product_flow in ProductExperience must have minlength of 1 $within"
        );
        !isset($this->product_flow) || Assert::maxLength(
            $this->product_flow,
            255,
            "product_flow in ProductExperience must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['user_experience_flow'])) {
            $this->user_experience_flow = $data['user_experience_flow'];
        }
        if (isset($data['entry_point'])) {
            $this->entry_point = $data['entry_point'];
        }
        if (isset($data['payment_method'])) {
            $this->payment_method = $data['payment_method'];
        }
        if (isset($data['channel'])) {
            $this->channel = $data['channel'];
        }
        if (isset($data['product_flow'])) {
            $this->product_flow = $data['product_flow'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
