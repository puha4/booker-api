<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BoardroomControllerTest extends WebTestCase
{
    public function testGetBoardroomsNotAuthentificated()
    {
        $client = static::createClient();

        $crawler  = $client->request('GET', '/boardrooms');

        $response = $client->getResponse();

        $this->assertJsonResponse($response, 401);
    }

    protected function assertJsonResponse($response, $statusCode = 200)
    {
        $this->assertEquals(
            $statusCode, $response->getStatusCode(),
            $response->getContent()
        );
        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
    }
}