<?php

namespace Hey\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hey\AccountBundle\Models\Arborescence;

class PictureController extends Controller {

    /**
     *
     * @Template()
     */
    public function indexAction() {
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
        /*  print_r($heyvents_data3);
          die(); */
        return array('heyvents' => $heyvents_data3);
    }

    /**
     *
     * @Template()
     */
    public function cropAction() {
        $request = $this->get('request');
        if ($request->getMethod() == "POST") {
            $data = $request->request->get('file');
         // print_r($data); die();
            $base = $_SERVER['DOCUMENT_ROOT'] . "/bundles/heysite/images/profils/1/";
            list($fileName,$extension) = explode('.', $data['filePath']);
            $thumbWidth = 49;
            $thumbHeight = 49;
            $sourceFile = $base.'/'.$data['filePath'];
            $newFilename = $base.'/'.$fileName.'_crop.'.$extension;
            $size = getimagesize($base.'/'.$data['filePath']);
            $limitWidth = 600;
            $limitHeight = $size[1] * $limitWidth / $size[0];
            $ratioX = $size[0] / $limitWidth;
            $ratioY = $size[1] / $limitHeight;
            
            //die('tet'.$ratioY);
            //extract($_POST); // Extract the $x1, $y1, $w, $h, $extension, 
//$filename, $width, $height variables
//Now lets create the thumbnail
            // GD Function List
            $gdExtensions = array(
                'jpg' => 'JPEG',
                'gif' => 'GIF',
                'bmp' => 'WBMP',
                'png' => 'PNG'
            );

            $check = false;

            $gdExtension = $gdExtensions[$extension];
            $function_to_read = "ImageCreateFrom" . $gdExtension;
            $function_to_write = "Image".$gdExtension;

            // Read the source file
            $source_handle = $function_to_read($sourceFile);

            if ($source_handle) {
                // Create a blank image
                $destination_handle = ImageCreateTrueColor($thumbWidth, $thumbHeight);

                // Put the cropped area onto the blank image
               $check = ImageCopyResampled($destination_handle, $source_handle, 0, 0, $data['x1']*$ratioX, $data['y1']*$ratioX, $thumbWidth, $thumbHeight, $data['w']*$ratioX, $data['h']*$ratioX);
                
                
                
            }

            // Save the image
            $function_to_write($destination_handle, $newFilename,100);
            ImageDestroy($destination_handle);
            
            

            // Check for any errors
            if ($check) {
                echo "Thumbnail created";
            } else {
                echo "Thumbnail failed to create";
            }
            
             return $this->redirect($this->generateUrl('_account_picture'));
        }
    }

}
