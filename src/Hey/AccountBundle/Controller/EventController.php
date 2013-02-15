<?php

namespace Hey\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hey\AccountBundle\Entity\Event;
use Hey\AccountBundle\Form\Type\EventType;


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
    	if($request->getMethod() == 'POST')
    	{
            $formEvent->bindRequest($request);
            
            if($formEvent->isValid())
            {
    		
    		$em = $this->getDoctrine()->getManager();
                $event->setDateBegin();
                $event->setDateCreated(time());
                $event->setDateEnd(time());
                $event->setDateLastModified(time());
                $event->setIdModified(1);
                $event->setIdOwner(1);
                $event->setIsActive(1);
                $event->setIsPrivate(0);
    		$em->persist($event);
    		$em->flush();
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