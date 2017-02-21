<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Boardroom;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

class AppointmentController extends FOSRestController
{
//    public function getAppointmentsAction(Boardroom $boardroom)
//    {
//        if (!$boardroom) {
//            // throw
//        }
//
//        $em = $this->getDoctrine()->getManager();
//        $appointments = $em->getRepository("AppBundle:Appointment")->findBy(['boardroom' => $boardroom]);
//
//        $view = $this->view(['appointments' => $appointments], Response::HTTP_OK);
//
//        return $this->handleView($view);
//    }

    /**
     * @QueryParam(name="boardroom", requirements="\d+", nullable=true)
     */
    public function getAppointmentsAction($boardroom)
    {
//        if (!$boardroom) {
//            // throw
//        }

die($boardroom);
        $em = $this->getDoctrine()->getManager();
        $appointments = $em->getRepository("AppBundle:Appointment")->findAll();

        $view = $this->view(['appointments' => $appointments], Response::HTTP_OK);

        return $this->handleView($view);
    }
}