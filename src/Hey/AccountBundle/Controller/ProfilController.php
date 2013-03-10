<?php

namespace Hey\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hey\AccountBundle\Form\Type\AccountType;

class ProfilController extends Controller
{
    /**
     *
     * @Template()
     */
    public function editAction()
    {
       $request = $this->get('request');
       $user = $this->get('security.context')->getToken()->getUser();
       $username = $user->getUsername();
       $formAccount = $this->createForm(new AccountType(array('champPassword'=>'hidden')),$user);
       
       if($request->getMethod() == "POST")
       {
           $formAccount->bindRequest($request);
           if($formAccount->isValid())
           {
            $em = $this->getDoctrine()->getManager();
            $user->setUsername($username);
            
            $user->setDateLastUpdated(new \DateTime());
            $em->persist($user);
            $em->flush();
           }
           
       }
    
       return array('formAccount'=>$formAccount->createView());
    }
}
