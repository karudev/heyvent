<?php

namespace Hey\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hey\AccountBundle\Entity\Event;
use Hey\AccountBundle\Form\Type\EventType;
use Hey\AccountBundle\Models\Fichier;


class EventController extends Controller
{
    /**
     *
     * @Template()
     */
    public function createAction()
    {
       
        
        $request = $this->get('request');
      
    	$event = new Event();
    	$formEvent = $this->createForm(new EventType(),$event);
        $user = $this->get('security.context')->getToken()->getUser();
    	if($request->getMethod() == 'POST')
    	{
          
         if(isset($_FILES["image"]))
         {
           $fichier =  new Fichier(array(
                'fichier'   =>  $_FILES['image'],
                'dossier'   =>  $_SERVER['DOCUMENT_ROOT']."/bundles/heysite/images/event/base",
                'fileName'  =>  'bigpic',
                'newExtension'=>'jpg',
                'doResize'  =>  true,
                'x'         =>  960,
                'y'         =>  490,
                ''));
           $retour = $fichier->upload();
          //  print_r($retour); die();
         }
         
            $formEvent->bindRequest($request);
            
            if($formEvent->isValid())
            {
    		
    		$em = $this->getDoctrine()->getManager();
               // $event->setDateBegin();
                $event->setDateCreated(time());
                //$event->setDateEnd(time());
                $event->setDateLastModified(time());
                $event->setIdModified($user->getId());
                $event->setIdOwner($user);
                $event->setIsActive(1);
                $event->setIsPrivate(0);
    		$em->persist($event);
    		$em->flush();
                
                # Récupération des évènements de l'utilisateur
                $events_user = $this->getDoctrine()->getRepository('HeyAccountBundle:Event')->findBy(array('id_owner'=>$user->getId()));
 
                # Mise en session
                $this->container->get('request')->getSession()->set('events_user', $events_user);
            }
    	}
       
        return $this->render('HeyAccountBundle:Event:create_edit.html.twig', array( 'formEvent' => $formEvent->createView(),
                                                                                    'title'=>'Création d\'un nouvel Heyvent'));
    }
    
     /**
     *
     * @Template()
     */
    public function editAction(Event $event = null)
    {
        $request = $this->get('request');
        $formEvent = $this->createForm(new EventType(),$event);
        
        if($request->getMethod() == 'POST')
    	{
            $formEvent->bindRequest($request);
            
            if($formEvent->isValid())
            {
    		
    		$em = $this->getDoctrine()->getManager();
               // $event->setDateBegin(time());
               
              //  $event->setDateEnd(time());
                $event->setDateLastModified(time());
                $event->setIdModified(1);
                $event->setIdOwner(1);
               // $event->setIsActive(1);
               // $event->setIsPrivate(0);
    		$em->persist($event);
    		$em->flush();
            }
    	}
        return $this->render('HeyAccountBundle:Event:create_edit.html.twig', array( 'formEvent' => $formEvent->createView(),
                                                                                    'title'=>'Modification d\'un Heyvent'));
    }
}
