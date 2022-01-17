<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The supplementary data.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-supplementary_data.json
 */
class SupplementaryData implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of airline itineraries' data, including ticket, passenger, and airline details.
     *
     * @var AirlineItinerary[]
     * maxItems: 1
     * maxItems: 1
     */
    public $airline;

    /**
     * The API caller-provided information about the store.
     *
     * @var PointOfSale | null
     */
    public $point_of_sale;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->airline, "airline in SupplementaryData must not be NULL $within");
        Assert::minCount(
            $this->airline,
            1,
            "airline in SupplementaryData must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->airline,
            1,
            "airline in SupplementaryData must have max. count of 1 $within"
        );
        Assert::isArray(
            $this->airline,
            "airline in SupplementaryData must be array $within"
        );
        if (isset($this->airline)) {
            foreach ($this->airline as $item) {
                $item->validate(SupplementaryData::class);
            }
        }
        !isset($this->point_of_sale) || Assert::isInstanceOf(
            $this->point_of_sale,
            PointOfSale::class,
            "point_of_sale in SupplementaryData must be instance of PointOfSale $within"
        );
        !isset($this->point_of_sale) ||  $this->point_of_sale->validate(SupplementaryData::class);
    }

    private function map(array $data)
    {
        if (isset($data['airline'])) {
            $this->airline = [];
            foreach ($data['airline'] as $item) {
                $this->airline[] = new AirlineItinerary($item);
            }
        }
        if (isset($data['point_of_sale'])) {
            $this->point_of_sale = new PointOfSale($data['point_of_sale']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->airline = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPointOfSale(): PointOfSale
    {
        return $this->point_of_sale = new PointOfSale();
    }
}
