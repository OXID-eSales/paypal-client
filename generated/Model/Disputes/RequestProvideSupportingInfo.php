<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The provide supporting information request details.
 *
 * generated from: request-provide_supporting_info.json
 */
class RequestProvideSupportingInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * The notes that describe the defense.
     *
     * @var string
     * minLength: 1
     * maxLength: 2000
     */
    public $notes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->notes, "notes in RequestProvideSupportingInfo must not be NULL $within");
        Assert::minLength(
            $this->notes,
            1,
            "notes in RequestProvideSupportingInfo must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->notes,
            2000,
            "notes in RequestProvideSupportingInfo must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['notes'])) {
            $this->notes = $data['notes'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
