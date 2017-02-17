<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Employee;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends FOSRestController
{
    public function getEmployeeAction()
    {
        $employee = new Employee();
        $employee->setFirstName("FirstName");

        $view = $this->view($employee, Response::HTTP_OK);

        return $this->handleView($view);
    }
}
