<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * City
 *
 * @ORM\Table(name="city")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CityRepository")
 * @UniqueEntity(
 *     fields={"name"},
 *     message="This city is already exist"
 * )
 */
class City
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="cities", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    private $region;

    /**
     * @ORM\OneToMany(targetEntity="Sector", mappedBy="city", cascade={"persist","remove"})
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $sectors;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="sector", cascade={"persist"})
     */
    private $users;

    public function __construct()
    {
        $this->users   = new ArrayCollection();
        $this->sectors = new ArrayCollection();
    }
    

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
     * Set name
     *
     * @param string $name
     *
     * @return City
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set region
     *
     * @param \AppBundle\Entity\Region $region
     *
     * @return City
     */
    public function setRegion(\AppBundle\Entity\Region $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \AppBundle\Entity\Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Add sector
     *
     * @param \AppBundle\Entity\Sector $sector
     *
     * @return City
     */
    public function addSector(\AppBundle\Entity\Sector $sector)
    {
        $this->sectors[] = $sector;

        return $this;
    }

    /**
     * Remove sector
     *
     * @param \AppBundle\Entity\Sector $sector
     */
    public function removeSector(\AppBundle\Entity\Sector $sector)
    {
        $this->sectors->removeElement($sector);
    }

    /**
     * Get sectors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSectors()
    {
        return $this->sectors;
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return City
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
