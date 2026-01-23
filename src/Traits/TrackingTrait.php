<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPalApi\Traits;

trait TrackingTrait
{
    private string $trackingId = '';

    public function getTrackingId(): string
    {
        return $this->trackingId;
    }

    public function setTrackingId(string $trackingId): void
    {
        $this->trackingId = $trackingId;
    }

    public function log($level, $message, array $context = array(), $isResponse = false)
    {
        $logger = method_exists($this, 'getLogger') ? $this->getLogger() : null;
        if (null === $logger) {
            return;
        }
        $debugLevel = $this->client->getDebugLevel();
        $trackingId = $this->getTrackingId();

        $messagePrefix = $isResponse ? 'RES | ' : 'REQ | ';
        $messagePrefix .= empty($trackingId) ? '' : $trackingId . ' | ';
        $tokenizedMessage = $messagePrefix . $message;
        if ($debugLevel === 'debug' || $debugLevel === $level) {
            $logger->log($level, $tokenizedMessage, $context);
        }
    }
}
