<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceRepository")
 */
class Service
{
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="services", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="applicant_id", referencedColumnName="id")
     */
    private $applicant;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="Price", cascade={"persist"})
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefrom", type="datetime")
     */
    private $datefrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateto", type="datetime")
     */
    private $dateto;

    /**
     * @var bool
     *
     * @ORM\Column(name="valid", type="boolean")
     */
    private $valid = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="validon", type="datetime", nullable=true)
     */
    private $validon;

    /**
     * @ORM\OneToOne(targetEntity="Offer", cascade={"persist", "remove"})
     */
    private $offer;    


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
     * Set title
     *
     * @param string $title
     *
     * @return Service
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Service
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set datefrom
     *
     * @param \DateTime $datefrom
     *
     * @return Service
     */
    public function setDatefrom($datefrom)
    {
        $this->datefrom = $datefrom;

        return $this;
    }

    /**
     * Get datefrom
     *
     * @return \DateTime
     */
    public function getDatefrom()
    {
        return $this->datefrom;
    }

    /**
     * Set dateto
     *
     * @param \DateTime $dateto
     *
     * @return Service
     */
    public function setDateto($dateto)
    {
        $this->dateto = $dateto;

        return $this;
    }

    /**
     * Get dateto
     *
     * @return \DateTime
     */
    public function getDateto()
    {
        return $this->dateto;
    }

    /**
     * Set valid
     *
     * @param boolean $valid
     *
     * @return Service
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * Get valid
     *
     * @return boolean
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set validon
     *
     * @param \DateTime $validon
     *
     * @return Service
     */
    public function setValidon($validon)
    {
        $this->validon = $validon;

        return $this;
    }

    /**
     * Get validon
     *
     * @return \DateTime
     */
    public function getValidon()
    {
        return $this->validon;
    }

    /**
     * Set applicant
     *
     * @param \AppBundle\Entity\User $applicant
     *
     * @return Service
     */
    public function setApplicant(\AppBundle\Entity\User $applicant = null)
    {
        $this->applicant = $applicant;

        return $this;
    }

    /**
     * Get applicant
     *
     * @return \AppBundle\Entity\User
     */
    public function getApplicant()
    {
        return $this->applicant;
    }

    /**
     * Set price
     *
     * @param \AppBundle\Entity\Price $price
     *
     * @return Service
     */
    public function setPrice(\AppBundle\Entity\Price $price = null)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return \AppBundle\Entity\Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set offer
     *
     * @param \AppBundle\Entity\Offer $offer
     *
     * @return Service
     */
    public function setOffer(\AppBundle\Entity\Offer $offer = null)
    {
        $this->offer = $offer;

        return $this;
    }

    /**
     * Get offer
     *
     * @return \AppBundle\Entity\Offer
     */
    public function getOffer()
    {
        return $this->offer;
    }
}
