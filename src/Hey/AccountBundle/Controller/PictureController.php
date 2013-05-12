<?php

namespace Hey\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hey\AccountBundle\Models\Arborescence;
use Hey\AccountBundle\Models\Fichier;
use Hey\AccountBundle\Models\File;
use Symfony\Component\HttpFoundation\JsonResponse;

class PictureController extends Controller {

    /**
     *
     * @Template()
     */
    public function indexAction() {
        
        $request = $this->getRequest();
       $user = $this->get('security.context')->getToken()->getUser();
        if($request->getMethod() == "POST")
        {
            $fichier = $request->request->get('file');
          //  print_r($_FILES); die();
           $fichier =  new Fichier(array('fichier'=>$_FILES['file'],'fileName'=>'avatar','idUser'=>$user->getId()));
           $retour = $fichier->upload();
          
           return new JsonResponse(array($retour));
        }else{
            
           
            $crops = File::getCrops($user->getId());
            return array('crop1'=>$crops[0],'avatar'=>$crops[2]);
        }
        
     
      /*<section class="arborescence">
    <div><h4>Votre dossier d'images</h4></div>
    <div class="files">
        <ul>
            <li>
                <span class="dir">avatar</span>
                <ul>
                    <li class="png">avatar.png</li>
                    <li class="png">avatar_crop.png</li>
                </ul>
            </li>
            <li>
                <span class="dir">Heyvents</span>
                <ul>
                {% for key,heyvent in heyvents %}
                
                 <li>
                        <span class="dir">{{key}}</span>
                        {% for key2,value2 in heyvent %}
                         <ul>
                            <li>
                                <span class="dir">{{key2}}</span>
                                <ul>
                                {% for key3,value3 in value2 %}
                                  <li class="png">{{value3}}</li>
                                {% endfor %}
                                </ul>
                            </li>
                         </ul>
                        {% endfor %}
                 </li>
                
                {% endfor %}
                 </ul>
              
            </li> 
        </ul>
   </div>
</section>
        $base = $_SERVER['DOCUMENT_ROOT'] . "/bundles/heysite/images/profils/1/";
        $heyvents = new Arborescence();
        $heyvents_data = $heyvents->get($base . "Heyvents");
        $base = $base . "Heyvents";
        foreach ($heyvents_data as $key => $value) {

            $heyvent = new Arborescence();
            $heyvents_data2 = $heyvent->get($base . "/" . $value);
            foreach ($heyvents_data2 as $key2 => $value2) {
                $heyvent = new Arborescence();
                $heyvents_data3[$value][$value2] = $heyvent->get($base . "/" . $value . "/" . $value2);
            }
        }
       
        return array('heyvents' => $heyvents_data3);*/
        
    }

   
    public function cropAction() {
        $request = $this->get('request');
        if ($request->getMethod() == "POST") {
            $data = $request->request->get('file');
            $user = $this->get('security.context')->getToken()->getUser();
            $data['idUser'] = $user->getId();
         // print_r($data); die();
           
            $f = new File($data);
            $f->crop(49, 49);
            $f->crop(82, 82);
         
            die();
           // return $this->redirect($this->generateUrl('_account_picture'));
        }
    }

}
