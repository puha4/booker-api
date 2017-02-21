<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\SerializedName;
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
     * @var Employee
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employee")
     * @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
     */
    private $employee;

    /**
     * @var Boardroom
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Boardroom")
     * @ORM\JoinColumn(name="boardroom_id", referencedColumnName="id")
     */
    private $boardroom;

    /**
     * @var \DateTime
     * @SerializedName("bookedDate")
     * @ORM\Column(name="booked_date", type="datetime")
     */
    private $bookedDate;

    /**
     * @var \DateTime
     * @SerializedName("start")
     * @ORM\Column(name="booked_date_from", type="datetime")
     */
    private $bookedDateFrom;

    /**
     * @var \DateTime
     * @SerializedName("end")
     * @ORM\Column(name="booked_date_to", type="datetime")
     */
    private $bookedDateTo;

    /**
     * @ORM\Column(name="specifics", type="string")
     * @SerializedName("title")
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
     * @SerializedName("recumingType")
     */
    private $recumingType;

    /**
     * @ORM\Column(name="recuming_number", type="integer")
     * @SerializedName("recumingWeekOrMonthNumber")
     */
    private $recumingWeekOrMonthNumber;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set bookedDate
     *
     * @param \DateTime $bookedDate
     *
     * @return Appointment
     */
    public function setBookedDate($bookedDate)
    {
        $this->bookedDate = $bookedDate;

        return $this;
    }

    /**
     * Get bookedDate
     *
     * @return \DateTime
     */
    public function getBookedDate()
    {
        return $this->bookedDate;
    }

    /**
     * Set bookedDateFrom
     *
     * @param \DateTime $bookedDateFrom
     *
     * @return Appointment
     */
    public function setBookedDateFrom($bookedDateFrom)
    {
        $this->bookedDateFrom = $bookedDateFrom;

        return $this;
    }

    /**
     * Get bookedDateFrom
     *
     * @return \DateTime
     */
    public function getBookedDateFrom()
    {
        return $this->bookedDateFrom;
    }

    /**
     * Set bookedDateTo
     *
     * @param \DateTime $bookedDateTo
     *
     * @return Appointment
     */
    public function setBookedDateTo($bookedDateTo)
    {
        $this->bookedDateTo = $bookedDateTo;

        return $this;
    }

    /**
     * Get bookedDateTo
     *
     * @return \DateTime
     */
    public function getBookedDateTo()
    {
        return $this->bookedDateTo;
    }

    /**
     * Set specifics
     *
     * @param string $specifics
     *
     * @return Appointment
     */
    public function setSpecifics($specifics)
    {
        $this->specifics = $specifics;

        return $this;
    }

    /**
     * Get specifics
     *
     * @return string
     */
    public function getSpecifics()
    {
        return $this->specifics;
    }

    /**
     * Set recuming
     *
     * @param boolean $recuming
     *
     * @return Appointment
     */
    public function setRecuming($recuming)
    {
        $this->recuming = $recuming;

        return $this;
    }

    /**
     * Get recuming
     *
     * @return boolean
     */
    public function getRecuming()
    {
        return $this->recuming;
    }

    /**
     * Set recumingType
     *
     * @param integer $recumingType
     *
     * @return Appointment
     */
    public function setRecumingType($recumingType)
    {
        $this->recumingType = $recumingType;

        return $this;
    }

    /**
     * Get recumingType
     *
     * @return integer
     */
    public function getRecumingType()
    {
        return $this->recumingType;
    }

    /**
     * Set recumingWeekOrMonthNumber
     *
     * @param integer $recumingWeekOrMonthNumber
     *
     * @return Appointment
     */
    public function setRecumingWeekOrMonthNumber($recumingWeekOrMonthNumber)
    {
        $this->recumingWeekOrMonthNumber = $recumingWeekOrMonthNumber;

        return $this;
    }

    /**
     * Get recumingWeekOrMonthNumber
     *
     * @return integer
     */
    public function getRecumingWeekOrMonthNumber()
    {
        return $this->recumingWeekOrMonthNumber;
    }

    /**
     * Set employee
     *
     * @param \AppBundle\Entity\Employee $employee
     *
     * @return Appointment
     */
    public function setEmployee(\AppBundle\Entity\Employee $employee = null)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return \AppBundle\Entity\Employee
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * Set boardroom
     *
     * @param \AppBundle\Entity\Boardroom $boardroom
     *
     * @return Appointment
     */
    public function setBoardroom(\AppBundle\Entity\Boardroom $boardroom = null)
    {
        $this->boardroom = $boardroom;

        return $this;
    }

    /**
     * Get boardroom
     *
     * @return \AppBundle\Entity\Boardroom
     */
    public function getBoardroom()
    {
        return $this->boardroom;
    }
}
