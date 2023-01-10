<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Details of the processor.
 *
 * generated from: common_components-v4-schema-json-openapi-2.0-payment-processor.json
 */
class Processor implements JsonSerializable
{
    use BaseModel;

    /** Processor BNP Paribas. */
    const NAME_BNP_PARIBAS = 'BNP_PARIBAS';

    /** Processor Chase Paymentech. */
    const NAME_CHASE = 'CHASE';

    /** Processor Netgiro Systems. Later changed to DigitalRiver, currently called as Worldline. */
    const NAME_NETGIRO = 'NETGIRO';

    /** Processor GE. */
    const NAME_GE = 'GE';

    /** Processor IPGPAY Online Payment Gateway Services. */
    const NAME_IPG = 'IPG';

    /** Processor Omnipay Payment gateway. */
    const NAME_OMNIPAY = 'OMNIPAY';

    /** Processor PaySecure Payment gateway. */
    const NAME_PAY_SECURE = 'PAY_SECURE';

    /** Processor American Express. */
    const NAME_AMEX = 'AMEX';

    /** Processor Discover financial services. */
    const NAME_DISCOVER = 'DISCOVER';

    /** Processor First Data Merchant Services. */
    const NAME_FISRT_DATA_MERCHANT_SERVICES = 'FISRT_DATA_MERCHANT_SERVICES';

    /** Processor CPS Pinless Debit. */
    const NAME_CPS = 'CPS';

    /** Processor Star Network. */
    const NAME_STAR = 'STAR';

    /** Processor China Union Pay. */
    const NAME_CHINA_UNION_PAY = 'CHINA_UNION_PAY';

    /** Processor Sumitomo Mitsui Card Company. */
    const NAME_SMCC = 'SMCC';

    /** Processor Asseco Group. */
    const NAME_ASSECO = 'ASSECO';

    /** Processor Worldpay payment gateway. */
    const NAME_WORLDPAY = 'WORLDPAY';

    /** Processor Rede SA payment processing. */
    const NAME_REDE = 'REDE';

    /** Processor Synchrony Financial services. */
    const NAME_SYNCHRONY = 'SYNCHRONY';

    /** Processor Visa. */
    const NAME_VISA = 'VISA';

    /** Processor AltPay. */
    const NAME_ALTPAY = 'ALTPAY';

    /**
     * The name of the processor.
     *
     * use one of constants defined in this class to set the value:
     * @see NAME_BNP_PARIBAS
     * @see NAME_CHASE
     * @see NAME_NETGIRO
     * @see NAME_GE
     * @see NAME_IPG
     * @see NAME_OMNIPAY
     * @see NAME_PAY_SECURE
     * @see NAME_AMEX
     * @see NAME_DISCOVER
     * @see NAME_FISRT_DATA_MERCHANT_SERVICES
     * @see NAME_CPS
     * @see NAME_STAR
     * @see NAME_CHINA_UNION_PAY
     * @see NAME_SMCC
     * @see NAME_ASSECO
     * @see NAME_WORLDPAY
     * @see NAME_REDE
     * @see NAME_SYNCHRONY
     * @see NAME_VISA
     * @see NAME_ALTPAY
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $name;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength(
            $this->name,
            1,
            "name in Processor must have minlength of 1 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            255,
            "name in Processor must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
