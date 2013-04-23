<?php

namespace Hey\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DashboardController extends Controller {

    /**
     *
     * @Template()
     */
    public function indexAction() { //\Doctrine\Common\Util\Debug::dump(  $this->get('security.context')->getToken()->getUser(),2);die();
        # Récupération des évènements de l'utilisateur
        $events_user = $this->getDoctrine()->getRepository('HeyAccountBundle:Event')->findBy(array('id_owner' => $this->get('security.context')->getToken()->getUser()->getId(),
            'statut_id' => $this->getDoctrine()->getRepository('HeyAccountBundle:Statut')->find(2)));


        # Mise en session
      
     
        $this->container->get('request')->getSession()->set('events_user', $events_user);
       
        // \Doctrine\Common\Util\Debug::dump(  \serialize($events_user),2);die();
        return array();
    }

}
