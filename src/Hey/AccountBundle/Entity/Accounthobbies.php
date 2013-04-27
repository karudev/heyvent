<?php

namespace Hey\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accounthobbies
 *
 * @ORM\Table(name="Accounthobbies")
 * @ORM\Entity(repositoryClass="Hey\AccountBundle\Entity\AccounthobbiesRepository")
 */
class Accounthobbies
{
    /**
     * @var integer
     *
     * @ORM\Column(name="accounthobbies_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Account", inversedBy="Accounthobbies")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id_account")
     */
    protected $account_id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;


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
     * Set value
     *
     * @param string $value
     * @return Accounthobbies
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

   

    /**
     * Set account_id
     *
     * @param \Hey\AccountBundle\Entity\Account $accountId
     * @return Accounthobbies
     */
    public function setAccountId(\Hey\AccountBundle\Entity\Account $accountId = null)
    {
        $this->account_id = $accountId;
    
        return $this;
    }

    /**
     * Get account_id
     *
     * @return \Hey\AccountBundle\Entity\Account 
     */
    public function getAccountId()
    {
        return $this->account_id;
    }
}