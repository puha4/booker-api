<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Boardroom;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadBoardroomData implements FixtureInterface, OrderedFixtureInterface
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

        $this->addBoardroom("Boardroom 1");
        $this->addBoardroom("Boardroom 2");
        $this->addBoardroom("Boardroom 3");

        $this->manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }

    /**
     * @param $title
     */
    private function addBoardroom($title)
    {
        $Boardroom = new Boardroom();
        $Boardroom->setTitle($title);

        $this->manager->persist($Boardroom);
    }
}