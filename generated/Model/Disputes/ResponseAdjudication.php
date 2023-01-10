<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The Adjudication details for the dispute.
 *
 * generated from: response-adjudication.json
 */
class ResponseAdjudication implements JsonSerializable
{
    use BaseModel;

    /** The decision is to deny the buyer for the dispute. */
    const TYPE_DENY_BUYER = 'DENY_BUYER';

    /** The decision is to payout to the buyer. */
    const TYPE_PAYOUT_TO_BUYER = 'PAYOUT_TO_BUYER';

    /** The decision is to payout to the seller if the seller was debited earlier. */
    const TYPE_PAYOUT_TO_SELLER = 'PAYOUT_TO_SELLER';

    /** The decision is to charge the seller for the dispute if the seller was not debited already. */
    const TYPE_RECOVER_FROM_SELLER = 'RECOVER_FROM_SELLER';

    /** Seller submitted proof of correct charge. */
    const REASON_AMOUNT_DIFFERENCE_EXPECTED_DUE_TO_FEES = 'AMOUNT_DIFFERENCE_EXPECTED_DUE_TO_FEES';

    /** Seller had disclosed billing agreement changes upfront. */
    const REASON_BILLING_AGREEMENT_CHANGE_DISCLOSED = 'BILLING_AGREEMENT_CHANGE_DISCLOSED';

    /** Seller had not disclosed billing agreement changes upfront. */
    const REASON_BILLING_AGREEMENT_CHANGE_NOT_DISCLOSED = 'BILLING_AGREEMENT_CHANGE_NOT_DISCLOSED';

    /** Seller had shared change in billing agreement date upfront. */
    const REASON_BILLING_AGREEMENT_DATE_CHANGE_DISCLOSED = 'BILLING_AGREEMENT_DATE_CHANGE_DISCLOSED';

    /** Seller had not shared change in billing agreement date upfront. */
    const REASON_BILLING_AGREEMENT_DATE_CHANGE_NOT_DISCLOSED = 'BILLING_AGREEMENT_DATE_CHANGE_NOT_DISCLOSED';

    /** Buyer has attempted to return the item. */
    const REASON_BUYER_ATTEMPTED_RETURN = 'BUYER_ATTEMPTED_RETURN';

    /** Buyer was charged only once and did not submit sufficient evidence of duplicate charge. */
    const REASON_BUYER_BILLED_ONLY_ONCE = 'BUYER_BILLED_ONLY_ONCE';

    /** Buyer cancelled the case. */
    const REASON_BUYER_CANCELLED_CASE = 'BUYER_CANCELLED_CASE';

    /** Buyer cancelled the service or recurring transaction. */
    const REASON_BUYER_CANCELLED_SERVICE = 'BUYER_CANCELLED_SERVICE';

    /** Buyer did not describe the issue to justify the refund. */
    const REASON_BUYER_FAILED_TO_DESCRIBE_ISSUE = 'BUYER_FAILED_TO_DESCRIBE_ISSUE';

    /** Buyer continues to possess the item or has received the service. */
    const REASON_BUYER_HAS_POSSESSION_OF_THE_MERCHANDISE_OR_SERVICE = 'BUYER_HAS_POSSESSION_OF_THE_MERCHANDISE_OR_SERVICE';

    /** Buyer did not attempt to resolve the issue with the seller. */
    const REASON_BUYER_MADE_NO_ATTEMPT_TO_RESOLVE_WITH_SELLER = 'BUYER_MADE_NO_ATTEMPT_TO_RESOLVE_WITH_SELLER';

    /** Buyer is not in possession of the item to be returned. */
    const REASON_BUYER_NOT_IN_POSSESSION_OF_ITEM_TO_RETURN = 'BUYER_NOT_IN_POSSESSION_OF_ITEM_TO_RETURN';

    /** Buyer provided credit receipt or relevant documentation. */
    const REASON_BUYER_PROVIDED_CREDIT_RECEIPT = 'BUYER_PROVIDED_CREDIT_RECEIPT';

    /** Buyer received the refund twice. */
    const REASON_BUYER_RECEIVED_DUPLICATE_REFUND = 'BUYER_RECEIVED_DUPLICATE_REFUND';

    /** Billing agreement was cancelled as per agreed terms. */
    const REASON_CANCELLED_PER_TERMS_OF_BILLING_AGREEMENT = 'CANCELLED_PER_TERMS_OF_BILLING_AGREEMENT';

    /** Buyer in possession of the card which was reported as stolen or lost. */
    const REASON_CARD_NOT_STOLEN = 'CARD_NOT_STOLEN';

    /** Buyer reported card as lost or stolen after the authorization date. */
    const REASON_CARD_NOT_STOLEN_BEFORE_AUTH = 'CARD_NOT_STOLEN_BEFORE_AUTH';

    /** Buyer recognizes the transaction as valid. */
    const REASON_CUSTOMER_RECOGNIZES_TRANSACTION = 'CUSTOMER_RECOGNIZES_TRANSACTION';

    /** Case decision was made as per available information when specific reasons are not applicable. */
    const REASON_DECISION_BASED_ON_AVAILABLE_INFORMATION = 'DECISION_BASED_ON_AVAILABLE_INFORMATION';

    /** Item or service was delivered after the expected delivery date had passed. */
    const REASON_DELIVERY_AFTER_EXPECTED_DELIVERY_DATE = 'DELIVERY_AFTER_EXPECTED_DELIVERY_DATE';

    /** Delivery of the item or service is due within the expected delivery date. */
    const REASON_DELIVERY_DUE_WITHIN_EXPECTED_DELIVERY_DATE = 'DELIVERY_DUE_WITHIN_EXPECTED_DELIVERY_DATE';

    /** Seller refused delivery or service of the item. */
    const REASON_DELIVERY_OR_SERVICE_REFUSED = 'DELIVERY_OR_SERVICE_REFUSED';

    /** Documentation provided supports the amount that was charged. */
    const REASON_DOCUMENTATION_MATCHES_AMOUNT_CHARGED = 'DOCUMENTATION_MATCHES_AMOUNT_CHARGED';

    /** Documentation provided supports the amount charged on buyer's account. */
    const REASON_DOCUMENTATION_MATCHES_AMOUNT_IN_PAYPAL_ACCOUNT = 'DOCUMENTATION_MATCHES_AMOUNT_IN_PAYPAL_ACCOUNT';

    /** Buyer submitted sufficient proof of duplicate charge. */
    const REASON_DUPLICATE_ADD_FUNDS = 'DUPLICATE_ADD_FUNDS';

    /** The case is decided based on Protection Policy. */
    const REASON_EFFORTLESS_SELLER_PROTECTION = 'EFFORTLESS_SELLER_PROTECTION';

    /** Seller delivered the item in person. */
    const REASON_IN_PERSON_DELIVERY = 'IN_PERSON_DELIVERY';

    /** The pattern identified does not meet buyer protection eligibility. */
    const REASON_INELIGIBLE_BUYER_PROTECTION_POLICY = 'INELIGIBLE_BUYER_PROTECTION_POLICY';

    /** The pattern identified does not meet seller protection eligibility. */
    const REASON_INELIGIBLE_SELLER_PROTECTION_POLICY = 'INELIGIBLE_SELLER_PROTECTION_POLICY';

    /** Seller agreed to replace the item. */
    const REASON_INQUIRY_OFFER_ITEM_REPLACED = 'INQUIRY_OFFER_ITEM_REPLACED';

    /** Seller agreed to issue a partial refund to the buyer. */
    const REASON_INQUIRY_OFFER_PARTIAL_REFUND = 'INQUIRY_OFFER_PARTIAL_REFUND';

    /** Seller agreed to issue a refund for item return. */
    const REASON_INQUIRY_OFFER_REFUND_WITH_ITEM_RETURN = 'INQUIRY_OFFER_REFUND_WITH_ITEM_RETURN';

    /** Seller agreed to replace the damaged item along with refunds applicable. */
    const REASON_INQUIRY_OFFER_REFUND_WITH_REPLACEMENT = 'INQUIRY_OFFER_REFUND_WITH_REPLACEMENT';

    /** Seller appealed twice for the same reason with invalid reason. */
    const REASON_INVALID_APPEAL_REASON = 'INVALID_APPEAL_REASON';

    /** The case is decided as invalid based on external network policy. */
    const REASON_INVALID_CHARGEBACK_SELLER_FAVOUR = 'INVALID_CHARGEBACK_SELLER_FAVOUR';

    /** Seller provided invalid proof of delivery. */
    const REASON_INVALID_DELIVERY_PROOF = 'INVALID_DELIVERY_PROOF';

    /** Buyer's signature confirmation missing in proof of delivery. */
    const REASON_INVALID_DELIVERY_PROOF_SIGNATURE = 'INVALID_DELIVERY_PROOF_SIGNATURE';

    /** The documentation provided is not valid. */
    const REASON_INVALID_DOCUMENTATION = 'INVALID_DOCUMENTATION';

    /** Seller provided invalid proof of shipment. */
    const REASON_INVALID_PROOF_OF_SHIPMENT = 'INVALID_PROOF_OF_SHIPMENT';

    /** Seller provided invalid proof of refund. */
    const REASON_INVALID_REFUND_PROOF = 'INVALID_REFUND_PROOF';

    /** Seller's signature confirmation missing in proof of return. */
    const REASON_INVALID_RETURN_DELIVERY_NO_SIGNATURE_PROOF = 'INVALID_RETURN_DELIVERY_NO_SIGNATURE_PROOF';

    /** Buyer provided invalid proof of return. */
    const REASON_INVALID_RETURN_DELIVERY_PROOF = 'INVALID_RETURN_DELIVERY_PROOF';

    /** Seller provided invalid tracking information. */
    const REASON_INVALID_TRACKING = 'INVALID_TRACKING';

    /** Item was altered or repaired while in buyer's possession. */
    const REASON_ITEM_ALTERED_REPAIRED = 'ITEM_ALTERED_REPAIRED';

    /** Item or service provided didn’t match as it was advertised. */
    const REASON_ITEM_NOT_AS_ADVERTISED = 'ITEM_NOT_AS_ADVERTISED';

    /** Item or service provided didn’t match as it was described. */
    const REASON_ITEM_NOT_AS_DESCRIBED = 'ITEM_NOT_AS_DESCRIBED';

    /** Item or service provided was not damaged or missing any parts. */
    const REASON_ITEM_NOT_DAMAGED = 'ITEM_NOT_DAMAGED';

    /** Seller did not deliver the item to the buyer. */
    const REASON_ITEM_NOT_DELIVERED = 'ITEM_NOT_DELIVERED';

    /** Item was not returned to seller. */
    const REASON_ITEM_NOT_RETURNED_TO_SELLER = 'ITEM_NOT_RETURNED_TO_SELLER';

    /** Seller did not provide verified proof of shipment or delivery. */
    const REASON_ITEM_NOT_SHIPPED = 'ITEM_NOT_SHIPPED';

    /** Item sent to the buyer was of different quality, quantity, color, or size. */
    const REASON_ITEM_OF_DIFFERENT_QUALITY_OR_QUANTITY = 'ITEM_OF_DIFFERENT_QUALITY_OR_QUANTITY';

    /** Item was not delivered as it was no longer in stock. */
    const REASON_ITEM_OUT_OF_STOCK_AND_NOT_DELIVERED = 'ITEM_OUT_OF_STOCK_AND_NOT_DELIVERED';

    /** Buyer returned the item to seller. */
    const REASON_ITEM_RETURNED_TO_SELLER = 'ITEM_RETURNED_TO_SELLER';

    /** Seller's listing misrepresented the item. */
    const REASON_ITEM_SERVICE_MISREPRESENTED = 'ITEM_SERVICE_MISREPRESENTED';

    /** Seller's listing accurately represented the item. */
    const REASON_ITEM_SERVICE_NOT_MISREPRESENTED = 'ITEM_SERVICE_NOT_MISREPRESENTED';

    /** Buyer received the item or service from the seller. */
    const REASON_ITEM_SERVICE_RECEIVED_BY_BUYER = 'ITEM_SERVICE_RECEIVED_BY_BUYER';

    /** Item was sold in the condition as described by the seller. */
    const REASON_ITEM_SOLD_AS_DESCRIBED = 'ITEM_SOLD_AS_DESCRIBED';

    /** Item value or usability was not affected significantly. */
    const REASON_ITEM_VALUE_UNAFFECTED = 'ITEM_VALUE_UNAFFECTED';

    /** Seller appealed multiple times for the same reason with no additional compelling evidence. */
    const REASON_MULTIPLE_APPEALS_WITH_SAME_REASON = 'MULTIPLE_APPEALS_WITH_SAME_REASON';

    /** No documentation received from buyer. */
    const REASON_NO_DOCUMENTATION_FROM_BUYER = 'NO_DOCUMENTATION_FROM_BUYER';

    /** No documentation given to support that credit is due to buyer. */
    const REASON_NO_DOCUMENTATION_SUPPORTING_DUE_OF_CREDIT = 'NO_DOCUMENTATION_SUPPORTING_DUE_OF_CREDIT';

    /** Seller did not provide proof of delivery. */
    const REASON_NO_PROOF_OF_DELIVERY = 'NO_PROOF_OF_DELIVERY';

    /** Seller did not provide proof of fulfillment for a service or digital good. */
    const REASON_NO_PROOF_OF_DELIVERY_INTANGIBLE = 'NO_PROOF_OF_DELIVERY_INTANGIBLE';

    /** Digital goods, services, or other Intangibles not covered under Protection Policies. */
    const REASON_NO_PROTECTION_FOR_DIGITAL_GOODS_SERVICE = 'NO_PROTECTION_FOR_DIGITAL_GOODS_SERVICE';

    /** No response from buyer. */
    const REASON_NO_RESPONSE_FROM_BUYER = 'NO_RESPONSE_FROM_BUYER';

    /** No response from buyer to the request for additional information. */
    const REASON_NO_RESPONSE_FROM_BUYER_FOR_ADDITIONAL_INFO_REQUEST = 'NO_RESPONSE_FROM_BUYER_FOR_ADDITIONAL_INFO_REQUEST';

    /** No response from seller. */
    const REASON_NO_SELLER_RESPONSE = 'NO_SELLER_RESPONSE';

    /** No response from seller to the request for additional information. */
    const REASON_NO_SELLER_RESPONSE_FOR_ADDITIONAL_INFO_REQUEST = 'NO_SELLER_RESPONSE_FOR_ADDITIONAL_INFO_REQUEST';

    /** Seller did not provide valid proof of shipment. */
    const REASON_NO_VALID_SHIPMENT_PROOF = 'NO_VALID_SHIPMENT_PROOF';

    /** No evidence of a billing error. */
    const REASON_NOT_A_BILLING_ERROR = 'NOT_A_BILLING_ERROR';

    /** No evidence of unauthorized account access was found. */
    const REASON_NOT_AN_UNAUTHORIZED_TRANSACTION = 'NOT_AN_UNAUTHORIZED_TRANSACTION';

    /** Funds only added once and no duplication. */
    const REASON_NOT_DUPLICATE_FUNDS_ADDED_ONCE = 'NOT_DUPLICATE_FUNDS_ADDED_ONCE';

    /** Funds only withdrawn once and no duplication. */
    const REASON_NOT_DUPLICATE_FUNDS_WITHDRAWN_ONCE = 'NOT_DUPLICATE_FUNDS_WITHDRAWN_ONCE';

    /** Seller did not ship to correct address. */
    const REASON_NOT_SHIPPED_TO_CORRECT_ADDRESS = 'NOT_SHIPPED_TO_CORRECT_ADDRESS';

    /** Seller issued refund for missing items. */
    const REASON_PARTIAL_REFUND_ISSUED_FOR_MISSING_ITEMS = 'PARTIAL_REFUND_ISSUED_FOR_MISSING_ITEMS';

    /** Buyer accepted the partial refund offer. */
    const REASON_PARTIAL_REFUND_OFFER_ACCEPTED = 'PARTIAL_REFUND_OFFER_ACCEPTED';

    /** Payment was previously refunded or reversed. */
    const REASON_PAYMENT_REVERSED_ALREADY = 'PAYMENT_REVERSED_ALREADY';

    /** Seller submitted proof of shipment instead of proof of delivery. */
    const REASON_POS_SUBMITTED_INSTEAD_OF_POD = 'POS_SUBMITTED_INSTEAD_OF_POD';

    /** Pre-authorized installment or balance is due to seller. */
    const REASON_PREAUTH_INSTALLMENT_DUE = 'PREAUTH_INSTALLMENT_DUE';

    /** Buyer submitted proof of being billed after the billing agreement was cancelled. */
    const REASON_PROOF_OF_BILLING_AFTER_CANCELLATION_ACCEPTED = 'PROOF_OF_BILLING_AFTER_CANCELLATION_ACCEPTED';

    /** Buyer submitted proof that this was paid by another payment method. */
    const REASON_PROOF_OF_DUPLICATE_DENIED_OR_INSUFFICIENT = 'PROOF_OF_DUPLICATE_DENIED_OR_INSUFFICIENT';

    /** Bank or Credit does not match withdrawal amount on PayPal. */
    const REASON_PROOF_OF_INCORRECT_TRANSACTION_AMOUNT_ACCEPTED = 'PROOF_OF_INCORRECT_TRANSACTION_AMOUNT_ACCEPTED';

    /** Buyer did not provide sufficient proof of paying by other means. */
    const REASON_PROOF_OF_PAID_BY_OTHER_MEANS_NOT_SUBMITTED = 'PROOF_OF_PAID_BY_OTHER_MEANS_NOT_SUBMITTED';

    /** Buyer did not provide sufficient proof of tracking for returns. */
    const REASON_PROOF_OF_TRACKING_NOT_SUBMITTED = 'PROOF_OF_TRACKING_NOT_SUBMITTED';

    /** This case is covered under Seller protection program. */
    const REASON_PROTECTED_BY_PAYPAL = 'PROTECTED_BY_PAYPAL';

    /** Paypal covered the cost of the case as decided by policy. */
    const REASON_REPRESENTED_BY_PAYPAL = 'REPRESENTED_BY_PAYPAL';

    /** Seller received multiple payments for the same purchase. */
    const REASON_SELLER_ACCEPTED_MULTIPLE_PAYMENTS = 'SELLER_ACCEPTED_MULTIPLE_PAYMENTS';

    /** Seller chose to issue a refund without requiring item to be returned. */
    const REASON_SELLER_AGREED_REFUND_WITHOUT_RETURN = 'SELLER_AGREED_REFUND_WITHOUT_RETURN';

    /** Seller agreed to refund the buyer. */
    const REASON_SELLER_AGREED_TO_ISSUE_CREDIT = 'SELLER_AGREED_TO_ISSUE_CREDIT';

    /** Seller has earlier issued a credit to the buyer for the same transaction. */
    const REASON_SELLER_ISSUED_CREDIT_TO_BUYER = 'SELLER_ISSUED_CREDIT_TO_BUYER';

    /** Seller has issued a refund. */
    const REASON_SELLER_ISSUED_REFUND = 'SELLER_ISSUED_REFUND';

    /** Seller could not be reached to resolve case. */
    const REASON_SELLER_NOT_REACHABLE = 'SELLER_NOT_REACHABLE';

    /** Seller received the payment twice or received payment for a replacement item. */
    const REASON_SELLER_RECEIVED_PAYMENT_TWICE_OR_FOR_REPLACEMENT = 'SELLER_RECEIVED_PAYMENT_TWICE_OR_FOR_REPLACEMENT';

    /** Seller declined to issue a refund. */
    const REASON_SELLER_REFUSED_REFUND = 'SELLER_REFUSED_REFUND';

    /** Seller declined to accept return of the item. */
    const REASON_SELLER_REFUSED_RETURN = 'SELLER_REFUSED_RETURN';

    /** Surcharge was assessed to the buyer. */
    const REASON_SELLER_SURCHARGED_BUYER = 'SELLER_SURCHARGED_BUYER';

    /** Service was not completed by seller as per description in the agreement. */
    const REASON_SERVICE_NOT_COMPLETED_AS_AGREED = 'SERVICE_NOT_COMPLETED_AS_AGREED';

    /** Shipping company refused to ship the item. */
    const REASON_SHIPPING_COMPANY_WONT_SHIP = 'SHIPPING_COMPANY_WONT_SHIP';

    /** For an item which was significantly not as described, seller cannot appeal with tracking information. */
    const REASON_TRACKING_PROOF_NOT_ENOUGH = 'TRACKING_PROOF_NOT_ENOUGH';

    /** Card holder authorized the use of card for the transaction. */
    const REASON_TRANSACTION_AUTHORIZED_BY_CARDHOLDER = 'TRANSACTION_AUTHORIZED_BY_CARDHOLDER';

    /** Transaction was cancelled after the authorization date. */
    const REASON_TRANSACTION_CANCELLED_AFTER_AUTHORIZATION_DATE = 'TRANSACTION_CANCELLED_AFTER_AUTHORIZATION_DATE';

    /** Transaction was cancelled before the shipment or service date. */
    const REASON_TRANSACTION_CANCELLED_BEFORE_SHIPMENT_SERVICE_DATE = 'TRANSACTION_CANCELLED_BEFORE_SHIPMENT_SERVICE_DATE';

    /** Transaction similar to recent spending patterns of buyer. */
    const REASON_TRANSACTION_MATCHES_BUYER_SPENDING_PATTERN = 'TRANSACTION_MATCHES_BUYER_SPENDING_PATTERN';

    /** Transaction processed correctly. */
    const REASON_TRANSACTION_PROCESSED_CORRECTLY = 'TRANSACTION_PROCESSED_CORRECTLY';

    /** Payout to the buyer decided based on their profile and policy. */
    const REASON_TRUSTED_BUYER_PAYOUT = 'TRUSTED_BUYER_PAYOUT';

    /** Shipping label provided was unused. */
    const REASON_UNUSED_SHIPPING_LABEL = 'UNUSED_SHIPPING_LABEL';

    /** Seller provided valid proof of delivery. */
    const REASON_VALID_PROOF_OF_DELIVERY = 'VALID_PROOF_OF_DELIVERY';

    /** Seller provided valid proof of delivery with signature confirmation. */
    const REASON_VALID_PROOF_OF_DELIVERY_WITH_SIGNATURE = 'VALID_PROOF_OF_DELIVERY_WITH_SIGNATURE';

    /** Seller provided valid proof of refund. */
    const REASON_VALID_PROOF_OF_REFUND = 'VALID_PROOF_OF_REFUND';

    /** Buyer provided valid documents to support claim. */
    const REASON_VALID_PROOF_SUPPORTING_CLAIM = 'VALID_PROOF_SUPPORTING_CLAIM';

    /** Buyer provided valid proof of return delivery. */
    const REASON_VALID_RETURN_DELIVERY_PROOF = 'VALID_RETURN_DELIVERY_PROOF';

    /** Buyer provided valid proof of return delivery with signature confirmation. */
    const REASON_VALID_RETURN_DELIVERY_PROOF_WITH_SIGNATURE = 'VALID_RETURN_DELIVERY_PROOF_WITH_SIGNATURE';

    /** Seller provided valid proof of shipment. */
    const REASON_VALID_SHIPMENT_PROOF = 'VALID_SHIPMENT_PROOF';

    /** The value of item or usability was affected significantly. */
    const REASON_VALUE_AFFECTED_SIGNIFICANTLY = 'VALUE_AFFECTED_SIGNIFICANTLY';

    /** The case is decided based on Protection Policy. */
    const REASON_PROTECTION_POLICY_APPLIES = 'PROTECTION_POLICY_APPLIES';

    /** A customer and merchant interact in an attempt to resolve a dispute without escalation to PayPal. Occurs when the customer:<ul><li>Has not received goods or a service.</li><li>Reports that the received goods or service are not as described.</li><li>Needs more details, such as a copy of the transaction or a receipt.</li></ul> */
    const DISPUTE_LIFE_CYCLE_STAGE_INQUIRY = 'INQUIRY';

    /** A customer or merchant escalates an inquiry to a claim, which authorizes PayPal to investigate the case and make a determination. Occurs only when the dispute channel is <code>INTERNAL</code>. This stage is a PayPal dispute lifecycle stage and not a credit card or debit card chargeback. All notes that the customer sends in this stage are visible to PayPal agents only. The customer must wait for PayPal’s response before the customer can take further action. In this stage, PayPal shares dispute details with the merchant, who can complete one of these actions:<ul><li>Accept the claim.</li><li>Submit evidence to challenge the claim.</li><li>Make an offer to the customer to resolve the claim.</li></ul> */
    const DISPUTE_LIFE_CYCLE_STAGE_CHARGEBACK = 'CHARGEBACK';

    /** The first appeal stage for merchants. A merchant can appeal a chargeback if PayPal's decision is not in the merchant's favor. If the merchant does not appeal within the appeal period, PayPal considers the case resolved. */
    const DISPUTE_LIFE_CYCLE_STAGE_PRE_ARBITRATION = 'PRE_ARBITRATION';

    /** The second appeal stage for merchants. A merchant can appeal a dispute for a second time if the first appeal was denied. If the merchant does not appeal within the appeal period, the case returns to a resolved status in pre-arbitration stage. */
    const DISPUTE_LIFE_CYCLE_STAGE_ARBITRATION = 'ARBITRATION';

    /**
     * The type of adjudication.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_DENY_BUYER
     * @see TYPE_PAYOUT_TO_BUYER
     * @see TYPE_PAYOUT_TO_SELLER
     * @see TYPE_RECOVER_FROM_SELLER
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string
     * minLength: 20
     * maxLength: 64
     */
    public $adjudication_time;

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
     * The stage in the dispute lifecycle.
     *
     * use one of constants defined in this class to set the value:
     * @see DISPUTE_LIFE_CYCLE_STAGE_INQUIRY
     * @see DISPUTE_LIFE_CYCLE_STAGE_CHARGEBACK
     * @see DISPUTE_LIFE_CYCLE_STAGE_PRE_ARBITRATION
     * @see DISPUTE_LIFE_CYCLE_STAGE_ARBITRATION
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_life_cycle_stage;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->type, "type in ResponseAdjudication must not be NULL $within");
        Assert::minLength(
            $this->type,
            1,
            "type in ResponseAdjudication must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->type,
            255,
            "type in ResponseAdjudication must have maxlength of 255 $within"
        );
        Assert::notNull($this->adjudication_time, "adjudication_time in ResponseAdjudication must not be NULL $within");
        Assert::minLength(
            $this->adjudication_time,
            20,
            "adjudication_time in ResponseAdjudication must have minlength of 20 $within"
        );
        Assert::maxLength(
            $this->adjudication_time,
            64,
            "adjudication_time in ResponseAdjudication must have maxlength of 64 $within"
        );
        !isset($this->reason) || Assert::minLength(
            $this->reason,
            1,
            "reason in ResponseAdjudication must have minlength of 1 $within"
        );
        !isset($this->reason) || Assert::maxLength(
            $this->reason,
            255,
            "reason in ResponseAdjudication must have maxlength of 255 $within"
        );
        !isset($this->dispute_life_cycle_stage) || Assert::minLength(
            $this->dispute_life_cycle_stage,
            1,
            "dispute_life_cycle_stage in ResponseAdjudication must have minlength of 1 $within"
        );
        !isset($this->dispute_life_cycle_stage) || Assert::maxLength(
            $this->dispute_life_cycle_stage,
            255,
            "dispute_life_cycle_stage in ResponseAdjudication must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['adjudication_time'])) {
            $this->adjudication_time = $data['adjudication_time'];
        }
        if (isset($data['reason'])) {
            $this->reason = $data['reason'];
        }
        if (isset($data['dispute_life_cycle_stage'])) {
            $this->dispute_life_cycle_stage = $data['dispute_life_cycle_stage'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
