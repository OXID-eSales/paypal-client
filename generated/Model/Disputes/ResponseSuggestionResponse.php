<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Arrays of auto-complete and DidYouMean values. Includes links that enable you to navigate through the
 * response.
 *
 * generated from: response-suggestion_response.json
 */
class ResponseSuggestionResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of auto complete values for the given search_text if present.
     *
     * @var string[]
     * maxItems: 1
     * maxItems: 10
     */
    public $suggestions;

    /**
     * The possible DidYouMean value if there are no suggestions for given search_text.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $corrected_search_text;

    /**
     * An array of request-related [HATEOAS links](/docs/api/hateoas-links/).
     *
     * @var array
     * maxItems: 1
     * maxItems: 10
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->suggestions, "suggestions in ResponseSuggestionResponse must not be NULL $within");
        Assert::minCount(
            $this->suggestions,
            1,
            "suggestions in ResponseSuggestionResponse must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->suggestions,
            10,
            "suggestions in ResponseSuggestionResponse must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->suggestions,
            "suggestions in ResponseSuggestionResponse must be array $within"
        );
        !isset($this->corrected_search_text) || Assert::minLength(
            $this->corrected_search_text,
            1,
            "corrected_search_text in ResponseSuggestionResponse must have minlength of 1 $within"
        );
        !isset($this->corrected_search_text) || Assert::maxLength(
            $this->corrected_search_text,
            255,
            "corrected_search_text in ResponseSuggestionResponse must have maxlength of 255 $within"
        );
        Assert::notNull($this->links, "links in ResponseSuggestionResponse must not be NULL $within");
        Assert::minCount(
            $this->links,
            1,
            "links in ResponseSuggestionResponse must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->links,
            10,
            "links in ResponseSuggestionResponse must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->links,
            "links in ResponseSuggestionResponse must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['suggestions'])) {
            $this->suggestions = [];
            foreach ($data['suggestions'] as $item) {
                $this->suggestions[] = $item;
            }
        }
        if (isset($data['corrected_search_text'])) {
            $this->corrected_search_text = $data['corrected_search_text'];
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
        $this->suggestions = [];
        $this->links = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
