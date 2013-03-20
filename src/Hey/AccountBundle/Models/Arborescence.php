<?php

namespace Hey\AccountBundle\Models;

/**
 * Description of Arborescence
 *
 * @author RENAULT
 */
class Arborescence {

    public $arbo = array();

    public function __construct() {
        
    }

    public function get($dir) {

        $iterator = new \DirectoryIterator($dir);
        foreach ($iterator as $fileinfo) {
            if($fileinfo->getFilename()!='.' && $fileinfo->getFilename()!='..')
            {
                  $this->arbo[]  = $fileinfo->getFilename();  
                
            }
        
        }
        
      
        return $this->arbo;
    }

}

?>
