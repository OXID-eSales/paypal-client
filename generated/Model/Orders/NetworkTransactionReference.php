<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Reference values used by the card network to identify a transaction.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-network_transaction_reference.json
 */
class NetworkTransactionReference implements JsonSerializable
{
    use BaseModel;

    /** Visa card. */
    public const NETWORK_VISA = 'VISA';

    /** Mastecard card. */
    public const NETWORK_MASTERCARD = 'MASTERCARD';

    /** Discover card. */
    public const NETWORK_DISCOVER = 'DISCOVER';

    /** American Express card. */
    public const NETWORK_AMEX = 'AMEX';

    /** Solo debit card. */
    public const NETWORK_SOLO = 'SOLO';

    /** Japan Credit Bureau card. */
    public const NETWORK_JCB = 'JCB';

    /** Military Star card. */
    public const NETWORK_STAR = 'STAR';

    /** Delta Airlines card. */
    public const NETWORK_DELTA = 'DELTA';

    /** Switch credit card. */
    public const NETWORK_SWITCH = 'SWITCH';

    /** Maestro credit card. */
    public const NETWORK_MAESTRO = 'MAESTRO';

    /** Carte Bancaire (CB) credit card. */
    public const NETWORK_CB_NATIONALE = 'CB_NATIONALE';

    /** Configoga credit card. */
    public const NETWORK_CONFIGOGA = 'CONFIGOGA';

    /** Confidis credit card. */
    public const NETWORK_CONFIDIS = 'CONFIDIS';

    /** Visa Electron credit card. */
    public const NETWORK_ELECTRON = 'ELECTRON';

    /** Cetelem credit card. */
    public const NETWORK_CETELEM = 'CETELEM';

    /** China union pay credit card. */
    public const NETWORK_CHINA_UNION_PAY = 'CHINA_UNION_PAY';

    /**
     * Transaction reference id returned by the scheme. For Visa and Amex, this is the "Tran id" field in response.
     * For MasterCard, this is the "BankNet reference id" field in response. For Discover, this is the "NRID" field
     * in response.
     *
     * @var string
     * minLength: 9
     * maxLength: 15
     */
    public $id;

    /**
     * The date that the transaction was authorized by the scheme. For MasterCard, this is the "BankNet reference
     * date" field in response.
     *
     * @var string | null
     * minLength: 4
     * maxLength: 4
     */
    public $date;

    /**
     * The card network or brand. Applies to credit, debit, gift, and payment cards.
     *
     * use one of constants defined in this class to set the value:
     * @see NETWORK_VISA
     * @see NETWORK_MASTERCARD
     * @see NETWORK_DISCOVER
     * @see NETWORK_AMEX
     * @see NETWORK_SOLO
     * @see NETWORK_JCB
     * @see NETWORK_STAR
     * @see NETWORK_DELTA
     * @see NETWORK_SWITCH
     * @see NETWORK_MAESTRO
     * @see NETWORK_CB_NATIONALE
     * @see NETWORK_CONFIGOGA
     * @see NETWORK_CONFIDIS
     * @see NETWORK_ELECTRON
     * @see NETWORK_CETELEM
     * @see NETWORK_CHINA_UNION_PAY
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $network;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->id, "id in NetworkTransactionReference must not be NULL $within");
        Assert::minLength(
            $this->id,
            9,
            "id in NetworkTransactionReference must have minlength of 9 $within"
        );
        Assert::maxLength(
            $this->id,
            15,
            "id in NetworkTransactionReference must have maxlength of 15 $within"
        );
        !isset($this->date) || Assert::minLength(
            $this->date,
            4,
            "date in NetworkTransactionReference must have minlength of 4 $within"
        );
        !isset($this->date) || Assert::maxLength(
            $this->date,
            4,
            "date in NetworkTransactionReference must have maxlength of 4 $within"
        );
        Assert::notNull($this->network, "network in NetworkTransactionReference must not be NULL $within");
        Assert::minLength(
            $this->network,
            1,
            "network in NetworkTransactionReference must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->network,
            255,
            "network in NetworkTransactionReference must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['date'])) {
            $this->date = $data['date'];
        }
        if (isset($data['network'])) {
            $this->network = $data['network'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
