<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="appointments")
 */
class Appointment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="specifics", type="string")
     */
    private $specifics;

    /**
     * @var boolean
     *
     * @ORM\Column(name="recuming", type="boolean", options={"default" = false})
     */
    private $recuming;


    /**
     * @ORM\Column(name="recuming_type", type="integer")
     * @Assert\Choice(choices="{
     *     1,2,3
     * }")
     */
    private $recumingType;

    /**
     * @ORM\Column(name="recuming_number", type="integer")
     */
    private $recumingWeekOrMonthNumber;
}