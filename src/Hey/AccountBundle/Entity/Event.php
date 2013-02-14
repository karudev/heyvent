<?php

namespace Hey\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Hey\AccountBundle\Entity\EventRepository")
 */
class Event
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_created", type="bigint")
     */
    private $date_created;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_last_modified", type="bigint")
     */
    private $date_last_modified;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_owner", type="integer")
     */
    private $id_owner;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_modified", type="integer")
     */
    private $id_modified;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_begin", type="bigint")
     */
    private $date_begin;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_end", type="bigint")
     */
    private $date_end;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_private", type="boolean")
     */
    private $is_private;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $is_active;


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
     * Set date_created
     *
     * @param integer $dateCreated
     * @return Event
     */
    public function setDateCreated($dateCreated)
    {
        $this->date_created = $dateCreated;
    
        return $this;
    }

    /**
     * Get date_created
     *
     * @return integer 
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Set date_last_modified
     *
     * @param integer $dateLastModified
     * @return Event
     */
    public function setDateLastModified($dateLastModified)
    {
        $this->date_last_modified = $dateLastModified;
    
        return $this;
    }

    /**
     * Get date_last_modified
     *
     * @return integer 
     */
    public function getDateLastModified()
    {
        return $this->date_last_modified;
    }

    /**
     * Set id_owner
     *
     * @param integer $idOwner
     * @return Event
     */
    public function setIdOwner($idOwner)
    {
        $this->id_owner = $idOwner;
    
        return $this;
    }

    /**
     * Get id_owner
     *
     * @return integer 
     */
    public function getIdOwner()
    {
        return $this->id_owner;
    }

    /**
     * Set id_modified
     *
     * @param integer $idModified
     * @return Event
     */
    public function setIdModified($idModified)
    {
        $this->id_modified = $idModified;
    
        return $this;
    }

    /**
     * Get id_modified
     *
     * @return integer 
     */
    public function getIdModified()
    {
        return $this->id_modified;
    }

    /**
     * Set date_begin
     *
     * @param integer $dateBegin
     * @return Event
     */
    public function setDateBegin($dateBegin)
    {
        $this->date_begin = $dateBegin;
    
        return $this;
    }

    /**
     * Get date_begin
     *
     * @return integer 
     */
    public function getDateBegin()
    {
        return $this->date_begin;
    }

    /**
     * Set date_end
     *
     * @param integer $dateEnd
     * @return Event
     */
    public function setDateEnd($dateEnd)
    {
        $this->date_end = $dateEnd;
    
        return $this;
    }

    /**
     * Get date_end
     *
     * @return integer 
     */
    public function getDateEnd()
    {
        return $this->date_end;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Event
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
     * Set description
     *
     * @param string $description
     * @return Event
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
     * Set is_private
     *
     * @param boolean $isPrivate
     * @return Event
     */
    public function setIsPrivate($isPrivate)
    {
        $this->is_private = $isPrivate;
    
        return $this;
    }

    /**
     * Get is_private
     *
     * @return boolean 
     */
    public function getIsPrivate()
    {
        return $this->is_private;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Event
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;
    
        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }
}
