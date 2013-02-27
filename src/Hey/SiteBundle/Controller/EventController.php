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
        
            
        
        $comment = new Comment();
        
        $comment->setIdEvent($id_event);
        
        # Appel du formulaire Comment
        $commentForm = $this->createForm(new CommentType(),$comment);
        # Récupération de la session user
        $user = $this->get('security.context')->getToken()->getUser();
        if($request->getMethod() == "POST")
        {
           $commentForm->bindRequest($request);
           if($commentForm->isValid())
           {
               $em = $this->getDoctrine()->getManager();
               $comment->setDateCreated(time());
               $comment->setDateLastUpdated(time());
               $comment->setIdOwner($user->getId());
               $comment->setIdModifier($user->getId());
               $em->persist($comment);
               $em->flush();
               
               #on vide le formulaire
               unset($commentForm);
               $comment2 = new Comment();
               $comment2->setIdEvent($id_event);
               $commentForm = $this->createForm(new CommentType(),$comment2);
               
           }
           
        }
        # Récupération de la liste des commentaires
       $comments = $this->getDoctrine()->getRepository('HeyAccountBundle:Comment')->findBy(array('id_event'=>$id_event));
       
      
        return $this->render('HeySiteBundle:Event:section/contain.html.twig', array('commentForm' => $commentForm->createView(),'comments'=>$comments));
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
