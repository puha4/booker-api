<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Employee;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends FOSRestController
{
    public function getEmployeeAction(Employee $employee)
    {
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

    public function postEmployeesAction(Request $request)
    {
        $employee = new Employee();
        $form = $this->createForm('AppBundle\Form\EmployeeType', $employee);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($employee);
            $em->flush();

            $view = $this->view(['employee' => $employee], Response::HTTP_CREATED);

            return $this->handleView($view);
        }

        $view = $this->view($form);

        return $this->handleView($view);
    }

    public function putEmployeesAction(Request $request, Employee $employee)
    {
        $form = $this->createForm('AppBundle\Form\EmployeeType', $employee, ['method' => 'PUT']);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($employee);
            $em->flush();

            $view = $this->view(['employee' => $employee], Response::HTTP_CREATED);

            return $this->handleView($view);
        }

        $view = $this->view($form);

        return $this->handleView($view);
    }

    public function deleteEmployeesAction(Employee $employee)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($employee);
        $em->flush();

        $view = $this->view(['deleted' => true], Response::HTTP_OK);

        return $this->handleView($view);
    }
}
