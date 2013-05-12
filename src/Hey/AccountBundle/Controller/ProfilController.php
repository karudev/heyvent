<?php

namespace Hey\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hey\AccountBundle\Form\Type\AccountType;
use Hey\AccountBundle\Form\Type\AccounthobbiesType;
use Hey\AccountBundle\Entity\Accounthobbies;
use Hey\AccountBundle\Models\File;
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
      // die('test'.$user->getPassword());
       if($request->getMethod() == "POST")
       {
           $formAccount->bindRequest($request);
           if($formAccount->isValid())
           {
            $em = $this->getDoctrine()->getManager();
            $user->setPassword($user->getPassword());
            
            $user->setDateLastUpdated(new \DateTime());
            $em->persist($user);
            $em->flush();
           }
           
       }
        $f = $formAccount->createView();
        //unset($f->children['password']);
        //unset($f->children['dateOfBirth']);
  
       $crops = File::getCrops($user->getId());
    
                
       return array('formAccount'=>$f,'crop1'=>$crops[0],'crop2'=>$crops[1],'avatar'=>$crops[2]);
    }
     /**
     *
     * @Template()
     */
    public function addHobbiesAction()
    {
       $form = $this->createForm(new AccounthobbiesType());
       $request = $this->get('request');
       $user = $this->get('security.context')->getToken()->getUser();
       
     
       if($request->getMethod() == "POST")
       {
            $value = $request->request->get('value');
            $hob = new Accounthobbies();
            $hob->setValue($value);
            $hob->setAccountId($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($hob);
            $em->flush();

       }
        $hobbies = $this->getDoctrine()->getManager()->getRepository('HeyAccountBundle:Accounthobbies')
                ->findBy(array('account_id'=>$user->getId()));
        return $this->render('HeyAccountBundle:Profil:section\add_hobbies.html.twig',array('hobbies'=> $hobbies,'form'=>$form->createView()));
    }
     /**
     *
     * @Template()
     */
    public function delHobbiesAction(Accounthobbies $h)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($h);
        $em->flush();
        $user = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new AccounthobbiesType());
        $hobbies = $this->getDoctrine()->getManager()->getRepository('HeyAccountBundle:Accounthobbies')
                ->findBy(array('account_id'=>$user->getId()));
        return $this->render('HeyAccountBundle:Profil:section\add_hobbies.html.twig',array('hobbies'=> $hobbies,'form'=>$form->createView()));
  
    }
}
