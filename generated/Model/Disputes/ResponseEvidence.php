<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A merchant- or customer-submitted evidence document. evidence_info is expected for
 * PROOF_OF_FULFILLMENT,PROOF_OF_REFUND and PROOF_OF_RETURN evidence types. documents and notes can be given for
 * rest of the evidence types.
 *
 * generated from: response-evidence.json
 */
class ResponseEvidence implements JsonSerializable
{
    use BaseModel;

    /** Proof of fulfillment should be a copy of the actual shipping label on the package that shows the destination address and the shipping company's stamp to verify the shipment date. */
    public const EVIDENCE_TYPE_PROOF_OF_FULFILLMENT = 'PROOF_OF_FULFILLMENT';

    /** Proof of refund issued to the buyer */
    public const EVIDENCE_TYPE_PROOF_OF_REFUND = 'PROOF_OF_REFUND';

    /** Proof of delivery signature. */
    public const EVIDENCE_TYPE_PROOF_OF_DELIVERY_SIGNATURE = 'PROOF_OF_DELIVERY_SIGNATURE';

    /** Copy of original receipt or invoice. */
    public const EVIDENCE_TYPE_PROOF_OF_RECEIPT_COPY = 'PROOF_OF_RECEIPT_COPY';

    /** Copy of terms and conditions,contract or store return policy */
    public const EVIDENCE_TYPE_RETURN_POLICY = 'RETURN_POLICY';

    /** Copy of billing agreement. */
    public const EVIDENCE_TYPE_BILLING_AGREEMENT = 'BILLING_AGREEMENT';

    /** Proof of reshipment should be a copy of the actual shipping label on the package that shows the destination address and the shipping company's stamp to verify the reshipment date. */
    public const EVIDENCE_TYPE_PROOF_OF_RESHIPMENT = 'PROOF_OF_RESHIPMENT';

    /** A copy of the original description of the item or service */
    public const EVIDENCE_TYPE_ITEM_DESCRIPTION = 'ITEM_DESCRIPTION';

    /** Copy of the police report filed. */
    public const EVIDENCE_TYPE_POLICE_REPORT = 'POLICE_REPORT';

    /** More information has to be provided about the claim using the affidavit. */
    public const EVIDENCE_TYPE_AFFIDAVIT = 'AFFIDAVIT';

    /** Document showing item/service was paid by another payment method. */
    public const EVIDENCE_TYPE_PAID_WITH_OTHER_METHOD = 'PAID_WITH_OTHER_METHOD';

    /** Copy of contract if applicable. */
    public const EVIDENCE_TYPE_COPY_OF_CONTRACT = 'COPY_OF_CONTRACT';

    /** Copy of terminal/ATM receipt. */
    public const EVIDENCE_TYPE_TERMINAL_ATM_RECEIPT = 'TERMINAL_ATM_RECEIPT';

    /** Explanation of what the price difference is related to (increased tip amount, shipping charges, taxes, etc). */
    public const EVIDENCE_TYPE_PRICE_DIFFERENCE_REASON = 'PRICE_DIFFERENCE_REASON';

    /** Source of expected conversion rate or fee. */
    public const EVIDENCE_TYPE_SOURCE_CONVERSION_RATE = 'SOURCE_CONVERSION_RATE';

    /** Bank/Credit statement showing withdrawal transaction. */
    public const EVIDENCE_TYPE_BANK_STATEMENT = 'BANK_STATEMENT';

    /** The credit due reason. */
    public const EVIDENCE_TYPE_CREDIT_DUE_REASON = 'CREDIT_DUE_REASON';

    /** The request credit receipt. */
    public const EVIDENCE_TYPE_REQUEST_CREDIT_RECEIPT = 'REQUEST_CREDIT_RECEIPT';

    /** Proof of shipment or postage that shows you returned this item to your seller and should be a copy of the actual shipping label used. */
    public const EVIDENCE_TYPE_PROOF_OF_RETURN = 'PROOF_OF_RETURN';

    /** Additional evidence information during case creation. */
    public const EVIDENCE_TYPE_CREATE = 'CREATE';

    /** The evidence related to the reason change. */
    public const EVIDENCE_TYPE_CHANGE_REASON = 'CHANGE_REASON';

    /** Document should show that the seller issued a refund outside Paypal. */
    public const EVIDENCE_TYPE_PROOF_OF_REFUND_OUTSIDE_PAYPAL = 'PROOF_OF_REFUND_OUTSIDE_PAYPAL';

    /** Check with buyer if item Delivered (seller provided Proof of Shipping) */
    public const EVIDENCE_TYPE_RECEIPT_OF_MERCHANDISE = 'RECEIPT_OF_MERCHANDISE';

    /** Document confirming that the item has been confiscated. */
    public const EVIDENCE_TYPE_CUSTOMS_DOCUMENT = 'CUSTOMS_DOCUMENT';

    /** Custom fees receipt paid by the buyer */
    public const EVIDENCE_TYPE_CUSTOMS_FEE_RECEIPT = 'CUSTOMS_FEE_RECEIPT';

    /** Any resolution reached with the seller should be communicated to PayPal. */
    public const EVIDENCE_TYPE_INFORMATION_ON_RESOLUTION = 'INFORMATION_ON_RESOLUTION';

    /** Any additional information of the item purchased. */
    public const EVIDENCE_TYPE_ADDITIONAL_INFORMATION_OF_ITEM = 'ADDITIONAL_INFORMATION_OF_ITEM';

    /** Specific details of a purchase made under a particular transaction has to be given. */
    public const EVIDENCE_TYPE_DETAILS_OF_PURCHASE = 'DETAILS_OF_PURCHASE';

    /** More information required on how the item was damaged or was significantly different from the item advertised. */
    public const EVIDENCE_TYPE_PROOF_OF_SIGNIFICANT_DIFFERENCE = 'PROOF_OF_SIGNIFICANT_DIFFERENCE';

    /** Any screenshot or download/usage log showing that the software or service was unavailable or non-functional. */
    public const EVIDENCE_TYPE_PROOF_OF_SOFTWARE_OR_SERVICE_NOT_AS_DESCRIBED = 'PROOF_OF_SOFTWARE_OR_SERVICE_NOT_AS_DESCRIBED';

    /** Documentation from a third party or organization that evaluated this item that confirms they confiscated it. */
    public const EVIDENCE_TYPE_PROOF_OF_CONFISCATION = 'PROOF_OF_CONFISCATION';

    /** Documentation supporting the claim that the item is damaged. */
    public const EVIDENCE_TYPE_PROOF_OF_DAMAGE = 'PROOF_OF_DAMAGE';

    /** Report filed with a law enforcement agency or government organization. Examples of such agencies are -  Internet Crime Complaint Center (www.ic3.gov), state Consumer Protection office, state police or a Federal law enforcement agency such as the FBI or Postal Inspection Service. */
    public const EVIDENCE_TYPE_COPY_OF_LAW_ENFORCEMENT_AGENCY_REPORT = 'COPY_OF_LAW_ENFORCEMENT_AGENCY_REPORT';

    /** Additional proof of shipment  such as a packing list, detailed invoice, or shipping manifest to confirm that all items have been shipped. */
    public const EVIDENCE_TYPE_ADDITIONAL_PROOF_OF_SHIPMENT = 'ADDITIONAL_PROOF_OF_SHIPMENT';

    /** Documentation from the carrier should confirm the reason why they refuse to ship the item in question and the extent of the original damage. */
    public const EVIDENCE_TYPE_PROOF_OF_DENIAL_BY_CARRIER = 'PROOF_OF_DENIAL_BY_CARRIER';

    /** Proof should be provided by an unbiased third-party, such as a dealer, appraiser or another individual or organisation that's qualified in the area of the item in question (other than yourself), and detail the extent of the damage or clearly explain how the item received significantly differs from the item advertised. */
    public const EVIDENCE_TYPE_THIRDPARTY_PROOF_FOR_DAMAGE_OR_SIGNIFICANT_DIFFERENCE = 'THIRDPARTY_PROOF_FOR_DAMAGE_OR_SIGNIFICANT_DIFFERENCE';

    /** The document you have provided doesn't support your claim that the item is Significantly Not as Described. Please provide a document to clearly show how the item received significantly differs from the item advertised. */
    public const EVIDENCE_TYPE_VALID_SUPPORTING_DOCUMENT = 'VALID_SUPPORTING_DOCUMENT';

    /** The document you have provided is illegible, unclear, or too dark to read.  Please provide a document that is legible and clear to read. */
    public const EVIDENCE_TYPE_LEGIBLE_SUPPORTING_DOCUMENT = 'LEGIBLE_SUPPORTING_DOCUMENT';

    /** Online tracking information for remaining items that have to be shipped to the seller. */
    public const EVIDENCE_TYPE_RETURN_TRACKING_INFORMATION = 'RETURN_TRACKING_INFORMATION';

    /** Confirmation that the item has been received. */
    public const EVIDENCE_TYPE_DELIVERY_RECEIPT = 'DELIVERY_RECEIPT';

    /** In-store receipt or online verification should clearly show that the buyer picked up the item. */
    public const EVIDENCE_TYPE_PROOF_OF_INSTORE_RECEIPT = 'PROOF_OF_INSTORE_RECEIPT';

    /** Tracking information should include the carrier name,  online tracking number and the website where the shipment can be tracked. */
    public const EVIDENCE_TYPE_ADDITIONAL_TRACKING_INFORMATION = 'ADDITIONAL_TRACKING_INFORMATION';

    /** Proof of shipment or postage should be a copy of the actual shipping label on the package that shows the destination address and the carrier's stamp to verify the shipment date. */
    public const EVIDENCE_TYPE_PROOF_OF_SHIPMENT_POSTAGE = 'PROOF_OF_SHIPMENT_POSTAGE';

    /** Online tracking information to confirm delivery of item. */
    public const EVIDENCE_TYPE_ONLINE_TRACKING_INFORMATION = 'ONLINE_TRACKING_INFORMATION';

    /** Proof should be an in-store refund receipt or company documentation that clearly shows a completed refund for the transaction. */
    public const EVIDENCE_TYPE_PROOF_OF_INSTORE_REFUND = 'PROOF_OF_INSTORE_REFUND';

    /** Proof should be compelling evidence to prove that the item or service was as described  and was delivered to the buyer. */
    public const EVIDENCE_TYPE_PROOF_FOR_SOFTWARE_OR_SERVICE_DELIVERED = 'PROOF_FOR_SOFTWARE_OR_SERVICE_DELIVERED';

    /** Return address is required for the buyer to ship  the merchandise back to the seller. */
    public const EVIDENCE_TYPE_RETURN_ADDRESS_FOR_SHIPPING = 'RETURN_ADDRESS_FOR_SHIPPING';

    /** To validate a claim,  a copy of the eparcel manifest showing the buyer's address from Australia Post is required. */
    public const EVIDENCE_TYPE_COPY_OF_THE_EPARCEL_MANIFEST = 'COPY_OF_THE_EPARCEL_MANIFEST';

    /** The shipping manifest must show the buyer's address and can be obtained from the carrier. */
    public const EVIDENCE_TYPE_COPY_OF_SHIPPING_MANIFEST = 'COPY_OF_SHIPPING_MANIFEST';

    /** Appeal affidavit is needed to make an appeal for any case outcome. */
    public const EVIDENCE_TYPE_APPEAL_AFFIDAVIT = 'APPEAL_AFFIDAVIT';

    /** Check with buyer if the replacement of the item sent by the seller was received */
    public const EVIDENCE_TYPE_RECEIPT_OF_REPLACEMENT = 'RECEIPT_OF_REPLACEMENT';

    /** Need Copy of Drivers license. */
    public const EVIDENCE_TYPE_COPY_OF_DRIVERS_LICENSE = 'COPY_OF_DRIVERS_LICENSE';

    /** Additional Details about how account was accessed/what was changed. */
    public const EVIDENCE_TYPE_ACCOUNT_CHANGE_INFORMATION = 'ACCOUNT_CHANGE_INFORMATION';

    /** Address where item was supposed to be delivered. */
    public const EVIDENCE_TYPE_DELIVERY_ADDRESS = 'DELIVERY_ADDRESS';

    /** Confirmation that item was received and issue resolved. */
    public const EVIDENCE_TYPE_CONFIRMATION_OF_RESOLUTION = 'CONFIRMATION_OF_RESOLUTION';

    /** Copy of merchant's response when the resolution was attempted. */
    public const EVIDENCE_TYPE_MERCHANT_RESPONSE = 'MERCHANT_RESPONSE';

    /** A Detailed description about the account or card level permission given to another person. */
    public const EVIDENCE_TYPE_PERMISSION_DESCRIPTION = 'PERMISSION_DESCRIPTION';

    /** Details of the merchandise's current location. */
    public const EVIDENCE_TYPE_STATUS_OF_MERCHANDISE = 'STATUS_OF_MERCHANDISE';

    /** Details of where and when the card was lost/stolen?. */
    public const EVIDENCE_TYPE_LOST_CARD_DETAILS = 'LOST_CARD_DETAILS';

    /** Details of the last valid transaction made on the card. */
    public const EVIDENCE_TYPE_LAST_VALID_TRANSACTION_DETAILS = 'LAST_VALID_TRANSACTION_DETAILS';

    /** Document to confirm that the item to be returned to the seller has been shipped. */
    public const EVIDENCE_TYPE_ADDITIONAL_PROOF_OF_RETURN = 'ADDITIONAL_PROOF_OF_RETURN';

    /** Signed declaration about the information provided. */
    public const EVIDENCE_TYPE_DECLARATION = 'DECLARATION';

    /** Image of open box with returned items and shipping label clearly visible. */
    public const EVIDENCE_TYPE_PROOF_OF_MISSING_ITEMS = 'PROOF_OF_MISSING_ITEMS';

    /** Image of empty box or returned items that are different from what were expected and shipping label clearly visible. */
    public const EVIDENCE_TYPE_PROOF_OF_EMPTY_PACKAGE_OR_DIFFERENT_ITEM = 'PROOF_OF_EMPTY_PACKAGE_OR_DIFFERENT_ITEM';

    /** Any proof about the non receipt of the item, such as screenshot of tracking info. */
    public const EVIDENCE_TYPE_PROOF_OF_ITEM_NOT_RECEIVED = 'PROOF_OF_ITEM_NOT_RECEIVED';

    /** Other. */
    public const EVIDENCE_TYPE_OTHER = 'OTHER';

    /** PayPal requested evidence from the customer. */
    public const SOURCE_REQUESTED_FROM_BUYER = 'REQUESTED_FROM_BUYER';

    /** PayPal requested evidence from the merchant. */
    public const SOURCE_REQUESTED_FROM_SELLER = 'REQUESTED_FROM_SELLER';

    /** Evidence was submitted by the customer. */
    public const SOURCE_SUBMITTED_BY_BUYER = 'SUBMITTED_BY_BUYER';

    /** Evidence was submitted by the merchant. */
    public const SOURCE_SUBMITTED_BY_SELLER = 'SUBMITTED_BY_SELLER';

    /** Evidence was submitted by the partner. */
    public const SOURCE_SUBMITTED_BY_PARTNER = 'SUBMITTED_BY_PARTNER';

    /** The product has an issue. */
    public const ITEM_TYPE_PRODUCT = 'PRODUCT';

    /** The service has an issue. */
    public const ITEM_TYPE_SERVICE = 'SERVICE';

    /** The booking has an issue. */
    public const ITEM_TYPE_BOOKING = 'BOOKING';

    /** The digital download has an issue. */
    public const ITEM_TYPE_DIGITAL_DOWNLOAD = 'DIGITAL_DOWNLOAD';

    /** A customer and merchant interact in an attempt to resolve a dispute without escalation to PayPal. Occurs when the customer:<ul><li>Has not received goods or a service.</li><li>Reports that the received goods or service are not as described.</li><li>Needs more details, such as a copy of the transaction or a receipt.</li></ul> */
    public const DISPUTE_LIFE_CYCLE_STAGE_INQUIRY = 'INQUIRY';

    /** A customer or merchant escalates an inquiry to a claim, which authorizes PayPal to investigate the case and make a determination. Occurs only when the dispute channel is <code>INTERNAL</code>. This stage is a PayPal dispute lifecycle stage and not a credit card or debit card chargeback. All notes that the customer sends in this stage are visible to PayPal agents only. The customer must wait for PayPal’s response before the customer can take further action. In this stage, PayPal shares dispute details with the merchant, who can complete one of these actions:<ul><li>Accept the claim.</li><li>Submit evidence to challenge the claim.</li><li>Make an offer to the customer to resolve the claim.</li></ul> */
    public const DISPUTE_LIFE_CYCLE_STAGE_CHARGEBACK = 'CHARGEBACK';

    /** The first appeal stage for merchants. A merchant can appeal a chargeback if PayPal's decision is not in the merchant's favor. If the merchant does not appeal within the appeal period, PayPal considers the case resolved. */
    public const DISPUTE_LIFE_CYCLE_STAGE_PRE_ARBITRATION = 'PRE_ARBITRATION';

    /** The second appeal stage for merchants. A merchant can appeal a dispute for a second time if the first appeal was denied. If the merchant does not appeal within the appeal period, the case returns to a resolved status in pre-arbitration stage. */
    public const DISPUTE_LIFE_CYCLE_STAGE_ARBITRATION = 'ARBITRATION';

    /**
     * The evidence type.
     *
     * use one of constants defined in this class to set the value:
     * @see EVIDENCE_TYPE_PROOF_OF_FULFILLMENT
     * @see EVIDENCE_TYPE_PROOF_OF_REFUND
     * @see EVIDENCE_TYPE_PROOF_OF_DELIVERY_SIGNATURE
     * @see EVIDENCE_TYPE_PROOF_OF_RECEIPT_COPY
     * @see EVIDENCE_TYPE_RETURN_POLICY
     * @see EVIDENCE_TYPE_BILLING_AGREEMENT
     * @see EVIDENCE_TYPE_PROOF_OF_RESHIPMENT
     * @see EVIDENCE_TYPE_ITEM_DESCRIPTION
     * @see EVIDENCE_TYPE_POLICE_REPORT
     * @see EVIDENCE_TYPE_AFFIDAVIT
     * @see EVIDENCE_TYPE_PAID_WITH_OTHER_METHOD
     * @see EVIDENCE_TYPE_COPY_OF_CONTRACT
     * @see EVIDENCE_TYPE_TERMINAL_ATM_RECEIPT
     * @see EVIDENCE_TYPE_PRICE_DIFFERENCE_REASON
     * @see EVIDENCE_TYPE_SOURCE_CONVERSION_RATE
     * @see EVIDENCE_TYPE_BANK_STATEMENT
     * @see EVIDENCE_TYPE_CREDIT_DUE_REASON
     * @see EVIDENCE_TYPE_REQUEST_CREDIT_RECEIPT
     * @see EVIDENCE_TYPE_PROOF_OF_RETURN
     * @see EVIDENCE_TYPE_CREATE
     * @see EVIDENCE_TYPE_CHANGE_REASON
     * @see EVIDENCE_TYPE_PROOF_OF_REFUND_OUTSIDE_PAYPAL
     * @see EVIDENCE_TYPE_RECEIPT_OF_MERCHANDISE
     * @see EVIDENCE_TYPE_CUSTOMS_DOCUMENT
     * @see EVIDENCE_TYPE_CUSTOMS_FEE_RECEIPT
     * @see EVIDENCE_TYPE_INFORMATION_ON_RESOLUTION
     * @see EVIDENCE_TYPE_ADDITIONAL_INFORMATION_OF_ITEM
     * @see EVIDENCE_TYPE_DETAILS_OF_PURCHASE
     * @see EVIDENCE_TYPE_PROOF_OF_SIGNIFICANT_DIFFERENCE
     * @see EVIDENCE_TYPE_PROOF_OF_SOFTWARE_OR_SERVICE_NOT_AS_DESCRIBED
     * @see EVIDENCE_TYPE_PROOF_OF_CONFISCATION
     * @see EVIDENCE_TYPE_PROOF_OF_DAMAGE
     * @see EVIDENCE_TYPE_COPY_OF_LAW_ENFORCEMENT_AGENCY_REPORT
     * @see EVIDENCE_TYPE_ADDITIONAL_PROOF_OF_SHIPMENT
     * @see EVIDENCE_TYPE_PROOF_OF_DENIAL_BY_CARRIER
     * @see EVIDENCE_TYPE_THIRDPARTY_PROOF_FOR_DAMAGE_OR_SIGNIFICANT_DIFFERENCE
     * @see EVIDENCE_TYPE_VALID_SUPPORTING_DOCUMENT
     * @see EVIDENCE_TYPE_LEGIBLE_SUPPORTING_DOCUMENT
     * @see EVIDENCE_TYPE_RETURN_TRACKING_INFORMATION
     * @see EVIDENCE_TYPE_DELIVERY_RECEIPT
     * @see EVIDENCE_TYPE_PROOF_OF_INSTORE_RECEIPT
     * @see EVIDENCE_TYPE_ADDITIONAL_TRACKING_INFORMATION
     * @see EVIDENCE_TYPE_PROOF_OF_SHIPMENT_POSTAGE
     * @see EVIDENCE_TYPE_ONLINE_TRACKING_INFORMATION
     * @see EVIDENCE_TYPE_PROOF_OF_INSTORE_REFUND
     * @see EVIDENCE_TYPE_PROOF_FOR_SOFTWARE_OR_SERVICE_DELIVERED
     * @see EVIDENCE_TYPE_RETURN_ADDRESS_FOR_SHIPPING
     * @see EVIDENCE_TYPE_COPY_OF_THE_EPARCEL_MANIFEST
     * @see EVIDENCE_TYPE_COPY_OF_SHIPPING_MANIFEST
     * @see EVIDENCE_TYPE_APPEAL_AFFIDAVIT
     * @see EVIDENCE_TYPE_RECEIPT_OF_REPLACEMENT
     * @see EVIDENCE_TYPE_COPY_OF_DRIVERS_LICENSE
     * @see EVIDENCE_TYPE_ACCOUNT_CHANGE_INFORMATION
     * @see EVIDENCE_TYPE_DELIVERY_ADDRESS
     * @see EVIDENCE_TYPE_CONFIRMATION_OF_RESOLUTION
     * @see EVIDENCE_TYPE_MERCHANT_RESPONSE
     * @see EVIDENCE_TYPE_PERMISSION_DESCRIPTION
     * @see EVIDENCE_TYPE_STATUS_OF_MERCHANDISE
     * @see EVIDENCE_TYPE_LOST_CARD_DETAILS
     * @see EVIDENCE_TYPE_LAST_VALID_TRANSACTION_DETAILS
     * @see EVIDENCE_TYPE_ADDITIONAL_PROOF_OF_RETURN
     * @see EVIDENCE_TYPE_DECLARATION
     * @see EVIDENCE_TYPE_PROOF_OF_MISSING_ITEMS
     * @see EVIDENCE_TYPE_PROOF_OF_EMPTY_PACKAGE_OR_DIFFERENT_ITEM
     * @see EVIDENCE_TYPE_PROOF_OF_ITEM_NOT_RECEIVED
     * @see EVIDENCE_TYPE_OTHER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $evidence_type;

    /**
     * The evidence-related information.
     *
     * @var ResponseEvidenceInfo | null
     */
    public $evidence_info;

    /**
     * An array of evidence documents.
     *
     * @var ResponseDocument[]
     * maxItems: 1
     * maxItems: 100
     */
    public $documents;

    /**
     * Any evidence-related notes.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $notes;

    /**
     * The source of the evidence.
     *
     * use one of constants defined in this class to set the value:
     * @see SOURCE_REQUESTED_FROM_BUYER
     * @see SOURCE_REQUESTED_FROM_SELLER
     * @see SOURCE_SUBMITTED_BY_BUYER
     * @see SOURCE_SUBMITTED_BY_SELLER
     * @see SOURCE_SUBMITTED_BY_PARTNER
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $source;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $date;

    /**
     * The item ID. If the merchant provides multiple pieces of evidence and the transaction has multiple item IDs,
     * the merchant can use this value to associate a piece of evidence with an item ID.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $item_id;

    /**
     * The type of the item which has the issue.
     *
     * use one of constants defined in this class to set the value:
     * @see ITEM_TYPE_PRODUCT
     * @see ITEM_TYPE_SERVICE
     * @see ITEM_TYPE_BOOKING
     * @see ITEM_TYPE_DIGITAL_DOWNLOAD
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $item_type;

    /**
     * The extended properties for a evidence. Includes additional information such as the action for which the
     * evidence was requested/submitted, and whether the evidence is mandatory.
     *
     * @var ResponseActionInfo | null
     */
    public $action_info;

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
        !isset($this->evidence_type) || Assert::minLength(
            $this->evidence_type,
            1,
            "evidence_type in ResponseEvidence must have minlength of 1 $within"
        );
        !isset($this->evidence_type) || Assert::maxLength(
            $this->evidence_type,
            255,
            "evidence_type in ResponseEvidence must have maxlength of 255 $within"
        );
        !isset($this->evidence_info) || Assert::isInstanceOf(
            $this->evidence_info,
            ResponseEvidenceInfo::class,
            "evidence_info in ResponseEvidence must be instance of ResponseEvidenceInfo $within"
        );
        !isset($this->evidence_info) ||  $this->evidence_info->validate(ResponseEvidence::class);
        Assert::notNull($this->documents, "documents in ResponseEvidence must not be NULL $within");
        Assert::minCount(
            $this->documents,
            1,
            "documents in ResponseEvidence must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->documents,
            100,
            "documents in ResponseEvidence must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->documents,
            "documents in ResponseEvidence must be array $within"
        );
        if (isset($this->documents)) {
            foreach ($this->documents as $item) {
                $item->validate(ResponseEvidence::class);
            }
        }
        !isset($this->notes) || Assert::minLength(
            $this->notes,
            1,
            "notes in ResponseEvidence must have minlength of 1 $within"
        );
        !isset($this->notes) || Assert::maxLength(
            $this->notes,
            2000,
            "notes in ResponseEvidence must have maxlength of 2000 $within"
        );
        !isset($this->source) || Assert::minLength(
            $this->source,
            1,
            "source in ResponseEvidence must have minlength of 1 $within"
        );
        !isset($this->source) || Assert::maxLength(
            $this->source,
            255,
            "source in ResponseEvidence must have maxlength of 255 $within"
        );
        !isset($this->date) || Assert::minLength(
            $this->date,
            20,
            "date in ResponseEvidence must have minlength of 20 $within"
        );
        !isset($this->date) || Assert::maxLength(
            $this->date,
            64,
            "date in ResponseEvidence must have maxlength of 64 $within"
        );
        !isset($this->item_id) || Assert::minLength(
            $this->item_id,
            1,
            "item_id in ResponseEvidence must have minlength of 1 $within"
        );
        !isset($this->item_id) || Assert::maxLength(
            $this->item_id,
            255,
            "item_id in ResponseEvidence must have maxlength of 255 $within"
        );
        !isset($this->item_type) || Assert::minLength(
            $this->item_type,
            1,
            "item_type in ResponseEvidence must have minlength of 1 $within"
        );
        !isset($this->item_type) || Assert::maxLength(
            $this->item_type,
            255,
            "item_type in ResponseEvidence must have maxlength of 255 $within"
        );
        !isset($this->action_info) || Assert::isInstanceOf(
            $this->action_info,
            ResponseActionInfo::class,
            "action_info in ResponseEvidence must be instance of ResponseActionInfo $within"
        );
        !isset($this->action_info) ||  $this->action_info->validate(ResponseEvidence::class);
        !isset($this->dispute_life_cycle_stage) || Assert::minLength(
            $this->dispute_life_cycle_stage,
            1,
            "dispute_life_cycle_stage in ResponseEvidence must have minlength of 1 $within"
        );
        !isset($this->dispute_life_cycle_stage) || Assert::maxLength(
            $this->dispute_life_cycle_stage,
            255,
            "dispute_life_cycle_stage in ResponseEvidence must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['evidence_type'])) {
            $this->evidence_type = $data['evidence_type'];
        }
        if (isset($data['evidence_info'])) {
            $this->evidence_info = new ResponseEvidenceInfo($data['evidence_info']);
        }
        if (isset($data['documents'])) {
            $this->documents = [];
            foreach ($data['documents'] as $item) {
                $this->documents[] = new ResponseDocument($item);
            }
        }
        if (isset($data['notes'])) {
            $this->notes = $data['notes'];
        }
        if (isset($data['source'])) {
            $this->source = $data['source'];
        }
        if (isset($data['date'])) {
            $this->date = $data['date'];
        }
        if (isset($data['item_id'])) {
            $this->item_id = $data['item_id'];
        }
        if (isset($data['item_type'])) {
            $this->item_type = $data['item_type'];
        }
        if (isset($data['action_info'])) {
            $this->action_info = new ResponseActionInfo($data['action_info']);
        }
        if (isset($data['dispute_life_cycle_stage'])) {
            $this->dispute_life_cycle_stage = $data['dispute_life_cycle_stage'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->documents = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initEvidenceInfo(): ResponseEvidenceInfo
    {
        return $this->evidence_info = new ResponseEvidenceInfo();
    }

    public function initActionInfo(): ResponseActionInfo
    {
        return $this->action_info = new ResponseActionInfo();
    }
}
