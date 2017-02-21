<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Employee;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends FOSRestController
{
    public function getEmployeeAction(Employee $employee)
    {
        if (!$employee) {
            // throw
        }

        $view = $this->view(['employee' => $employee], Response::HTTP_OK);

        return $this->handleView($view);
    }

    public function getEmployeesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $employees = $em->getRepository("AppBundle:Employee")->findAll();

        $view = $this->view(['employees' => $employees], Response::HTTP_OK);

        return $this->handleView($view);
    }
}
