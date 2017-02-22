<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Appointment;
use AppBundle\Entity\Boardroom;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcher;
use Symfony\Component\HttpFoundation\Request;
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

    public function postAppointmentsAction(Request $request)
    {
        $appointment = new Appointment();
        $form = $this->createForm('AppBundle\Form\AppointmentType', $appointment);

        $form->handleRequest($request);
print_r($appointment);
        $this->get('logger')->info($appointment);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($appointment);
            $em->flush();

            $view = $this->view(['appointment' => $appointment], Response::HTTP_CREATED);

            return $this->handleView($view);
        }

        $view = $this->view($form);

        return $this->handleView($view);
    }
}