<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Payout specific attributes.
 *
 * generated from: referral_data-payout_attributes.json
 */
class ReferralDataPayoutAttributes implements JsonSerializable
{
    use BaseModel;

    /**
     * If `true`, specifies that the merchant or platform is offering goods or services on behalf of 3rd party
     * sellers.
     *
     * @var boolean | null
     */
    public $marketplace;

    /**
     * If `true`, specifies that the Kyc is required for the merchant.
     *
     * @var boolean | null
     */
    public $kyc_required;

    /**
     * Requested country, transfer method and currency.
     *
     * @var ReferralDataCountryTransferMethodCurrencySelection[]
     * maxItems: 1
     * maxItems: 50
     */
    public $country_transfer_method_currency_selection;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->country_transfer_method_currency_selection, "country_transfer_method_currency_selection in ReferralDataPayoutAttributes must not be NULL $within");
        Assert::minCount(
            $this->country_transfer_method_currency_selection,
            1,
            "country_transfer_method_currency_selection in ReferralDataPayoutAttributes must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->country_transfer_method_currency_selection,
            50,
            "country_transfer_method_currency_selection in ReferralDataPayoutAttributes must have max. count of 50 $within"
        );
        Assert::isArray(
            $this->country_transfer_method_currency_selection,
            "country_transfer_method_currency_selection in ReferralDataPayoutAttributes must be array $within"
        );
        if (isset($this->country_transfer_method_currency_selection)) {
            foreach ($this->country_transfer_method_currency_selection as $item) {
                $item->validate(ReferralDataPayoutAttributes::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['marketplace'])) {
            $this->marketplace = $data['marketplace'];
        }
        if (isset($data['kyc_required'])) {
            $this->kyc_required = $data['kyc_required'];
        }
        if (isset($data['country_transfer_method_currency_selection'])) {
            $this->country_transfer_method_currency_selection = [];
            foreach ($data['country_transfer_method_currency_selection'] as $item) {
                $this->country_transfer_method_currency_selection[] = new ReferralDataCountryTransferMethodCurrencySelection($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->country_transfer_method_currency_selection = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
