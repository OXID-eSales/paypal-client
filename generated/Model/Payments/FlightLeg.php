<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details of the flight leg.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-flight_leg.json
 */
class FlightLeg implements JsonSerializable
{
    use BaseModel;

    /** Stopover allowed. */
    public const STOPOVER_CODE_O = 'O';

    /** Stopover not allowed. */
    public const STOPOVER_CODE_X = 'X';

    /**
     * The flight number of the current leg.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 5
     */
    public $flight_code;

    /**
     * The flight number of the current leg.
     *
     * @var int | null
     */
    public $flight_number;

    /**
     * The IATA two-letter accounting code that identifies the carrier.
     *
     * @var string | null
     * minLength: 2
     * maxLength: 2
     */
    public $carrier_code;

    /**
     * The service class to which the airline ticket applies.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 1
     */
    public $service_class;

    /**
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     *
     * @var string | null
     * minLength: 10
     * maxLength: 10
     */
    public $departure_date;

    /**
     * The time, in the hh:mm 24 Hr format.
     *
     * @var string | null
     * minLength: 5
     * maxLength: 5
     */
    public $departure_time;

    /**
     * The airport code, as defined by [IATA](https://www.iata.org/publications/Pages/code-search.aspx).
     *
     * @var string | null
     * minLength: 3
     * maxLength: 4
     */
    public $departure_airport;

    /**
     * The airport code, as defined by [IATA](https://www.iata.org/publications/Pages/code-search.aspx).
     *
     * @var string | null
     * minLength: 3
     * maxLength: 4
     */
    public $arrival_airport;

    /**
     * The one-letter code that indicates whether the passenger is entitled to make a stopover.
     *
     * use one of constants defined in this class to set the value:
     * @see STOPOVER_CODE_O
     * @see STOPOVER_CODE_X
     * @var string | null
     */
    public $stopover_code;

    /**
     * The code used by airline to identify a fare type and enable airline staff and travel agents to find the rules
     * for this ticket.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 15
     */
    public $fare_basis_code;

    /**
     * The time, in the hh:mm 24 Hr format.
     *
     * @var string | null
     * minLength: 5
     * maxLength: 5
     */
    public $arrival_time;

    /**
     * A ticket in conjunction  with  another ticket, which together make up a single contract of carriage.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 16
     */
    public $conjunction_ticket_number;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $fare;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $tax;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $fee;

    /**
     * An endorsement or restriction on the ticket. An endorsement can be an agency-added notation or a mandatory
     * government required notation, such as a value-added tax. A restriction is a limitation based on the type of
     * fare, such as a ticket with a three-day minimum stay.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 20
     */
    public $additional_notations;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->flight_code) || Assert::minLength(
            $this->flight_code,
            1,
            "flight_code in FlightLeg must have minlength of 1 $within"
        );
        !isset($this->flight_code) || Assert::maxLength(
            $this->flight_code,
            5,
            "flight_code in FlightLeg must have maxlength of 5 $within"
        );
        !isset($this->carrier_code) || Assert::minLength(
            $this->carrier_code,
            2,
            "carrier_code in FlightLeg must have minlength of 2 $within"
        );
        !isset($this->carrier_code) || Assert::maxLength(
            $this->carrier_code,
            2,
            "carrier_code in FlightLeg must have maxlength of 2 $within"
        );
        !isset($this->service_class) || Assert::minLength(
            $this->service_class,
            1,
            "service_class in FlightLeg must have minlength of 1 $within"
        );
        !isset($this->service_class) || Assert::maxLength(
            $this->service_class,
            1,
            "service_class in FlightLeg must have maxlength of 1 $within"
        );
        !isset($this->departure_date) || Assert::minLength(
            $this->departure_date,
            10,
            "departure_date in FlightLeg must have minlength of 10 $within"
        );
        !isset($this->departure_date) || Assert::maxLength(
            $this->departure_date,
            10,
            "departure_date in FlightLeg must have maxlength of 10 $within"
        );
        !isset($this->departure_time) || Assert::minLength(
            $this->departure_time,
            5,
            "departure_time in FlightLeg must have minlength of 5 $within"
        );
        !isset($this->departure_time) || Assert::maxLength(
            $this->departure_time,
            5,
            "departure_time in FlightLeg must have maxlength of 5 $within"
        );
        !isset($this->departure_airport) || Assert::minLength(
            $this->departure_airport,
            3,
            "departure_airport in FlightLeg must have minlength of 3 $within"
        );
        !isset($this->departure_airport) || Assert::maxLength(
            $this->departure_airport,
            4,
            "departure_airport in FlightLeg must have maxlength of 4 $within"
        );
        !isset($this->arrival_airport) || Assert::minLength(
            $this->arrival_airport,
            3,
            "arrival_airport in FlightLeg must have minlength of 3 $within"
        );
        !isset($this->arrival_airport) || Assert::maxLength(
            $this->arrival_airport,
            4,
            "arrival_airport in FlightLeg must have maxlength of 4 $within"
        );
        !isset($this->fare_basis_code) || Assert::minLength(
            $this->fare_basis_code,
            1,
            "fare_basis_code in FlightLeg must have minlength of 1 $within"
        );
        !isset($this->fare_basis_code) || Assert::maxLength(
            $this->fare_basis_code,
            15,
            "fare_basis_code in FlightLeg must have maxlength of 15 $within"
        );
        !isset($this->arrival_time) || Assert::minLength(
            $this->arrival_time,
            5,
            "arrival_time in FlightLeg must have minlength of 5 $within"
        );
        !isset($this->arrival_time) || Assert::maxLength(
            $this->arrival_time,
            5,
            "arrival_time in FlightLeg must have maxlength of 5 $within"
        );
        !isset($this->conjunction_ticket_number) || Assert::minLength(
            $this->conjunction_ticket_number,
            1,
            "conjunction_ticket_number in FlightLeg must have minlength of 1 $within"
        );
        !isset($this->conjunction_ticket_number) || Assert::maxLength(
            $this->conjunction_ticket_number,
            16,
            "conjunction_ticket_number in FlightLeg must have maxlength of 16 $within"
        );
        !isset($this->fare) || Assert::isInstanceOf(
            $this->fare,
            Money::class,
            "fare in FlightLeg must be instance of Money $within"
        );
        !isset($this->fare) ||  $this->fare->validate(FlightLeg::class);
        !isset($this->tax) || Assert::isInstanceOf(
            $this->tax,
            Money::class,
            "tax in FlightLeg must be instance of Money $within"
        );
        !isset($this->tax) ||  $this->tax->validate(FlightLeg::class);
        !isset($this->fee) || Assert::isInstanceOf(
            $this->fee,
            Money::class,
            "fee in FlightLeg must be instance of Money $within"
        );
        !isset($this->fee) ||  $this->fee->validate(FlightLeg::class);
        !isset($this->additional_notations) || Assert::minLength(
            $this->additional_notations,
            1,
            "additional_notations in FlightLeg must have minlength of 1 $within"
        );
        !isset($this->additional_notations) || Assert::maxLength(
            $this->additional_notations,
            20,
            "additional_notations in FlightLeg must have maxlength of 20 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['flight_code'])) {
            $this->flight_code = $data['flight_code'];
        }
        if (isset($data['flight_number'])) {
            $this->flight_number = $data['flight_number'];
        }
        if (isset($data['carrier_code'])) {
            $this->carrier_code = $data['carrier_code'];
        }
        if (isset($data['service_class'])) {
            $this->service_class = $data['service_class'];
        }
        if (isset($data['departure_date'])) {
            $this->departure_date = $data['departure_date'];
        }
        if (isset($data['departure_time'])) {
            $this->departure_time = $data['departure_time'];
        }
        if (isset($data['departure_airport'])) {
            $this->departure_airport = $data['departure_airport'];
        }
        if (isset($data['arrival_airport'])) {
            $this->arrival_airport = $data['arrival_airport'];
        }
        if (isset($data['stopover_code'])) {
            $this->stopover_code = $data['stopover_code'];
        }
        if (isset($data['fare_basis_code'])) {
            $this->fare_basis_code = $data['fare_basis_code'];
        }
        if (isset($data['arrival_time'])) {
            $this->arrival_time = $data['arrival_time'];
        }
        if (isset($data['conjunction_ticket_number'])) {
            $this->conjunction_ticket_number = $data['conjunction_ticket_number'];
        }
        if (isset($data['fare'])) {
            $this->fare = new Money($data['fare']);
        }
        if (isset($data['tax'])) {
            $this->tax = new Money($data['tax']);
        }
        if (isset($data['fee'])) {
            $this->fee = new Money($data['fee']);
        }
        if (isset($data['additional_notations'])) {
            $this->additional_notations = $data['additional_notations'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initFare(): Money
    {
        return $this->fare = new Money();
    }

    public function initTax(): Money
    {
        return $this->tax = new Money();
    }

    public function initFee(): Money
    {
        return $this->fee = new Money();
    }
}
