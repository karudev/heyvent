<?php

namespace Hey\SiteBundle\Controller;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hey\AccountBundle\Form\Type\AccountType;
use Hey\AccountBundle\Entity\Account;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
class LoginController extends Controller {

    /**
     * 
     * @Template()
     */
    public function loginAction() {
         //\Doctrine\Common\Util\Debug::dump(  $this->get('security.context'),2);die();
        //$this->get('session')->getFlashBag()->add('secure','Accéder à votre espace sécurisé.');
        $request = $this->getRequest();
        $session = $request->getSession();
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error' => $error,
        );
    }

    public function logoutAction() {
        
    }

    /**
     * 
     * @Template()
     */
    public function quicksignAction() {
        $request = $this->get('request');
        $account_data = $request->request->get('account');
        $form = $this->createForm(new AccountType(), $account_data);
        if ($request->getMethod() == "POST") {

            # Création du compte
            $account = new Account();
            $form->bindRequest($request);
             if($form->isValid())
              { 
            $em = $this->getDoctrine()->getManager();
            $account->setFirstname($account_data['firstname']);
            $account->setlastname($account_data['lastname']);
            $account->setEmail($account_data['email']);
            $account->setAllowAdsHeyvent(0);  
            $account->setAllowMaillingInvitation(0);
            $account->setUsername(strtolower((substr($account_data['firstname'], 0, 1) . $account_data['lastname'])));
            $account->setDateCreated(new \DateTime());
            $account->setDateLastUpdated(new \DateTime());
            $account->setIsActive(1);
            $account->setIp($_SERVER['SERVER_ADDR']);
            // On cré un salt pour amélioré la sécurité
            $account->setSalt(md5(time()));

            // On crée un mot de passe (attention, comme vous pouvez le voir, il faut utiliser les même paramètres
            // que spécifiés dans le fichier security.ym, a sacoir SHA512 avec 10 itérations.        
            $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
            // On cré donc le mot de passe "admin2" à partir de l'encodage choisi au-dessus
            $password = $encoder->encodePassword($account_data['password'], $account->getSalt());
            // On applique le mot de passe à l'utilisateur
            $account->setPassword($password);
            
          //  \Doctrine\Common\Util\Debug::dump($account_data,2);die();
            $em->persist($account);
            $em->flush();
           
             // Création d'un nouveau token basé sur l'utilisateur qui vient de s'inscrire
              $token = new UsernamePasswordToken($account, $account->getPassword(), 'secured_area', $account->getRoles());
              // On passe le token créé au service security context afin que l'utilisateur soit authentifié
              $this->get('security.context')->setToken($token);
            
              
            return $this->redirect($this->generateUrl('_account_dashboard'));
            
            }
        }

        $f = $form->createView();
        unset($f->children['civility']);
        unset($f->children['cp']);
        unset($f->children['city']);
        unset($f->children['country']);
        unset($f->children['district']);
        unset($f->children['dateOfBirth']);
        unset($f->children['statut']);
        unset($f->children['tel']);
        unset($f->children['allowMaillingInvitation']);
        unset($f->children['allowAdsHeyvent']);
         
        return array('form' =>  $f);
    }

}
