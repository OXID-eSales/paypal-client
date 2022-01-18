<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The transaction details.
 *
 * generated from: transaction_detail.json
 */
class TransactionDetail implements JsonSerializable
{
    use BaseModel;

    /**
     * The transaction information.
     *
     * @var TransactionInfo | null
     */
    public $transaction_info;

    /**
     * The payer information.
     *
     * @var PayerInfo | null
     */
    public $payer_info;

    /**
     * The shipping information.
     *
     * @var ShippingInfo | null
     */
    public $shipping_info;

    /**
     * The cart information.
     *
     * @var CartInfo | null
     */
    public $cart_info;

    /**
     * The store information.
     *
     * @var StoreInfo | null
     */
    public $store_info;

    /**
     * The auction information.
     *
     * @var AuctionInfo | null
     */
    public $auction_info;

    /**
     * The incentive details.
     *
     * @var IncentiveInfo | null
     */
    public $incentive_info;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->transaction_info) || Assert::isInstanceOf(
            $this->transaction_info,
            TransactionInfo::class,
            "transaction_info in TransactionDetail must be instance of TransactionInfo $within"
        );
        !isset($this->transaction_info) ||  $this->transaction_info->validate(TransactionDetail::class);
        !isset($this->payer_info) || Assert::isInstanceOf(
            $this->payer_info,
            PayerInfo::class,
            "payer_info in TransactionDetail must be instance of PayerInfo $within"
        );
        !isset($this->payer_info) ||  $this->payer_info->validate(TransactionDetail::class);
        !isset($this->shipping_info) || Assert::isInstanceOf(
            $this->shipping_info,
            ShippingInfo::class,
            "shipping_info in TransactionDetail must be instance of ShippingInfo $within"
        );
        !isset($this->shipping_info) ||  $this->shipping_info->validate(TransactionDetail::class);
        !isset($this->cart_info) || Assert::isInstanceOf(
            $this->cart_info,
            CartInfo::class,
            "cart_info in TransactionDetail must be instance of CartInfo $within"
        );
        !isset($this->cart_info) ||  $this->cart_info->validate(TransactionDetail::class);
        !isset($this->store_info) || Assert::isInstanceOf(
            $this->store_info,
            StoreInfo::class,
            "store_info in TransactionDetail must be instance of StoreInfo $within"
        );
        !isset($this->store_info) ||  $this->store_info->validate(TransactionDetail::class);
        !isset($this->auction_info) || Assert::isInstanceOf(
            $this->auction_info,
            AuctionInfo::class,
            "auction_info in TransactionDetail must be instance of AuctionInfo $within"
        );
        !isset($this->auction_info) ||  $this->auction_info->validate(TransactionDetail::class);
        !isset($this->incentive_info) || Assert::isInstanceOf(
            $this->incentive_info,
            IncentiveInfo::class,
            "incentive_info in TransactionDetail must be instance of IncentiveInfo $within"
        );
        !isset($this->incentive_info) ||  $this->incentive_info->validate(TransactionDetail::class);
    }

    private function map(array $data)
    {
        if (isset($data['transaction_info'])) {
            $this->transaction_info = new TransactionInfo($data['transaction_info']);
        }
        if (isset($data['payer_info'])) {
            $this->payer_info = new PayerInfo($data['payer_info']);
        }
        if (isset($data['shipping_info'])) {
            $this->shipping_info = new ShippingInfo($data['shipping_info']);
        }
        if (isset($data['cart_info'])) {
            $this->cart_info = new CartInfo($data['cart_info']);
        }
        if (isset($data['store_info'])) {
            $this->store_info = new StoreInfo($data['store_info']);
        }
        if (isset($data['auction_info'])) {
            $this->auction_info = new AuctionInfo($data['auction_info']);
        }
        if (isset($data['incentive_info'])) {
            $this->incentive_info = new IncentiveInfo($data['incentive_info']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initTransactionInfo(): TransactionInfo
    {
        return $this->transaction_info = new TransactionInfo();
    }

    public function initPayerInfo(): PayerInfo
    {
        return $this->payer_info = new PayerInfo();
    }

    public function initShippingInfo(): ShippingInfo
    {
        return $this->shipping_info = new ShippingInfo();
    }

    public function initCartInfo(): CartInfo
    {
        return $this->cart_info = new CartInfo();
    }

    public function initStoreInfo(): StoreInfo
    {
        return $this->store_info = new StoreInfo();
    }

    public function initAuctionInfo(): AuctionInfo
    {
        return $this->auction_info = new AuctionInfo();
    }

    public function initIncentiveInfo(): IncentiveInfo
    {
        return $this->incentive_info = new IncentiveInfo();
    }
}
