<?php

namespace OxidSolutionCatalysts\PayPal\Api\Tests\Integration;

use OxidSolutionCatalysts\PayPal\Api\Client;
use PHPUnit\Framework\TestCase;

class ClientAuthTest extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createClient(Client::class);
    }

    public function testAuth()
    {
        $this->assertFalse($this->client->isAuthenticated());
        $this->client->auth();
        $this->assertTrue($this->client->isAuthenticated());
    }

    public function testAuthFailing()
    {
        $client = ClientFactory::createCustomClient(
            Client::class,
            'wrongClientId',
            'wrongClientSecret',
            'wrongPayerId',
            false
        );
        $this->assertFalse($this->client->isAuthenticated());
        $this->expectExceptionCode(401);
        $client->auth();
    }

    /**
     * If the token is wrong (or expired) the client must automatically do a new auth
     * and send the request with the new token. The caller must not get any auth error.
     * @throws \Throwable
     */
    public function testReAuth()
    {
        $client = $this->client;
        $request = $client->createRequest("GET", "/v1/identity/oauth2/userinfo?schema=paypalv1.1", []);
        $wrongToken =
            'A21AAH0c6n-nvatHmXL7_jWLR7z-Wtw7X3kBgHXZhWJ-r8NKs5A88k6DW7rTpH5LjkvbIx0tnz-MwO33jGmFBO1MzO_gV9FbL';
        $t = ['access_token' => $wrongToken];
        $client->setTokenResponse($t);
        $res = $client->send($request);
        $res = json_decode($res->getBody(), true);
        $this->assertTrue(isset($res['user_id']));
    }
}
