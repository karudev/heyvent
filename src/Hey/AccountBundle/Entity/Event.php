<?php

namespace Hey\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Hey\AccountBundle\Models\Dt;
/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="Hey\AccountBundle\Entity\EventRepository")
 */
class Event
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_event", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="Event")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_created", type="bigint")
     */
    protected $date_created;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_last_modified", type="bigint")
     */
    protected $date_last_modified;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Account", inversedBy="Event")
     * @ORM\JoinColumn(name="id_owner", referencedColumnName="id_account")
     */
    protected $id_owner;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_modified", type="integer")
     */
    protected $id_modified;

    /**
     * @var integer
     * 
     * @ORM\Column(name="date_begin", type="bigint", nullable = true)
     */
    protected $date_begin;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_end", type="bigint", nullable = true)
     */
    protected $date_end;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;
    
    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="presentation", type="string", length=255)
     */
    protected $presentation;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_private", type="boolean")
     */
    protected $is_private;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    protected $is_active;

     /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="Event")
     * @ORM\JoinColumn(name="id_categorie", referencedColumnName="id_categorie")
     */
    protected $id_categorie;
    
     /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Typography", inversedBy="Event")
     * @ORM\JoinColumn(name="typography_id", referencedColumnName="typography_id")
     */
    protected $typography_id;
    
     /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="Event")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="language_id")
     */
    protected $language_id;
    
     /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Statut", inversedBy="Event")
     * @ORM\JoinColumn(name="statut_id", referencedColumnName="statut_id")
     */
    protected $statut_id;
   
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
        $this->date_begin = Dt::getTimeStamps($dateBegin);
    
        return $this;
    }

    /**
     * Get date_begin
     *
     * @return integer 
     */
    public function getDateBegin()
    {
        return Dt::getDate($this->date_begin);
    }

    /**
     * Set date_end
     *
     * @param integer $dateEnd
     * @return Event
     */
    public function setDateEnd($dateEnd)
    {
 
        $this->date_end =  Dt::getTimeStamps($dateEnd);
    
        return $this;
    }

    /**
     * Get date_end
     *
     * @return integer 
     */
    public function getDateEnd()
    {
        return Dt::getDate($this->date_end);
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

    /**
     * Set presentation
     *
     * @param string $presentation
     * @return Event
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;
    
        return $this;
    }

    /**
     * Get presentation
     *
     * @return string 
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set id_categorie
     *
     * @param \Hey\AccountBundle\Entity\Categorie $idCategorie
     * @return Event
     */
    public function setIdCategorie(\Hey\AccountBundle\Entity\Categorie $idCategorie = null)
    {
        $this->id_categorie = $idCategorie;
    
        return $this;
    }

    /**
     * Get id_categorie
     *
     * @return \Hey\AccountBundle\Entity\Categorie 
     */
    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    /**
     * Set typography_id
     *
     * @param \Hey\AccountBundle\Entity\Typography $typographyId
     * @return Event
     */
    public function setTypographyId(\Hey\AccountBundle\Entity\Typography $typographyId = null)
    {
        $this->typography_id = $typographyId;
    
        return $this;
    }

    /**
     * Get typography_id
     *
     * @return \Hey\AccountBundle\Entity\Typography 
     */
    public function getTypographyId()
    {
        return $this->typography_id;
    }

    /**
     * Set statut_id
     *
     * @param \Hey\AccountBundle\Entity\Statut $statutId
     * @return Event
     */
    public function setStatutId(\Hey\AccountBundle\Entity\Statut $statutId = null)
    {
        $this->statut_id = $statutId;
    
        return $this;
    }

    /**
     * Get statut_id
     *
     * @return \Hey\AccountBundle\Entity\Statut 
     */
    public function getStatutId()
    {
        return $this->statut_id;
    }

    /**
     * Set language_id
     *
     * @param \Hey\AccountBundle\Entity\Language $languageId
     * @return Event
     */
    public function setLanguageId(\Hey\AccountBundle\Entity\Language $languageId = null)
    {
        $this->language_id = $languageId;
    
        return $this;
    }

    /**
     * Get language_id
     *
     * @return \Hey\AccountBundle\Entity\Language 
     */
    public function getLanguageId()
    {
        return $this->language_id;
    }
}