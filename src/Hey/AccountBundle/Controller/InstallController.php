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
$con = mysql_connect("localhost","root","");
if (!$con)
  {
    $retour ="Could not connect: <br/>";
  }

if (mysql_query("CREATE DATABASE IF NOT EXISTS heyvent",$con))
  {
    $retour .="Base de donnée OK<br/>";
  }


mysql_close($con);

        $sql = "-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 17 Février 2013 à 02:20
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE=\"NO_AUTO_VALUE_ON_ZERO\";

--
-- Base de données: `heyvent`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id_account` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `ip` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_account`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `account`
--

INSERT INTO `account` (`id_account`, `username`, `password`, `date_created`, `date_last_updated`, `is_active`, `ip`, `salt`, `firstname`, `lastname`, `email`) VALUES
(1, 'drenault', 'jVdd1roUUTdeoN4nRJcQjHbsNUKZqcKDbhsJWRsaawB0RZfezkpHBNPvh2hUnwZ19s14igGWR3swGiYFQ0Ed6A==', '0000-00-00 00:00:00', '2013-02-16 22:53:58', 1, '127.0.0.1', '15b4e9f1ef64f6f3bf4a2037a26d4db7', 'Dolyveen', 'Renault', 'dolyveen_renault@hotmail.com'),
(2, 'hgene', 'jVdd1roUUTdeoN4nRJcQjHbsNUKZqcKDbhsJWRsaawB0RZfezkpHBNPvh2hUnwZ19s14igGWR3swGiYFQ0Ed6A==', '0000-00-00 00:00:00', '2013-02-16 22:53:58', 1, '127.0.0.1', '15b4e9f1ef64f6f3bf4a2037a26d4db7', 'Harold', 'Gene', 'soul2soul@free.fr');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` bigint(20) NOT NULL,
  `date_last_modified` bigint(20) NOT NULL,
  `id_owner` int(11) DEFAULT NULL,
  `id_modified` int(11) NOT NULL,
  `date_begin` bigint(20) NOT NULL,
  `date_end` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_private` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `presentation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `IDX_FA6F25A321E5A74C` (`id_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_FA6F25A321E5A74C` FOREIGN KEY (`id_owner`) REFERENCES `account` (`id_account`)
";
        $stmt = $this->getDoctrine()->getConnection()->prepare($sql);
        $stmt->execute();
        
        die($retour.'Installation des tables OK<br/>Vous pouvez vous logger à cette adresse : <a href="http://'.$_SERVER['SERVER_NAME'].'/app_dev.php/account/login">'.$_SERVER['SERVER_NAME'].'/app_dev.php/account/login</a>');
    }

}
