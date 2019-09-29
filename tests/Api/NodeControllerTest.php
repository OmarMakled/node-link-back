<?php

namespace App\Tests\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NodeControllerTest extends WebTestCase
{
    public function testValidationException()
    {
        $client = static::createClient();
        $client->request('POST', '/');

        $this->assertEquals(422, $client->getResponse()->getStatusCode());
    }

    public function testGet()
    {
        $client = static::createClient();
        $client->request('Get', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
