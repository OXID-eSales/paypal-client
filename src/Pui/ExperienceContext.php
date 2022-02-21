<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */


declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPalApi\Pui;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;


class ExperienceContext implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $locale;

    /** @var string */
    public $brand_name;

    /** @var string */
    public $logo_url;

    /** @var array  */
    public $customer_service_instructions = [];

}