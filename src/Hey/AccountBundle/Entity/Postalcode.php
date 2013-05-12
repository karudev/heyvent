<?php

namespace Hey\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *  Hey\AccountBundle\Entity\Postalcode
 *
 * @ORM\Table(name="postalcode")
 * @ORM\Entity(repositoryClass="Hey\AccountBundle\Entity\PostalcodeRepository")
 */
class Postalcode
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="postalcode_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $cp
     *
     * @ORM\Column(name="cp", type="integer", length=5)
     */
    private $cp;

    /**
     * @var string $city
     *
     * @ORM\Column(name="city", type="string", length=128)
     */
    private $city;

    /**
     * @var string $department
     *
     * @ORM\Column(name="department", type="string", length=128)
     */
    private $department;

    /**
     * @var string $district
     *
     * @ORM\Column(name="district", type="string", length=128)
     */
    private $district;

    /**
     * @var string $country
     *
     * @ORM\Column(name="country", type="string", length=128)
     */
    private $country;



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
     * Set cp
     *
     * @param integer $cp
     * @return Postalcode
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    
        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Postalcode
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set department
     *
     * @param string $department
     * @return Postalcode
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    
        return $this;
    }

    /**
     * Get department
     *
     * @return string 
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set district
     *
     * @param string $district
     * @return Postalcode
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    
        return $this;
    }

    /**
     * Get district
     *
     * @return string 
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Postalcode
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }
}