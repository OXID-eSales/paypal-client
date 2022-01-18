<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Catalog;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details for a product in the collection response.
 *
 * generated from: product_collection_element.json
 */
class ProductCollectionElement implements JsonSerializable
{
    use BaseModel;

    /**
     * The ID of the product.
     *
     * @var string | null
     * minLength: 6
     * maxLength: 50
     */
    public $id;

    /**
     * The product name.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $name;

    /**
     * The product description.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 256
     */
    public $description;

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
     * An array of request-related [HATEOAS links](/docs/api/overview/#hateoas-links).
     *
     * @var array | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            6,
            "id in ProductCollectionElement must have minlength of 6 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            50,
            "id in ProductCollectionElement must have maxlength of 50 $within"
        );
        !isset($this->name) || Assert::minLength(
            $this->name,
            1,
            "name in ProductCollectionElement must have minlength of 1 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            127,
            "name in ProductCollectionElement must have maxlength of 127 $within"
        );
        !isset($this->description) || Assert::minLength(
            $this->description,
            1,
            "description in ProductCollectionElement must have minlength of 1 $within"
        );
        !isset($this->description) || Assert::maxLength(
            $this->description,
            256,
            "description in ProductCollectionElement must have maxlength of 256 $within"
        );
        !isset($this->create_time) || Assert::minLength(
            $this->create_time,
            20,
            "create_time in ProductCollectionElement must have minlength of 20 $within"
        );
        !isset($this->create_time) || Assert::maxLength(
            $this->create_time,
            64,
            "create_time in ProductCollectionElement must have maxlength of 64 $within"
        );
        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in ProductCollectionElement must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['description'])) {
            $this->description = $data['description'];
        }
        if (isset($data['create_time'])) {
            $this->create_time = $data['create_time'];
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
