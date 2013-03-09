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
     * @ORM\Column(name="id_owner", type="integer")
     */
    private $id_owner;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_last_updated", type="bigint")
     */
    private $date_last_updated;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_modifier", type="integer")
     */
    private $id_modifier;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_event", type="integer")
     */
    private $id_event;

    /**
     * @var string
     * @Assert\NotNull()
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;


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
     * Set id_event
     *
     * @param integer $idEvent
     * @return Comment
     */
    public function setIdEvent($idEvent)
    {
        $this->id_event = $idEvent;
    
        return $this;
    }

    /**
     * Get id_event
     *
     * @return integer 
     */
    public function getIdEvent()
    {
        return $this->id_event;
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
}