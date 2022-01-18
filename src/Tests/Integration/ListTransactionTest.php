<?php

namespace OxidSolutionCatalysts\PayPalApi\Tests\Integration;

use OxidSolutionCatalysts\PayPalApi\Client;
use OxidSolutionCatalysts\PayPalApi\Service\TransactionSearch;
use PHPUnit\Framework\TestCase;

class ListTransactionTest extends TestCase
{
    /**
     * @var TransactionSearch
     */
    private $reportServiceUnderTest;

    public function setUp()
    {
        parent::setUp();
        $client = ClientFactory::createClient(Client::class);
        $this->reportServiceUnderTest = new TransactionSearch($client);
    }

    public function testListTransaction()
    {
        $date = new \DateTime();
        $today = $date->format(\DateTime::W3C);
        $past = $date->sub(new \DateInterval("P10D"))->format(\DateTime::W3C);
        $res = $this->reportServiceUnderTest->listTransactions(
            null,
            null,
            null,
            null,
            null,
            null,
            $past,
            $today,
            null,
            0,
            10
        );
        $this->assertEquals(1, $res->page);
    }
}
