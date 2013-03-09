<?php

namespace Hey\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hey\AccountBundle\Models\Commande;

class InstallController extends Controller {

    /**
     *
     * @Template()
     */
    public function defaultAction() {

        $retour = 'Installation du site Heyvent<br/>------------------</br/>';
        $con = mysql_connect("localhost", "root", "root");
        if (!$con) {
            $retour = "Could not connect: <br/>";
        }

        if (mysql_query("DROP DATABASE IF EXISTS heyvent", $con)) {
            $retour .="Base de donnée heyvent supprimée<br/>";
        }
        if (mysql_query("CREATE DATABASE IF NOT EXISTS heyvent", $con)) {
            $retour .="Base de donnee heyvent crée<br/>";
        }


        mysql_close($con);

    
        $sql="";
        # Récupération du fichier sql
        $file = $this->get('kernel')->getRootDir() . '/sql/heyvent.sql';
        if (file_exists($file)) {
            $fp = fopen($file, 'r');
            while (!feof($fp)) {
                $Ligne = fgets($fp, 255);
                // On stocke l'ensemble des lignes dans une variable
                $sql .= $Ligne;
            }
            fclose($fp); // On ferme le fichier
            
           // die($sql);
            $stmt = $this->getDoctrine()->getConnection()->prepare($sql);
            $stmt->execute();
        }
        else
            return array('retour' => 'Fichier ' . $file . ' non trouvé');

        return array('retour' => $retour . 'Installation des tables OK<br/>Vous pouvez vous logger à cette adresse : <a href="http://' . $_SERVER['SERVER_NAME'] . '/app_dev.php/account/login">' . $_SERVER['SERVER_NAME'] . '/app_dev.php/account/login</a>');
    }

}
