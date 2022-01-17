<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The date and time of the last known transaction or when other entity-related information was updated, in
 * [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
 *
 * generated from: response-activity_entity_info.json
 */
class ResponseActivityEntityInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $last_known_valid_transaction_date;

    /**
     * Indicates whether the customer agreed to send the replaced card to the address associated to card.
     *
     * @var boolean | null
     */
    public $card_replacement_address_confirmed;

    /**
     * Indicates whether the customer shared their card with someone else.
     *
     * @var boolean | null
     */
    public $card_shared_with_someone_else;

    /**
     * Indicates whether the merchant has the customer's card details.
     *
     * @var boolean | null
     */
    public $merchant_has_card_details;

    /**
     * Indicates whether the customer has changed their card settings.
     *
     * @var boolean | null
     */
    public $card_settings_changed;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->last_known_valid_transaction_date) || Assert::minLength(
            $this->last_known_valid_transaction_date,
            20,
            "last_known_valid_transaction_date in ResponseActivityEntityInfo must have minlength of 20 $within"
        );
        !isset($this->last_known_valid_transaction_date) || Assert::maxLength(
            $this->last_known_valid_transaction_date,
            64,
            "last_known_valid_transaction_date in ResponseActivityEntityInfo must have maxlength of 64 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['last_known_valid_transaction_date'])) {
            $this->last_known_valid_transaction_date = $data['last_known_valid_transaction_date'];
        }
        if (isset($data['card_replacement_address_confirmed'])) {
            $this->card_replacement_address_confirmed = $data['card_replacement_address_confirmed'];
        }
        if (isset($data['card_shared_with_someone_else'])) {
            $this->card_shared_with_someone_else = $data['card_shared_with_someone_else'];
        }
        if (isset($data['merchant_has_card_details'])) {
            $this->merchant_has_card_details = $data['merchant_has_card_details'];
        }
        if (isset($data['card_settings_changed'])) {
            $this->card_settings_changed = $data['card_settings_changed'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
