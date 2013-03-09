-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Sam 09 Mars 2013 à 09:21
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
  `civility` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `allow_mailling_invitation` tinyint(1) NOT NULL,
  `allow_ads_heyvent` tinyint(1) NOT NULL,
  `tel` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_account`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `account`
--

INSERT INTO `account` (`id_account`, `username`, `password`, `date_created`, `date_last_updated`, `is_active`, `ip`, `salt`, `firstname`, `lastname`, `email`, `civility`, `statut`, `date_of_birth`, `allow_mailling_invitation`, `allow_ads_heyvent`, `tel`, `cp`, `city`, `district`, `country`) VALUES
(1, 'drenault', 'jVdd1roUUTdeoN4nRJcQjHbsNUKZqcKDbhsJWRsaawB0RZfezkpHBNPvh2hUnwZ19s14igGWR3swGiYFQ0Ed6A==', '0000-00-00 00:00:00', '2013-02-16 22:53:58', 1, '127.0.0.1', '15b4e9f1ef64f6f3bf4a2037a26d4db7', 'Dolyveen', 'Renault', 'dolyveen_renault@hotmail.com', '', '', '0000-00-00', 0, 0, '', '', '', '', ''),
(2, 'hgene', 'jVdd1roUUTdeoN4nRJcQjHbsNUKZqcKDbhsJWRsaawB0RZfezkpHBNPvh2hUnwZ19s14igGWR3swGiYFQ0Ed6A==', '0000-00-00 00:00:00', '2013-02-16 22:53:58', 1, '127.0.0.1', '15b4e9f1ef64f6f3bf4a2037a26d4db7', 'Harold', 'Gene', 'soul2soul@free.fr', '', '', '0000-00-00', 0, 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` bigint(20) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `date_last_updated` bigint(20) NOT NULL,
  `id_modifier` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `comment`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `event`
--


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_FA6F25A321E5A74C` FOREIGN KEY (`id_owner`) REFERENCES `account` (`id_account`);
