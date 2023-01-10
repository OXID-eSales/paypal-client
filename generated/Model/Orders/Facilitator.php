<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Facilitator involved in the Payment. Usually the API caller. Example: AliExpress, facebook, eBay.
 *
 * generated from: model-facilitator.json
 */
class Facilitator extends Participant implements JsonSerializable
{
    use BaseModel;

    /** A party who sets up the context and eventually owns or controls the payment. */
    const TYPE_API_CALLER = 'API_CALLER';

    /** A checkout participant involved in the transaction who is setup as a partner. */
    const TYPE_PARTNER = 'PARTNER';

    /** Internal applications or actors. */
    const TYPE_INTERNAL = 'INTERNAL';

    /**
     * Facilitator type.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_API_CALLER
     * @see TYPE_PARTNER
     * @see TYPE_INTERNAL
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    /**
     * OAuth 2.0 client_id of the facilitator app.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 128
     */
    public $client_id;

    /**
     * A String Integration Identifier to identify a partner in the ecosystem.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $integration_identifier;

    /**
     * List of (business)segments the actor operates in.
     *
     * @var string[]
     * maxItems: 1
     * maxItems: 50
     */
    public $segments;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in Facilitator must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            255,
            "type in Facilitator must have maxlength of 255 $within"
        );
        !isset($this->client_id) || Assert::minLength(
            $this->client_id,
            1,
            "client_id in Facilitator must have minlength of 1 $within"
        );
        !isset($this->client_id) || Assert::maxLength(
            $this->client_id,
            128,
            "client_id in Facilitator must have maxlength of 128 $within"
        );
        !isset($this->integration_identifier) || Assert::minLength(
            $this->integration_identifier,
            1,
            "integration_identifier in Facilitator must have minlength of 1 $within"
        );
        !isset($this->integration_identifier) || Assert::maxLength(
            $this->integration_identifier,
            127,
            "integration_identifier in Facilitator must have maxlength of 127 $within"
        );
        Assert::notNull($this->segments, "segments in Facilitator must not be NULL $within");
        Assert::minCount(
            $this->segments,
            1,
            "segments in Facilitator must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->segments,
            50,
            "segments in Facilitator must have max. count of 50 $within"
        );
        Assert::isArray(
            $this->segments,
            "segments in Facilitator must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['client_id'])) {
            $this->client_id = $data['client_id'];
        }
        if (isset($data['integration_identifier'])) {
            $this->integration_identifier = $data['integration_identifier'];
        }
        if (isset($data['segments'])) {
            $this->segments = [];
            foreach ($data['segments'] as $item) {
                $this->segments[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        $this->segments = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
