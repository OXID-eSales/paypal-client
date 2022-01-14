<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payment source used to fund the payment
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-payment_source_response.json
 */
class PaymentSourceResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * The payment card to use to fund a payment. Card can be a credit or debit card.
     *
     * @var CardResponse | null
     */
    public $card;

    /**
     * The Paypal Wallet response.
     *
     * @var PaypalWalletResponse | null
     */
    public $paypal;

    /**
     * The customer's wallet used to fund the transaction.
     *
     * @var WalletsResponse | null
     */
    public $wallet;

    /**
     * The bank source used to fund the payment
     *
     * @var BankResponse | null
     */
    public $bank;

    /**
     * Information used to pay using Alipay.
     *
     * @var Alipay | null
     */
    public $alipay;

    /**
     * Information used to pay Bancontact.
     *
     * @var Bancontact | null
     */
    public $bancontact;

    /**
     * Information used to pay using BLIK
     *
     * @var Blik | null
     */
    public $blik;

    /**
     * Information used to pay using eps.
     *
     * @var Eps | null
     */
    public $eps;

    /**
     * Information needed to pay using giropay.
     *
     * @var Giropay | null
     */
    public $giropay;

    /**
     * Information used to pay using iDEAL.
     *
     * @var Ideal | null
     */
    public $ideal;

    /**
     * Information used to pay using Multibanco.
     *
     * @var Multibanco | null
     */
    public $multibanco;

    /**
     * Information used to pay using MyBank.
     *
     * @var Mybank | null
     */
    public $mybank;

    /**
     * Information needed to pay using PayU.
     *
     * @var Payu | null
     */
    public $payu;

    /**
     * Information used to pay using P24(Przelewy24)
     *
     * @var PTwoFour | null
     */
    public $p24;

    /**
     * Information used to pay using POLi.
     *
     * @var Poli | null
     */
    public $poli;

    /**
     * Information used to pay using Sofort.
     *
     * @var Sofort | null
     */
    public $sofort;

    /**
     * Information needed to pay using Trustly.
     *
     * @var Trustly | null
     */
    public $trustly;

    /**
     * Information used to pay using TrustPay.
     *
     * @var Trustpay | null
     */
    public $trustpay;

    /**
     * Information used to pay using Verkkopankki (Finnish Online Banking).
     *
     * @var Verkkopankki | null
     */
    public $verkkopankki;

    /**
     * Information needed to pay using WeChat Pay.
     *
     * @var Wechatpay | null
     */
    public $wechatpay;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->card) || Assert::isInstanceOf(
            $this->card,
            CardResponse::class,
            "card in PaymentSourceResponse must be instance of CardResponse $within"
        );
        !isset($this->card) ||  $this->card->validate(PaymentSourceResponse::class);
        !isset($this->paypal) || Assert::isInstanceOf(
            $this->paypal,
            PaypalWalletResponse::class,
            "paypal in PaymentSourceResponse must be instance of PaypalWalletResponse $within"
        );
        !isset($this->paypal) ||  $this->paypal->validate(PaymentSourceResponse::class);
        !isset($this->wallet) || Assert::isInstanceOf(
            $this->wallet,
            WalletsResponse::class,
            "wallet in PaymentSourceResponse must be instance of WalletsResponse $within"
        );
        !isset($this->wallet) ||  $this->wallet->validate(PaymentSourceResponse::class);
        !isset($this->bank) || Assert::isInstanceOf(
            $this->bank,
            BankResponse::class,
            "bank in PaymentSourceResponse must be instance of BankResponse $within"
        );
        !isset($this->bank) ||  $this->bank->validate(PaymentSourceResponse::class);
        !isset($this->alipay) || Assert::isInstanceOf(
            $this->alipay,
            Alipay::class,
            "alipay in PaymentSourceResponse must be instance of Alipay $within"
        );
        !isset($this->alipay) ||  $this->alipay->validate(PaymentSourceResponse::class);
        !isset($this->bancontact) || Assert::isInstanceOf(
            $this->bancontact,
            Bancontact::class,
            "bancontact in PaymentSourceResponse must be instance of Bancontact $within"
        );
        !isset($this->bancontact) ||  $this->bancontact->validate(PaymentSourceResponse::class);
        !isset($this->blik) || Assert::isInstanceOf(
            $this->blik,
            Blik::class,
            "blik in PaymentSourceResponse must be instance of Blik $within"
        );
        !isset($this->blik) ||  $this->blik->validate(PaymentSourceResponse::class);
        !isset($this->eps) || Assert::isInstanceOf(
            $this->eps,
            Eps::class,
            "eps in PaymentSourceResponse must be instance of Eps $within"
        );
        !isset($this->eps) ||  $this->eps->validate(PaymentSourceResponse::class);
        !isset($this->giropay) || Assert::isInstanceOf(
            $this->giropay,
            Giropay::class,
            "giropay in PaymentSourceResponse must be instance of Giropay $within"
        );
        !isset($this->giropay) ||  $this->giropay->validate(PaymentSourceResponse::class);
        !isset($this->ideal) || Assert::isInstanceOf(
            $this->ideal,
            Ideal::class,
            "ideal in PaymentSourceResponse must be instance of Ideal $within"
        );
        !isset($this->ideal) ||  $this->ideal->validate(PaymentSourceResponse::class);
        !isset($this->multibanco) || Assert::isInstanceOf(
            $this->multibanco,
            Multibanco::class,
            "multibanco in PaymentSourceResponse must be instance of Multibanco $within"
        );
        !isset($this->multibanco) ||  $this->multibanco->validate(PaymentSourceResponse::class);
        !isset($this->mybank) || Assert::isInstanceOf(
            $this->mybank,
            Mybank::class,
            "mybank in PaymentSourceResponse must be instance of Mybank $within"
        );
        !isset($this->mybank) ||  $this->mybank->validate(PaymentSourceResponse::class);
        !isset($this->payu) || Assert::isInstanceOf(
            $this->payu,
            Payu::class,
            "payu in PaymentSourceResponse must be instance of Payu $within"
        );
        !isset($this->payu) ||  $this->payu->validate(PaymentSourceResponse::class);
        !isset($this->p24) || Assert::isInstanceOf(
            $this->p24,
            PTwoFour::class,
            "p24 in PaymentSourceResponse must be instance of PTwoFour $within"
        );
        !isset($this->p24) ||  $this->p24->validate(PaymentSourceResponse::class);
        !isset($this->poli) || Assert::isInstanceOf(
            $this->poli,
            Poli::class,
            "poli in PaymentSourceResponse must be instance of Poli $within"
        );
        !isset($this->poli) ||  $this->poli->validate(PaymentSourceResponse::class);
        !isset($this->sofort) || Assert::isInstanceOf(
            $this->sofort,
            Sofort::class,
            "sofort in PaymentSourceResponse must be instance of Sofort $within"
        );
        !isset($this->sofort) ||  $this->sofort->validate(PaymentSourceResponse::class);
        !isset($this->trustly) || Assert::isInstanceOf(
            $this->trustly,
            Trustly::class,
            "trustly in PaymentSourceResponse must be instance of Trustly $within"
        );
        !isset($this->trustly) ||  $this->trustly->validate(PaymentSourceResponse::class);
        !isset($this->trustpay) || Assert::isInstanceOf(
            $this->trustpay,
            Trustpay::class,
            "trustpay in PaymentSourceResponse must be instance of Trustpay $within"
        );
        !isset($this->trustpay) ||  $this->trustpay->validate(PaymentSourceResponse::class);
        !isset($this->verkkopankki) || Assert::isInstanceOf(
            $this->verkkopankki,
            Verkkopankki::class,
            "verkkopankki in PaymentSourceResponse must be instance of Verkkopankki $within"
        );
        !isset($this->verkkopankki) ||  $this->verkkopankki->validate(PaymentSourceResponse::class);
        !isset($this->wechatpay) || Assert::isInstanceOf(
            $this->wechatpay,
            Wechatpay::class,
            "wechatpay in PaymentSourceResponse must be instance of Wechatpay $within"
        );
        !isset($this->wechatpay) ||  $this->wechatpay->validate(PaymentSourceResponse::class);
    }

    private function map(array $data)
    {
        if (isset($data['card'])) {
            $this->card = new CardResponse($data['card']);
        }
        if (isset($data['paypal'])) {
            $this->paypal = new PaypalWalletResponse($data['paypal']);
        }
        if (isset($data['wallet'])) {
            $this->wallet = new WalletsResponse($data['wallet']);
        }
        if (isset($data['bank'])) {
            $this->bank = new BankResponse($data['bank']);
        }
        if (isset($data['alipay'])) {
            $this->alipay = new Alipay($data['alipay']);
        }
        if (isset($data['bancontact'])) {
            $this->bancontact = new Bancontact($data['bancontact']);
        }
        if (isset($data['blik'])) {
            $this->blik = new Blik($data['blik']);
        }
        if (isset($data['eps'])) {
            $this->eps = new Eps($data['eps']);
        }
        if (isset($data['giropay'])) {
            $this->giropay = new Giropay($data['giropay']);
        }
        if (isset($data['ideal'])) {
            $this->ideal = new Ideal($data['ideal']);
        }
        if (isset($data['multibanco'])) {
            $this->multibanco = new Multibanco($data['multibanco']);
        }
        if (isset($data['mybank'])) {
            $this->mybank = new Mybank($data['mybank']);
        }
        if (isset($data['payu'])) {
            $this->payu = new Payu($data['payu']);
        }
        if (isset($data['p24'])) {
            $this->p24 = new PTwoFour($data['p24']);
        }
        if (isset($data['poli'])) {
            $this->poli = new Poli($data['poli']);
        }
        if (isset($data['sofort'])) {
            $this->sofort = new Sofort($data['sofort']);
        }
        if (isset($data['trustly'])) {
            $this->trustly = new Trustly($data['trustly']);
        }
        if (isset($data['trustpay'])) {
            $this->trustpay = new Trustpay($data['trustpay']);
        }
        if (isset($data['verkkopankki'])) {
            $this->verkkopankki = new Verkkopankki($data['verkkopankki']);
        }
        if (isset($data['wechatpay'])) {
            $this->wechatpay = new Wechatpay($data['wechatpay']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initCard(): CardResponse
    {
        return $this->card = new CardResponse();
    }

    public function initPaypal(): PaypalWalletResponse
    {
        return $this->paypal = new PaypalWalletResponse();
    }

    public function initWallet(): WalletsResponse
    {
        return $this->wallet = new WalletsResponse();
    }

    public function initBank(): BankResponse
    {
        return $this->bank = new BankResponse();
    }

    public function initAlipay(): Alipay
    {
        return $this->alipay = new Alipay();
    }

    public function initBancontact(): Bancontact
    {
        return $this->bancontact = new Bancontact();
    }

    public function initBlik(): Blik
    {
        return $this->blik = new Blik();
    }

    public function initEps(): Eps
    {
        return $this->eps = new Eps();
    }

    public function initGiropay(): Giropay
    {
        return $this->giropay = new Giropay();
    }

    public function initIdeal(): Ideal
    {
        return $this->ideal = new Ideal();
    }

    public function initMultibanco(): Multibanco
    {
        return $this->multibanco = new Multibanco();
    }

    public function initMybank(): Mybank
    {
        return $this->mybank = new Mybank();
    }

    public function initPayu(): Payu
    {
        return $this->payu = new Payu();
    }

    public function initP24(): PTwoFour
    {
        return $this->p24 = new PTwoFour();
    }

    public function initPoli(): Poli
    {
        return $this->poli = new Poli();
    }

    public function initSofort(): Sofort
    {
        return $this->sofort = new Sofort();
    }

    public function initTrustly(): Trustly
    {
        return $this->trustly = new Trustly();
    }

    public function initTrustpay(): Trustpay
    {
        return $this->trustpay = new Trustpay();
    }

    public function initVerkkopankki(): Verkkopankki
    {
        return $this->verkkopankki = new Verkkopankki();
    }

    public function initWechatpay(): Wechatpay
    {
        return $this->wechatpay = new Wechatpay();
    }
}
