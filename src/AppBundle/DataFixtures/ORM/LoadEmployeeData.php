<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Employee;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadEmployeeData implements FixtureInterface, OrderedFixtureInterface
{
    /** @var ObjectManager */
    private $manager;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $this->addEmployee("Konstantin", "konstantin@mail.com");
        $this->addEmployee("Vitalii", "vitalii@mail.com");
        $this->addEmployee("Vladimir", "vladimir@mail.com");

        $this->manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * @param $firstname
     * @param $email
     */
    private function addEmployee($firstname, $email)
    {
        $employee = new Employee();
        $employee->setFirstName($firstname);
        $employee->setEmail($email);

        $this->manager->persist($employee);
    }
}