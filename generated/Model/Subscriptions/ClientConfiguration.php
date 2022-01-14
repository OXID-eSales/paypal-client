<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Client configuration that captures the product flows and specific experiences that a user completes a paypal
 * transaction.
 *
 * generated from:
 * merchant.CommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-client_configuration.json
 */
class ClientConfiguration implements JsonSerializable
{
    use BaseModel;

    /** The payment acceptance solution is express checkout. */
    public const PRODUCT_CODE_EXPRESS_CHECKOUT = 'EXPRESS_CHECKOUT';

    /** The payment acceptance solution is website payment standard. */
    public const PRODUCT_CODE_WEBSITE_PAYMENTS_STANDARD = 'WEBSITE_PAYMENTS_STANDARD';

    /** The payment acceptance solution is credit card. */
    public const PRODUCT_CODE_DIRECT_CREDIT_CARD = 'DIRECT_CREDIT_CARD';

    /** The payment acceptance solution is a billing agreement. */
    public const PRODUCT_CODE_BILLING_AGREEMENTS = 'BILLING_AGREEMENTS';

    /** Billing plan and subcription solution */
    public const PRODUCT_CODE_BILLING_SUBSCRIPTIONS = 'BILLING_SUBSCRIPTIONS';

    /** MassPay/Payouts solution */
    public const PRODUCT_CODE_PAYOUTS = 'PAYOUTS';

    /** Automatic withdrawal initiated to meet a regulatory compliance policy. */
    public const PRODUCT_CODE_AUTOWITHDRAWAL = 'AUTOWITHDRAWAL';

    /** Paypal Vault solution. */
    public const PRODUCT_CODE_VAULT = 'VAULT';

    /** The product code representing invoice payments. */
    public const PRODUCT_CODE_INVOICING = 'INVOICING';

    /** Paypal Connect payments solution. */
    public const PRODUCT_CODE_PAYPAL_IDENTITY_LINKING = 'PAYPAL_IDENTITY_LINKING';

    /** The default value for most payment products. */
    public const PRODUCT_FEATURE_NONE = 'NONE';

    /** The payment product featuring order being persisted. */
    public const PRODUCT_FEATURE_ORDERS = 'ORDERS';

    /** The payment product features a billing agreement payment. */
    public const PRODUCT_FEATURE_BILLING_AGREEMENTS = 'BILLING_AGREEMENTS';

    /** Payments V1 API. */
    public const API_PAYMENTS_V1 = 'PAYMENTS_V1';

    /** Orders V1 API. */
    public const API_ORDERS_V1 = 'ORDERS_V1';

    /** Orders V2 API. */
    public const API_ORDERS_V2 = 'ORDERS_V2';

    /** Paypal legacy checkout API. */
    public const API_LEGACY_CHECKOUT_API = 'LEGACY_CHECKOUT_API';

    /** Billing V1 API */
    public const API_BILLING_V1 = 'BILLING_V1';

    /** VAULT V2 API */
    public const API_VAULT_V2 = 'VAULT_V2';

    /** IDENTITY API */
    public const API_IDENTITY = 'IDENTITY';

    /** INVOICING V1 API */
    public const API_INVOICING_V1 = 'INVOICING_V1';

    /** INVOICING V2 API */
    public const API_INVOICING_V2 = 'INVOICING_V2';

    /** Paypal legacy Billing API. */
    public const API_LEGACY_BILLING_API = 'LEGACY_BILLING_API';

    /** Subscriptions V1 API. */
    public const API_SUBSCRIPTIONS_V1 = 'SUBSCRIPTIONS_V1';

    /** Recurring Payments REST API. */
    public const API_RECURRING_PAYMENTS_V1 = 'RECURRING_PAYMENTS_V1';

    /** Legacy Recurring Payments NVP/SOAP API */
    public const API_LEGACY_RECURRING_PAYMENTS = 'LEGACY_RECURRING_PAYMENTS';

    /** The transaction / experience does not involve API interaction */
    public const API_NONE = 'NONE';

    /** PayPal's JavaScript SDK, for checkout. This includes PayPal branded payments ( Paypal wallet, Venmo, PayPal Credit), Alternative payment methods and Hosted card processing capabilities */
    public const INTEGRATION_ARTIFACT_PAYPAL_JS_SDK = 'PAYPAL_JS_SDK';

    /** Paypal's client side javascript, Version 3, for checkout. */
    public const INTEGRATION_ARTIFACT_JS_V3 = 'JS_V3';

    /** Paypal's client side javascript, Version 4, for checkout. */
    public const INTEGRATION_ARTIFACT_JS_V4 = 'JS_V4';

    /** Use this when Merchant has integrated with an old version of BRAINTREE_VZERO that does not ingest JS_V3 or V4. */
    public const INTEGRATION_ARTIFACT_BRAINTREE_VZERO = 'BRAINTREE_VZERO';

    /** Use this when Merchant has integrated with PayPal's Native Checkout SDK. */
    public const INTEGRATION_ARTIFACT_NATIVE_SDK = 'NATIVE_SDK';

    /** The transaction integration type is not defined. */
    public const INTEGRATION_ARTIFACT_NONE = 'NONE';

    /**
     * Types of the payment acceptance solution.
     *
     * use one of constants defined in this class to set the value:
     * @see PRODUCT_CODE_EXPRESS_CHECKOUT
     * @see PRODUCT_CODE_WEBSITE_PAYMENTS_STANDARD
     * @see PRODUCT_CODE_DIRECT_CREDIT_CARD
     * @see PRODUCT_CODE_BILLING_AGREEMENTS
     * @see PRODUCT_CODE_BILLING_SUBSCRIPTIONS
     * @see PRODUCT_CODE_PAYOUTS
     * @see PRODUCT_CODE_AUTOWITHDRAWAL
     * @see PRODUCT_CODE_VAULT
     * @see PRODUCT_CODE_INVOICING
     * @see PRODUCT_CODE_PAYPAL_IDENTITY_LINKING
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $product_code;

    /**
     * A feature capturing variant of a generic product code, when applicable.
     *
     * use one of constants defined in this class to set the value:
     * @see PRODUCT_FEATURE_NONE
     * @see PRODUCT_FEATURE_ORDERS
     * @see PRODUCT_FEATURE_BILLING_AGREEMENTS
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $product_feature = 'NONE';

    /**
     * The primary api used to trigger the paypal transaction.
     *
     * use one of constants defined in this class to set the value:
     * @see API_PAYMENTS_V1
     * @see API_ORDERS_V1
     * @see API_ORDERS_V2
     * @see API_LEGACY_CHECKOUT_API
     * @see API_BILLING_V1
     * @see API_VAULT_V2
     * @see API_IDENTITY
     * @see API_INVOICING_V1
     * @see API_INVOICING_V2
     * @see API_LEGACY_BILLING_API
     * @see API_SUBSCRIPTIONS_V1
     * @see API_RECURRING_PAYMENTS_V1
     * @see API_LEGACY_RECURRING_PAYMENTS
     * @see API_NONE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $api;

    /**
     * Identifier for the software that paypal has provided to enable the integration.
     *
     * use one of constants defined in this class to set the value:
     * @see INTEGRATION_ARTIFACT_PAYPAL_JS_SDK
     * @see INTEGRATION_ARTIFACT_JS_V3
     * @see INTEGRATION_ARTIFACT_JS_V4
     * @see INTEGRATION_ARTIFACT_BRAINTREE_VZERO
     * @see INTEGRATION_ARTIFACT_NATIVE_SDK
     * @see INTEGRATION_ARTIFACT_NONE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $integration_artifact = 'NONE';

    /**
     * The product experiences that a user completes on a PayPal transaction.
     *
     * @var ProductExperience | null
     */
    public $experience;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->product_code) || Assert::minLength(
            $this->product_code,
            1,
            "product_code in ClientConfiguration must have minlength of 1 $within"
        );
        !isset($this->product_code) || Assert::maxLength(
            $this->product_code,
            255,
            "product_code in ClientConfiguration must have maxlength of 255 $within"
        );
        !isset($this->product_feature) || Assert::minLength(
            $this->product_feature,
            1,
            "product_feature in ClientConfiguration must have minlength of 1 $within"
        );
        !isset($this->product_feature) || Assert::maxLength(
            $this->product_feature,
            255,
            "product_feature in ClientConfiguration must have maxlength of 255 $within"
        );
        !isset($this->api) || Assert::minLength(
            $this->api,
            1,
            "api in ClientConfiguration must have minlength of 1 $within"
        );
        !isset($this->api) || Assert::maxLength(
            $this->api,
            255,
            "api in ClientConfiguration must have maxlength of 255 $within"
        );
        !isset($this->integration_artifact) || Assert::minLength(
            $this->integration_artifact,
            1,
            "integration_artifact in ClientConfiguration must have minlength of 1 $within"
        );
        !isset($this->integration_artifact) || Assert::maxLength(
            $this->integration_artifact,
            255,
            "integration_artifact in ClientConfiguration must have maxlength of 255 $within"
        );
        !isset($this->experience) || Assert::isInstanceOf(
            $this->experience,
            ProductExperience::class,
            "experience in ClientConfiguration must be instance of ProductExperience $within"
        );
        !isset($this->experience) ||  $this->experience->validate(ClientConfiguration::class);
    }

    private function map(array $data)
    {
        if (isset($data['product_code'])) {
            $this->product_code = $data['product_code'];
        }
        if (isset($data['product_feature'])) {
            $this->product_feature = $data['product_feature'];
        }
        if (isset($data['api'])) {
            $this->api = $data['api'];
        }
        if (isset($data['integration_artifact'])) {
            $this->integration_artifact = $data['integration_artifact'];
        }
        if (isset($data['experience'])) {
            $this->experience = new ProductExperience($data['experience']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initExperience(): ProductExperience
    {
        return $this->experience = new ProductExperience();
    }
}
