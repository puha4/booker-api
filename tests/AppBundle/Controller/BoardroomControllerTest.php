<?php

namespace Tests\AppBundle\Controller;

use Tests\AppBundle\TestCase;

class BoardroomControllerTest extends TestCase
{
    public function testGetBoardrooms()
    {
        $client = self::$client;

        $crawler  = $client->request('GET', '/boardrooms');

        $response = $client->getResponse();

        $this->assertJsonResponse($response, 200);
    }

}