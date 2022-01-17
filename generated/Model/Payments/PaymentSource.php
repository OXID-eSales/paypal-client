<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payment source definition.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-payment_source.json
 */
class PaymentSource implements JsonSerializable
{
    use BaseModel;

    /**
     * The payment card to use to fund a payment. Can be a credit or debit card.
     *
     * @var Card | null
     */
    public $card;

    /**
     * The tokenized payment source to fund a payment.
     *
     * @var Token | null
     */
    public $token;

    /**
     * The bank source used to fund the payment
     *
     * @var Bank | null
     */
    public $bank;

    /**
     * A resource that identies that a paypal wallet is used for payment.
     *
     * @var PaypalWallet | null
     */
    public $paypal;

    /**
     * Information needed to pay using Alipay
     *
     * @var AlipayRequest | null
     */
    public $alipay;

    /**
     * Information needed to pay using Bancontact.
     *
     * @var BancontactRequest | null
     */
    public $bancontact;

    /**
     * Information needed to pay using BLIK.
     *
     * @var BlikRequest | null
     */
    public $blik;

    /**
     * Information needed to pay using eps.
     *
     * @var EpsRequest | null
     */
    public $eps;

    /**
     * Information needed to pay using giropay.
     *
     * @var GiropayRequest | null
     */
    public $giropay;

    /**
     * Information needed to pay using iDEAL.
     *
     * @var IdealRequest | null
     */
    public $ideal;

    /**
     * Information needed to pay using Multibanco.
     *
     * @var MultibancoRequest | null
     */
    public $multibanco;

    /**
     * Information needed to pay using MyBank.
     *
     * @var MybankRequest | null
     */
    public $mybank;

    /**
     * Information needed to pay using PayU.
     *
     * @var PayuRequest | null
     */
    public $payu;

    /**
     * Information needed to pay using P24 (Przelewy24).
     *
     * @var PTwoFourRequest | null
     */
    public $p24;

    /**
     * Information needed to pay using POLi.
     *
     * @var PoliRequest | null
     */
    public $poli;

    /**
     * Information needed to pay using Sofort.
     *
     * @var SofortRequest | null
     */
    public $sofort;

    /**
     * Information needed to pay using Trustly.
     *
     * @var TrustlyRequest | null
     */
    public $trustly;

    /**
     * Information needed to pay using TrustPay.
     *
     * @var TrustpayRequest | null
     */
    public $trustpay;

    /**
     * Information needed to pay using Verkkopankki (Finnish Online Banking).
     *
     * @var VerkkopankkiRequest | null
     */
    public $verkkopankki;

    /**
     * Information needed to pay using WeChat Pay.
     *
     * @var WechatpayRequest | null
     */
    public $wechatpay;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->card) || Assert::isInstanceOf(
            $this->card,
            Card::class,
            "card in PaymentSource must be instance of Card $within"
        );
        !isset($this->card) ||  $this->card->validate(PaymentSource::class);
        !isset($this->token) || Assert::isInstanceOf(
            $this->token,
            Token::class,
            "token in PaymentSource must be instance of Token $within"
        );
        !isset($this->token) ||  $this->token->validate(PaymentSource::class);
        !isset($this->bank) || Assert::isInstanceOf(
            $this->bank,
            Bank::class,
            "bank in PaymentSource must be instance of Bank $within"
        );
        !isset($this->bank) ||  $this->bank->validate(PaymentSource::class);
        !isset($this->paypal) || Assert::isInstanceOf(
            $this->paypal,
            PaypalWallet::class,
            "paypal in PaymentSource must be instance of PaypalWallet $within"
        );
        !isset($this->paypal) ||  $this->paypal->validate(PaymentSource::class);
        !isset($this->alipay) || Assert::isInstanceOf(
            $this->alipay,
            AlipayRequest::class,
            "alipay in PaymentSource must be instance of AlipayRequest $within"
        );
        !isset($this->alipay) ||  $this->alipay->validate(PaymentSource::class);
        !isset($this->bancontact) || Assert::isInstanceOf(
            $this->bancontact,
            BancontactRequest::class,
            "bancontact in PaymentSource must be instance of BancontactRequest $within"
        );
        !isset($this->bancontact) ||  $this->bancontact->validate(PaymentSource::class);
        !isset($this->blik) || Assert::isInstanceOf(
            $this->blik,
            BlikRequest::class,
            "blik in PaymentSource must be instance of BlikRequest $within"
        );
        !isset($this->blik) ||  $this->blik->validate(PaymentSource::class);
        !isset($this->eps) || Assert::isInstanceOf(
            $this->eps,
            EpsRequest::class,
            "eps in PaymentSource must be instance of EpsRequest $within"
        );
        !isset($this->eps) ||  $this->eps->validate(PaymentSource::class);
        !isset($this->giropay) || Assert::isInstanceOf(
            $this->giropay,
            GiropayRequest::class,
            "giropay in PaymentSource must be instance of GiropayRequest $within"
        );
        !isset($this->giropay) ||  $this->giropay->validate(PaymentSource::class);
        !isset($this->ideal) || Assert::isInstanceOf(
            $this->ideal,
            IdealRequest::class,
            "ideal in PaymentSource must be instance of IdealRequest $within"
        );
        !isset($this->ideal) ||  $this->ideal->validate(PaymentSource::class);
        !isset($this->multibanco) || Assert::isInstanceOf(
            $this->multibanco,
            MultibancoRequest::class,
            "multibanco in PaymentSource must be instance of MultibancoRequest $within"
        );
        !isset($this->multibanco) ||  $this->multibanco->validate(PaymentSource::class);
        !isset($this->mybank) || Assert::isInstanceOf(
            $this->mybank,
            MybankRequest::class,
            "mybank in PaymentSource must be instance of MybankRequest $within"
        );
        !isset($this->mybank) ||  $this->mybank->validate(PaymentSource::class);
        !isset($this->payu) || Assert::isInstanceOf(
            $this->payu,
            PayuRequest::class,
            "payu in PaymentSource must be instance of PayuRequest $within"
        );
        !isset($this->payu) ||  $this->payu->validate(PaymentSource::class);
        !isset($this->p24) || Assert::isInstanceOf(
            $this->p24,
            PTwoFourRequest::class,
            "p24 in PaymentSource must be instance of PTwoFourRequest $within"
        );
        !isset($this->p24) ||  $this->p24->validate(PaymentSource::class);
        !isset($this->poli) || Assert::isInstanceOf(
            $this->poli,
            PoliRequest::class,
            "poli in PaymentSource must be instance of PoliRequest $within"
        );
        !isset($this->poli) ||  $this->poli->validate(PaymentSource::class);
        !isset($this->sofort) || Assert::isInstanceOf(
            $this->sofort,
            SofortRequest::class,
            "sofort in PaymentSource must be instance of SofortRequest $within"
        );
        !isset($this->sofort) ||  $this->sofort->validate(PaymentSource::class);
        !isset($this->trustly) || Assert::isInstanceOf(
            $this->trustly,
            TrustlyRequest::class,
            "trustly in PaymentSource must be instance of TrustlyRequest $within"
        );
        !isset($this->trustly) ||  $this->trustly->validate(PaymentSource::class);
        !isset($this->trustpay) || Assert::isInstanceOf(
            $this->trustpay,
            TrustpayRequest::class,
            "trustpay in PaymentSource must be instance of TrustpayRequest $within"
        );
        !isset($this->trustpay) ||  $this->trustpay->validate(PaymentSource::class);
        !isset($this->verkkopankki) || Assert::isInstanceOf(
            $this->verkkopankki,
            VerkkopankkiRequest::class,
            "verkkopankki in PaymentSource must be instance of VerkkopankkiRequest $within"
        );
        !isset($this->verkkopankki) ||  $this->verkkopankki->validate(PaymentSource::class);
        !isset($this->wechatpay) || Assert::isInstanceOf(
            $this->wechatpay,
            WechatpayRequest::class,
            "wechatpay in PaymentSource must be instance of WechatpayRequest $within"
        );
        !isset($this->wechatpay) ||  $this->wechatpay->validate(PaymentSource::class);
    }

    private function map(array $data)
    {
        if (isset($data['card'])) {
            $this->card = new Card($data['card']);
        }
        if (isset($data['token'])) {
            $this->token = new Token($data['token']);
        }
        if (isset($data['bank'])) {
            $this->bank = new Bank($data['bank']);
        }
        if (isset($data['paypal'])) {
            $this->paypal = new PaypalWallet($data['paypal']);
        }
        if (isset($data['alipay'])) {
            $this->alipay = new AlipayRequest($data['alipay']);
        }
        if (isset($data['bancontact'])) {
            $this->bancontact = new BancontactRequest($data['bancontact']);
        }
        if (isset($data['blik'])) {
            $this->blik = new BlikRequest($data['blik']);
        }
        if (isset($data['eps'])) {
            $this->eps = new EpsRequest($data['eps']);
        }
        if (isset($data['giropay'])) {
            $this->giropay = new GiropayRequest($data['giropay']);
        }
        if (isset($data['ideal'])) {
            $this->ideal = new IdealRequest($data['ideal']);
        }
        if (isset($data['multibanco'])) {
            $this->multibanco = new MultibancoRequest($data['multibanco']);
        }
        if (isset($data['mybank'])) {
            $this->mybank = new MybankRequest($data['mybank']);
        }
        if (isset($data['payu'])) {
            $this->payu = new PayuRequest($data['payu']);
        }
        if (isset($data['p24'])) {
            $this->p24 = new PTwoFourRequest($data['p24']);
        }
        if (isset($data['poli'])) {
            $this->poli = new PoliRequest($data['poli']);
        }
        if (isset($data['sofort'])) {
            $this->sofort = new SofortRequest($data['sofort']);
        }
        if (isset($data['trustly'])) {
            $this->trustly = new TrustlyRequest($data['trustly']);
        }
        if (isset($data['trustpay'])) {
            $this->trustpay = new TrustpayRequest($data['trustpay']);
        }
        if (isset($data['verkkopankki'])) {
            $this->verkkopankki = new VerkkopankkiRequest($data['verkkopankki']);
        }
        if (isset($data['wechatpay'])) {
            $this->wechatpay = new WechatpayRequest($data['wechatpay']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initCard(): Card
    {
        return $this->card = new Card();
    }

    public function initToken(): Token
    {
        return $this->token = new Token();
    }

    public function initBank(): Bank
    {
        return $this->bank = new Bank();
    }

    public function initPaypal(): PaypalWallet
    {
        return $this->paypal = new PaypalWallet();
    }

    public function initAlipay(): AlipayRequest
    {
        return $this->alipay = new AlipayRequest();
    }

    public function initBancontact(): BancontactRequest
    {
        return $this->bancontact = new BancontactRequest();
    }

    public function initBlik(): BlikRequest
    {
        return $this->blik = new BlikRequest();
    }

    public function initEps(): EpsRequest
    {
        return $this->eps = new EpsRequest();
    }

    public function initGiropay(): GiropayRequest
    {
        return $this->giropay = new GiropayRequest();
    }

    public function initIdeal(): IdealRequest
    {
        return $this->ideal = new IdealRequest();
    }

    public function initMultibanco(): MultibancoRequest
    {
        return $this->multibanco = new MultibancoRequest();
    }

    public function initMybank(): MybankRequest
    {
        return $this->mybank = new MybankRequest();
    }

    public function initPayu(): PayuRequest
    {
        return $this->payu = new PayuRequest();
    }

    public function initP24(): PTwoFourRequest
    {
        return $this->p24 = new PTwoFourRequest();
    }

    public function initPoli(): PoliRequest
    {
        return $this->poli = new PoliRequest();
    }

    public function initSofort(): SofortRequest
    {
        return $this->sofort = new SofortRequest();
    }

    public function initTrustly(): TrustlyRequest
    {
        return $this->trustly = new TrustlyRequest();
    }

    public function initTrustpay(): TrustpayRequest
    {
        return $this->trustpay = new TrustpayRequest();
    }

    public function initVerkkopankki(): VerkkopankkiRequest
    {
        return $this->verkkopankki = new VerkkopankkiRequest();
    }

    public function initWechatpay(): WechatpayRequest
    {
        return $this->wechatpay = new WechatpayRequest();
    }
}
