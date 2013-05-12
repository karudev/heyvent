<?php

namespace Hey\AccountBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Karudev\AppsBundle\Entity\Compte
 *
 * @ORM\Table(name="account")
 * @ORM\Entity
 */
class Account implements UserInterface {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id_account", type="integer")
     * @ORM\Id
     * @ORM\OneToMany(targetEntity="Event", mappedBy="Account")
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="Account")
     * @ORM\OneToMany(targetEntity="Accounthobbies", mappedBy="Account")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;

    
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    protected $username;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    protected $password;
    
    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=64 , nullable=true)
     * 
     */
    protected $sex;
    
    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    protected $firstname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    protected $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    protected $email;
    
    /**
     * @var \DateTime $date_created
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    protected $date_created;

    /**
     * @var \DateTime $date_last_updated
     *
     * @ORM\Column(name="date_last_updated", type="datetime")
     */
    protected $date_last_updated;

    /**
     * @var boolean $is_active
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    protected $is_active;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=32)
     */
    protected $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    protected $salt;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="statut", type="string", nullable=true)
     */
    protected $statut;
    
    /**
     * @var date_of_birth
     *
     * @ORM\Column(name="date_of_birth", type="date",  nullable=true)
     */
    protected $date_of_birth;
    
    /**
     * @var allow_mailling_invitation
     *
     * @ORM\Column(name="allow_mailling_invitation", type="boolean")
     */
    protected $allow_mailling_invitation;
        
    /**
     * @var allow_ads_heyvent
     *
     * @ORM\Column(name="allow_ads_heyvent", type="boolean")
     */
    protected $allow_ads_heyvent;
    
    /**
     * @var tel
     *
     * @ORM\Column(name="tel",  type="string", length=64, nullable=true)
     */
    protected $tel;
    
    /**
     * @var cp
     *
     * @ORM\Column(name="cp",  type="string", length=32, nullable=true)
     */
    protected $cp;
    
    /**
     * @var city
     *
     * @ORM\Column(name="city",  type="string", length=128, nullable=true)
     */
    protected $city;
    
    /**
     * @var district
     *
     * @ORM\Column(name="district",  type="string", length=128, nullable=true)
     */
    protected $district;
    
    /**
     * @var country
     *
     * @ORM\Column(name="country",  type="string", length=128, nullable=true)
     */
    protected $country;

     /**
     * Get username
     *
     * @return string 
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


    /**
     * Set date_of_birth
     *
     * @param \DateTime $dateOfBirth
     * @return Account
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->date_of_birth = $dateOfBirth;
    
        return $this;
    }

    /**
     * Get date_of_birth
     *
     * @return \DateTime 
     */
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    /**
     * Set allow_mailling_invitation
     *
     * @param boolean $allowMaillingInvitation
     * @return Account
     */
    public function setAllowMaillingInvitation($allowMaillingInvitation)
    {
        $this->allow_mailling_invitation = $allowMaillingInvitation;
    
        return $this;
    }

    /**
     * Get allow_mailling_invitation
     *
     * @return boolean 
     */
    public function getAllowMaillingInvitation()
    {
        return $this->allow_mailling_invitation;
    }

    /**
     * Set allow_ads_heyvent
     *
     * @param boolean $allowAdsHeyvent
     * @return Account
     */
    public function setAllowAdsHeyvent($allowAdsHeyvent)
    {
        $this->allow_ads_heyvent = $allowAdsHeyvent;
    
        return $this;
    }

    /**
     * Get allow_ads_heyvent
     *
     * @return boolean 
     */
    public function getAllowAdsHeyvent()
    {
        return $this->allow_ads_heyvent;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Account
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return Account
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    
        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Account
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
     * Set district
     *
     * @param string $district
     * @return Account
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
     * @return Account
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

    /**
     * Set statut
     *
     * @param string $statut
     * @return Account
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    
        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return Account
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    
        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }
}