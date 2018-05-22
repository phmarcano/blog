<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase {

    private $client;

    protected function setUp() {

        parent::setUp();
        $this->client = self::createClient(['debug' => false]);
    }

    /**
     * @dataProvider urlProvider
     */
    public function testPageIsSuccessful($url) {

        $this->client->request('GET', $url);
        $this->assertTrue(in_array($this->client->getResponse()->getStatusCode(), [200,404]));
    }

    public function urlProvider() {
        yield ['/'];
        yield ['/post/1'];
    }
    
}
