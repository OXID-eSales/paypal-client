<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The airline itinerary details.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-airline_itinerary.json
 */
class AirlineItinerary implements JsonSerializable
{
    use BaseModel;

    /**
     * The details for the airline ticket.
     *
     * @var AirlineTicket | null
     */
    public $ticket;

    /**
     * The airline passenger details.
     *
     * @var AirlinePassenger | null
     */
    public $passenger;

    /**
     * An array of the airline itinerary legs.
     *
     * @var FlightLeg[]
     * maxItems: 1
     * maxItems: 12
     */
    public $flight_leg_details;

    /**
     * For direct airline integration, numeric code to identify each clearing record message in those cases where
     * multiple clearing messages are allowed per authorized transaction. Applicable to multiple captures against an
     * authorization. In the case of single capture against an authorization, the value should be 1. Also, this value
     * must be less than or equal to the clearing count.
     *
     * @var int | null
     */
    public $clearing_sequence;

    /**
     * For direct airline integration, numeric code to identify the total number of multiple sequence clearing record
     * messages associated with a single authorization request. Applicable to multiple captures against an
     * authorization. In the case of single capture against an authorization the value should be 1.
     *
     * @var int | null
     */
    public $clearing_count;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->ticket) || Assert::isInstanceOf(
            $this->ticket,
            AirlineTicket::class,
            "ticket in AirlineItinerary must be instance of AirlineTicket $within"
        );
        !isset($this->ticket) ||  $this->ticket->validate(AirlineItinerary::class);
        !isset($this->passenger) || Assert::isInstanceOf(
            $this->passenger,
            AirlinePassenger::class,
            "passenger in AirlineItinerary must be instance of AirlinePassenger $within"
        );
        !isset($this->passenger) ||  $this->passenger->validate(AirlineItinerary::class);
        Assert::notNull($this->flight_leg_details, "flight_leg_details in AirlineItinerary must not be NULL $within");
        Assert::minCount(
            $this->flight_leg_details,
            1,
            "flight_leg_details in AirlineItinerary must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->flight_leg_details,
            12,
            "flight_leg_details in AirlineItinerary must have max. count of 12 $within"
        );
        Assert::isArray(
            $this->flight_leg_details,
            "flight_leg_details in AirlineItinerary must be array $within"
        );
        if (isset($this->flight_leg_details)) {
            foreach ($this->flight_leg_details as $item) {
                $item->validate(AirlineItinerary::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['ticket'])) {
            $this->ticket = new AirlineTicket($data['ticket']);
        }
        if (isset($data['passenger'])) {
            $this->passenger = new AirlinePassenger($data['passenger']);
        }
        if (isset($data['flight_leg_details'])) {
            $this->flight_leg_details = [];
            foreach ($data['flight_leg_details'] as $item) {
                $this->flight_leg_details[] = new FlightLeg($item);
            }
        }
        if (isset($data['clearing_sequence'])) {
            $this->clearing_sequence = $data['clearing_sequence'];
        }
        if (isset($data['clearing_count'])) {
            $this->clearing_count = $data['clearing_count'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->flight_leg_details = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initTicket(): AirlineTicket
    {
        return $this->ticket = new AirlineTicket();
    }

    public function initPassenger(): AirlinePassenger
    {
        return $this->passenger = new AirlinePassenger();
    }
}
