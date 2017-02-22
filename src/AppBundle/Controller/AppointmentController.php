<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Boardroom;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcher;
use Symfony\Component\HttpFoundation\Response;

class AppointmentController extends FOSRestController
{
    /**
     * @QueryParam(name="boardroom",  nullable=true, description="Boardroom Id.")
     */
    public function getAppointmentsAction(ParamFetcher $paramFetcher)
    {
        $em = $this->getDoctrine()->getManager();

        $boardroomId = $paramFetcher->get('boardroom');

        if ($boardroomId) {
            $boardroom = $em->getRepository("AppBundle:Boardroom")->find($boardroomId);
            $appointments = $em->getRepository("AppBundle:Appointment")->findBy(['boardroom' => $boardroom]);
        } else {
            $appointments = $em->getRepository("AppBundle:Appointment")->findAll();
        }

        $view = $this->view(['appointments' => $appointments], Response::HTTP_OK);

        return $this->handleView($view);
    }
}