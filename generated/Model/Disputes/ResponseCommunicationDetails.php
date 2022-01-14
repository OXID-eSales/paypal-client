<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The contact details that a merchant provides to the customer to use to share their evidence documents.
 *
 * generated from: response-communication_details.json
 */
class ResponseCommunicationDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * @var string | null
     * minLength: 3
     * maxLength: 254
     */
    public $email;

    /**
     * The merchant provided notes that are visible to both the customer and PayPal.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $note;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $time_posted;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->email) || Assert::minLength(
            $this->email,
            3,
            "email in ResponseCommunicationDetails must have minlength of 3 $within"
        );
        !isset($this->email) || Assert::maxLength(
            $this->email,
            254,
            "email in ResponseCommunicationDetails must have maxlength of 254 $within"
        );
        !isset($this->note) || Assert::minLength(
            $this->note,
            1,
            "note in ResponseCommunicationDetails must have minlength of 1 $within"
        );
        !isset($this->note) || Assert::maxLength(
            $this->note,
            2000,
            "note in ResponseCommunicationDetails must have maxlength of 2000 $within"
        );
        !isset($this->time_posted) || Assert::minLength(
            $this->time_posted,
            20,
            "time_posted in ResponseCommunicationDetails must have minlength of 20 $within"
        );
        !isset($this->time_posted) || Assert::maxLength(
            $this->time_posted,
            64,
            "time_posted in ResponseCommunicationDetails must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
        if (isset($data['note'])) {
            $this->note = $data['note'];
        }
        if (isset($data['time_posted'])) {
            $this->time_posted = $data['time_posted'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
