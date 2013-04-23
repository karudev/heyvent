<?php

namespace Hey\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="Hey\AccountBundle\Entity\CommentRepository")
 */
class Comment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_comment", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
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
     * @ORM\ManyToOne(targetEntity="Account", inversedBy="Comment")
     * @ORM\JoinColumn(name="id_owner", referencedColumnName="id_account")
     */
    protected $id_owner;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_last_updated", type="bigint")
     */
    protected $date_last_updated;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Account", inversedBy="Comment")
     * @ORM\JoinColumn(name="id_modifier", referencedColumnName="id_account"))
     */
    protected $id_modifier;

     /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="Comment")
     * @ORM\JoinColumn(name="id_event", referencedColumnName="id_event"))
     */
    protected $id_event;

    /**
     * @var string
     * @Assert\NotNull()
     * @ORM\Column(name="comment", type="text")
     */
    protected $comment;


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
     * @return Comment
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
     * Set id_owner
     *
     * @param integer $idOwner
     * @return Comment
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
     * Set date_last_updated
     *
     * @param integer $dateLastUpdated
     * @return Comment
     */
    public function setDateLastUpdated($dateLastUpdated)
    {
        $this->date_last_updated = $dateLastUpdated;
    
        return $this;
    }

    /**
     * Get date_last_updated
     *
     * @return integer 
     */
    public function getDateLastUpdated()
    {
        return $this->date_last_updated;
    }

    /**
     * Set id_modifier
     *
     * @param integer $idModifier
     * @return Comment
     */
    public function setIdModifier($idModifier)
    {
        $this->id_modifier = $idModifier;
    
        return $this;
    }

    /**
     * Get id_modifier
     *
     * @return integer 
     */
    public function getIdModifier()
    {
        return $this->id_modifier;
    }

   
    /**
     * Set comment
     *
     * @param string $comment
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set id_event
     *
     * @param \Hey\AccountBundle\Entity\Event $idEvent
     * @return Comment
     */
    public function setIdEvent(\Hey\AccountBundle\Entity\Event $idEvent = null)
    {
        $this->id_event = $idEvent;
    
        return $this;
    }

    /**
     * Get id_event
     *
     * @return \Hey\AccountBundle\Entity\Event 
     */
    public function getIdEvent()
    {
        return $this->id_event;
    }
}