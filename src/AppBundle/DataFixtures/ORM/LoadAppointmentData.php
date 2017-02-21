<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Appointment;
use AppBundle\Entity\Boardroom;
use AppBundle\Entity\Employee;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAppointmentData implements FixtureInterface, OrderedFixtureInterface
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

        $boardrooms = $this->manager->getRepository('AppBundle:Boardroom')->findAll();
        $employees = $this->manager->getRepository('AppBundle:Employee')->findAll();

        foreach ($boardrooms as $boardroom) {
            foreach ($employees as $employee) {
                $this->addAppointment($boardroom, $employee);
            }
        }

        $this->manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 4;
    }

    /**
     * @param Boardroom $boardroom
     * @param Employee $employee
     */
    private function addAppointment(Boardroom $boardroom, Employee $employee)
    {
        $datetime = new \DateTime();
        
        $appointment = new Appointment();

        $appointment->setBoardroom($boardroom);
        $appointment->setEmployee($employee);

        $appointment->setSpecifics("Specifics for appintment");

        $appointment->setBookedDate(new \DateTime());
        $appointment->setBookedDateFrom($datetime->modify("+1 hours"));
        $appointment->setBookedDateTo($datetime->modify("+2 hours"));

        $appointment->setRecuming(true);
        $appointment->setRecumingType(2);
        $appointment->setRecumingWeekOrMonthNumber(2);

        $this->manager->persist($appointment);
    }
}