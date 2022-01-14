<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details for the airline ticket.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-airline_ticket.json
 */
class AirlineTicket implements JsonSerializable
{
    use BaseModel;

    /**
     * The airline-issued ticket number or ID.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 16
     */
    public $number;

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
    public $issue_date;

    /**
     * The carrier code of the ticket issuer.
     *
     * @var string | null
     * minLength: 2
     * maxLength: 2
     */
    public $issuing_carrier_code;

    /**
     * The name of the travel agency that issued the ticket.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 25
     */
    public $travel_agency_name;

    /**
     * The IATA number, also ARC number or ARC/IATA number. The unique code or number for the travel agency that
     * issued this ticket.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 8
     */
    public $travel_agency_code;

    /**
     * Indicates whether the ticket is restricted.
     *
     * @var boolean | null
     */
    public $restricted_ticket;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->number) || Assert::minLength(
            $this->number,
            1,
            "number in AirlineTicket must have minlength of 1 $within"
        );
        !isset($this->number) || Assert::maxLength(
            $this->number,
            16,
            "number in AirlineTicket must have maxlength of 16 $within"
        );
        !isset($this->issue_date) || Assert::minLength(
            $this->issue_date,
            10,
            "issue_date in AirlineTicket must have minlength of 10 $within"
        );
        !isset($this->issue_date) || Assert::maxLength(
            $this->issue_date,
            10,
            "issue_date in AirlineTicket must have maxlength of 10 $within"
        );
        !isset($this->issuing_carrier_code) || Assert::minLength(
            $this->issuing_carrier_code,
            2,
            "issuing_carrier_code in AirlineTicket must have minlength of 2 $within"
        );
        !isset($this->issuing_carrier_code) || Assert::maxLength(
            $this->issuing_carrier_code,
            2,
            "issuing_carrier_code in AirlineTicket must have maxlength of 2 $within"
        );
        !isset($this->travel_agency_name) || Assert::minLength(
            $this->travel_agency_name,
            1,
            "travel_agency_name in AirlineTicket must have minlength of 1 $within"
        );
        !isset($this->travel_agency_name) || Assert::maxLength(
            $this->travel_agency_name,
            25,
            "travel_agency_name in AirlineTicket must have maxlength of 25 $within"
        );
        !isset($this->travel_agency_code) || Assert::minLength(
            $this->travel_agency_code,
            1,
            "travel_agency_code in AirlineTicket must have minlength of 1 $within"
        );
        !isset($this->travel_agency_code) || Assert::maxLength(
            $this->travel_agency_code,
            8,
            "travel_agency_code in AirlineTicket must have maxlength of 8 $within"
        );
        !isset($this->fare) || Assert::isInstanceOf(
            $this->fare,
            Money::class,
            "fare in AirlineTicket must be instance of Money $within"
        );
        !isset($this->fare) ||  $this->fare->validate(AirlineTicket::class);
        !isset($this->tax) || Assert::isInstanceOf(
            $this->tax,
            Money::class,
            "tax in AirlineTicket must be instance of Money $within"
        );
        !isset($this->tax) ||  $this->tax->validate(AirlineTicket::class);
        !isset($this->fee) || Assert::isInstanceOf(
            $this->fee,
            Money::class,
            "fee in AirlineTicket must be instance of Money $within"
        );
        !isset($this->fee) ||  $this->fee->validate(AirlineTicket::class);
    }

    private function map(array $data)
    {
        if (isset($data['number'])) {
            $this->number = $data['number'];
        }
        if (isset($data['issue_date'])) {
            $this->issue_date = $data['issue_date'];
        }
        if (isset($data['issuing_carrier_code'])) {
            $this->issuing_carrier_code = $data['issuing_carrier_code'];
        }
        if (isset($data['travel_agency_name'])) {
            $this->travel_agency_name = $data['travel_agency_name'];
        }
        if (isset($data['travel_agency_code'])) {
            $this->travel_agency_code = $data['travel_agency_code'];
        }
        if (isset($data['restricted_ticket'])) {
            $this->restricted_ticket = $data['restricted_ticket'];
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
