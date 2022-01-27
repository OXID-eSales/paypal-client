<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Requested transfer method and currency for a country.
 *
 * generated from: referral_data-transfer_method.json
 */
class ReferralDataTransferMethod implements JsonSerializable
{
    use BaseModel;

    /** Transfer method type- Bank Account */
    public const TRANSFER_METHOD_TYPE_BANK_ACCOUNT = 'BANK_ACCOUNT';

    /** Transfer method type- Bank Account */
    public const TRANSFER_METHOD_TYPE_PAYPAL = 'PAYPAL';

    /** Transfer method type- Bank Account */
    public const TRANSFER_METHOD_TYPE_VENMO = 'VENMO';

    /** Transfer method type- Bank Account */
    public const TRANSFER_METHOD_TYPE_WIRE_ACCOUNT = 'WIRE_ACCOUNT';

    /**
     * Transfer Method type.
     *
     * use one of constants defined in this class to set the value:
     * @see TRANSFER_METHOD_TYPE_BANK_ACCOUNT
     * @see TRANSFER_METHOD_TYPE_PAYPAL
     * @see TRANSFER_METHOD_TYPE_VENMO
     * @see TRANSFER_METHOD_TYPE_WIRE_ACCOUNT
     * @var string | null
     */
    public $transfer_method_type;

    /**
     * Requested Currencies for a Transfer Method.
     *
     * @var string[]
     * maxItems: 1
     * maxItems: 50
     */
    public $currencies;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->currencies, "currencies in ReferralDataTransferMethod must not be NULL $within");
        Assert::minCount(
            $this->currencies,
            1,
            "currencies in ReferralDataTransferMethod must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->currencies,
            50,
            "currencies in ReferralDataTransferMethod must have max. count of 50 $within"
        );
        Assert::isArray(
            $this->currencies,
            "currencies in ReferralDataTransferMethod must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['transfer_method_type'])) {
            $this->transfer_method_type = $data['transfer_method_type'];
        }
        if (isset($data['currencies'])) {
            $this->currencies = [];
            foreach ($data['currencies'] as $item) {
                $this->currencies[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->currencies = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
