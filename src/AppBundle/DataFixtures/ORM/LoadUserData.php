<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData implements FixtureInterface, OrderedFixtureInterface
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

        $this->addUser("admin", "admin@mail.com", "admin");

        $this->manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }

    /**
     * @param $username
     * @param $email
     * @param $password
     */
    private function addUser($username, $email, $password)
    {
        $user = new User();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setEmailCanonical($email);
        $user->setPlainPassword($password);
        $user->setEnabled(true);

        $this->manager->persist($user);
    }
}