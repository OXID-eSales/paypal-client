<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Additional 3D Secure authentication data.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-3ds_result.json
 */
class ThreedsResult extends AuthenticationResultType implements JsonSerializable
{
    use BaseModel;

    /** Mastercard non-3-D Secure transaction. */
    const ECI_FLAG_MASTERCARD_NON_3D_SECURE_TRANSACTION = 'MASTERCARD_NON_3D_SECURE_TRANSACTION';

    /** Mastercard attempted authentication transaction. */
    const ECI_FLAG_MASTERCARD_ATTEMPTED_AUTHENTICATION_TRANSACTION = 'MASTERCARD_ATTEMPTED_AUTHENTICATION_TRANSACTION';

    /** Mastercard fully authenticated transaction. */
    const ECI_FLAG_MASTERCARD_FULLY_AUTHENTICATED_TRANSACTION = 'MASTERCARD_FULLY_AUTHENTICATED_TRANSACTION';

    /** VISA, AMEX, JCB, DINERS CLUB fully authenticated transaction. */
    const ECI_FLAG_FULLY_AUTHENTICATED_TRANSACTION = 'FULLY_AUTHENTICATED_TRANSACTION';

    /** VISA, AMEX, JCB, DINERS CLUB attempted authentication transaction. */
    const ECI_FLAG_ATTEMPTED_AUTHENTICATION_TRANSACTION = 'ATTEMPTED_AUTHENTICATION_TRANSACTION';

    /** VISA, AMEX, JCB, DINERS CLUB non-3-D Secure transaction. */
    const ECI_FLAG_NON_3D_SECURE_TRANSACTION = 'NON_3D_SECURE_TRANSACTION';

    /** Non-SecureCode transaction, bypassed by the merchant. */
    const UCAF_INDICATOR_NON_SECURECODE_TRANSACTION = 'NON_SECURECODE_TRANSACTION';

    /** Merchant-Only SecureCode transaction. */
    const UCAF_INDICATOR_MERCHANT_ONLY_SECURECODE_TRANSACTION = 'MERCHANT_ONLY_SECURECODE_TRANSACTION';

    /** Fully authenticated SecureCode. */
    const UCAF_INDICATOR_FULLY_AUTHENTICATED_SECURECODE = 'FULLY_AUTHENTICATED_SECURECODE';

    /** Card Brand Amex. */
    const CARD_BRAND_AMERICAN_EXPRESS = 'AMERICAN_EXPRESS';

    /** Card Brand DISCOVER. */
    const CARD_BRAND_DISCOVER = 'DISCOVER';

    /** Card Brand JCB. */
    const CARD_BRAND_JCB = 'JCB';

    /** Card Brand MAESTRO. */
    const CARD_BRAND_MAESTRO = 'MAESTRO';

    /** Card Brand MASTERCARD. */
    const CARD_BRAND_MASTERCARD = 'MASTERCARD';

    /** Card Brand SOLO. */
    const CARD_BRAND_SOLO = 'SOLO';

    /** Card Brand VISA. */
    const CARD_BRAND_VISA = 'VISA';

    /** Card Brand ELECTRON. */
    const CARD_BRAND_ELECTRON = 'ELECTRON';

    /** Card Brand ELO. */
    const CARD_BRAND_ELO = 'ELO';

    /** Yes. The bank is participating in 3-D Secure protocol and will return the ACSUrl. */
    const ENROLLED_Y = 'Y';

    /** No. The bank is not participating in 3-D Secure protocol. */
    const ENROLLED_N = 'N';

    /** Unavailable. The DS or ACS is not available for authentication at the time of the request. */
    const ENROLLED_U = 'U';

    /** Bypass. The merchant authentication rule is triggered to bypass authentication. */
    const ENROLLED_B = 'B';

    /** Successful authentication. */
    const PARES_STATUS_Y = 'Y';

    /** Failed authentication / account not verified / transaction denied. */
    const PARES_STATUS_N = 'N';

    /** Unable to complete authentication. */
    const PARES_STATUS_U = 'U';

    /** Successful attempts transaction. */
    const PARES_STATUS_A = 'A';

    /** Challenge required for authentication. */
    const PARES_STATUS_C = 'C';

    /** Authentication rejected (merchant must not submit for authorization). */
    const PARES_STATUS_R = 'R';

    /** Challenge required; decoupled authentication confirmed. */
    const PARES_STATUS_D = 'D';

    /** Informational only; 3DS requestor challenge preference acknowledged. */
    const PARES_STATUS_I = 'I';

    /** Indicates fixed password. */
    const AUTHENTICATION_TYPE_STATIC = 'STATIC';

    /** Indicates one-time password. Could be single-step or multi-step. */
    const AUTHENTICATION_TYPE_DYNAMIC = 'DYNAMIC';

    /** Indicates biometric over the phone. */
    const AUTHENTICATION_TYPE_OUT_OF_BAND = 'OUT_OF_BAND';

    /** Indicates decoupled authentication. */
    const AUTHENTICATION_TYPE_DECOUPLED = 'DECOUPLED';

    /** Indicates that the signature of the PARes has been validated successfully and the message contents can be trusted. */
    const SIGNATURE_VERIFICATION_STATUS_YES = 'YES';

    /** Indicates that the PARes could not be validated. */
    const SIGNATURE_VERIFICATION_STATUS_NO = 'NO';

    /** Refers to the Visa CAVV generation specification that includes a unique identifier built into the value. */
    const CAVV_ALGORITHM_CVV_WITH_ATN = 'CVV_WITH_ATN';

    /** Refers to Secure Payment Algorithm used to generate Mastercard's Accountholder Authentication Value (AAV). */
    const CAVV_ALGORITHM_MASTERCARD_SPA_ALGORITHM = 'MASTERCARD_SPA_ALGORITHM';

    /**
     * Electronic Commerce Indicator (ECI). The ECI value is part of the 2 data elements that indicate the
     * transaction was processed electronically. This should be passed on the authorization transaction to the
     * Gateway/Processor.
     *
     * use one of constants defined in this class to set the value:
     * @see ECI_FLAG_MASTERCARD_NON_3D_SECURE_TRANSACTION
     * @see ECI_FLAG_MASTERCARD_ATTEMPTED_AUTHENTICATION_TRANSACTION
     * @see ECI_FLAG_MASTERCARD_FULLY_AUTHENTICATED_TRANSACTION
     * @see ECI_FLAG_FULLY_AUTHENTICATED_TRANSACTION
     * @see ECI_FLAG_ATTEMPTED_AUTHENTICATION_TRANSACTION
     * @see ECI_FLAG_NON_3D_SECURE_TRANSACTION
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $eci_flag;

    /**
     * Universal Cardholder Authentication Field (UCAF) Indicator value provided by the issuer.
     *
     * use one of constants defined in this class to set the value:
     * @see UCAF_INDICATOR_NON_SECURECODE_TRANSACTION
     * @see UCAF_INDICATOR_MERCHANT_ONLY_SECURECODE_TRANSACTION
     * @see UCAF_INDICATOR_FULLY_AUTHENTICATED_SECURECODE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $ucaf_indicator;

    /**
     * Card brand that the transaction was processed for authentication.
     *
     * use one of constants defined in this class to set the value:
     * @see CARD_BRAND_AMERICAN_EXPRESS
     * @see CARD_BRAND_DISCOVER
     * @see CARD_BRAND_JCB
     * @see CARD_BRAND_MAESTRO
     * @see CARD_BRAND_MASTERCARD
     * @see CARD_BRAND_SOLO
     * @see CARD_BRAND_VISA
     * @see CARD_BRAND_ELECTRON
     * @see CARD_BRAND_ELO
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $card_brand;

    /**
     * This is the cardholder authentication value. The CAVV is unique to the cardholder and to the transaction that
     * was authenticated.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 40
     */
    public $cavv;

    /**
     * Transaction identifier resulting from authentication processing.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 40
     */
    public $xid;

    /**
     * Status of Authentication eligibility.
     *
     * use one of constants defined in this class to set the value:
     * @see ENROLLED_Y
     * @see ENROLLED_N
     * @see ENROLLED_U
     * @see ENROLLED_B
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $enrolled;

    /**
     * Transactions status result identifier. The outcome of the issuer's authentication.
     *
     * use one of constants defined in this class to set the value:
     * @see PARES_STATUS_Y
     * @see PARES_STATUS_N
     * @see PARES_STATUS_U
     * @see PARES_STATUS_A
     * @see PARES_STATUS_C
     * @see PARES_STATUS_R
     * @see PARES_STATUS_D
     * @see PARES_STATUS_I
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $pares_status;

    /**
     * The merchant name that was sent in the authentication request.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 25
     */
    public $merchant_name;

    /**
     * The 3DS version that was used to process the transaction.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 10
     */
    public $three_ds_version;

    /**
     * Unique transaction identifier assigned by the Directory Server (DS) to identify a single transaction.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 36
     */
    public $directory_server_transaction_id;

    /**
     * Indicates the type of authentication that was used to challenge the card holder.
     *
     * use one of constants defined in this class to set the value:
     * @see AUTHENTICATION_TYPE_STATIC
     * @see AUTHENTICATION_TYPE_DYNAMIC
     * @see AUTHENTICATION_TYPE_OUT_OF_BAND
     * @see AUTHENTICATION_TYPE_DECOUPLED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $authentication_type;

    /**
     * Unique transaction identifier assigned by the Access Control Server (ACS) to identify a single transaction.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 36
     */
    public $access_control_server_transaction_id;

    /**
     * Transaction signature status identifier.
     *
     * use one of constants defined in this class to set the value:
     * @see SIGNATURE_VERIFICATION_STATUS_YES
     * @see SIGNATURE_VERIFICATION_STATUS_NO
     * @var string | null
     * minLength: 1
     * maxLength: 50
     */
    public $signature_verification_status;

    /**
     * The PayPal acquiring MID to be used for authorization.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 25
     */
    public $paypal_acquiring_mid;

    /**
     * The PayPal acquiring BIN to be used for authorization.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 6
     */
    public $paypal_acquiring_bin;

    /**
     * Indicates the algorithm used to generate the CAVV/AAV value.
     *
     * use one of constants defined in this class to set the value:
     * @see CAVV_ALGORITHM_CVV_WITH_ATN
     * @see CAVV_ALGORITHM_MASTERCARD_SPA_ALGORITHM
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $cavv_algorithm;

    /**
     * Unique transaction identifier assigned by the 3DS Server to identify a single transaction.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 36
     */
    public $three_ds_server_transaction_id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->eci_flag) || Assert::minLength(
            $this->eci_flag,
            1,
            "eci_flag in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->eci_flag) || Assert::maxLength(
            $this->eci_flag,
            255,
            "eci_flag in ThreedsResult must have maxlength of 255 $within"
        );
        !isset($this->ucaf_indicator) || Assert::minLength(
            $this->ucaf_indicator,
            1,
            "ucaf_indicator in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->ucaf_indicator) || Assert::maxLength(
            $this->ucaf_indicator,
            255,
            "ucaf_indicator in ThreedsResult must have maxlength of 255 $within"
        );
        !isset($this->card_brand) || Assert::minLength(
            $this->card_brand,
            1,
            "card_brand in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->card_brand) || Assert::maxLength(
            $this->card_brand,
            255,
            "card_brand in ThreedsResult must have maxlength of 255 $within"
        );
        !isset($this->cavv) || Assert::minLength(
            $this->cavv,
            1,
            "cavv in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->cavv) || Assert::maxLength(
            $this->cavv,
            40,
            "cavv in ThreedsResult must have maxlength of 40 $within"
        );
        !isset($this->xid) || Assert::minLength(
            $this->xid,
            1,
            "xid in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->xid) || Assert::maxLength(
            $this->xid,
            40,
            "xid in ThreedsResult must have maxlength of 40 $within"
        );
        !isset($this->enrolled) || Assert::minLength(
            $this->enrolled,
            1,
            "enrolled in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->enrolled) || Assert::maxLength(
            $this->enrolled,
            255,
            "enrolled in ThreedsResult must have maxlength of 255 $within"
        );
        !isset($this->pares_status) || Assert::minLength(
            $this->pares_status,
            1,
            "pares_status in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->pares_status) || Assert::maxLength(
            $this->pares_status,
            255,
            "pares_status in ThreedsResult must have maxlength of 255 $within"
        );
        !isset($this->merchant_name) || Assert::minLength(
            $this->merchant_name,
            1,
            "merchant_name in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->merchant_name) || Assert::maxLength(
            $this->merchant_name,
            25,
            "merchant_name in ThreedsResult must have maxlength of 25 $within"
        );
        !isset($this->three_ds_version) || Assert::minLength(
            $this->three_ds_version,
            1,
            "three_ds_version in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->three_ds_version) || Assert::maxLength(
            $this->three_ds_version,
            10,
            "three_ds_version in ThreedsResult must have maxlength of 10 $within"
        );
        !isset($this->directory_server_transaction_id) || Assert::minLength(
            $this->directory_server_transaction_id,
            1,
            "directory_server_transaction_id in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->directory_server_transaction_id) || Assert::maxLength(
            $this->directory_server_transaction_id,
            36,
            "directory_server_transaction_id in ThreedsResult must have maxlength of 36 $within"
        );
        !isset($this->authentication_type) || Assert::minLength(
            $this->authentication_type,
            1,
            "authentication_type in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->authentication_type) || Assert::maxLength(
            $this->authentication_type,
            255,
            "authentication_type in ThreedsResult must have maxlength of 255 $within"
        );
        !isset($this->access_control_server_transaction_id) || Assert::minLength(
            $this->access_control_server_transaction_id,
            1,
            "access_control_server_transaction_id in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->access_control_server_transaction_id) || Assert::maxLength(
            $this->access_control_server_transaction_id,
            36,
            "access_control_server_transaction_id in ThreedsResult must have maxlength of 36 $within"
        );
        !isset($this->signature_verification_status) || Assert::minLength(
            $this->signature_verification_status,
            1,
            "signature_verification_status in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->signature_verification_status) || Assert::maxLength(
            $this->signature_verification_status,
            50,
            "signature_verification_status in ThreedsResult must have maxlength of 50 $within"
        );
        !isset($this->paypal_acquiring_mid) || Assert::minLength(
            $this->paypal_acquiring_mid,
            1,
            "paypal_acquiring_mid in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->paypal_acquiring_mid) || Assert::maxLength(
            $this->paypal_acquiring_mid,
            25,
            "paypal_acquiring_mid in ThreedsResult must have maxlength of 25 $within"
        );
        !isset($this->paypal_acquiring_bin) || Assert::minLength(
            $this->paypal_acquiring_bin,
            1,
            "paypal_acquiring_bin in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->paypal_acquiring_bin) || Assert::maxLength(
            $this->paypal_acquiring_bin,
            6,
            "paypal_acquiring_bin in ThreedsResult must have maxlength of 6 $within"
        );
        !isset($this->cavv_algorithm) || Assert::minLength(
            $this->cavv_algorithm,
            1,
            "cavv_algorithm in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->cavv_algorithm) || Assert::maxLength(
            $this->cavv_algorithm,
            255,
            "cavv_algorithm in ThreedsResult must have maxlength of 255 $within"
        );
        !isset($this->three_ds_server_transaction_id) || Assert::minLength(
            $this->three_ds_server_transaction_id,
            1,
            "three_ds_server_transaction_id in ThreedsResult must have minlength of 1 $within"
        );
        !isset($this->three_ds_server_transaction_id) || Assert::maxLength(
            $this->three_ds_server_transaction_id,
            36,
            "three_ds_server_transaction_id in ThreedsResult must have maxlength of 36 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['eci_flag'])) {
            $this->eci_flag = $data['eci_flag'];
        }
        if (isset($data['ucaf_indicator'])) {
            $this->ucaf_indicator = $data['ucaf_indicator'];
        }
        if (isset($data['card_brand'])) {
            $this->card_brand = $data['card_brand'];
        }
        if (isset($data['cavv'])) {
            $this->cavv = $data['cavv'];
        }
        if (isset($data['xid'])) {
            $this->xid = $data['xid'];
        }
        if (isset($data['enrolled'])) {
            $this->enrolled = $data['enrolled'];
        }
        if (isset($data['pares_status'])) {
            $this->pares_status = $data['pares_status'];
        }
        if (isset($data['merchant_name'])) {
            $this->merchant_name = $data['merchant_name'];
        }
        if (isset($data['three_ds_version'])) {
            $this->three_ds_version = $data['three_ds_version'];
        }
        if (isset($data['directory_server_transaction_id'])) {
            $this->directory_server_transaction_id = $data['directory_server_transaction_id'];
        }
        if (isset($data['authentication_type'])) {
            $this->authentication_type = $data['authentication_type'];
        }
        if (isset($data['access_control_server_transaction_id'])) {
            $this->access_control_server_transaction_id = $data['access_control_server_transaction_id'];
        }
        if (isset($data['signature_verification_status'])) {
            $this->signature_verification_status = $data['signature_verification_status'];
        }
        if (isset($data['paypal_acquiring_mid'])) {
            $this->paypal_acquiring_mid = $data['paypal_acquiring_mid'];
        }
        if (isset($data['paypal_acquiring_bin'])) {
            $this->paypal_acquiring_bin = $data['paypal_acquiring_bin'];
        }
        if (isset($data['cavv_algorithm'])) {
            $this->cavv_algorithm = $data['cavv_algorithm'];
        }
        if (isset($data['three_ds_server_transaction_id'])) {
            $this->three_ds_server_transaction_id = $data['three_ds_server_transaction_id'];
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
