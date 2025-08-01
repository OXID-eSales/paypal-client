<?php

namespace OxidSolutionCatalysts\PayPalApi\Service;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

/**
 * Service class for creating and configuring Monolog logger instances
 */
class LoggerService
{
    /**
     * Create a new Monolog logger instance with default configuration
     *
     * @param string $name The name of the logger
     * @param string $logFile The path to the log file
     * @param int $logLevel The minimum logging level (default: Logger::DEBUG)
     * @return LoggerInterface
     * @throws \Exception
     */
    public function createLogger(string $name, string $logFile, int $logLevel = Logger::DEBUG): LoggerInterface
    {
        $logger = new Logger($name);
        $logger->pushHandler(new StreamHandler($logFile, $logLevel));
        
        return $logger;
    }
    
    /**
     * Create a new Monolog logger instance with custom handlers
     *
     * @param string $name The name of the logger
     * @param array $handlers An array of Monolog handlers
     * @return LoggerInterface
     */
    public function createLoggerWithHandlers(string $name, array $handlers): LoggerInterface
    {
        $logger = new Logger($name);
        
        foreach ($handlers as $handler) {
            $logger->pushHandler($handler);
        }
        
        return $logger;
    }
}