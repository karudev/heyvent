<?php

namespace Hey\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hey\AccountBundle\Entity\Event;
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
     * 
     * @Template()
     */
    public function footerAction()
    {
        return array();
    }
}
