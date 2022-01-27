<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The search response information.
 *
 * generated from: partner-partner_search_response.json
 */
class PartnerPartnerSearchResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of transaction detail objects.
     *
     * @var PartnerPartnerTransactionDetail[]
     * maxItems: 0
     * maxItems: 2147483647
     */
    public $transaction_details;

    /**
     * The PayPal payer ID, which is a masked version of the PayPal account number intended for use with third
     * parties. The account number is reversibly encrypted and a proprietary variant of Base32 is used to encode the
     * result.
     *
     * @var string | null
     * minLength: 13
     * maxLength: 13
     */
    public $account_id;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $start_time;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $end_time;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $last_refresh_time;

    /**
     * The total number of transactions as an integer beginning with the specified `page` in the full result and not
     * just in this response.
     *
     * @var int | null
     */
    public $total_items;

    /**
     * The total number of pages, as an `integer`, when the `total_items` is divided into pages of the specified
     * `page_size`.
     *
     * @var int | null
     */
    public $total_pages;

    /**
     * An array of request-related [HATEOAS links](/docs/api/overview/#hateoas-links).
     *
     * @var array | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->transaction_details, "transaction_details in PartnerPartnerSearchResponse must not be NULL $within");
        Assert::minCount(
            $this->transaction_details,
            0,
            "transaction_details in PartnerPartnerSearchResponse must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->transaction_details,
            2147483647,
            "transaction_details in PartnerPartnerSearchResponse must have max. count of 2147483647 $within"
        );
        Assert::isArray(
            $this->transaction_details,
            "transaction_details in PartnerPartnerSearchResponse must be array $within"
        );
        if (isset($this->transaction_details)) {
            foreach ($this->transaction_details as $item) {
                $item->validate(PartnerPartnerSearchResponse::class);
            }
        }
        !isset($this->account_id) || Assert::minLength(
            $this->account_id,
            13,
            "account_id in PartnerPartnerSearchResponse must have minlength of 13 $within"
        );
        !isset($this->account_id) || Assert::maxLength(
            $this->account_id,
            13,
            "account_id in PartnerPartnerSearchResponse must have maxlength of 13 $within"
        );
        !isset($this->start_time) || Assert::minLength(
            $this->start_time,
            20,
            "start_time in PartnerPartnerSearchResponse must have minlength of 20 $within"
        );
        !isset($this->start_time) || Assert::maxLength(
            $this->start_time,
            64,
            "start_time in PartnerPartnerSearchResponse must have maxlength of 64 $within"
        );
        !isset($this->end_time) || Assert::minLength(
            $this->end_time,
            20,
            "end_time in PartnerPartnerSearchResponse must have minlength of 20 $within"
        );
        !isset($this->end_time) || Assert::maxLength(
            $this->end_time,
            64,
            "end_time in PartnerPartnerSearchResponse must have maxlength of 64 $within"
        );
        !isset($this->last_refresh_time) || Assert::minLength(
            $this->last_refresh_time,
            20,
            "last_refresh_time in PartnerPartnerSearchResponse must have minlength of 20 $within"
        );
        !isset($this->last_refresh_time) || Assert::maxLength(
            $this->last_refresh_time,
            64,
            "last_refresh_time in PartnerPartnerSearchResponse must have maxlength of 64 $within"
        );
        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in PartnerPartnerSearchResponse must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['transaction_details'])) {
            $this->transaction_details = [];
            foreach ($data['transaction_details'] as $item) {
                $this->transaction_details[] = new PartnerPartnerTransactionDetail($item);
            }
        }
        if (isset($data['account_id'])) {
            $this->account_id = $data['account_id'];
        }
        if (isset($data['start_time'])) {
            $this->start_time = $data['start_time'];
        }
        if (isset($data['end_time'])) {
            $this->end_time = $data['end_time'];
        }
        if (isset($data['last_refresh_time'])) {
            $this->last_refresh_time = $data['last_refresh_time'];
        }
        if (isset($data['total_items'])) {
            $this->total_items = $data['total_items'];
        }
        if (isset($data['total_pages'])) {
            $this->total_pages = $data['total_pages'];
        }
        if (isset($data['links'])) {
            $this->links = [];
            foreach ($data['links'] as $item) {
                $this->links[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->transaction_details = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
