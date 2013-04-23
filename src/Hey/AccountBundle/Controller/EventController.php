<?php

namespace Hey\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hey\AccountBundle\Entity\Event;
use Hey\AccountBundle\Form\Type\EventType;
use Hey\AccountBundle\Models\Fichier;

class EventController extends Controller {

    /**
     *
     * @Template()
     */
    public function createAction() {
        $request = $this->get('request');
        $event = new Event();
        $formEvent = $this->createForm(new EventType(), $event);
        $user = $this->get('security.context')->getToken()->getUser();
        if ($request->getMethod() == 'POST') {

            if (isset($_FILES["image"])) {
                $fichier = new Fichier(array(
                    'fichier' => $_FILES['image'],
                    'dossier' => $_SERVER['DOCUMENT_ROOT'] . "/bundles/heysite/images/event/base",
                    'fileName' => 'bigpic',
                    'newExtension' => 'jpg',
                    'doResize' => true,
                    'x' => 960,
                    'y' => 490,
                    ''));
                $retour = $fichier->upload();
                //  print_r($retour); die();
            }

            $formEvent->bindRequest($request);

            if ($formEvent->isValid()) {

                $em = $this->getDoctrine()->getManager();
                // $event->setDateBegin();
                $event->setDateCreated(time());
                //$event->setDateEnd(time());
                $event->setDateLastModified(time());
                $event->setIdModified($user->getId());
                $event->setIdOwner($user);
                $event->setIsActive(0);
                // $event->setIsPrivate(0);
                $event->setStatutId($em->getRepository('HeyAccountBundle:Statut')->find(2));
                $em->persist($event);
                $em->flush();

                # Récupération des évènements de l'utilisateur
                $events_user = $this->getDoctrine()->getRepository('HeyAccountBundle:Event')->findBy(array('id_owner' => $user->getId(),
                    'statut_id' => $em->getRepository('HeyAccountBundle:Statut')->find(2)));

                # Mise en session
                $this->container->get('request')->getSession()->set('events_user', $events_user);

                $response = $this->forward('HeyAccountBundle:Event:createDate', array('eventId' => $event->getId()));
               // $response->headers->set('Content-Type', 'text/plain');
                return $response;
            }
        }


        return $this->render('HeyAccountBundle:Event:create_edit.html.twig', array('formEvent' => $formEvent->createView(),
                    'title' => 'Création d\'un nouvel Heyvent'));
    }

    public function createDateAction($eventId) {
       
        $event = new Event();
        $formEvent = $this->createForm(new EventType(), $event);
        // $user = $this->get('security.context')->getToken()->getUser();
        $f = $formEvent->createView();
        unset($f->children['name']);
        unset($f->children['presentation']);
        unset($f->children['description']);
        unset($f->children['isPrivate']);
        unset($f->children['typographyId']);
        unset($f->children['languageId']);
        unset($f->children['idCategorie']);
        return $this->render('HeyAccountBundle:Event:create_edit_date.html.twig', array('eventId' => $eventId,
         'formEvent' => $f,
        'title' => 'Définir une période',
        ));
    }

    /**
     *
     * @Template()
     */
    public function editAction(Event $event = null) {
        $request = $this->get('request');
        $formEvent = $this->createForm(new EventType(), $event);

        if ($request->getMethod() == 'POST') {
            $formEvent->bindRequest($request);

            if ($formEvent->isValid()) {

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


        return $this->render('HeyAccountBundle:Event:create_edit.html.twig', array('formEvent' => $formEvent->createView(),
                    'title' => 'Modification d\'un Heyvent'));
    }
    /**
     *
     * @Template()
     */
    public function etapemenuAction($eventId = null) {
      
       if($eventId!=null)
       {
        $url = array(   'presentation' => './create/'.$eventId,
                        'definir_periode'=> './create/date/'.$eventId);
       }
       else
           $url = array('presentation' => './create');
        return $this->render('HeyAccountBundle:Event/section:etape_menu.html.twig',array('url'=>$url));
    }

}
