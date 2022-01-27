<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * This object will hold apple pay payment context information.
 *
 * generated from: apple_pay_details.json
 */
class ApplePayDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * Merchant domain registered in apple pay for PayPal Apple Pay web integration.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 253
     */
    public $domain_name;

    /**
     * This name will be displayed when the ApplePay pay sheet is rendered.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 64
     */
    public $display_name;

    /**
     * This validation url was return after creating apple pay session.
     *
     * @var string
     * minLength: 1
     * maxLength: 4000
     */
    public $validation_url;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->domain_name) || Assert::minLength(
            $this->domain_name,
            1,
            "domain_name in ApplePayDetails must have minlength of 1 $within"
        );
        !isset($this->domain_name) || Assert::maxLength(
            $this->domain_name,
            253,
            "domain_name in ApplePayDetails must have maxlength of 253 $within"
        );
        !isset($this->display_name) || Assert::minLength(
            $this->display_name,
            1,
            "display_name in ApplePayDetails must have minlength of 1 $within"
        );
        !isset($this->display_name) || Assert::maxLength(
            $this->display_name,
            64,
            "display_name in ApplePayDetails must have maxlength of 64 $within"
        );
        Assert::notNull($this->validation_url, "validation_url in ApplePayDetails must not be NULL $within");
        Assert::minLength(
            $this->validation_url,
            1,
            "validation_url in ApplePayDetails must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->validation_url,
            4000,
            "validation_url in ApplePayDetails must have maxlength of 4000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['domain_name'])) {
            $this->domain_name = $data['domain_name'];
        }
        if (isset($data['display_name'])) {
            $this->display_name = $data['display_name'];
        }
        if (isset($data['validation_url'])) {
            $this->validation_url = $data['validation_url'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
