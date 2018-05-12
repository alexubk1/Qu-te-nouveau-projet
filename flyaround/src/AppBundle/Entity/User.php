<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
{
    public function __toString(){
        //return the Site Object with [FIRSTNAME] [LASTNAME]" format, when __ toString is called.
        return $this->firstName . " - " . $this->lastName;
    }


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=32)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=32)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=32)
     */
    private $phoneNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="date")
     */
    private $birthDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="smallint")
     */
    private $note;

    /**
     * @var bool
     *
     * @ORM\Column(name="isACertifiedPilot", type="boolean")
     */
    private $isACertifiedPilot;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Review", inversedBy="reviewAuthor")
     */
    private $reviewAuthors;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Flight", inversedBy="pilot")
     */
    private $pilots;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Reservation", inversedBy="passenger")
     */
    private $passengers;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName.
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName.
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phoneNumber.
     *
     * @param string $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber.
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set birthDate.
     *
     * @param \DateTime $birthDate
     *
     * @return User
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate.
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set creationDate.
     *
     * @param \DateTime $creationDate
     *
     * @return User
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate.
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set note.
     *
     * @param int $note
     *
     * @return User
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note.
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set isACertifiedPilot.
     *
     * @param bool $isACertifiedPilot
     *
     * @return User
     */
    public function setIsACertifiedPilot($isACertifiedPilot)
    {
        $this->isACertifiedPilot = $isACertifiedPilot;

        return $this;
    }

    /**
     * Get isACertifiedPilot.
     *
     * @return bool
     */
    public function getIsACertifiedPilot()
    {
        return $this->isACertifiedPilot;
    }

    /**
     * Set reviewAuthors.
     *
     * @param \AppBundle\Entity\User|null $reviewAuthors
     *
     * @return User
     */
    public function setReviewAuthors(\AppBundle\Entity\User $reviewAuthors = null)
    {
        $this->reviewAuthors = $reviewAuthors;

        return $this;
    }

    /**
     * Get reviewAuthors.
     *
     * @return \AppBundle\Entity\User|null
     */
    public function getReviewAuthors()
    {
        return $this->reviewAuthors;
    }

    /**
     * Set pilots.
     *
     * @param \AppBundle\Entity\Flight|null $pilots
     *
     * @return User
     */
    public function setPilots(\AppBundle\Entity\Flight $pilots = null)
    {
        $this->pilots = $pilots;

        return $this;
    }

    /**
     * Get pilots.
     *
     * @return \AppBundle\Entity\Flight|null
     */
    public function getPilots()
    {
        return $this->pilots;
    }

    /**
     * Set passengers.
     *
     * @param \AppBundle\Entity\Reservation|null $passengers
     *
     * @return User
     */
    public function setPassengers(\AppBundle\Entity\Reservation $passengers = null)
    {
        $this->passengers = $passengers;

        return $this;
    }

    /**
     * Get passengers.
     *
     * @return \AppBundle\Entity\Reservation|null
     */
    public function getPassengers()
    {
        return $this->passengers;
    }
}