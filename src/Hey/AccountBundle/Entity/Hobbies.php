<?php

namespace Hey\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hobbies
 *
 * @ORM\Table(name="hobbies")
 * @ORM\Entity(repositoryClass="Hey\AccountBundle\Entity\HobbiesRepository")
 */
class Hobbies
{
    /**
     * @var integer
     *
     * @ORM\Column(name="hobbies_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
   
    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="Hobbies")
     * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id_categorie")
     */
    private $categorie;


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
     * @return Hobbies
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
     * Set categorie
     *
     * @param \Hey\AccountBundle\Entity\Categorie $categorie
     * @return Hobbies
     */
    public function setCategorie(\Hey\AccountBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;
    
        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Hey\AccountBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}