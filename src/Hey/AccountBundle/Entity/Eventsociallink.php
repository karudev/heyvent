<?php

namespace Hey\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eventsociallink
 *
 * @ORM\Table(name="Eventsociallink")
 * @ORM\Entity(repositoryClass="Hey\AccountBundle\Entity\EventsociallinkRepository")
 */
class Eventsociallink
{
    /**
     * @var integer
     *
     * @ORM\Column(name="eventsociallink_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="Eventsociallink")
     * @ORM\JoinColumn(name="id_event", referencedColumnName="id_event"))
     */
    protected $id_event;
    
     /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Sociallink", inversedBy="Eventsociallink")
     * @ORM\JoinColumn(name="sociallink_id", referencedColumnName="sociallink_id"))
     */
    protected $sociallink_id;


    
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=128)
     */
    protected $url;


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
     * Set url
     *
     * @param string $url
     * @return Eventsociallink
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set id_event
     *
     * @param \Hey\AccountBundle\Entity\Event $idEvent
     * @return Eventsociallink
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

    /**
     * Set sociallink_id
     *
     * @param \Hey\AccountBundle\Entity\Sociallink $sociallinkId
     * @return Eventsociallink
     */
    public function setSociallinkId(\Hey\AccountBundle\Entity\Sociallink $sociallinkId = null)
    {
        $this->sociallink_id = $sociallinkId;
    
        return $this;
    }

    /**
     * Get sociallink_id
     *
     * @return \Hey\AccountBundle\Entity\Sociallink 
     */
    public function getSociallinkId()
    {
        return $this->sociallink_id;
    }
}