<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Boardroom;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BoardroomController extends FOSRestController
{
    public function getBoardroomsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $boardrooms = $em->getRepository("AppBundle:Boardroom")->findAll();

        $view = $this->view(['boardrooms' => $boardrooms], Response::HTTP_OK);

        return $this->handleView($view);
    }

    public function getBoardroomAction(Boardroom $boardroom)
    {
        $view = $this->view(['boardroom' => $boardroom], Response::HTTP_OK);

        return $this->handleView($view);
    }
}
