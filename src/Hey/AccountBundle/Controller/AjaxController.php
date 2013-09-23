<?php

namespace Hey\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

// Ajouter ceci en haut de votre classe
use Symfony\Component\Validator\Constraints\Email;
use Hey\AccountBundle\Models\SerializerClass;


class AjaxController extends Controller {

    /**
     * Autocomplétion Code postal
     * * */
    public function cpAction() {
        $request = $this->getRequest();
        $string = $request->request->get('string');

        //$sql='SELECT * FROM postalcode  where cp like "'.$string.'%" or city like "'.$string.'%" order by ville asc limit 50';
        //die($sql);
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('HeyAccountBundle:Postalcode');
        $query = $repository->createQueryBuilder('p')
                ->where("p.cp like :string ")
                ->orWhere("p.city like :string")
                ->setParameter('string', '%' . $string . '%')
                ->orderBy('p.city', 'ASC')
                ->setMaxResults(50)
                ->getQuery();
        //die($query->getSQL());
        $data = $query->getArrayResult();
        //print_r($data); die();
        echo json_encode($data);
        die();
    }

    /**
     * Autocomplétion Hobbies
     * * */
    public function hobbiesAction() {



      

        $string = $this->getRequest()->request->get('string');

        $repository = $this->getDoctrine()->getEntityManager()->getRepository('HeyAccountBundle:Hobbies');
        $query = $repository->createQueryBuilder('h')
                ->where("h.name like :string ")
                ->setParameter('string', '%' . $string . '%')
                ->orderBy('h.name', 'ASC')
                ->setMaxResults(50)
                ->getQuery();

        $data = $query->getResult();
        //\Doctrine\Common\Util\Debug::dump( $data,4);die();
       
        $s = new SerializerClass();
        return $s->serialize($data, 'json');
       
        
       
       // die($s->serialize($data, 'json'));
    }

    public function isUsernameExistAction($username = null) {
        $account = $this->getDoctrine()->getEntityManager()->getRepository('HeyAccountBundle:Account')->findByUsername($username);
        if ($account || strlen($username) < 4)
            return new JsonResponse(true);
        else
            return new JsonResponse(false);
    }

    public function isEmailExistAction($email = null) {
        $emailConstraint = new Email();

        // utiliser le validator pour valider la valeur
        $errorList = $this->get('validator')->validateValue($email, $emailConstraint);

        $account = $this->getDoctrine()->getEntityManager()->getRepository('HeyAccountBundle:Account')->findByEmail($email);
        if ($account || count($errorList) > 0)
            return new JsonResponse(true);
        else
            return new JsonResponse(false);
    }

    public function isValidMdpAction($password = null) {

        if (strlen($password) < 6)
            return new JsonResponse(true);
        else
            return new JsonResponse(false);
    }

}
