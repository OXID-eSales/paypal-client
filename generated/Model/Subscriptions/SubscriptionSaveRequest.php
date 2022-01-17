<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The save subscription request details.
 *
 * generated from: subscription_save_request.json
 */
class SubscriptionSaveRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The identifier of session for which subscription needs to be saved.
     *
     * @var string
     * minLength: 3
     * maxLength: 50
     */
    public $token_id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->token_id, "token_id in SubscriptionSaveRequest must not be NULL $within");
        Assert::minLength(
            $this->token_id,
            3,
            "token_id in SubscriptionSaveRequest must have minlength of 3 $within"
        );
        Assert::maxLength(
            $this->token_id,
            50,
            "token_id in SubscriptionSaveRequest must have maxlength of 50 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['token_id'])) {
            $this->token_id = $data['token_id'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
