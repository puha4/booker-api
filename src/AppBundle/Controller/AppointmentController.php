<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Boardroom;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

class AppointmentController extends FOSRestController
{
    public function getAppointmentsAction(Boardroom $boardroom)
    {
        if (!$boardroom) {
            // throw
        }

        $em = $this->getDoctrine()->getManager();
        $appointments = $em->getRepository("AppBundle:Appointment")->findBy(['boardroom' => $boardroom]);

        $view = $this->view(['appointments' => $appointments], Response::HTTP_OK);

        return $this->handleView($view);
    }
}