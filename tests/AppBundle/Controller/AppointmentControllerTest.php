<?php

namespace Tests\AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AppointmentControllerTest extends WebTestCase
{
    public function testGetAppointmentsNotAuthentificated()
    {
        $client = static::createClient();

        $crawler  = $client->request('GET', '/appointments');

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