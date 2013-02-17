<?php

namespace Hey\AccountBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Karudev\AppsBundle\Entity\Compte
 *
 * @ORM\Table(name="Account")
 * @ORM\Entity
 */
class Account implements UserInterface {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id_account", type="integer")
     * @ORM\Id
     * @ORM\OneToMany(targetEntity="Event", mappedBy="Account")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;
    
    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;
    
    /**
     * @var \DateTime $date_created
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $date_created;

    /**
     * @var \DateTime $date_last_updated
     *
     * @ORM\Column(name="date_last_updated", type="datetime")
     */
    private $date_last_updated;

    /**
     * @var boolean $is_active
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $is_active;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=32)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @inheritDoc
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    public function getSalt() {
        return $this->salt;
    }

    /**
     * @inheritDoc
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function getRoles() {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        
    }

       /**
     * Set salt
     *
     * @param string $salt
     * @return Compte
     */
    public function setSalt($salt) {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Compte
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    public function __sleep() {
        return array('id', 'username'); // add your own fields
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Compte
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Set date_created
     *
     * @param \DateTime $dateCreated
     * @return Compte
     */
    public function setDateCreated($dateCreated) {
        $this->date_created = $dateCreated;

        return $this;
    }

    /**
     * Get date_created
     *
     * @return \DateTime 
     */
    public function getDateCreated() {
        return $this->date_created;
    }

    /**
     * Set date_last_updated
     *
     * @param \DateTime $dateLastUpdated
     * @return Compte
     */
    public function setDateLastUpdated($dateLastUpdated) {
        $this->date_last_updated = $dateLastUpdated;

        return $this;
    }

    /**
     * Get date_last_updated
     *
     * @return \DateTime 
     */
    public function getDateLastUpdated() {
        return $this->date_last_updated;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Compte
     */
    public function setIsActive($isActive) {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive() {
        return $this->is_active;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Compte
     */
    public function setIp($ip) {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp() {
        return $this->ip;
    }



    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Account
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Account
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Account
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
}