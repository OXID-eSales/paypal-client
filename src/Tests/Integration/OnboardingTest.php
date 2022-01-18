<?php

namespace OxidSolutionCatalysts\PayPalApi\Tests\Integration;

use OxidSolutionCatalysts\PayPalApi\Onboarding;
use PHPUnit\Framework\TestCase;

class OnboardingTest extends TestCase
{
    /**
     * @var Onboarding
     */
    private $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createClient(Onboarding::class);
    }

/*
    public function testGetCredentials()
    {
        $nonce = "2fa6adc6527ed9d2889e4096f11ebb4598ccc604371010b129cc7a9b40e9e3e61b1c7961ee384196cafe";
        $authCode = "C21AAFPEjZ4u0-mDhkWwjGgZPYfoyvkdZSu78u0tdPcWKeAAxI8394Nm2ylawYojazmDbxa1V8_SGMwXmdsx-ha8JOh7fK9LQ";
        $sharedId = "AZin-OJCArjesnPdnin_qaM-CsFkbVDimXC0vdvzP00fAz0ut1orNMCr94k-vdGZ7rK8M1c4JSLo03_Q";
        $this->client->authAfterWebLogin($authCode, $sharedId, $nonce);
    } */
}
