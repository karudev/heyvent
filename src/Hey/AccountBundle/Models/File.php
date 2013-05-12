<?php

namespace Hey\AccountBundle\Models;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of File
 *
 * @author RENAULT
 */
class File {

    public $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function crop($thumbWidth, $thumbHeight) {
        $base = $_SERVER['DOCUMENT_ROOT'] . "/bundles/heysite/images/profils/".$this->data['idUser']."/";
        list($fileName, $extension) = explode('.', $this->data['filePath']);
        /* $thumbWidth = 49;
          $thumbHeight = 49; */
        $sourceFile = $base . '/' . $this->data['filePath'];
        $newFilename = $base . '/' . $fileName . '_crop_' . $thumbWidth . '.' . $extension;
        $size = getimagesize($base . '/' . $this->data['filePath']);

        if ($this->data['x1'] == "")
            $this->data['x1'] = $size[0];

        if ($this->data['y1'] == "")
            $this->data['y1'] = $size[1];

        if ($this->data['w'] == "")
            $this->data['w'] = $size[0];

        if ($this->data['h'] == "")
            $this->data['h'] = $size[1];

       
        $limitWidth = 430;
        $limitHeight = $size[1] * $limitWidth / $size[0];
        $ratioX = $size[0] / $limitWidth;
        $ratioY = $size[1] / $limitHeight;


        $gdExtensions = array(
            'jpg' => 'JPEG',
            'gif' => 'GIF',
            'bmp' => 'WBMP',
            'png' => 'PNG'
        );

        $check = false;

        $gdExtension = $gdExtensions[$extension];
        $function_to_read = "ImageCreateFrom" . $gdExtension;
        $function_to_write = "Image" . $gdExtension;

        // Read the source file
        $source_handle = $function_to_read($sourceFile);

        if ($source_handle) {
            // Create a blank image
            $destination_handle = ImageCreateTrueColor($thumbWidth, $thumbHeight);

            // Put the cropped area onto the blank image
            $check = ImageCopyResampled($destination_handle, $source_handle, 0, 0, $this->data['x1'] * $ratioX, $this->data['y1'] * $ratioX, $thumbWidth, $thumbHeight, $this->data['w'] * $ratioX, $this->data['h'] * $ratioX);
        }

        // Save the image
        $function_to_write($destination_handle, $newFilename, 100);
        ImageDestroy($destination_handle);



        // Check for any errors
        if ($check) {
            return "Thumbnail created";
        } else {
            return "Thumbnail failed to create";
        }
    }

    public static function getCrops($idUser) {
        $filename1 =  "bundles/heysite/images/profils/" . $idUser . "/Avatar/avatar_crop_49.jpg";
        $filename2 =  "bundles/heysite/images/profils/" . $idUser . "/Avatar/avatar_crop_82.jpg";
        $filename3 =  "bundles/heysite/images/profils/" . $idUser . "/Avatar/avatar.jpg";
        if (file_exists( $_SERVER['DOCUMENT_ROOT'].'/'.$filename1))
            $crop1 = $filename1.'?'.time();
        else
            $crop1 ="bundles/heysite/images/profils/0/Avatar/avatar_crop_49.jpg";
        
         if (file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$filename2))
            $crop2 = $filename2.'?'.time();
        else
            $crop2 = "bundles/heysite/images/profils/0/Avatar/avatar_crop_82.jpg";
        
         if (file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$filename3))
            $crop3 = $filename3.'?'.time();
        else
            $crop3 = "bundles/heysite/images/profils/0/Avatar/avatar.jpg";

        return array($crop1,$crop2,$crop3);
    }

   
}

?>
