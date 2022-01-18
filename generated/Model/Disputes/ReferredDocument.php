<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The tracking document details.
 *
 * generated from: referred-document.json
 */
class ReferredDocument implements JsonSerializable
{
    use BaseModel;

    /**
     * The tracking document ID.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * The tracking document name.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $name;

    /**
     * The tracking document description.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $description;

    /**
     * The tracking document URI.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $url;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            1,
            "id in ReferredDocument must have minlength of 1 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            255,
            "id in ReferredDocument must have maxlength of 255 $within"
        );
        !isset($this->name) || Assert::minLength(
            $this->name,
            1,
            "name in ReferredDocument must have minlength of 1 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            255,
            "name in ReferredDocument must have maxlength of 255 $within"
        );
        !isset($this->description) || Assert::minLength(
            $this->description,
            1,
            "description in ReferredDocument must have minlength of 1 $within"
        );
        !isset($this->description) || Assert::maxLength(
            $this->description,
            2000,
            "description in ReferredDocument must have maxlength of 2000 $within"
        );
        !isset($this->url) || Assert::minLength(
            $this->url,
            1,
            "url in ReferredDocument must have minlength of 1 $within"
        );
        !isset($this->url) || Assert::maxLength(
            $this->url,
            2000,
            "url in ReferredDocument must have maxlength of 2000 $within"
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
        if (isset($data['url'])) {
            $this->url = $data['url'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
