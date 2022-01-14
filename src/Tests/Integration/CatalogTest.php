<?php

namespace OxidSolutionCatalysts\PayPal\Api\Tests\Integration;

use OxidSolutionCatalysts\PayPal\Api\Client;
use OxidSolutionCatalysts\PayPal\Api\Exception\ApiException;
use OxidSolutionCatalysts\PayPal\Api\Model\Catalog\Patch;
use OxidSolutionCatalysts\PayPal\Api\Model\Catalog\ProductRequestPOST;
use OxidSolutionCatalysts\PayPal\Api\Service\Catalog;
use PHPUnit\Framework\TestCase;

class CatalogTest extends TestCase
{
    /**
     * @var Catalog
     */
    private $catalogUnderTest;

    public function setUp()
    {
        parent::setUp();
        $client = ClientFactory::createClient(Client::class);
        $this->catalogUnderTest = new Catalog($client);
    }

    public function testPatch()
    {
        $pd = new ProductRequestPOST();
        $pd->id = "123459_" . rand(0, 1000);
        $pd->name = "foo";

        $pd->type = ProductRequestPOST::TYPE_PHYSICAL;
        $pd->description = "bla bla";
        $pd->home_url = "https://oxid.de/foo";
        $pd->validate();
        try {
            $res = $this->catalogUnderTest->createProduct($pd);
        } catch (ApiException $e) {
        }
        $res = $this->catalogUnderTest->showProductDetails($pd->id);

        $patch = new Patch();
        $patch->op = Patch::OP_REPLACE;
        $patch->path = "/description";
        $patch->value = "https://www.google.de/test.jpg";
        $patch->validate();
        $this->catalogUnderTest->updateProduct($pd->id, [$patch]);

        $res = $this->catalogUnderTest->showProductDetails($pd->id);
        $this->assertEquals("https://www.google.de/test.jpg", $res->description);
    }

    public function testCreateProduct()
    {
        $pd = new ProductRequestPOST();
        $pd->id = "123456_" . rand(0, 1000);
        $pd->name = "foo";

        $pd->type = ProductRequestPOST::TYPE_PHYSICAL;
        $pd->description = "bla bla";
        $pd->home_url = "https://oxid.de/foo";
        //$pd->image_url = "";

        $pd->validate();

        $res = $this->catalogUnderTest->createProduct($pd);
        $this->assertEquals($pd->id, $res->id);
        $this->assertEquals($pd->name, $res->name);
    }

    public function testGetProducts()
    {
        $res = $this->catalogUnderTest->listProducts(true);
        $this->assertGreaterThan(-1, $res->total_items);
    }
}
