<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * An uploaded document as a binary object that supports a dispute.
 *
 * generated from: response-document.json
 */
class ResponseDocument implements JsonSerializable
{
    use BaseModel;

    /**
     * The document name.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $name;

    /**
     * The downloadable URL for the document for which the client has
     * access.<br/><br/><blockquote><strong>Note:</strong> Document download may require some configuration setup and
     * available as a limited release at this time. For more information, reach out to your PayPal account
     * manager.</blockquote>.
     *
     * @var string | null
     */
    public $url;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength(
            $this->name,
            1,
            "name in ResponseDocument must have minlength of 1 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            2000,
            "name in ResponseDocument must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
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
