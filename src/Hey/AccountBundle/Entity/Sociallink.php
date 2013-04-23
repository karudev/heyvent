<?php

namespace Hey\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sociallink
 *
 * @ORM\Table(name="Sociallink")
 * @ORM\Entity(repositoryClass="Hey\AccountBundle\Entity\SociallinkRepository")
 */
class Sociallink
{
    /**
     * @var integer
     *
     * @ORM\Column(name="sociallink_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128)
     */
    protected $name;


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
     * @return Sociallink
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
}