<?php

namespace Hey\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hey\AccountBundle\Entity\Event;
use Hey\AccountBundle\Entity\Comment;
use Hey\AccountBundle\Form\Type\CommentType;

class EventController extends Controller
{
    /**
     * 
     * @Template()
     */
    public function showAction(Event $event = null)
    {
         //\Doctrine\Common\Util\Debug::dump(  $this->container->get('request')->getSession()->get('account'),2);die();
      
      
        return array( 'event'   => $event);
    }
    /**
     * Contenu de l'event, commentaire et espace publicitaire
     * @Template()
     */
    public function containAction($id_event = null)
    {
        $request = $this->get('request');
        
        if($id_event==null)
        {
        $com = $request->request->get('comment');
        $id_event = $com['idEvent'];
        }
       // print_r($com); die();
            
        
        $comment = new Comment();
        
       //$comment->setIdEvent($this->getDoctrine()->getRepository('HeyAccountBundle:Event')->find($id_event));
        
        # Appel du formulaire Comment
        $commentForm = $this->createForm(new CommentType(),$comment);
        # Récupération de la session user
        $user = $this->get('security.context')->getToken()->getUser();
        if($request->getMethod() == "POST")
        {
           $commentForm->bindRequest($request);
          
               $em = $this->getDoctrine()->getManager();
               $comment->setDateCreated(time());
               $comment->setDateLastUpdated(time());
               $comment->setIdOwner($user);
               $comment->setIdModifier($user);
               $comment->setIdEvent( $this->getDoctrine()->getRepository('HeyAccountBundle:Event')->find($id_event));
              
               $em->persist($comment);
               $em->flush();
               
               #on vide le formulaire
               unset($commentForm);
               $comment2 = new Comment();
               $comment2->setIdEvent( $this->getDoctrine()->getRepository('HeyAccountBundle:Event')->find($id_event));
               $commentForm = $this->createForm(new CommentType(),$comment2);
               
           
           
        }
        # Récupération de la liste des commentaires
       $comments = $this->getDoctrine()->getRepository('HeyAccountBundle:Comment')->findBy(array('id_event'=>$id_event));
       // \Doctrine\Common\Util\Debug::dump( $comments[0].id_owner,3);die();
      
      
        return $this->render('HeySiteBundle:Event:section/contain.html.twig', array('idEvent' => $id_event,'commentForm' => $commentForm->createView(),'comments'=>$comments));
    }
    
     /**
     * 
     * @Template()
     */
    public function searchAction()
    {
        # recupération du mot
        $request = $this->get('request');
        $search = $request->request->get('search');
        $events = $this->getDoctrine()->getRepository('HeyAccountBundle:Event')->search($search['word']);
        return array("word"=> $search['word'], "events"=>$events);
    }
    
    /**
     * 
     * @Template()
     */
    public function footerAction()
    {
        return array();
    }
}
