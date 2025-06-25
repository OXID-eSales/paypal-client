<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */


declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPalApi\Pui;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\PaypalWalletAttributes;

/**
 * src: https://developer.paypal.com/docs/api/orders/v2/
 *
 * "experience_context": {
 *      "payment_method_preference": "IMMEDIATE_PAYMENT_REQUIRED",
 *      "brand_name": "EXAMPLE INC",
 *      "locale": "en-US",
 *      "landing_page": "LOGIN",
 *      "shipping_preference": "SET_PROVIDED_ADDRESS",
 *      "user_action": "PAY_NOW",
 *      "return_url": "https://example.com/returnUrl",
 *      "cancel_url": "https://example.com/cancelUrl"
 * }
 *
 * */
class ExperienceContext implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $payment_method_preference;

    /** @var string */
    public $locale;

    /** @var string */
    public $landing_page;

    /** @var string */
    public $brand_name;

    /** @var string */
    public $logo_url;

    /** @var string */
    public $shipping_preference;

    /** @var string */
    public $user_action;

    /** @var string */
    public $return_url;

    /** @var string */
    public $cancel_url;

    /** @var array  */
    public $customer_service_instructions = [];

    private function map(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this), function ($value) {
            return !empty($value) || $value === 0 || $value === '0';
        });
    }
}
