<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The non-portable additional address details that are sometimes needed for compliance, risk, or other scenarios
 * where fine-grain address information might be needed. Not portable with common third party and open source.
 * Redundant with core fields.<br/>For example, `address_portable.address_line_1` is usually a combination of
 * `address_details.street_number`, `street_name`, and `street_type`.
 *
 * generated from: AddressPortable_address_details
 */
class AddressPortableAddressDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * The street number.
     *
     * @var string | null
     * maxLength: 100
     */
    public $street_number;

    /**
     * The street name. Just `Drury` in `Drury Lane`.
     *
     * @var string | null
     * maxLength: 100
     */
    public $street_name;

    /**
     * The street type. For example, avenue, boulevard, road, or expressway.
     *
     * @var string | null
     * maxLength: 100
     */
    public $street_type;

    /**
     * The delivery service. Post office box, bag number, or post office name.
     *
     * @var string | null
     * maxLength: 100
     */
    public $delivery_service;

    /**
     * A named locations that represents the premise. Usually a building name or number or collection of buildings
     * with a common name or number. For example, <code>Craven House</code>.
     *
     * @var string | null
     * maxLength: 100
     */
    public $building_name;

    /**
     * The first-order entity below a named building or location that represents the sub-premise. Usually a single
     * building within a collection of buildings with a common name. Can be a flat, story, floor, room, or apartment.
     *
     * @var string | null
     * maxLength: 100
     */
    public $sub_building;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->street_number) || Assert::maxLength(
            $this->street_number,
            100,
            "street_number in AddressPortableAddressDetails must have maxlength of 100 $within"
        );
        !isset($this->street_name) || Assert::maxLength(
            $this->street_name,
            100,
            "street_name in AddressPortableAddressDetails must have maxlength of 100 $within"
        );
        !isset($this->street_type) || Assert::maxLength(
            $this->street_type,
            100,
            "street_type in AddressPortableAddressDetails must have maxlength of 100 $within"
        );
        !isset($this->delivery_service) || Assert::maxLength(
            $this->delivery_service,
            100,
            "delivery_service in AddressPortableAddressDetails must have maxlength of 100 $within"
        );
        !isset($this->building_name) || Assert::maxLength(
            $this->building_name,
            100,
            "building_name in AddressPortableAddressDetails must have maxlength of 100 $within"
        );
        !isset($this->sub_building) || Assert::maxLength(
            $this->sub_building,
            100,
            "sub_building in AddressPortableAddressDetails must have maxlength of 100 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['street_number'])) {
            $this->street_number = $data['street_number'];
        }
        if (isset($data['street_name'])) {
            $this->street_name = $data['street_name'];
        }
        if (isset($data['street_type'])) {
            $this->street_type = $data['street_type'];
        }
        if (isset($data['delivery_service'])) {
            $this->delivery_service = $data['delivery_service'];
        }
        if (isset($data['building_name'])) {
            $this->building_name = $data['building_name'];
        }
        if (isset($data['sub_building'])) {
            $this->sub_building = $data['sub_building'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
