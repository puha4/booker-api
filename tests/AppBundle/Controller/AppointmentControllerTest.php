<?php

namespace Tests\AppBundle\Controller;

use Tests\AppBundle\TestCase;

class AppointmentControllerTest extends TestCase
{
    public function testGetAppointments()
    {
        $client = self::$client;

        $crawler  = $client->request('GET', '/appointments');

        $response = $client->getResponse();

        $this->assertJsonResponse($response, 200);
    }

    public function testGetExistAppointment()
    {
        $client = self::$client;

        $crawler  = $client->request('GET', '/appointments/1');

        $response = $client->getResponse();

        $this->assertJsonResponse($response, 200);
    }

    public function testGetNotExistAppointment()
    {
        $client = self::$client;

        $crawler  = $client->request('GET', '/appointments/10');

        $response = $client->getResponse();

        $this->assertJsonResponse($response, 404);
    }
}