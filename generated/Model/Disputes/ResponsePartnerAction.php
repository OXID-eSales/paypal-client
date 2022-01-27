<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A PayPal-requested or partner action for the dispute.
 *
 * generated from: response-partner_action.json
 */
class ResponsePartnerAction implements JsonSerializable
{
    use BaseModel;

    /** The partner must provide the consumer with provisional credit. */
    public const NAME_PROVIDE_PROVISIONAL_CREDIT = 'PROVIDE_PROVISIONAL_CREDIT';

    /** The partner denies dispute and must reverse the provisional credit, if it was already given. */
    public const NAME_DENY_DISPUTE = 'DENY_DISPUTE';

    /** The partner accepts dispute and must provide permanent provisional credit to the consumer, if it was already given or recover the money. */
    public const NAME_ACCEPT_DISPUTE = 'ACCEPT_DISPUTE';

    /** The partner must write off the dispute. */
    public const NAME_WRITE_OFF = 'WRITE_OFF';

    /** Seller submitted proof of correct charge. */
    public const REASON_AMOUNT_DIFFERENCE_EXPECTED_DUE_TO_FEES = 'AMOUNT_DIFFERENCE_EXPECTED_DUE_TO_FEES';

    /** Seller had disclosed billing agreement changes upfront. */
    public const REASON_BILLING_AGREEMENT_CHANGE_DISCLOSED = 'BILLING_AGREEMENT_CHANGE_DISCLOSED';

    /** Seller had not disclosed billing agreement changes upfront. */
    public const REASON_BILLING_AGREEMENT_CHANGE_NOT_DISCLOSED = 'BILLING_AGREEMENT_CHANGE_NOT_DISCLOSED';

    /** Seller had shared change in billing agreement date upfront. */
    public const REASON_BILLING_AGREEMENT_DATE_CHANGE_DISCLOSED = 'BILLING_AGREEMENT_DATE_CHANGE_DISCLOSED';

    /** Seller had not shared change in billing agreement date upfront. */
    public const REASON_BILLING_AGREEMENT_DATE_CHANGE_NOT_DISCLOSED = 'BILLING_AGREEMENT_DATE_CHANGE_NOT_DISCLOSED';

    /** Buyer has attempted to return the item. */
    public const REASON_BUYER_ATTEMPTED_RETURN = 'BUYER_ATTEMPTED_RETURN';

    /** Buyer was charged only once and did not submit sufficient evidence of duplicate charge. */
    public const REASON_BUYER_BILLED_ONLY_ONCE = 'BUYER_BILLED_ONLY_ONCE';

    /** Buyer cancelled the case. */
    public const REASON_BUYER_CANCELLED_CASE = 'BUYER_CANCELLED_CASE';

    /** Buyer cancelled the service or recurring transaction. */
    public const REASON_BUYER_CANCELLED_SERVICE = 'BUYER_CANCELLED_SERVICE';

    /** Buyer did not describe the issue to justify the refund. */
    public const REASON_BUYER_FAILED_TO_DESCRIBE_ISSUE = 'BUYER_FAILED_TO_DESCRIBE_ISSUE';

    /** Buyer continues to possess the item or has received the service. */
    public const REASON_BUYER_HAS_POSSESSION_OF_THE_MERCHANDISE_OR_SERVICE = 'BUYER_HAS_POSSESSION_OF_THE_MERCHANDISE_OR_SERVICE';

    /** Buyer did not attempt to resolve the issue with the seller. */
    public const REASON_BUYER_MADE_NO_ATTEMPT_TO_RESOLVE_WITH_SELLER = 'BUYER_MADE_NO_ATTEMPT_TO_RESOLVE_WITH_SELLER';

    /** Buyer is not in possession of the item to be returned. */
    public const REASON_BUYER_NOT_IN_POSSESSION_OF_ITEM_TO_RETURN = 'BUYER_NOT_IN_POSSESSION_OF_ITEM_TO_RETURN';

    /** Buyer provided credit receipt or relevant documentation. */
    public const REASON_BUYER_PROVIDED_CREDIT_RECEIPT = 'BUYER_PROVIDED_CREDIT_RECEIPT';

    /** Buyer received the refund twice. */
    public const REASON_BUYER_RECEIVED_DUPLICATE_REFUND = 'BUYER_RECEIVED_DUPLICATE_REFUND';

    /** Billing agreement was cancelled as per agreed terms. */
    public const REASON_CANCELLED_PER_TERMS_OF_BILLING_AGREEMENT = 'CANCELLED_PER_TERMS_OF_BILLING_AGREEMENT';

    /** Buyer in possession of the card which was reported as stolen or lost. */
    public const REASON_CARD_NOT_STOLEN = 'CARD_NOT_STOLEN';

    /** Buyer reported card as lost or stolen after the authorization date. */
    public const REASON_CARD_NOT_STOLEN_BEFORE_AUTH = 'CARD_NOT_STOLEN_BEFORE_AUTH';

    /** Buyer recognizes the transaction as valid. */
    public const REASON_CUSTOMER_RECOGNIZES_TRANSACTION = 'CUSTOMER_RECOGNIZES_TRANSACTION';

    /** Case decision was made as per available information when specific reasons are not applicable. */
    public const REASON_DECISION_BASED_ON_AVAILABLE_INFORMATION = 'DECISION_BASED_ON_AVAILABLE_INFORMATION';

    /** Item or service was delivered after the expected delivery date had passed. */
    public const REASON_DELIVERY_AFTER_EXPECTED_DELIVERY_DATE = 'DELIVERY_AFTER_EXPECTED_DELIVERY_DATE';

    /** Delivery of the item or service is due within the expected delivery date. */
    public const REASON_DELIVERY_DUE_WITHIN_EXPECTED_DELIVERY_DATE = 'DELIVERY_DUE_WITHIN_EXPECTED_DELIVERY_DATE';

    /** Seller refused delivery or service of the item. */
    public const REASON_DELIVERY_OR_SERVICE_REFUSED = 'DELIVERY_OR_SERVICE_REFUSED';

    /** Documentation provided supports the amount that was charged. */
    public const REASON_DOCUMENTATION_MATCHES_AMOUNT_CHARGED = 'DOCUMENTATION_MATCHES_AMOUNT_CHARGED';

    /** Documentation provided supports the amount charged on buyer's account. */
    public const REASON_DOCUMENTATION_MATCHES_AMOUNT_IN_PAYPAL_ACCOUNT = 'DOCUMENTATION_MATCHES_AMOUNT_IN_PAYPAL_ACCOUNT';

    /** Buyer submitted sufficient proof of duplicate charge. */
    public const REASON_DUPLICATE_ADD_FUNDS = 'DUPLICATE_ADD_FUNDS';

    /** The case is decided based on Protection Policy. */
    public const REASON_EFFORTLESS_SELLER_PROTECTION = 'EFFORTLESS_SELLER_PROTECTION';

    /** Seller delivered the item in person. */
    public const REASON_IN_PERSON_DELIVERY = 'IN_PERSON_DELIVERY';

    /** The pattern identified does not meet buyer protection eligibility. */
    public const REASON_INELIGIBLE_BUYER_PROTECTION_POLICY = 'INELIGIBLE_BUYER_PROTECTION_POLICY';

    /** The pattern identified does not meet seller protection eligibility. */
    public const REASON_INELIGIBLE_SELLER_PROTECTION_POLICY = 'INELIGIBLE_SELLER_PROTECTION_POLICY';

    /** Seller agreed to replace the item. */
    public const REASON_INQUIRY_OFFER_ITEM_REPLACED = 'INQUIRY_OFFER_ITEM_REPLACED';

    /** Seller agreed to issue a partial refund to the buyer. */
    public const REASON_INQUIRY_OFFER_PARTIAL_REFUND = 'INQUIRY_OFFER_PARTIAL_REFUND';

    /** Seller agreed to issue a refund for item return. */
    public const REASON_INQUIRY_OFFER_REFUND_WITH_ITEM_RETURN = 'INQUIRY_OFFER_REFUND_WITH_ITEM_RETURN';

    /** Seller agreed to replace the damaged item along with refunds applicable. */
    public const REASON_INQUIRY_OFFER_REFUND_WITH_REPLACEMENT = 'INQUIRY_OFFER_REFUND_WITH_REPLACEMENT';

    /** Seller appealed twice for the same reason with invalid reason. */
    public const REASON_INVALID_APPEAL_REASON = 'INVALID_APPEAL_REASON';

    /** The case is decided as invalid based on external network policy. */
    public const REASON_INVALID_CHARGEBACK_SELLER_FAVOUR = 'INVALID_CHARGEBACK_SELLER_FAVOUR';

    /** Seller provided invalid proof of delivery. */
    public const REASON_INVALID_DELIVERY_PROOF = 'INVALID_DELIVERY_PROOF';

    /** Buyer's signature confirmation missing in proof of delivery. */
    public const REASON_INVALID_DELIVERY_PROOF_SIGNATURE = 'INVALID_DELIVERY_PROOF_SIGNATURE';

    /** The documentation provided is not valid. */
    public const REASON_INVALID_DOCUMENTATION = 'INVALID_DOCUMENTATION';

    /** Seller provided invalid proof of shipment. */
    public const REASON_INVALID_PROOF_OF_SHIPMENT = 'INVALID_PROOF_OF_SHIPMENT';

    /** Seller provided invalid proof of refund. */
    public const REASON_INVALID_REFUND_PROOF = 'INVALID_REFUND_PROOF';

    /** Seller's signature confirmation missing in proof of return. */
    public const REASON_INVALID_RETURN_DELIVERY_NO_SIGNATURE_PROOF = 'INVALID_RETURN_DELIVERY_NO_SIGNATURE_PROOF';

    /** Buyer provided invalid proof of return. */
    public const REASON_INVALID_RETURN_DELIVERY_PROOF = 'INVALID_RETURN_DELIVERY_PROOF';

    /** Seller provided invalid tracking information. */
    public const REASON_INVALID_TRACKING = 'INVALID_TRACKING';

    /** Item was altered or repaired while in buyer's possession. */
    public const REASON_ITEM_ALTERED_REPAIRED = 'ITEM_ALTERED_REPAIRED';

    /** Item or service provided didn’t match as it was advertised. */
    public const REASON_ITEM_NOT_AS_ADVERTISED = 'ITEM_NOT_AS_ADVERTISED';

    /** Item or service provided didn’t match as it was described. */
    public const REASON_ITEM_NOT_AS_DESCRIBED = 'ITEM_NOT_AS_DESCRIBED';

    /** Item or service provided was not damaged or missing any parts. */
    public const REASON_ITEM_NOT_DAMAGED = 'ITEM_NOT_DAMAGED';

    /** Seller did not deliver the item to the buyer. */
    public const REASON_ITEM_NOT_DELIVERED = 'ITEM_NOT_DELIVERED';

    /** Item was not returned to seller. */
    public const REASON_ITEM_NOT_RETURNED_TO_SELLER = 'ITEM_NOT_RETURNED_TO_SELLER';

    /** Seller did not provide verified proof of shipment or delivery. */
    public const REASON_ITEM_NOT_SHIPPED = 'ITEM_NOT_SHIPPED';

    /** Item sent to the buyer was of different quality, quantity, color, or size. */
    public const REASON_ITEM_OF_DIFFERENT_QUALITY_OR_QUANTITY = 'ITEM_OF_DIFFERENT_QUALITY_OR_QUANTITY';

    /** Item was not delivered as it was no longer in stock. */
    public const REASON_ITEM_OUT_OF_STOCK_AND_NOT_DELIVERED = 'ITEM_OUT_OF_STOCK_AND_NOT_DELIVERED';

    /** Buyer returned the item to seller. */
    public const REASON_ITEM_RETURNED_TO_SELLER = 'ITEM_RETURNED_TO_SELLER';

    /** Seller's listing misrepresented the item. */
    public const REASON_ITEM_SERVICE_MISREPRESENTED = 'ITEM_SERVICE_MISREPRESENTED';

    /** Seller's listing accurately represented the item. */
    public const REASON_ITEM_SERVICE_NOT_MISREPRESENTED = 'ITEM_SERVICE_NOT_MISREPRESENTED';

    /** Buyer received the item or service from the seller. */
    public const REASON_ITEM_SERVICE_RECEIVED_BY_BUYER = 'ITEM_SERVICE_RECEIVED_BY_BUYER';

    /** Item was sold in the condition as described by the seller. */
    public const REASON_ITEM_SOLD_AS_DESCRIBED = 'ITEM_SOLD_AS_DESCRIBED';

    /** Item value or usability was not affected significantly. */
    public const REASON_ITEM_VALUE_UNAFFECTED = 'ITEM_VALUE_UNAFFECTED';

    /** Seller appealed multiple times for the same reason with no additional compelling evidence. */
    public const REASON_MULTIPLE_APPEALS_WITH_SAME_REASON = 'MULTIPLE_APPEALS_WITH_SAME_REASON';

    /** No documentation received from buyer. */
    public const REASON_NO_DOCUMENTATION_FROM_BUYER = 'NO_DOCUMENTATION_FROM_BUYER';

    /** No documentation given to support that credit is due to buyer. */
    public const REASON_NO_DOCUMENTATION_SUPPORTING_DUE_OF_CREDIT = 'NO_DOCUMENTATION_SUPPORTING_DUE_OF_CREDIT';

    /** Seller did not provide proof of delivery. */
    public const REASON_NO_PROOF_OF_DELIVERY = 'NO_PROOF_OF_DELIVERY';

    /** Seller did not provide proof of fulfillment for a service or digital good. */
    public const REASON_NO_PROOF_OF_DELIVERY_INTANGIBLE = 'NO_PROOF_OF_DELIVERY_INTANGIBLE';

    /** Digital goods, services, or other Intangibles not covered under Protection Policies. */
    public const REASON_NO_PROTECTION_FOR_DIGITAL_GOODS_SERVICE = 'NO_PROTECTION_FOR_DIGITAL_GOODS_SERVICE';

    /** No response from buyer. */
    public const REASON_NO_RESPONSE_FROM_BUYER = 'NO_RESPONSE_FROM_BUYER';

    /** No response from buyer to the request for additional information. */
    public const REASON_NO_RESPONSE_FROM_BUYER_FOR_ADDITIONAL_INFO_REQUEST = 'NO_RESPONSE_FROM_BUYER_FOR_ADDITIONAL_INFO_REQUEST';

    /** No response from seller. */
    public const REASON_NO_SELLER_RESPONSE = 'NO_SELLER_RESPONSE';

    /** No response from seller to the request for additional information. */
    public const REASON_NO_SELLER_RESPONSE_FOR_ADDITIONAL_INFO_REQUEST = 'NO_SELLER_RESPONSE_FOR_ADDITIONAL_INFO_REQUEST';

    /** Seller did not provide valid proof of shipment. */
    public const REASON_NO_VALID_SHIPMENT_PROOF = 'NO_VALID_SHIPMENT_PROOF';

    /** No evidence of a billing error. */
    public const REASON_NOT_A_BILLING_ERROR = 'NOT_A_BILLING_ERROR';

    /** No evidence of unauthorized account access was found. */
    public const REASON_NOT_AN_UNAUTHORIZED_TRANSACTION = 'NOT_AN_UNAUTHORIZED_TRANSACTION';

    /** Funds only added once and no duplication. */
    public const REASON_NOT_DUPLICATE_FUNDS_ADDED_ONCE = 'NOT_DUPLICATE_FUNDS_ADDED_ONCE';

    /** Funds only withdrawn once and no duplication. */
    public const REASON_NOT_DUPLICATE_FUNDS_WITHDRAWN_ONCE = 'NOT_DUPLICATE_FUNDS_WITHDRAWN_ONCE';

    /** Seller did not ship to correct address. */
    public const REASON_NOT_SHIPPED_TO_CORRECT_ADDRESS = 'NOT_SHIPPED_TO_CORRECT_ADDRESS';

    /** Seller issued refund for missing items. */
    public const REASON_PARTIAL_REFUND_ISSUED_FOR_MISSING_ITEMS = 'PARTIAL_REFUND_ISSUED_FOR_MISSING_ITEMS';

    /** Buyer accepted the partial refund offer. */
    public const REASON_PARTIAL_REFUND_OFFER_ACCEPTED = 'PARTIAL_REFUND_OFFER_ACCEPTED';

    /** Payment was previously refunded or reversed. */
    public const REASON_PAYMENT_REVERSED_ALREADY = 'PAYMENT_REVERSED_ALREADY';

    /** Seller submitted proof of shipment instead of proof of delivery. */
    public const REASON_POS_SUBMITTED_INSTEAD_OF_POD = 'POS_SUBMITTED_INSTEAD_OF_POD';

    /** Pre-authorized installment or balance is due to seller. */
    public const REASON_PREAUTH_INSTALLMENT_DUE = 'PREAUTH_INSTALLMENT_DUE';

    /** Buyer submitted proof of being billed after the billing agreement was cancelled. */
    public const REASON_PROOF_OF_BILLING_AFTER_CANCELLATION_ACCEPTED = 'PROOF_OF_BILLING_AFTER_CANCELLATION_ACCEPTED';

    /** Buyer submitted proof that this was paid by another payment method. */
    public const REASON_PROOF_OF_DUPLICATE_DENIED_OR_INSUFFICIENT = 'PROOF_OF_DUPLICATE_DENIED_OR_INSUFFICIENT';

    /** Bank or Credit does not match withdrawal amount on PayPal. */
    public const REASON_PROOF_OF_INCORRECT_TRANSACTION_AMOUNT_ACCEPTED = 'PROOF_OF_INCORRECT_TRANSACTION_AMOUNT_ACCEPTED';

    /** Buyer did not provide sufficient proof of paying by other means. */
    public const REASON_PROOF_OF_PAID_BY_OTHER_MEANS_NOT_SUBMITTED = 'PROOF_OF_PAID_BY_OTHER_MEANS_NOT_SUBMITTED';

    /** Buyer did not provide sufficient proof of tracking for returns. */
    public const REASON_PROOF_OF_TRACKING_NOT_SUBMITTED = 'PROOF_OF_TRACKING_NOT_SUBMITTED';

    /** This case is covered under Seller protection program. */
    public const REASON_PROTECTED_BY_PAYPAL = 'PROTECTED_BY_PAYPAL';

    /** Paypal covered the cost of the case as decided by policy. */
    public const REASON_REPRESENTED_BY_PAYPAL = 'REPRESENTED_BY_PAYPAL';

    /** Seller received multiple payments for the same purchase. */
    public const REASON_SELLER_ACCEPTED_MULTIPLE_PAYMENTS = 'SELLER_ACCEPTED_MULTIPLE_PAYMENTS';

    /** Seller chose to issue a refund without requiring item to be returned. */
    public const REASON_SELLER_AGREED_REFUND_WITHOUT_RETURN = 'SELLER_AGREED_REFUND_WITHOUT_RETURN';

    /** Seller agreed to refund the buyer. */
    public const REASON_SELLER_AGREED_TO_ISSUE_CREDIT = 'SELLER_AGREED_TO_ISSUE_CREDIT';

    /** Seller has earlier issued a credit to the buyer for the same transaction. */
    public const REASON_SELLER_ISSUED_CREDIT_TO_BUYER = 'SELLER_ISSUED_CREDIT_TO_BUYER';

    /** Seller has issued a refund. */
    public const REASON_SELLER_ISSUED_REFUND = 'SELLER_ISSUED_REFUND';

    /** Seller could not be reached to resolve case. */
    public const REASON_SELLER_NOT_REACHABLE = 'SELLER_NOT_REACHABLE';

    /** Seller received the payment twice or received payment for a replacement item. */
    public const REASON_SELLER_RECEIVED_PAYMENT_TWICE_OR_FOR_REPLACEMENT = 'SELLER_RECEIVED_PAYMENT_TWICE_OR_FOR_REPLACEMENT';

    /** Seller declined to issue a refund. */
    public const REASON_SELLER_REFUSED_REFUND = 'SELLER_REFUSED_REFUND';

    /** Seller declined to accept return of the item. */
    public const REASON_SELLER_REFUSED_RETURN = 'SELLER_REFUSED_RETURN';

    /** Surcharge was assessed to the buyer. */
    public const REASON_SELLER_SURCHARGED_BUYER = 'SELLER_SURCHARGED_BUYER';

    /** Service was not completed by seller as per description in the agreement. */
    public const REASON_SERVICE_NOT_COMPLETED_AS_AGREED = 'SERVICE_NOT_COMPLETED_AS_AGREED';

    /** Shipping company refused to ship the item. */
    public const REASON_SHIPPING_COMPANY_WONT_SHIP = 'SHIPPING_COMPANY_WONT_SHIP';

    /** For an item which was significantly not as described, seller cannot appeal with tracking information. */
    public const REASON_TRACKING_PROOF_NOT_ENOUGH = 'TRACKING_PROOF_NOT_ENOUGH';

    /** Card holder authorized the use of card for the transaction. */
    public const REASON_TRANSACTION_AUTHORIZED_BY_CARDHOLDER = 'TRANSACTION_AUTHORIZED_BY_CARDHOLDER';

    /** Transaction was cancelled after the authorization date. */
    public const REASON_TRANSACTION_CANCELLED_AFTER_AUTHORIZATION_DATE = 'TRANSACTION_CANCELLED_AFTER_AUTHORIZATION_DATE';

    /** Transaction was cancelled before the shipment or service date. */
    public const REASON_TRANSACTION_CANCELLED_BEFORE_SHIPMENT_SERVICE_DATE = 'TRANSACTION_CANCELLED_BEFORE_SHIPMENT_SERVICE_DATE';

    /** Transaction similar to recent spending patterns of buyer. */
    public const REASON_TRANSACTION_MATCHES_BUYER_SPENDING_PATTERN = 'TRANSACTION_MATCHES_BUYER_SPENDING_PATTERN';

    /** Transaction processed correctly. */
    public const REASON_TRANSACTION_PROCESSED_CORRECTLY = 'TRANSACTION_PROCESSED_CORRECTLY';

    /** Payout to the buyer decided based on their profile and policy. */
    public const REASON_TRUSTED_BUYER_PAYOUT = 'TRUSTED_BUYER_PAYOUT';

    /** Shipping label provided was unused. */
    public const REASON_UNUSED_SHIPPING_LABEL = 'UNUSED_SHIPPING_LABEL';

    /** Seller provided valid proof of delivery. */
    public const REASON_VALID_PROOF_OF_DELIVERY = 'VALID_PROOF_OF_DELIVERY';

    /** Seller provided valid proof of delivery with signature confirmation. */
    public const REASON_VALID_PROOF_OF_DELIVERY_WITH_SIGNATURE = 'VALID_PROOF_OF_DELIVERY_WITH_SIGNATURE';

    /** Seller provided valid proof of refund. */
    public const REASON_VALID_PROOF_OF_REFUND = 'VALID_PROOF_OF_REFUND';

    /** Buyer provided valid documents to support claim. */
    public const REASON_VALID_PROOF_SUPPORTING_CLAIM = 'VALID_PROOF_SUPPORTING_CLAIM';

    /** Buyer provided valid proof of return delivery. */
    public const REASON_VALID_RETURN_DELIVERY_PROOF = 'VALID_RETURN_DELIVERY_PROOF';

    /** Buyer provided valid proof of return delivery with signature confirmation. */
    public const REASON_VALID_RETURN_DELIVERY_PROOF_WITH_SIGNATURE = 'VALID_RETURN_DELIVERY_PROOF_WITH_SIGNATURE';

    /** Seller provided valid proof of shipment. */
    public const REASON_VALID_SHIPMENT_PROOF = 'VALID_SHIPMENT_PROOF';

    /** The value of item or usability was affected significantly. */
    public const REASON_VALUE_AFFECTED_SIGNIFICANTLY = 'VALUE_AFFECTED_SIGNIFICANTLY';

    /** The case is decided based on Protection Policy. */
    public const REASON_PROTECTION_POLICY_APPLIES = 'PROTECTION_POLICY_APPLIES';

    /** The action is pending and awaits partner processing. For this type of action, the partner must update the action's status after they complete the required actions. */
    public const STATUS_PENDING = 'PENDING';

    /** The partner has processed the action. */
    public const STATUS_COMPLETED = 'COMPLETED';

    /** The partner could not perform the action. The partner may send the `COMPLETED` status once the action is processed successfully. */
    public const STATUS_FAILED = 'FAILED';

    /**
     * The ID for the action.
     *
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * The action name.
     *
     * use one of constants defined in this class to set the value:
     * @see NAME_PROVIDE_PROVISIONAL_CREDIT
     * @see NAME_DENY_DISPUTE
     * @see NAME_ACCEPT_DISPUTE
     * @see NAME_WRITE_OFF
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $name;

    /**
     * The reason for the adjudication type.
     *
     * use one of constants defined in this class to set the value:
     * @see REASON_AMOUNT_DIFFERENCE_EXPECTED_DUE_TO_FEES
     * @see REASON_BILLING_AGREEMENT_CHANGE_DISCLOSED
     * @see REASON_BILLING_AGREEMENT_CHANGE_NOT_DISCLOSED
     * @see REASON_BILLING_AGREEMENT_DATE_CHANGE_DISCLOSED
     * @see REASON_BILLING_AGREEMENT_DATE_CHANGE_NOT_DISCLOSED
     * @see REASON_BUYER_ATTEMPTED_RETURN
     * @see REASON_BUYER_BILLED_ONLY_ONCE
     * @see REASON_BUYER_CANCELLED_CASE
     * @see REASON_BUYER_CANCELLED_SERVICE
     * @see REASON_BUYER_FAILED_TO_DESCRIBE_ISSUE
     * @see REASON_BUYER_HAS_POSSESSION_OF_THE_MERCHANDISE_OR_SERVICE
     * @see REASON_BUYER_MADE_NO_ATTEMPT_TO_RESOLVE_WITH_SELLER
     * @see REASON_BUYER_NOT_IN_POSSESSION_OF_ITEM_TO_RETURN
     * @see REASON_BUYER_PROVIDED_CREDIT_RECEIPT
     * @see REASON_BUYER_RECEIVED_DUPLICATE_REFUND
     * @see REASON_CANCELLED_PER_TERMS_OF_BILLING_AGREEMENT
     * @see REASON_CARD_NOT_STOLEN
     * @see REASON_CARD_NOT_STOLEN_BEFORE_AUTH
     * @see REASON_CUSTOMER_RECOGNIZES_TRANSACTION
     * @see REASON_DECISION_BASED_ON_AVAILABLE_INFORMATION
     * @see REASON_DELIVERY_AFTER_EXPECTED_DELIVERY_DATE
     * @see REASON_DELIVERY_DUE_WITHIN_EXPECTED_DELIVERY_DATE
     * @see REASON_DELIVERY_OR_SERVICE_REFUSED
     * @see REASON_DOCUMENTATION_MATCHES_AMOUNT_CHARGED
     * @see REASON_DOCUMENTATION_MATCHES_AMOUNT_IN_PAYPAL_ACCOUNT
     * @see REASON_DUPLICATE_ADD_FUNDS
     * @see REASON_EFFORTLESS_SELLER_PROTECTION
     * @see REASON_IN_PERSON_DELIVERY
     * @see REASON_INELIGIBLE_BUYER_PROTECTION_POLICY
     * @see REASON_INELIGIBLE_SELLER_PROTECTION_POLICY
     * @see REASON_INQUIRY_OFFER_ITEM_REPLACED
     * @see REASON_INQUIRY_OFFER_PARTIAL_REFUND
     * @see REASON_INQUIRY_OFFER_REFUND_WITH_ITEM_RETURN
     * @see REASON_INQUIRY_OFFER_REFUND_WITH_REPLACEMENT
     * @see REASON_INVALID_APPEAL_REASON
     * @see REASON_INVALID_CHARGEBACK_SELLER_FAVOUR
     * @see REASON_INVALID_DELIVERY_PROOF
     * @see REASON_INVALID_DELIVERY_PROOF_SIGNATURE
     * @see REASON_INVALID_DOCUMENTATION
     * @see REASON_INVALID_PROOF_OF_SHIPMENT
     * @see REASON_INVALID_REFUND_PROOF
     * @see REASON_INVALID_RETURN_DELIVERY_NO_SIGNATURE_PROOF
     * @see REASON_INVALID_RETURN_DELIVERY_PROOF
     * @see REASON_INVALID_TRACKING
     * @see REASON_ITEM_ALTERED_REPAIRED
     * @see REASON_ITEM_NOT_AS_ADVERTISED
     * @see REASON_ITEM_NOT_AS_DESCRIBED
     * @see REASON_ITEM_NOT_DAMAGED
     * @see REASON_ITEM_NOT_DELIVERED
     * @see REASON_ITEM_NOT_RETURNED_TO_SELLER
     * @see REASON_ITEM_NOT_SHIPPED
     * @see REASON_ITEM_OF_DIFFERENT_QUALITY_OR_QUANTITY
     * @see REASON_ITEM_OUT_OF_STOCK_AND_NOT_DELIVERED
     * @see REASON_ITEM_RETURNED_TO_SELLER
     * @see REASON_ITEM_SERVICE_MISREPRESENTED
     * @see REASON_ITEM_SERVICE_NOT_MISREPRESENTED
     * @see REASON_ITEM_SERVICE_RECEIVED_BY_BUYER
     * @see REASON_ITEM_SOLD_AS_DESCRIBED
     * @see REASON_ITEM_VALUE_UNAFFECTED
     * @see REASON_MULTIPLE_APPEALS_WITH_SAME_REASON
     * @see REASON_NO_DOCUMENTATION_FROM_BUYER
     * @see REASON_NO_DOCUMENTATION_SUPPORTING_DUE_OF_CREDIT
     * @see REASON_NO_PROOF_OF_DELIVERY
     * @see REASON_NO_PROOF_OF_DELIVERY_INTANGIBLE
     * @see REASON_NO_PROTECTION_FOR_DIGITAL_GOODS_SERVICE
     * @see REASON_NO_RESPONSE_FROM_BUYER
     * @see REASON_NO_RESPONSE_FROM_BUYER_FOR_ADDITIONAL_INFO_REQUEST
     * @see REASON_NO_SELLER_RESPONSE
     * @see REASON_NO_SELLER_RESPONSE_FOR_ADDITIONAL_INFO_REQUEST
     * @see REASON_NO_VALID_SHIPMENT_PROOF
     * @see REASON_NOT_A_BILLING_ERROR
     * @see REASON_NOT_AN_UNAUTHORIZED_TRANSACTION
     * @see REASON_NOT_DUPLICATE_FUNDS_ADDED_ONCE
     * @see REASON_NOT_DUPLICATE_FUNDS_WITHDRAWN_ONCE
     * @see REASON_NOT_SHIPPED_TO_CORRECT_ADDRESS
     * @see REASON_PARTIAL_REFUND_ISSUED_FOR_MISSING_ITEMS
     * @see REASON_PARTIAL_REFUND_OFFER_ACCEPTED
     * @see REASON_PAYMENT_REVERSED_ALREADY
     * @see REASON_POS_SUBMITTED_INSTEAD_OF_POD
     * @see REASON_PREAUTH_INSTALLMENT_DUE
     * @see REASON_PROOF_OF_BILLING_AFTER_CANCELLATION_ACCEPTED
     * @see REASON_PROOF_OF_DUPLICATE_DENIED_OR_INSUFFICIENT
     * @see REASON_PROOF_OF_INCORRECT_TRANSACTION_AMOUNT_ACCEPTED
     * @see REASON_PROOF_OF_PAID_BY_OTHER_MEANS_NOT_SUBMITTED
     * @see REASON_PROOF_OF_TRACKING_NOT_SUBMITTED
     * @see REASON_PROTECTED_BY_PAYPAL
     * @see REASON_REPRESENTED_BY_PAYPAL
     * @see REASON_SELLER_ACCEPTED_MULTIPLE_PAYMENTS
     * @see REASON_SELLER_AGREED_REFUND_WITHOUT_RETURN
     * @see REASON_SELLER_AGREED_TO_ISSUE_CREDIT
     * @see REASON_SELLER_ISSUED_CREDIT_TO_BUYER
     * @see REASON_SELLER_ISSUED_REFUND
     * @see REASON_SELLER_NOT_REACHABLE
     * @see REASON_SELLER_RECEIVED_PAYMENT_TWICE_OR_FOR_REPLACEMENT
     * @see REASON_SELLER_REFUSED_REFUND
     * @see REASON_SELLER_REFUSED_RETURN
     * @see REASON_SELLER_SURCHARGED_BUYER
     * @see REASON_SERVICE_NOT_COMPLETED_AS_AGREED
     * @see REASON_SHIPPING_COMPANY_WONT_SHIP
     * @see REASON_TRACKING_PROOF_NOT_ENOUGH
     * @see REASON_TRANSACTION_AUTHORIZED_BY_CARDHOLDER
     * @see REASON_TRANSACTION_CANCELLED_AFTER_AUTHORIZATION_DATE
     * @see REASON_TRANSACTION_CANCELLED_BEFORE_SHIPMENT_SERVICE_DATE
     * @see REASON_TRANSACTION_MATCHES_BUYER_SPENDING_PATTERN
     * @see REASON_TRANSACTION_PROCESSED_CORRECTLY
     * @see REASON_TRUSTED_BUYER_PAYOUT
     * @see REASON_UNUSED_SHIPPING_LABEL
     * @see REASON_VALID_PROOF_OF_DELIVERY
     * @see REASON_VALID_PROOF_OF_DELIVERY_WITH_SIGNATURE
     * @see REASON_VALID_PROOF_OF_REFUND
     * @see REASON_VALID_PROOF_SUPPORTING_CLAIM
     * @see REASON_VALID_RETURN_DELIVERY_PROOF
     * @see REASON_VALID_RETURN_DELIVERY_PROOF_WITH_SIGNATURE
     * @see REASON_VALID_SHIPMENT_PROOF
     * @see REASON_VALUE_AFFECTED_SIGNIFICANTLY
     * @see REASON_PROTECTION_POLICY_APPLIES
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $reason;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string
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

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $due_time;

    /**
     * The status of the action.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_PENDING
     * @see STATUS_COMPLETED
     * @see STATUS_FAILED
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $status;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount;

    /**
     * The Crypto trade details.
     *
     * @var ResponseCryptoDetails | null
     */
    public $crypto_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->id, "id in ResponsePartnerAction must not be NULL $within");
        Assert::minLength(
            $this->id,
            1,
            "id in ResponsePartnerAction must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->id,
            255,
            "id in ResponsePartnerAction must have maxlength of 255 $within"
        );
        Assert::notNull($this->name, "name in ResponsePartnerAction must not be NULL $within");
        Assert::minLength(
            $this->name,
            1,
            "name in ResponsePartnerAction must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->name,
            255,
            "name in ResponsePartnerAction must have maxlength of 255 $within"
        );
        !isset($this->reason) || Assert::minLength(
            $this->reason,
            1,
            "reason in ResponsePartnerAction must have minlength of 1 $within"
        );
        !isset($this->reason) || Assert::maxLength(
            $this->reason,
            255,
            "reason in ResponsePartnerAction must have maxlength of 255 $within"
        );
        Assert::notNull($this->create_time, "create_time in ResponsePartnerAction must not be NULL $within");
        Assert::minLength(
            $this->create_time,
            20,
            "create_time in ResponsePartnerAction must have minlength of 20 $within"
        );
        Assert::maxLength(
            $this->create_time,
            64,
            "create_time in ResponsePartnerAction must have maxlength of 64 $within"
        );
        !isset($this->update_time) || Assert::minLength(
            $this->update_time,
            20,
            "update_time in ResponsePartnerAction must have minlength of 20 $within"
        );
        !isset($this->update_time) || Assert::maxLength(
            $this->update_time,
            64,
            "update_time in ResponsePartnerAction must have maxlength of 64 $within"
        );
        !isset($this->due_time) || Assert::minLength(
            $this->due_time,
            20,
            "due_time in ResponsePartnerAction must have minlength of 20 $within"
        );
        !isset($this->due_time) || Assert::maxLength(
            $this->due_time,
            64,
            "due_time in ResponsePartnerAction must have maxlength of 64 $within"
        );
        Assert::notNull($this->status, "status in ResponsePartnerAction must not be NULL $within");
        Assert::minLength(
            $this->status,
            1,
            "status in ResponsePartnerAction must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->status,
            255,
            "status in ResponsePartnerAction must have maxlength of 255 $within"
        );
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in ResponsePartnerAction must be instance of Money $within"
        );
        !isset($this->amount) ||  $this->amount->validate(ResponsePartnerAction::class);
        !isset($this->crypto_details) || Assert::isInstanceOf(
            $this->crypto_details,
            ResponseCryptoDetails::class,
            "crypto_details in ResponsePartnerAction must be instance of ResponseCryptoDetails $within"
        );
        !isset($this->crypto_details) ||  $this->crypto_details->validate(ResponsePartnerAction::class);
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['reason'])) {
            $this->reason = $data['reason'];
        }
        if (isset($data['create_time'])) {
            $this->create_time = $data['create_time'];
        }
        if (isset($data['update_time'])) {
            $this->update_time = $data['update_time'];
        }
        if (isset($data['due_time'])) {
            $this->due_time = $data['due_time'];
        }
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['amount'])) {
            $this->amount = new Money($data['amount']);
        }
        if (isset($data['crypto_details'])) {
            $this->crypto_details = new ResponseCryptoDetails($data['crypto_details']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAmount(): Money
    {
        return $this->amount = new Money();
    }

    public function initCryptoDetails(): ResponseCryptoDetails
    {
        return $this->crypto_details = new ResponseCryptoDetails();
    }
}
