<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The transaction details.
 *
 * generated from: transaction.json
 */
class Transaction extends CaptureStatus2 implements JsonSerializable
{
    use BaseModel;

    /**
     * The PayPal-generated transaction ID.
     *
     * @var string
     * minLength: 3
     * maxLength: 50
     */
    public $id;

    /**
     * The breakdown details for the amount. Includes the gross, tax, fee, and shipping amounts.
     *
     * @var AmountWithBreakdown
     */
    public $amount_with_breakdown;

    /**
     * The name of the party.
     *
     * @var Name | null
     */
    public $payer_name;

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
    public $payer_email;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string
     * minLength: 20
     * maxLength: 64
     */
    public $time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->id, "id in Transaction must not be NULL $within");
        Assert::minLength(
            $this->id,
            3,
            "id in Transaction must have minlength of 3 $within"
        );
        Assert::maxLength(
            $this->id,
            50,
            "id in Transaction must have maxlength of 50 $within"
        );
        Assert::notNull($this->amount_with_breakdown, "amount_with_breakdown in Transaction must not be NULL $within");
        Assert::isInstanceOf(
            $this->amount_with_breakdown,
            AmountWithBreakdown::class,
            "amount_with_breakdown in Transaction must be instance of AmountWithBreakdown $within"
        );
         $this->amount_with_breakdown->validate(Transaction::class);
        !isset($this->payer_name) || Assert::isInstanceOf(
            $this->payer_name,
            Name::class,
            "payer_name in Transaction must be instance of Name $within"
        );
        !isset($this->payer_name) ||  $this->payer_name->validate(Transaction::class);
        !isset($this->payer_email) || Assert::minLength(
            $this->payer_email,
            3,
            "payer_email in Transaction must have minlength of 3 $within"
        );
        !isset($this->payer_email) || Assert::maxLength(
            $this->payer_email,
            254,
            "payer_email in Transaction must have maxlength of 254 $within"
        );
        Assert::notNull($this->time, "time in Transaction must not be NULL $within");
        Assert::minLength(
            $this->time,
            20,
            "time in Transaction must have minlength of 20 $within"
        );
        Assert::maxLength(
            $this->time,
            64,
            "time in Transaction must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['amount_with_breakdown'])) {
            $this->amount_with_breakdown = new AmountWithBreakdown($data['amount_with_breakdown']);
        }
        if (isset($data['payer_name'])) {
            $this->payer_name = new Name($data['payer_name']);
        }
        if (isset($data['payer_email'])) {
            $this->payer_email = $data['payer_email'];
        }
        if (isset($data['time'])) {
            $this->time = $data['time'];
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        $this->amount_with_breakdown = new AmountWithBreakdown();
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initPayerName(): Name
    {
        return $this->payer_name = new Name();
    }
}
