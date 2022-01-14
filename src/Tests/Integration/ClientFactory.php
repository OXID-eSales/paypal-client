<?php

namespace OxidSolutionCatalysts\PayPal\Api\Tests\Integration;

use OxidSolutionCatalysts\PayPal\Api\Client;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

abstract class ClientFactory
{
    public static function createClient($class)
    {
        $setting = include __DIR__ . '/auth.php';
        return self::createCustomClient(
            $class,
            $setting['clientId'],
            $setting['clientSecret'],
            '',
            $setting['debug']
        );
    }

    public static function createCustomClient($class, $clientId, $clientSecret, $payerId, $debug)
    {
        assert(is_a($class, Client::class, true));
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_DEBUG);
        $logger = new ConsoleLogger($output);
        return new $class($logger, Client::SANDBOX_URL, $clientId, $clientSecret, $payerId, $debug);
    }
}
