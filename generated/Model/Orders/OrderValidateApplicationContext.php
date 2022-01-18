<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Customizes the payer experience during the approval process for the payment with
 * PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code>
 * and <code>shipping_preference</code> during partner account setup, which overrides the request
 * values.</blockquote>
 *
 * generated from: order_validate_application_context.json
 */
class OrderValidateApplicationContext implements JsonSerializable
{
    use BaseModel;

    /**
     * Signals to vault the payment source upon successful validation. The payment source is vaulted upon successful
     * capture when INTENT=SALE and authorization when INTENT=AUTHORIZE.
     *
     * @var boolean | null
     */
    public $vault = false;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    private function map(array $data)
    {
        if (isset($data['vault'])) {
            $this->vault = $data['vault'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
