-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 10 Mars 2013 à 02:09
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
  `civility` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `allow_mailling_invitation` tinyint(1) NOT NULL,
  `allow_ads_heyvent` tinyint(1) NOT NULL,
  `tel` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_account`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Contenu de la table `account`
--

INSERT INTO `account` (`id_account`, `username`, `password`, `date_created`, `date_last_updated`, `is_active`, `ip`, `salt`, `firstname`, `lastname`, `email`, `civility`, `statut`, `date_of_birth`, `allow_mailling_invitation`, `allow_ads_heyvent`, `tel`, `cp`, `city`, `district`, `country`) VALUES
(1, 'drenault', 'jVdd1roUUTdeoN4nRJcQjHbsNUKZqcKDbhsJWRsaawB0RZfezkpHBNPvh2hUnwZ19s14igGWR3swGiYFQ0Ed6A==', '0000-00-00 00:00:00', '2013-03-09 09:47:26', 1, '127.0.0.1', '15b4e9f1ef64f6f3bf4a2037a26d4db7', 'Dolyveen', 'Renault', 'dolyveen_renault@hotmail.com', 'Monsieur', 'Particulier', '2008-11-30', 1, 1, '', '', '', '', ''),
(2, 'hgene', 'jVdd1roUUTdeoN4nRJcQjHbsNUKZqcKDbhsJWRsaawB0RZfezkpHBNPvh2hUnwZ19s14igGWR3swGiYFQ0Ed6A==', '0000-00-00 00:00:00', '2013-02-16 22:53:58', 1, '127.0.0.1', '15b4e9f1ef64f6f3bf4a2037a26d4db7', 'Harold', 'Gene', 'soul2soul@free.fr', '', '', '0000-00-00', 0, 0, '', '', '', '', ''),
(4, 'crenault', 'Kr2Y+//FsNEsctBjZHBV6TDmRd9AHtcEjwWXG//bs4kbSX1HVmYy9A/8eGAz+JexEeTNUgc6bcsooiCSqF0wfw==', '2013-03-10 00:52:35', '2013-03-10 00:52:35', 1, '127.0.0.1', '29c316a17f30e90169faff789b50ba9d', 'Coralie', 'Renault', 'amour_des_iles@hotmail.com', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(5, 'nrenault', '', '2013-03-10 00:54:09', '2013-03-10 00:55:02', 1, '127.0.0.1', 'a53ecc398cab9597d548dab099500a62', 'Naëlle', 'Renault', 'nrenault@karudev.fr', 'Madame', 'Entreprise', '2008-01-01', 1, 1, NULL, NULL, NULL, NULL, NULL),
(6, 'fbauer', 'THvU4/l50zLmAIgR107wydOB0v+3NRWtX8wYKLkYrAno7i32CmMg4cT5S16md8k3PAU4YtQiw4A9OdP1li/k9A==', '2013-03-10 00:59:02', '2013-03-10 00:59:02', 1, '127.0.0.1', '652f3790fd357ce115e528fa74f05e07', 'Franck', 'Bauer', 'test@test.fr', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(7, 'jrenault', 'e+0GpV1TnnffuKHW42MLaXx7nlsO1YCf8oS0wwxLL+U2ca/iv1ucYNRQxFzYNvYAHkOwvbBGl2wUh3ASOLn0uw==', '2013-03-10 00:59:53', '2013-03-10 00:59:53', 1, '127.0.0.1', '789723f54f0ae99ca43c3571ddfd21ed', 'Josette', 'Renault', 'test1@hotmail.com', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(8, 'ttest', 'a4WJ/W5dpuIbYlL+VPyf4zXK0HHSE1bbwiIbT5vwX86hgc4NLrhCFGoAudkJNe+Jn2re4Wobl5+A5i3lt+497A==', '2013-03-10 01:00:52', '2013-03-10 01:00:52', 1, '127.0.0.1', '58b0a1dbb365e48897f25568fa71b621', 'test2', 'test', 'test2@test.fr', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(9, 'ttest3', 't+Gq4mnZqzu4o6ICbLuPoDRaZGHI5yh3XvDWZ6Yh04bXszWzQmD7OcNhqDg+oOGsEcFIq5daaW61hTH6/SF1UA==', '2013-03-10 01:01:42', '2013-03-10 01:01:42', 1, '127.0.0.1', '1449bf1c95b67df2f832a8910eca9edb', 'Test', 'Test3', 'test3@test.fr', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(10, 'ttest5', 'fME+wqqfOy6XI9mCgU+zh68UV5qOMLr4DkvldNW7edFjv5AT+GTvntJWWSU5OsdO7xY4N0M/mNE8/dqE3lMHYw==', '2013-03-10 01:12:55', '2013-03-10 01:12:55', 1, '127.0.0.1', 'f460a65dac3b6be172a09855b4c24560', 'test', 'Test5', 'test5@hotmail.com', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(11, 'ttest6', 'tUkGV09zkNP1NPjw9buRYx25KNwrSZUO0Jkh14tl9LktYf6vICPxHmEh8zJBfP3qucow3RYEEMpo4V8OzRYmNA==', '2013-03-10 01:17:49', '2013-03-10 01:17:49', 1, '127.0.0.1', 'a4cdd09f923057ca74e541e4dc3f15a1', 'test', 'Test6', 'test6@hotmail.com', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(12, 'ttest7', 'ca7/brQ1nkgoR63IAdOxSmL4+oTkWpF4DqQzSP/gqB2fk5G4XbscE9PSeYVf4BZoNvKJgMLQuqMi07OEQKF9CQ==', '2013-03-10 01:35:37', '2013-03-10 01:35:37', 1, '127.0.0.1', 'c1d4b5701464c47bc13a4ba3ad4b517e', 'test7', 'Test7', 'test7@hotmail.com', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(13, 'ttest8', '92IqitC9pOmKmvcjvUce5ma24eKXy09izUmHQRSUyV+suLUJx/YAX1ki+icSIUnQt1ATi1t09/q8IhFD9SEH8Q==', '2013-03-10 01:37:16', '2013-03-10 01:37:16', 1, '127.0.0.1', 'f4812b1d52bd78ed4eb43325721e6770', 'test8', 'Test8', 'test8@hotmail.com', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(14, 'ttest9', 'zpi4eOHbeTa+RPyKotV6UYikVLD+f0Gv6k93AA18b8c8gFUZdS4SdWnnZuwnun2AmEAAzGTB2XxEWkSm2qMafw==', '2013-03-10 01:38:41', '2013-03-10 01:38:41', 1, '127.0.0.1', 'b50d14e495b270c8ea5a8c7aa28edb0b', 'test9', 'test9', 'test9@test.fr', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(15, 'ttest10', '7v8kLp5jsyp4+4QuPCFjQp++imhd1JtuTAtFoFtJqtqUCl+TxpVpJtm5eqLdGzayN8ZeHlFPZsieGr37bWafdw==', '2013-03-10 01:39:45', '2013-03-10 01:39:45', 1, '127.0.0.1', '7da3c6e3bd3485af6ed3b5fb73ce5c1e', 'test10', 'test10', 'test10@testf.fr', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(16, 'ttest12', 'Uucz1FPb1ceNZcScmldiIwDyB+hZigFA8e52CuIMf9E+QB23n27ETf99Y2gnbjREWNOpjEYBQS7BiYlAvJzb+w==', '2013-03-10 01:43:16', '2013-03-10 01:43:16', 1, '127.0.0.1', 'ff8215e6d97aeb84c112b8b18df6c0bf', 'test12', 'test12', 'test12@hotmail.com', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(17, 'ttest13', 'PSAlpPtwzv2/r1dT2ywjnWz84Z3rCU/SuD/Se0HitInqiJ59qTXUwVbLK8SZHZJIIRAc5SuMWCg9S4qvr267fg==', '2013-03-10 01:44:21', '2013-03-10 01:44:21', 1, '127.0.0.1', '7797d89cca8be758876156fcb75dbbac', 'Test12', 'Test13', 'test13@hotmail.com', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(18, 'ttest14', 'D+D1M4FtQ5abGJquAxY9eVQeicZMHRswSKarerRPFs4YZZnu4Q868M31xUsz6T3Uxv5Ovf3Z46Xs0vFEkFzfuQ==', '2013-03-10 01:45:23', '2013-03-10 01:45:23', 1, '127.0.0.1', '20bfdb5e01f1ea50ed5145b9181b0cb3', 'test14', 'test14', 'test14@test.fr', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(19, 'ttest15', 'CaAFNkmV6AxmjwHmBBFzDI0ka/g5JpWbc0v6/q9edZ5dgs2mUa28iTC1ZdPheCG+2Tmbu7JZcl3cD9RTOSsMEQ==', '2013-03-10 01:46:21', '2013-03-10 01:46:21', 1, '127.0.0.1', '15428f151671f51cf447bd0388f6cbf6', 'test14', 'test15', 'test15@test.fr', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(20, 'ttest16', 'bXnKP5oT0IiDRjE2DwpB5WuCkuobB3ZGBc9yGumfQna1tt3SkBiKAlp1Ti+n0gjZ1ZaF/Z6laP+F7TsiZWp/IQ==', '2013-03-10 01:55:21', '2013-03-10 01:55:21', 1, '127.0.0.1', '2e50bf000fad34bd3d2fc76ab1a28d00', 'test16', 'test16', 'test16@test.fr', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(21, 'ttest16', '4ZUsmXrnr5pjiVLE2qL5XGPdGnlMkgkUXDvh+l/HDZoG9Vt87oa0FXtrZIGPKKRrsDjSQxlrOWyu7NKfd9UuiQ==', '2013-03-10 01:55:39', '2013-03-10 01:55:39', 1, '127.0.0.1', '4e6b11ef0bbaf446e96b3e6811e5bde0', 'test16', 'test16', 'test16@test.fr', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(22, 'ttest18', '006f+4QFkNJqgVtet3jaWTzFQBKnIXCFKs0Da/8OLnMc731GJIKXwVy3aWDo7Vt22jyaR2vCvvN15oq2iHtZbA==', '2013-03-10 02:01:59', '2013-03-10 02:01:59', 1, '127.0.0.1', 'b73790b32466672a9401c6516d09a0a2', 'test18', 'test18', 'test18@test.fr', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(23, 'ttest19', 'YNb+G3zo9kOHwL++aGYpfEuAKtJnivZRLMLL1p6fXgGSXFo1dM6NpCSjA4ZFs9EPbzFI4pupSP9FOFrl7uAJ5A==', '2013-03-10 02:06:07', '2013-03-10 02:06:07', 1, '127.0.0.1', '30a696034129d0df430cdd9720d790f1', 'test19', 'test19', 'test19@test.fr', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(24, 'ttest20', 'ayWkqvlnCDWGF7xvk625R13oy/n9p69l60N2067zuezTt/xx7WwbbdA21wLwM5Qz6LbOlbNKIG6XtuFWxg0uPA==', '2013-03-10 02:06:41', '2013-03-10 02:06:41', 1, '127.0.0.1', '0fc537d42a4a697e2029a4eed1703f50', 'test20', 'test20', 'test20@test.fr', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(25, 'rnadal', 'OCxzdMrkKKOiT4ERIwnKb/Pd4YFpQ6Z9nRzre2FOXl8+B8BWafuRopA6dYCqIbbuR7VWG53MA4h8mwMJWBgw0A==', '2013-03-10 02:07:20', '2013-03-10 02:07:20', 1, '127.0.0.1', 'b4803c25259f38902df01dacf39c7ae1', 'Raphaël', 'Nadal', 'nrafa@test.fr', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `date_created`, `id_owner`, `date_last_updated`, `id_modifier`, `id_event`, `comment`) VALUES
(1, 1362822500, 1, 1362822500, 1, 1, 'Le premier message de test');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id_event`, `date_created`, `date_last_modified`, `id_owner`, `id_modified`, `date_begin`, `date_end`, `name`, `description`, `is_private`, `is_active`, `presentation`) VALUES
(1, 1362822484, 1362822484, 1, 1, 1362787200, 1363305600, 'Test', 'Description test', 0, 1, 'Test2');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_FA6F25A321E5A74C` FOREIGN KEY (`id_owner`) REFERENCES `account` (`id_account`);
