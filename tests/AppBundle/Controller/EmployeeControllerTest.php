<?php

namespace Tests\AppBundle\Controller;

use Tests\AppBundle\TestCase;

class EmployeeControllerTest extends TestCase
{
    public function testGetEmployees()
    {
        $client = self::$client;

        $crawler  = $client->request('GET', '/employees');

        $response = $client->getResponse();

        $this->assertJsonResponse($response, 200);
    }

    public function testGetExistEmployee()
    {
        $client = self::$client;

        $crawler  = $client->request('GET', '/employees/1');

        $response = $client->getResponse();

        $this->assertJsonResponse($response, 200);
    }

    public function testGetNotExistEmployee()
    {
        $client = self::$client;

        $crawler  = $client->request('GET', '/employees/10');

        $response = $client->getResponse();

        $this->assertJsonResponse($response, 404);
    }
}