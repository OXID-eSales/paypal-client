<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * ODFI acts as the interface between the Federal Reserve or ACH network and the originator of the transaction.
 *
 * generated from: model-odfi_details.json
 */
class OdfiDetails implements JsonSerializable
{
    use BaseModel;

    /** Account Receivable Check. Converted checks received via the US mail or at a drop box location for the payment of goods or services. */
    const STANDARD_ENTRY_CLASS_CODE_ARC = 'ARC';

    /** Back Office Conversion. Converted checks received by merchant at the point of purchase or at manned bill payment locations, and processed during back office operations. */
    const STANDARD_ENTRY_CLASS_CODE_BOC = 'BOC';

    /** Corporate Credit or Debit. Transfer of funds where they are either distributed or consolidated between corporate entities. */
    const STANDARD_ENTRY_CLASS_CODE_CCD = 'CCD';

    /** Corporate Trade Exchange. Application that supports the transfer of funds within a trading partner relationship. */
    const STANDARD_ENTRY_CLASS_CODE_CTX = 'CTX';

    /** International ACH Transaction. Transaction involving a financial agency's office that is not located in the territorial jurisdiction of the United States. */
    const STANDARD_ENTRY_CLASS_CODE_IAT = 'IAT';

    /** Point of Purchase Entry. Entry initiated by the consumer via a debit card for payment of goods or services. */
    const STANDARD_ENTRY_CLASS_CODE_POP = 'POP';

    /** Prearranged Payment and Deposit Entry. Entry initiated by an organization based on a standing or single entry authorization from a receiver to transfer funds to or from a consumer account of the receiver. */
    const STANDARD_ENTRY_CLASS_CODE_PPD = 'PPD';

    /** Represented Check Entry. Application used by originators to re-present a check that has been processed through the check collection system and returned because of insufficient or uncollected funds. */
    const STANDARD_ENTRY_CLASS_CODE_RCK = 'RCK';

    /** Telephone Authorized Entry. Debit transaction to a consumer's account pursuant to an oral authorization obtained from the consumer via the telephone. */
    const STANDARD_ENTRY_CLASS_CODE_TEL = 'TEL';

    /** Internet Authorized Entry. Entry used for the origination of debit entries to a consumer's account pursuant to an authorization that is obtained from the Receiver via the internet. */
    const STANDARD_ENTRY_CLASS_CODE_WEB = 'WEB';

    /**
     * The Standard Entry Class (SEC) code is a three-character code included in the company/batch header record to
     * identify the type of ACH transactions contained in that batch.
     *
     * use one of constants defined in this class to set the value:
     * @see STANDARD_ENTRY_CLASS_CODE_ARC
     * @see STANDARD_ENTRY_CLASS_CODE_BOC
     * @see STANDARD_ENTRY_CLASS_CODE_CCD
     * @see STANDARD_ENTRY_CLASS_CODE_CTX
     * @see STANDARD_ENTRY_CLASS_CODE_IAT
     * @see STANDARD_ENTRY_CLASS_CODE_POP
     * @see STANDARD_ENTRY_CLASS_CODE_PPD
     * @see STANDARD_ENTRY_CLASS_CODE_RCK
     * @see STANDARD_ENTRY_CLASS_CODE_TEL
     * @see STANDARD_ENTRY_CLASS_CODE_WEB
     * @var string | null
     * minLength: 1
     * maxLength: 3
     */
    public $standard_entry_class_code;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->standard_entry_class_code) || Assert::minLength(
            $this->standard_entry_class_code,
            1,
            "standard_entry_class_code in OdfiDetails must have minlength of 1 $within"
        );
        !isset($this->standard_entry_class_code) || Assert::maxLength(
            $this->standard_entry_class_code,
            3,
            "standard_entry_class_code in OdfiDetails must have maxlength of 3 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['standard_entry_class_code'])) {
            $this->standard_entry_class_code = $data['standard_entry_class_code'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
