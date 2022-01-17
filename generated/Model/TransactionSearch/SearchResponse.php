<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\TransactionSearch;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The search response information.
 *
 * generated from: search_response.json
 */
class SearchResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of transaction detail objects.
     *
     * @var TransactionDetail[] | null
     */
    public $transaction_details;

    /**
     * The merchant account number.
     *
     * @var string | null
     */
    public $account_number;

    /**
     * The start date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @var string | null
     * maxLength: 25
     */
    public $start_date;

    /**
     * The end date and time or the last date when the data can be served, in [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @var string | null
     * maxLength: 25
     */
    public $end_date;

    /**
     * The date and time when the data was last refreshed, in [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @var string | null
     * maxLength: 25
     */
    public $last_refreshed_datetime;

    /**
     * A zero-relative index of transactions.
     *
     * @var int | null
     */
    public $page;

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
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     *
     * @var array | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->transaction_details) || Assert::isArray(
            $this->transaction_details,
            "transaction_details in SearchResponse must be array $within"
        );
        if (isset($this->transaction_details)) {
            foreach ($this->transaction_details as $item) {
                $item->validate(SearchResponse::class);
            }
        }
        !isset($this->start_date) || Assert::maxLength(
            $this->start_date,
            25,
            "start_date in SearchResponse must have maxlength of 25 $within"
        );
        !isset($this->end_date) || Assert::maxLength(
            $this->end_date,
            25,
            "end_date in SearchResponse must have maxlength of 25 $within"
        );
        !isset($this->last_refreshed_datetime) || Assert::maxLength(
            $this->last_refreshed_datetime,
            25,
            "last_refreshed_datetime in SearchResponse must have maxlength of 25 $within"
        );
        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in SearchResponse must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['transaction_details'])) {
            $this->transaction_details = [];
            foreach ($data['transaction_details'] as $item) {
                $this->transaction_details[] = new TransactionDetail($item);
            }
        }
        if (isset($data['account_number'])) {
            $this->account_number = $data['account_number'];
        }
        if (isset($data['start_date'])) {
            $this->start_date = $data['start_date'];
        }
        if (isset($data['end_date'])) {
            $this->end_date = $data['end_date'];
        }
        if (isset($data['last_refreshed_datetime'])) {
            $this->last_refreshed_datetime = $data['last_refreshed_datetime'];
        }
        if (isset($data['page'])) {
            $this->page = $data['page'];
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
        if (isset($data)) {
            $this->map($data);
        }
    }
}
