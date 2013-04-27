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
     /**
     *
     * @Template()
     */
    public function addHobbiesAction()
    {
       $form = $this->createForm(new \Hey\AccountBundle\Form\Type\AccounthobbiesType());
       $request = $this->get('request');
       $user = $this->get('security.context')->getToken()->getUser();
       
     
       if($request->getMethod() == "POST")
       {
            $value = $request->request->get('value');
            $hob = new \Hey\AccountBundle\Entity\Accounthobbies();
            $hob->setValue($value);
            $hob->setAccountId($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($hob);
            $em->flush();

       }
        $hobbies = $this->getDoctrine()->getManager()->getRepository('HeyAccountBundle:AccountHobbies')
                ->findBy(array('account_id'=>$user->getId()));
        return $this->render('HeyAccountBundle:Profil:section\add_hobbies.html.twig',array('hobbies'=> $hobbies,'form'=>$form->createView()));
    }
     /**
     *
     * @Template()
     */
    public function delHobbiesAction(\Hey\AccountBundle\Entity\Accounthobbies $h)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($h);
        $em->flush();
        $user = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new \Hey\AccountBundle\Form\Type\AccounthobbiesType());
        $hobbies = $this->getDoctrine()->getManager()->getRepository('HeyAccountBundle:AccountHobbies')
                ->findBy(array('account_id'=>$user->getId()));
        return $this->render('HeyAccountBundle:Profil:section\add_hobbies.html.twig',array('hobbies'=> $hobbies,'form'=>$form->createView()));
  
    }
}
