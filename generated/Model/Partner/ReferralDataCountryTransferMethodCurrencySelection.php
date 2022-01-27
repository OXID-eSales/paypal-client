<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Requested country, transfer method and currency.
 *
 * generated from: referral_data-country_transfer_method_currency_selection.json
 */
class ReferralDataCountryTransferMethodCurrencySelection implements JsonSerializable
{
    use BaseModel;

    /**
     * Country.
     *
     * @var string | null
     */
    public $country;

    /**
     * Requested transfer method and currency for a country.
     *
     * @var ReferralDataTransferMethod[]
     * maxItems: 1
     * maxItems: 50
     */
    public $transfer_methods;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->transfer_methods, "transfer_methods in ReferralDataCountryTransferMethodCurrencySelection must not be NULL $within");
        Assert::minCount(
            $this->transfer_methods,
            1,
            "transfer_methods in ReferralDataCountryTransferMethodCurrencySelection must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->transfer_methods,
            50,
            "transfer_methods in ReferralDataCountryTransferMethodCurrencySelection must have max. count of 50 $within"
        );
        Assert::isArray(
            $this->transfer_methods,
            "transfer_methods in ReferralDataCountryTransferMethodCurrencySelection must be array $within"
        );
        if (isset($this->transfer_methods)) {
            foreach ($this->transfer_methods as $item) {
                $item->validate(ReferralDataCountryTransferMethodCurrencySelection::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['country'])) {
            $this->country = $data['country'];
        }
        if (isset($data['transfer_methods'])) {
            $this->transfer_methods = [];
            foreach ($data['transfer_methods'] as $item) {
                $this->transfer_methods[] = new ReferralDataTransferMethod($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->transfer_methods = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
