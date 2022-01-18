<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The business entity of the account.
 *
 * generated from: customer_common_overrides-business_entity.json
 */
class BusinessEntity extends Business implements JsonSerializable
{
    use BaseModel;

    /**
     * Beneficial owners of the entity.
     *
     * @var BeneficialOwners | null
     */
    public $beneficial_owners;

    /**
     * List of Directors present as part of the business entity.
     *
     * @var OfficeBearer[]
     * maxItems: 0
     * maxItems: 5
     */
    public $office_bearers;

    /**
     * The currency range, from the minimum inclusive amount to the maximum inclusive amount.
     *
     * @var OnboardingCommonCurrencyRange | null
     */
    public $annual_sales_volume_range;

    /**
     * The currency range, from the minimum inclusive amount to the maximum inclusive amount.
     *
     * @var OnboardingCommonCurrencyRange | null
     */
    public $average_monthly_volume_range;

    /**
     * The business goals description. For example, a mission statement.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 256
     */
    public $business_description;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->beneficial_owners) || Assert::isInstanceOf(
            $this->beneficial_owners,
            BeneficialOwners::class,
            "beneficial_owners in BusinessEntity must be instance of BeneficialOwners $within"
        );
        !isset($this->beneficial_owners) ||  $this->beneficial_owners->validate(BusinessEntity::class);
        Assert::notNull($this->office_bearers, "office_bearers in BusinessEntity must not be NULL $within");
        Assert::minCount(
            $this->office_bearers,
            0,
            "office_bearers in BusinessEntity must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->office_bearers,
            5,
            "office_bearers in BusinessEntity must have max. count of 5 $within"
        );
        Assert::isArray(
            $this->office_bearers,
            "office_bearers in BusinessEntity must be array $within"
        );
        if (isset($this->office_bearers)) {
            foreach ($this->office_bearers as $item) {
                $item->validate(BusinessEntity::class);
            }
        }
        !isset($this->annual_sales_volume_range) || Assert::isInstanceOf(
            $this->annual_sales_volume_range,
            OnboardingCommonCurrencyRange::class,
            "annual_sales_volume_range in BusinessEntity must be instance of OnboardingCommonCurrencyRange $within"
        );
        !isset($this->annual_sales_volume_range) ||  $this->annual_sales_volume_range->validate(BusinessEntity::class);
        !isset($this->average_monthly_volume_range) || Assert::isInstanceOf(
            $this->average_monthly_volume_range,
            OnboardingCommonCurrencyRange::class,
            "average_monthly_volume_range in BusinessEntity must be instance of OnboardingCommonCurrencyRange $within"
        );
        !isset($this->average_monthly_volume_range) ||  $this->average_monthly_volume_range->validate(BusinessEntity::class);
        !isset($this->business_description) || Assert::minLength(
            $this->business_description,
            1,
            "business_description in BusinessEntity must have minlength of 1 $within"
        );
        !isset($this->business_description) || Assert::maxLength(
            $this->business_description,
            256,
            "business_description in BusinessEntity must have maxlength of 256 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['beneficial_owners'])) {
            $this->beneficial_owners = new BeneficialOwners($data['beneficial_owners']);
        }
        if (isset($data['office_bearers'])) {
            $this->office_bearers = [];
            foreach ($data['office_bearers'] as $item) {
                $this->office_bearers[] = new OfficeBearer($item);
            }
        }
        if (isset($data['annual_sales_volume_range'])) {
            $this->annual_sales_volume_range = new OnboardingCommonCurrencyRange($data['annual_sales_volume_range']);
        }
        if (isset($data['average_monthly_volume_range'])) {
            $this->average_monthly_volume_range = new OnboardingCommonCurrencyRange($data['average_monthly_volume_range']);
        }
        if (isset($data['business_description'])) {
            $this->business_description = $data['business_description'];
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        $this->office_bearers = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initBeneficialOwners(): BeneficialOwners
    {
        return $this->beneficial_owners = new BeneficialOwners();
    }

    public function initAnnualSalesVolumeRange(): OnboardingCommonCurrencyRange
    {
        return $this->annual_sales_volume_range = new OnboardingCommonCurrencyRange();
    }

    public function initAverageMonthlyVolumeRange(): OnboardingCommonCurrencyRange
    {
        return $this->average_monthly_volume_range = new OnboardingCommonCurrencyRange();
    }
}
