<?php

/**
 * This file is part of OXID eSales Paypal module.
 *
 * OXID eSales Paypal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales Paypal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales Paypal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */

namespace OxidSolutionCatalysts\PayPalApi\Service;

use OxidSolutionCatalysts\PayPalApi\Client;
use OxidSolutionCatalysts\PayPalApi\Exception\ApiException;
use OxidSolutionCatalysts\PayPalApi\Model\Payments\Authorization;

class GenericService extends BaseService
{
    /**
     * Headers that are automatically appended for requests
     *
     * @var array
     */
    private $headers;

    /**
     * Request path
     *
     * @var string|null
     */
    private $path;

    /**
     * GenericService constructor.
     *
     * @param Client $client
     * @param array|null $headers
     * @param string|null $path
     */
    public function __construct(Client $client, string $path = null, array $headers = null)
    {
        $this->headers = $headers ?? [];
        $this->path = $path ?? null;

        parent::__construct($client);
    }

    /**
     * @param $method
     * @param array $params
     * @param array|null $body
     *
     * @param array $headers
     *
     * @return array
     * @throws ApiException
     */
    public function request($method, $body = null, $params = [], $headers = []): array
    {
        $requestHeaders = $this->headers;
        $requestHeaders['Content-Type'] = 'application/json';
        $requestHeaders = array_merge($requestHeaders, $headers);

        $body = $body == null ?: json_encode($body);

        $response = $this->send($method, $this->path, $params, $requestHeaders, $body);

        return json_decode($response->getBody(), true);
    }
}
