<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The properties of a party.
 *
 * generated from: model-party.json
 */
class Party implements JsonSerializable
{
    use BaseModel;

    /**
     * Unique identifier for a party.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 30
     */
    public $id;

    /**
     * External identifier for a party, it could be venmo id, facebook email etc.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 30
     */
    public $external_id;

    /**
     * Indicates if the party is primary Party.
     *
     * @var boolean | null
     */
    public $primary;

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
    public $primary_email;

    /**
     * Email addresses.
     *
     * @var string[]
     * maxItems: 1
     * maxItems: 100
     */
    public $emails;

    /**
     * Details of party's phone numbers.
     *
     * @var PhoneInfo[]
     * maxItems: 1
     * maxItems: 100
     */
    public $phones;

    /**
     * Details of party's addresses.
     *
     * @var AddressWithConfirmation[]
     * maxItems: 1
     * maxItems: 100
     */
    public $addresses;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $update_time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in Party must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            30,
            "id in Party must have maxlength of 30 $within"
        );
        !isset($this->external_id) || Assert::minLength(
            $this->external_id,
            1,
            "external_id in Party must have minlength of 1 $within"
        );
        !isset($this->external_id) || Assert::maxLength(
            $this->external_id,
            30,
            "external_id in Party must have maxlength of 30 $within"
        );
        !isset($this->primary_email) || Assert::minLength(
            $this->primary_email,
            3,
            "primary_email in Party must have minlength of 3 $within"
        );
        !isset($this->primary_email) || Assert::maxLength(
            $this->primary_email,
            254,
            "primary_email in Party must have maxlength of 254 $within"
        );
        Assert::notNull($this->emails, "emails in Party must not be NULL $within");
        Assert::minCount(
            $this->emails,
            1,
            "emails in Party must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->emails,
            100,
            "emails in Party must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->emails,
            "emails in Party must be array $within"
        );
        Assert::notNull($this->phones, "phones in Party must not be NULL $within");
        Assert::minCount(
            $this->phones,
            1,
            "phones in Party must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->phones,
            100,
            "phones in Party must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->phones,
            "phones in Party must be array $within"
        );
        if (isset($this->phones)) {
            foreach ($this->phones as $item) {
                $item->validate(Party::class);
            }
        }
        Assert::notNull($this->addresses, "addresses in Party must not be NULL $within");
        Assert::minCount(
            $this->addresses,
            1,
            "addresses in Party must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->addresses,
            100,
            "addresses in Party must have max. count of 100 $within"
        );
        Assert::isArray(
            $this->addresses,
            "addresses in Party must be array $within"
        );
        if (isset($this->addresses)) {
            foreach ($this->addresses as $item) {
                $item->validate(Party::class);
            }
        }
        !isset($this->create_time) || Assert::minLength(
            $this->create_time,
            20,
            "create_time in Party must have minlength of 20 $within"
        );
        !isset($this->create_time) || Assert::maxLength(
            $this->create_time,
            64,
            "create_time in Party must have maxlength of 64 $within"
        );
        !isset($this->update_time) || Assert::minLength(
            $this->update_time,
            20,
            "update_time in Party must have minlength of 20 $within"
        );
        !isset($this->update_time) || Assert::maxLength(
            $this->update_time,
            64,
            "update_time in Party must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['external_id'])) {
            $this->external_id = $data['external_id'];
        }
        if (isset($data['primary'])) {
            $this->primary = $data['primary'];
        }
        if (isset($data['primary_email'])) {
            $this->primary_email = $data['primary_email'];
        }
        if (isset($data['emails'])) {
            $this->emails = [];
            foreach ($data['emails'] as $item) {
                $this->emails[] = $item;
            }
        }
        if (isset($data['phones'])) {
            $this->phones = [];
            foreach ($data['phones'] as $item) {
                $this->phones[] = new PhoneInfo($item);
            }
        }
        if (isset($data['addresses'])) {
            $this->addresses = [];
            foreach ($data['addresses'] as $item) {
                $this->addresses[] = new AddressWithConfirmation($item);
            }
        }
        if (isset($data['create_time'])) {
            $this->create_time = $data['create_time'];
        }
        if (isset($data['update_time'])) {
            $this->update_time = $data['update_time'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->emails = [];
        $this->phones = [];
        $this->addresses = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
