<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The processor information. Might be required for payment requests, such as direct credit card transactions.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-processor_response.json
 */
class ProcessorResponse implements JsonSerializable
{
    use BaseModel;

    /** For Visa, Mastercard, or Discover transactions, the address matches but the zip code does not match. For American Express transactions, the card holder address is correct. */
    const AVS_CODE_A = 'A';

    /** For Visa, Mastercard, or Discover transactions, the address matches. International A. */
    const AVS_CODE_B = 'B';

    /** For Visa, Mastercard, or Discover transactions, no values match. International N. */
    const AVS_CODE_C = 'C';

    /** For Visa, Mastercard, or Discover transactions, the address and postal code match. International X. */
    const AVS_CODE_D = 'D';

    /** For Visa, Mastercard, or Discover transactions, not allowed for Internet or phone transactions. For American Express card holder, the name is incorrect but the address and postal code match. */
    const AVS_CODE_E = 'E';

    /** For Visa, Mastercard, or Discover transactions, the address and postal code match. UK-specific X. For American Express card holder, the name is incorrect but the address matches. */
    const AVS_CODE_F = 'F';

    /** For Visa, Mastercard, or Discover transactions, global is unavailable. Nothing matches. */
    const AVS_CODE_G = 'G';

    /** For Visa, Mastercard, or Discover transactions, international is unavailable. Not applicable. */
    const AVS_CODE_I = 'I';

    /** For Visa, Mastercard, or Discover transactions, the address and postal code match. For American Express card holder, the name, address, and postal code match. */
    const AVS_CODE_M = 'M';

    /** For Visa, Mastercard, or Discover transactions, nothing matches. For American Express card holder, the address and postal code are both incorrect. */
    const AVS_CODE_N = 'N';

    /** For Visa, Mastercard, or Discover transactions, postal international Z. Postal code only. */
    const AVS_CODE_P = 'P';

    /** For Visa, Mastercard, or Discover transactions, re-try the request. For American Express, the system is unavailable. */
    const AVS_CODE_R = 'R';

    /** For Visa, Mastercard, Discover, or American Express, the service is not supported. */
    const AVS_CODE_S = 'S';

    /** For Visa, Mastercard, or Discover transactions, the service is unavailable. For American Express, information is not available. For Maestro, the address is not checked or the acquirer had no response. The service is not available. */
    const AVS_CODE_U = 'U';

    /** For Visa, Mastercard, or Discover transactions, whole ZIP code. For American Express, the card holder name, address, and postal code are all incorrect. */
    const AVS_CODE_W = 'W';

    /** For Visa, Mastercard, or Discover transactions, exact match of the address and the nine-digit ZIP code. For American Express, the card holder name, address, and postal code are all incorrect. */
    const AVS_CODE_X = 'X';

    /** For Visa, Mastercard, or Discover transactions, the address and five-digit ZIP code match. For American Express, the card holder address and postal code are both correct. */
    const AVS_CODE_Y = 'Y';

    /** For Visa, Mastercard, or Discover transactions, the five-digit ZIP code matches but no address. For American Express, only the card holder postal code is correct. */
    const AVS_CODE_Z = 'Z';

    /** For Maestro, no AVS response was obtained. */
    const AVS_CODE_NULL = 'Null';

    /** For Maestro, all address information matches. */
    const AVS_CODE_0 = '0';

    /** For Maestro, none of the address information matches. */
    const AVS_CODE_1 = '1';

    /** For Maestro, part of the address information matches. */
    const AVS_CODE_2 = '2';

    /** For Maestro, the merchant did not provide AVS information. It was not processed. */
    const AVS_CODE_3 = '3';

    /** For Maestro, the address was not checked or the acquirer had no response. The service is not available. */
    const AVS_CODE_4 = '4';

    /** For Visa, Mastercard, Discover, or American Express, error - unrecognized or unknown response. */
    const CVV_CODE_E = 'E';

    /** For Visa, Mastercard, Discover, or American Express, invalid or null. */
    const CVV_CODE_I = 'I';

    /** For Visa, Mastercard, Discover, or American Express, the CVV2/CSC matches. */
    const CVV_CODE_M = 'M';

    /** For Visa, Mastercard, Discover, or American Express, the CVV2/CSC does not match. */
    const CVV_CODE_N = 'N';

    /** For Visa, Mastercard, Discover, or American Express, it was not processed. */
    const CVV_CODE_P = 'P';

    /** For Visa, Mastercard, Discover, or American Express, the service is not supported. */
    const CVV_CODE_S = 'S';

    /** For Visa, Mastercard, Discover, or American Express, unknown - the issuer is not certified. */
    const CVV_CODE_U = 'U';

    /** For Visa, Mastercard, Discover, or American Express, no response. For Maestro, the service is not available. */
    const CVV_CODE_X = 'X';

    /** For Visa, Mastercard, Discover, or American Express, error. */
    const CVV_CODE_ALL_OTHERS = 'All others';

    /** For Maestro, the CVV2 matched. */
    const CVV_CODE_0 = '0';

    /** For Maestro, the CVV2 did not match. */
    const CVV_CODE_1 = '1';

    /** For Maestro, the merchant has not implemented CVV2 code handling. */
    const CVV_CODE_2 = '2';

    /** For Maestro, the merchant has indicated that CVV2 is not present on card. */
    const CVV_CODE_3 = '3';

    /** For Maestro, the service is not available. */
    const CVV_CODE_4 = '4';

    /** APPROVED. */
    const RESPONSE_CODE_0000 = '0000';

    /** REFERRAL. */
    const RESPONSE_CODE_0100 = '0100';

    /** BAD_RESPONSE_REVERSAL_REQUIRED. */
    const RESPONSE_CODE_0800 = '0800';

    /** PARTIAL_AUTHORIZATION. */
    const RESPONSE_CODE_1000 = '1000';

    /** INVALID_DATA_FORMAT. */
    const RESPONSE_CODE_1300 = '1300';

    /** INVALID_AMOUNT. */
    const RESPONSE_CODE_1310 = '1310';

    /** INVALID_TRANSACTION_CARD_ISSUER_ACQUIRER. */
    const RESPONSE_CODE_1312 = '1312';

    /** INVALID_CAPTURE_DATE. */
    const RESPONSE_CODE_1317 = '1317';

    /** INVALID_CURRENCY_CODE. */
    const RESPONSE_CODE_1320 = '1320';

    /** INVALID_ACCOUNT. */
    const RESPONSE_CODE_1330 = '1330';

    /** INVALID_ACCOUNT_RECURRING. */
    const RESPONSE_CODE_1335 = '1335';

    /** INVALID_TERMINAL. */
    const RESPONSE_CODE_1340 = '1340';

    /** INVALID_MERCHANT. */
    const RESPONSE_CODE_1350 = '1350';

    /** BAD_PROCESSING_CODE. */
    const RESPONSE_CODE_1360 = '1360';

    /** INVALID_MCC. */
    const RESPONSE_CODE_1370 = '1370';

    /** INVALID_EXPIRATION. */
    const RESPONSE_CODE_1380 = '1380';

    /** INVALID_CARD_VERIFICATION_VALUE. */
    const RESPONSE_CODE_1382 = '1382';

    /** INVALID_LIFE_CYCLE_OF_TRANSACTION. */
    const RESPONSE_CODE_1384 = '1384';

    /** INVALID_ORDER. */
    const RESPONSE_CODE_1390 = '1390';

    /** TRANSACTION_CANNOT_BE_COMPLETED. */
    const RESPONSE_CODE_1393 = '1393';

    /** DO_NOT_HONOR. */
    const RESPONSE_CODE_0500 = '0500';

    /** GENERIC_DECLINE. */
    const RESPONSE_CODE_5100 = '5100';

    /** CVV2_FAILURE. */
    const RESPONSE_CODE_5110 = '5110';

    /** INSUFFICIENT_FUNDS. */
    const RESPONSE_CODE_5120 = '5120';

    /** INVALID_PIN. */
    const RESPONSE_CODE_5130 = '5130';

    /** CARD_CLOSED. */
    const RESPONSE_CODE_5140 = '5140';

    /** PICKUP_CARD_SPECIAL_CONDITIONS. Try using another card. Do not retry the same card. */
    const RESPONSE_CODE_5150 = '5150';

    /** UNAUTHORIZED_USER. */
    const RESPONSE_CODE_5160 = '5160';

    /** AVS_FAILURE. */
    const RESPONSE_CODE_5170 = '5170';

    /** INVALID_OR_RESTRICTED_CARD. Try using another card. Do not retry the same card. */
    const RESPONSE_CODE_5180 = '5180';

    /** SOFT_AVS. */
    const RESPONSE_CODE_5190 = '5190';

    /** DUPLICATE_TRANSACTION. */
    const RESPONSE_CODE_5200 = '5200';

    /** INVALID_TRANSACTION. */
    const RESPONSE_CODE_5210 = '5210';

    /** EXPIRED_CARD. */
    const RESPONSE_CODE_5400 = '5400';

    /** INCORRECT_PIN_REENTER. */
    const RESPONSE_CODE_5500 = '5500';

    /** REVERSAL_REJECTED. */
    const RESPONSE_CODE_5800 = '5800';

    /** INVALID_ISSUE. */
    const RESPONSE_CODE_5900 = '5900';

    /** ISSUER_NOT_AVAILABLE_NOT_RETRIABLE. */
    const RESPONSE_CODE_5910 = '5910';

    /** ISSUER_NOT_AVAILABLE_RETRIABLE. */
    const RESPONSE_CODE_5920 = '5920';

    /** ACCOUNT_NOT_ON_FILE. */
    const RESPONSE_CODE_6300 = '6300';

    /** APPROVED_NON_CAPTURE. */
    const RESPONSE_CODE_7600 = '7600';

    /** ERROR_3DS. */
    const RESPONSE_CODE_7700 = '7700';

    /** AUTHENTICATION_FAILED. */
    const RESPONSE_CODE_7710 = '7710';

    /** BIN_ERROR. */
    const RESPONSE_CODE_7800 = '7800';

    /** PIN_ERROR. */
    const RESPONSE_CODE_7900 = '7900';

    /** PROCESSOR_SYSTEM_ERROR. */
    const RESPONSE_CODE_8000 = '8000';

    /** HOST_KEY_ERROR. */
    const RESPONSE_CODE_8010 = '8010';

    /** CONFIGURATION_ERROR. */
    const RESPONSE_CODE_8020 = '8020';

    /** UNSUPPORTED_OPERATION. */
    const RESPONSE_CODE_8030 = '8030';

    /** FATAL_COMMUNICATION_ERROR. */
    const RESPONSE_CODE_8100 = '8100';

    /** RETRIABLE_COMMUNICATION_ERROR. */
    const RESPONSE_CODE_8110 = '8110';

    /** SYSTEM_UNAVAILABLE. */
    const RESPONSE_CODE_8220 = '8220';

    /** DECLINED_PLEASE_RETRY. Retry. */
    const RESPONSE_CODE_9100 = '9100';

    /** SUSPECTED_FRAUD. Try using another card. Do not retry the same card. */
    const RESPONSE_CODE_9500 = '9500';

    /** SECURITY_VIOLATION. */
    const RESPONSE_CODE_9510 = '9510';

    /** LOST_OR_STOLEN. Try using another card. Do not retry the same card. */
    const RESPONSE_CODE_9520 = '9520';

    /** HOLD_CALL_CENTER. The merchant must call the number on the back of the card. POS scenario. */
    const RESPONSE_CODE_9530 = '9530';

    /** REFUSED_CARD. */
    const RESPONSE_CODE_9540 = '9540';

    /** UNRECOGNIZED_RESPONSE_CODE. */
    const RESPONSE_CODE_9600 = '9600';

    /** CARD_NOT_ACTIVATED. */
    const RESPONSE_CODE_5930 = '5930';

    /** PPMD. */
    const RESPONSE_CODE_PPMD = 'PPMD';

    /** CE_REGISTRATION_INCOMPLETE. */
    const RESPONSE_CODE_PPCE = 'PPCE';

    /** NETWORK_ERROR. */
    const RESPONSE_CODE_PPNT = 'PPNT';

    /** CARD_TYPE_UNSUPPORTED. */
    const RESPONSE_CODE_PPCT = 'PPCT';

    /** TRANSACTION_TYPE_UNSUPPORTED. */
    const RESPONSE_CODE_PPTT = 'PPTT';

    /** CURRENCY_USED_INVALID. */
    const RESPONSE_CODE_PPCU = 'PPCU';

    /** QUASI_CASH_UNSUPPORTED. */
    const RESPONSE_CODE_PPQC = 'PPQC';

    /** VALIDATION_ERROR. */
    const RESPONSE_CODE_PPVE = 'PPVE';

    /** VIRTUAL_TERMINAL_UNSUPPORTED. */
    const RESPONSE_CODE_PPVT = 'PPVT';

    /** DCC_UNSUPPORTED. */
    const RESPONSE_CODE_PPDC = 'PPDC';

    /** INTERNAL_SYSTEM_ERROR. */
    const RESPONSE_CODE_PPER = 'PPER';

    /** ID_MISMATCH. */
    const RESPONSE_CODE_PPIM = 'PPIM';

    /** H1_ERROR. */
    const RESPONSE_CODE_PPH1 = 'PPH1';

    /** STATUS_DESCRIPTION. */
    const RESPONSE_CODE_PPSD = 'PPSD';

    /** ADULT_GAMING_UNSUPPORTED. */
    const RESPONSE_CODE_PPAG = 'PPAG';

    /** LARGE_STATUS_CODE. */
    const RESPONSE_CODE_PPLS = 'PPLS';

    /** COUNTRY. */
    const RESPONSE_CODE_PPCO = 'PPCO';

    /** BILLING_ADDRESS. */
    const RESPONSE_CODE_PPAD = 'PPAD';

    /** MCC_CODE. */
    const RESPONSE_CODE_PPAU = 'PPAU';

    /** CURRENCY_CODE_UNSUPPORTED. */
    const RESPONSE_CODE_PPUC = 'PPUC';

    /** UNSUPPORTED_REVERSAL. */
    const RESPONSE_CODE_PPUR = 'PPUR';

    /** VALIDATE_CURRENCY. */
    const RESPONSE_CODE_PPVC = 'PPVC';

    /** BANKAUTH_ROW_MISMATCH. */
    const RESPONSE_CODE_PPS0 = 'PPS0';

    /** BANKAUTH_ROW_SETTLED. */
    const RESPONSE_CODE_PPS1 = 'PPS1';

    /** BANKAUTH_ROW_VOIDED. */
    const RESPONSE_CODE_PPS2 = 'PPS2';

    /** BANKAUTH_EXPIRED. */
    const RESPONSE_CODE_PPS3 = 'PPS3';

    /** CURRENCY_MISMATCH. */
    const RESPONSE_CODE_PPS4 = 'PPS4';

    /** CREDITCARD_MISMATCH. */
    const RESPONSE_CODE_PPS5 = 'PPS5';

    /** AMOUNT_MISMATCH. */
    const RESPONSE_CODE_PPS6 = 'PPS6';

    /** INVALID_PARENT_TRANSACTION_STATUS. */
    const RESPONSE_CODE_PPRF = 'PPRF';

    /** EXPIRY_DATE. */
    const RESPONSE_CODE_PPEX = 'PPEX';

    /** AMOUNT_EXCEEDED. */
    const RESPONSE_CODE_PPAX = 'PPAX';

    /** AUTH_MESSAGE. */
    const RESPONSE_CODE_PPDV = 'PPDV';

    /** DINERS_REJECT. */
    const RESPONSE_CODE_PPDI = 'PPDI';

    /** AUTH_RESULT. */
    const RESPONSE_CODE_PPAR = 'PPAR';

    /** BAD_GAMING. */
    const RESPONSE_CODE_PPBG = 'PPBG';

    /** GAMING_REFUND_ERROR. */
    const RESPONSE_CODE_PPGR = 'PPGR';

    /** CREDIT_ERROR. */
    const RESPONSE_CODE_PPCR = 'PPCR';

    /** AMOUNT_INCOMPATIBLE. */
    const RESPONSE_CODE_PPAI = 'PPAI';

    /** IDEMPOTENCY_FAILURE. */
    const RESPONSE_CODE_PPIF = 'PPIF';

    /** BLOCKED_Mastercard. */
    const RESPONSE_CODE_PPMC = 'PPMC';

    /** AMEX_DISABLED. */
    const RESPONSE_CODE_PPAE = 'PPAE';

    /** FIELD_VALIDATION_FAILED. */
    const RESPONSE_CODE_PPFV = 'PPFV';

    /** INVALID_INPUT_FAILURE. */
    const RESPONSE_CODE_PPII = 'PPII';

    /** INVALID_PAYMENT_METHOD. */
    const RESPONSE_CODE_PPPM = 'PPPM';

    /** USER_NOT_AUTHORIZED. */
    const RESPONSE_CODE_PPUA = 'PPUA';

    /** INVALID_FUNDING_INSTRUMENT. */
    const RESPONSE_CODE_PPFI = 'PPFI';

    /** EXPIRED_FUNDING_INSTRUMENT. */
    const RESPONSE_CODE_PPEF = 'PPEF';

    /** RESTRICTED_FUNDING_INSTRUMENT. */
    const RESPONSE_CODE_PPFR = 'PPFR';

    /** EXCEEDS_FREQUENCY_LIMIT. */
    const RESPONSE_CODE_PPEL = 'PPEL';

    /** CVV_FAILURE. */
    const RESPONSE_CODE_PCVV = 'PCVV';

    /** INVALID_VERIFICATION_TOKEN. */
    const RESPONSE_CODE_PPTV = 'PPTV';

    /** VERIFICATION_TOKEN_EXPIRED. */
    const RESPONSE_CODE_PPTE = 'PPTE';

    /** INVALID_PRODUCT. */
    const RESPONSE_CODE_PPPI = 'PPPI';

    /** INVALID_TRACE_ID. */
    const RESPONSE_CODE_PPIT = 'PPIT';

    /** INVALID_TRACE_REFERENCE. */
    const RESPONSE_CODE_PPTF = 'PPTF';

    /** FUNDING_SOURCE_ALREADY_EXISTS. */
    const RESPONSE_CODE_PPFE = 'PPFE';

    /** VERIFICATION_TOKEN_REVOKED. */
    const RESPONSE_CODE_PPTR = 'PPTR';

    /** INVALID_TRANSACTION_ID. */
    const RESPONSE_CODE_PPTI = 'PPTI';

    /** SECURE_ERROR_3DS. */
    const RESPONSE_CODE_PPD3 = 'PPD3';

    /** NO_PHONE_FOR_DCC_TRANSACTION. */
    const RESPONSE_CODE_PPPH = 'PPPH';

    /** ARC_AVS. */
    const RESPONSE_CODE_PPAV = 'PPAV';

    /** ARC_CVV. */
    const RESPONSE_CODE_PPC2 = 'PPC2';

    /** LATE_REVERSAL. */
    const RESPONSE_CODE_PPLR = 'PPLR';

    /** NOT_SUPPORTED_NRC. */
    const RESPONSE_CODE_PPNC = 'PPNC';

    /** MERCHANT_NOT_REGISTERED. */
    const RESPONSE_CODE_PPRR = 'PPRR';

    /** ARC_SCORE. */
    const RESPONSE_CODE_PPSC = 'PPSC';

    /** AMEX_DENIED. */
    const RESPONSE_CODE_PPSE = 'PPSE';

    /** UNSUPPORT_ENTITY. */
    const RESPONSE_CODE_PPUE = 'PPUE';

    /** UNSUPPORT_INSTALLMENT. */
    const RESPONSE_CODE_PPUI = 'PPUI';

    /** UNSUPPORT_POS_FLAG. */
    const RESPONSE_CODE_PPUP = 'PPUP';

    /** UNSUPPORT_REFUND_ON_PENDING_BC. */
    const RESPONSE_CODE_PPRE = 'PPRE';

    /** For Mastercard, expired card account upgrade or portfolio sale conversion. Obtain new account information before next billing cycle. */
    const PAYMENT_ADVICE_CODE_01 = '01';

    /** For Mastercard, over credit limit or insufficient funds. Retry the transaction 72 hours later. For Visa, the card holder wants to stop only one specific payment in the recurring payment relationship. The merchant must NOT resubmit the same transaction. The merchant can continue the billing process in the subsequent billing period. */
    const PAYMENT_ADVICE_CODE_02 = '02';

    /** For Mastercard, account closed as fraudulent. Obtain another type of payment from customer due to account being closed or fraud. Possible reason: Account closed as fraudulent. For Visa, the card holder wants to stop all recurring payment transactions for a specific merchant. Stop recurring payment requests. */
    const PAYMENT_ADVICE_CODE_03 = '03';

    /** For Mastercard, the card holder has been unsuccessful at canceling recurring payment through merchant. Stop recurring payment requests. For Visa, all recurring payments were canceled for the card number requested. Stop recurring payment requests. */
    const PAYMENT_ADVICE_CODE_21 = '21';

    /**
     * The address verification code for Visa, Discover, Mastercard, or American Express transactions.
     *
     * use one of constants defined in this class to set the value:
     * @see AVS_CODE_A
     * @see AVS_CODE_B
     * @see AVS_CODE_C
     * @see AVS_CODE_D
     * @see AVS_CODE_E
     * @see AVS_CODE_F
     * @see AVS_CODE_G
     * @see AVS_CODE_I
     * @see AVS_CODE_M
     * @see AVS_CODE_N
     * @see AVS_CODE_P
     * @see AVS_CODE_R
     * @see AVS_CODE_S
     * @see AVS_CODE_U
     * @see AVS_CODE_W
     * @see AVS_CODE_X
     * @see AVS_CODE_Y
     * @see AVS_CODE_Z
     * @see AVS_CODE_NULL
     * @see AVS_CODE_0
     * @see AVS_CODE_1
     * @see AVS_CODE_2
     * @see AVS_CODE_3
     * @see AVS_CODE_4
     * @var string | null
     */
    public $avs_code;

    /**
     * The card verification value code for for Visa, Discover, Mastercard, or American Express.
     *
     * use one of constants defined in this class to set the value:
     * @see CVV_CODE_E
     * @see CVV_CODE_I
     * @see CVV_CODE_M
     * @see CVV_CODE_N
     * @see CVV_CODE_P
     * @see CVV_CODE_S
     * @see CVV_CODE_U
     * @see CVV_CODE_X
     * @see CVV_CODE_ALL_OTHERS
     * @see CVV_CODE_0
     * @see CVV_CODE_1
     * @see CVV_CODE_2
     * @see CVV_CODE_3
     * @see CVV_CODE_4
     * @var string | null
     */
    public $cvv_code;

    /**
     * Processor response code for the non-PayPal payment processor errors.
     *
     * use one of constants defined in this class to set the value:
     * @see RESPONSE_CODE_0000
     * @see RESPONSE_CODE_0100
     * @see RESPONSE_CODE_0800
     * @see RESPONSE_CODE_1000
     * @see RESPONSE_CODE_1300
     * @see RESPONSE_CODE_1310
     * @see RESPONSE_CODE_1312
     * @see RESPONSE_CODE_1317
     * @see RESPONSE_CODE_1320
     * @see RESPONSE_CODE_1330
     * @see RESPONSE_CODE_1335
     * @see RESPONSE_CODE_1340
     * @see RESPONSE_CODE_1350
     * @see RESPONSE_CODE_1360
     * @see RESPONSE_CODE_1370
     * @see RESPONSE_CODE_1380
     * @see RESPONSE_CODE_1382
     * @see RESPONSE_CODE_1384
     * @see RESPONSE_CODE_1390
     * @see RESPONSE_CODE_1393
     * @see RESPONSE_CODE_0500
     * @see RESPONSE_CODE_5100
     * @see RESPONSE_CODE_5110
     * @see RESPONSE_CODE_5120
     * @see RESPONSE_CODE_5130
     * @see RESPONSE_CODE_5140
     * @see RESPONSE_CODE_5150
     * @see RESPONSE_CODE_5160
     * @see RESPONSE_CODE_5170
     * @see RESPONSE_CODE_5180
     * @see RESPONSE_CODE_5190
     * @see RESPONSE_CODE_5200
     * @see RESPONSE_CODE_5210
     * @see RESPONSE_CODE_5400
     * @see RESPONSE_CODE_5500
     * @see RESPONSE_CODE_5800
     * @see RESPONSE_CODE_5900
     * @see RESPONSE_CODE_5910
     * @see RESPONSE_CODE_5920
     * @see RESPONSE_CODE_6300
     * @see RESPONSE_CODE_7600
     * @see RESPONSE_CODE_7700
     * @see RESPONSE_CODE_7710
     * @see RESPONSE_CODE_7800
     * @see RESPONSE_CODE_7900
     * @see RESPONSE_CODE_8000
     * @see RESPONSE_CODE_8010
     * @see RESPONSE_CODE_8020
     * @see RESPONSE_CODE_8030
     * @see RESPONSE_CODE_8100
     * @see RESPONSE_CODE_8110
     * @see RESPONSE_CODE_8220
     * @see RESPONSE_CODE_9100
     * @see RESPONSE_CODE_9500
     * @see RESPONSE_CODE_9510
     * @see RESPONSE_CODE_9520
     * @see RESPONSE_CODE_9530
     * @see RESPONSE_CODE_9540
     * @see RESPONSE_CODE_9600
     * @see RESPONSE_CODE_5930
     * @see RESPONSE_CODE_PPMD
     * @see RESPONSE_CODE_PPCE
     * @see RESPONSE_CODE_PPNT
     * @see RESPONSE_CODE_PPCT
     * @see RESPONSE_CODE_PPTT
     * @see RESPONSE_CODE_PPCU
     * @see RESPONSE_CODE_PPQC
     * @see RESPONSE_CODE_PPVE
     * @see RESPONSE_CODE_PPVT
     * @see RESPONSE_CODE_PPDC
     * @see RESPONSE_CODE_PPER
     * @see RESPONSE_CODE_PPIM
     * @see RESPONSE_CODE_PPH1
     * @see RESPONSE_CODE_PPSD
     * @see RESPONSE_CODE_PPAG
     * @see RESPONSE_CODE_PPLS
     * @see RESPONSE_CODE_PPCO
     * @see RESPONSE_CODE_PPAD
     * @see RESPONSE_CODE_PPAU
     * @see RESPONSE_CODE_PPUC
     * @see RESPONSE_CODE_PPUR
     * @see RESPONSE_CODE_PPVC
     * @see RESPONSE_CODE_PPS0
     * @see RESPONSE_CODE_PPS1
     * @see RESPONSE_CODE_PPS2
     * @see RESPONSE_CODE_PPS3
     * @see RESPONSE_CODE_PPS4
     * @see RESPONSE_CODE_PPS5
     * @see RESPONSE_CODE_PPS6
     * @see RESPONSE_CODE_PPRF
     * @see RESPONSE_CODE_PPEX
     * @see RESPONSE_CODE_PPAX
     * @see RESPONSE_CODE_PPDV
     * @see RESPONSE_CODE_PPDI
     * @see RESPONSE_CODE_PPAR
     * @see RESPONSE_CODE_PPBG
     * @see RESPONSE_CODE_PPGR
     * @see RESPONSE_CODE_PPCR
     * @see RESPONSE_CODE_PPAI
     * @see RESPONSE_CODE_PPIF
     * @see RESPONSE_CODE_PPMC
     * @see RESPONSE_CODE_PPAE
     * @see RESPONSE_CODE_PPFV
     * @see RESPONSE_CODE_PPII
     * @see RESPONSE_CODE_PPPM
     * @see RESPONSE_CODE_PPUA
     * @see RESPONSE_CODE_PPFI
     * @see RESPONSE_CODE_PPEF
     * @see RESPONSE_CODE_PPFR
     * @see RESPONSE_CODE_PPEL
     * @see RESPONSE_CODE_PCVV
     * @see RESPONSE_CODE_PPTV
     * @see RESPONSE_CODE_PPTE
     * @see RESPONSE_CODE_PPPI
     * @see RESPONSE_CODE_PPIT
     * @see RESPONSE_CODE_PPTF
     * @see RESPONSE_CODE_PPFE
     * @see RESPONSE_CODE_PPTR
     * @see RESPONSE_CODE_PPTI
     * @see RESPONSE_CODE_PPD3
     * @see RESPONSE_CODE_PPPH
     * @see RESPONSE_CODE_PPAV
     * @see RESPONSE_CODE_PPC2
     * @see RESPONSE_CODE_PPLR
     * @see RESPONSE_CODE_PPNC
     * @see RESPONSE_CODE_PPRR
     * @see RESPONSE_CODE_PPSC
     * @see RESPONSE_CODE_PPSE
     * @see RESPONSE_CODE_PPUE
     * @see RESPONSE_CODE_PPUI
     * @see RESPONSE_CODE_PPUP
     * @see RESPONSE_CODE_PPRE
     * @var string | null
     */
    public $response_code;

    /**
     * The declined payment transactions might have payment advice codes. The card networks, like Visa and
     * Mastercard, return payment advice codes.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYMENT_ADVICE_CODE_01
     * @see PAYMENT_ADVICE_CODE_02
     * @see PAYMENT_ADVICE_CODE_03
     * @see PAYMENT_ADVICE_CODE_21
     * @var string | null
     */
    public $payment_advice_code;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    private function map(array $data)
    {
        if (isset($data['avs_code'])) {
            $this->avs_code = $data['avs_code'];
        }
        if (isset($data['cvv_code'])) {
            $this->cvv_code = $data['cvv_code'];
        }
        if (isset($data['response_code'])) {
            $this->response_code = $data['response_code'];
        }
        if (isset($data['payment_advice_code'])) {
            $this->payment_advice_code = $data['payment_advice_code'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
