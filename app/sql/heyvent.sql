-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 23 Avril 2013 à 18:05
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Contenu de la table `account`
--

INSERT INTO `account` (`id_account`, `username`, `password`, `date_created`, `date_last_updated`, `is_active`, `ip`, `salt`, `firstname`, `lastname`, `email`, `civility`, `statut`, `date_of_birth`, `allow_mailling_invitation`, `allow_ads_heyvent`, `tel`, `cp`, `city`, `district`, `country`) VALUES
(1, 'drenault', 'jVdd1roUUTdeoN4nRJcQjHbsNUKZqcKDbhsJWRsaawB0RZfezkpHBNPvh2hUnwZ19s14igGWR3swGiYFQ0Ed6A==', '0000-00-00 00:00:00', '2013-03-22 23:41:52', 1, '127.0.0.1', '15b4e9f1ef64f6f3bf4a2037a26d4db7', 'Dolyveen', 'Renault', 'dolyveen_renault@hotmail.com', 'Monsieur', 'Association', '2008-11-30', 1, 1, '0636923623', '77680', 'Roissy en brie', 'IDF', 'France'),
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
(25, 'rnadal', 'OCxzdMrkKKOiT4ERIwnKb/Pd4YFpQ6Z9nRzre2FOXl8+B8BWafuRopA6dYCqIbbuR7VWG53MA4h8mwMJWBgw0A==', '2013-03-10 02:07:20', '2013-03-10 02:07:20', 1, '127.0.0.1', 'b4803c25259f38902df01dacf39c7ae1', 'Raphaël', 'Nadal', 'nrafa@test.fr', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(26, 'crenault', 'w8sFSyF5SxhDsZ9jwX0g4+OFGymcRoAT7cB3W/lhajqmW6AYNuNqepnI2ahzJfX3fPaZCsSYfL/8/bnIUwX2cw==', '2013-03-21 00:02:42', '2013-03-21 00:02:42', 1, '127.0.0.1', '1016a2b17993b3a73a07ac8f0d115d4a', 'Coralie', 'Renault', 'amour_des_iles@hotmail.com', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL),
(27, 'crenault', '/rUeDBxuuuL5oaPcEXU+RC06Ccv7WnqBdW1uD3i2hGBDwKjcPEawEDTMHFaLv09uoMjp4t1t/KcOUZpMC/FHTA==', '2013-03-24 22:39:11', '2013-03-24 22:43:48', 1, '127.0.0.1', 'da84f98d033a3bf08f91973c619a2147', 'Coralie', 'Renault', 'amour_des_iles@hotmail.com', 'Madame', 'Particulier', '2008-01-01', 1, 1, '0636923623', '77680', 'Roissy en brie', 'IDF', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `libelle`) VALUES
(1, 'Sport'),
(2, 'Voyage');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` bigint(20) NOT NULL,
  `id_owner` int(11) DEFAULT NULL,
  `date_last_updated` bigint(20) NOT NULL,
  `id_modifier` int(11) DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `IDX_9474526C21E5A74C` (`id_owner`),
  KEY `IDX_9474526CFB643568` (`id_modifier`),
  KEY `IDX_9474526CD52B4B97` (`id_event`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `date_created`, `id_owner`, `date_last_updated`, `id_modifier`, `id_event`, `comment`) VALUES
(1, 1362822500, 1, 1362822500, 1, 1, 'Le premier message de test'),
(2, 1363823416, 1, 1363823416, 1, 2, 'test'),
(3, 1363823429, 1, 1363823429, 1, 2, 'Haha'),
(4, 1363823895, 1, 1363823895, 1, 2, 'Ceci est un test ddfdfs\r\nd\r\ngsdf\r\ng\r\ndfg\r\nfg\r\n\r\n\r\n\r\nfgfgfgfgfgg'),
(5, 1364165250, 27, 1364165250, 27, 3, 'Ceci est le premier message'),
(6, 1364165286, 27, 1364165286, 27, 3, 'test 2'),
(7, 1364456417, 1, 1364456417, 1, 1, 'dfdf'),
(8, 1364493383, 1, 1364493383, 1, 4, 'Allez les bleus'),
(9, 1364687298, 1, 1364687298, 1, 15, 'test'),
(12, 1365845840, 1, 1365845840, 1, 18, 'test'),
(13, 1365845923, 1, 1365845923, 1, 18, 'Enfin cela marche');

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
  `date_begin` bigint(20) DEFAULT NULL,
  `date_end` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_private` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `presentation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `typography_id` int(11) DEFAULT NULL,
  `statut_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_event`),
  KEY `IDX_FA6F25A321E5A74C` (`id_owner`),
  KEY `IDX_3BAE0AA7C9486A13` (`id_categorie`),
  KEY `IDX_3BAE0AA7C4F51953` (`typography_id`),
  KEY `IDX_3BAE0AA7F6203804` (`statut_id`),
  KEY `IDX_3BAE0AA782F1BAF4` (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id_event`, `date_created`, `date_last_modified`, `id_owner`, `id_modified`, `date_begin`, `date_end`, `name`, `description`, `is_private`, `is_active`, `presentation`, `id_categorie`, `typography_id`, `statut_id`, `language_id`) VALUES
(1, 1362822484, 1362822484, 1, 1, 1362787200, 1363305600, 'Test', 'Description test', 0, 1, 'Test2', 1, 1, 2, 1),
(2, 1363823076, 1363823076, 1, 1, 1363824000, 1364601600, 'Vacance', 'test', 0, 1, 'Test', 2, 1, 2, 1),
(3, 1364165199, 1364165199, 27, 27, 1364774400, 1369958400, 'Tour du monde en bateau', 'Départ à Arromanche et arrivé prévu en Guadeloupe.', 0, 1, 'L''aventure au bout du monde', 1, 1, 2, 1),
(4, 1364493343, 1364493343, 1, 1, 1364428800, 1371081600, 'Qualification coupe du monde', 'texte de présentation.\r\nCeci est un test.', 0, 1, 'Allez Les bleus', 1, 1, 2, 1),
(5, 1364683413, 1364683413, 1, 1, 1364688000, 1365552000, 'Coupe Davis', 'Test', 0, 1, 'Test', 1, 1, 2, 1),
(6, 1364685663, 1364685663, 1, 1, 1362096000, 1364342400, 'test', 'test', 0, 1, 'test', 1, 1, 2, 1),
(7, 1364685698, 1364685698, 1, 1, 1362096000, 1364342400, 'test2', 'test', 0, 1, 'test', 1, 1, 2, 1),
(8, 1364686168, 1364686168, 1, 1, 1364428800, 1364688000, 'Rallye auto', 'tets', 0, 1, 'test', 1, 1, 2, 1),
(9, 1364686425, 1364686425, 1, 1, 1364688000, 1364688000, 'test4', 'test', 0, 1, 'test', 1, 1, 2, 1),
(10, 1364686580, 1364686580, 1, 1, 1364688000, 1364688000, 'Test5', 'test', 0, 1, 'test', 1, 1, 2, 1),
(11, 1364686710, 1364686710, 1, 1, 1362355200, 1364342400, 'Mariage', 'test', 0, 1, 'test', 2, 1, 2, 1),
(12, 1364686830, 1364686830, 1, 1, 1364169600, 1364688000, 'Mariage2', 'test', 0, 1, 'tets', 2, 1, 2, 1),
(13, 1364687012, 1364687012, 1, 1, 1362614400, 1364688000, 'Mariage3', 'test', 0, 1, 'Test', 2, 1, 2, 1),
(14, 1364687108, 1364687108, 1, 1, 1363651200, 1364169600, 'Départ des parents', 'dfdf', 0, 1, 'test', 2, 1, 2, 1),
(15, 1364687197, 1364687197, 1, 1, 1363564800, 1364688000, 'Yeah', 'tets', 0, 1, 'test', 2, 1, 2, 1),
(16, 1365784859, 1365784859, 1, 1, 1365811200, 1367280000, 'Transport', 'test', 0, 1, 'Ceci est un test dan les transports', 1, 2, 2, 1),
(17, 1365785972, 1365785972, 1, 1, 1365552000, 1366761600, 'Foot', 'Barcelone est favoris pour cette saison 2013', 0, 1, 'La coupe d''europe', 1, 2, 2, 1),
(18, 1365842456, 1365842456, 1, 1, 1365984000, 1367280000, 'KFC', 'C''était bon', 0, 1, 'It''s so good', 1, 2, 2, 1),
(19, 1366008836, 1366008836, 1, 1, NULL, NULL, 'Prismamedia', 'test', 1, 1, 'Vie de salarié', 1, 1, 2, 1),
(20, 1366182109, 1366182109, 1, 1, NULL, NULL, 'Test', 'Test transport', 0, 1, 'Test p', 1, 2, 2, 1),
(21, 1366215481, 1366215481, 1, 1, NULL, NULL, 'Test3', 'Test3', 0, 0, 'test3', 1, 2, 2, 2),
(22, 1366216064, 1366216064, 1, 1, NULL, NULL, 'Test4', 'test4', 1, 0, 'Test''', 1, 1, 2, 2),
(23, 1366216246, 1366216246, 1, 1, NULL, NULL, 'Test5', 'test4', 1, 0, 'Test''', 1, 1, 2, 2),
(24, 1366302401, 1366302401, 2, 2, NULL, NULL, 'RER E', 'Test tournan en brie', 0, 0, 'Test', 2, 2, 2, 1),
(25, 1366302418, 1366302418, 2, 2, NULL, NULL, 'RER E', 'Test tournan en brie', 0, 0, 'Test', 2, 2, 2, 1),
(26, 1366302467, 1366302467, 2, 2, NULL, NULL, 'RER E', 'Test tournan en brie', 0, 0, 'Test', 2, 2, 2, 1),
(27, 1366302530, 1366302530, 2, 2, NULL, NULL, 'RER E', 'Test tournan en brie', 0, 0, 'Test', 2, 2, 2, 1),
(28, 1366302591, 1366302591, 2, 2, NULL, NULL, 'RER E', 'Test tournan en brie', 0, 0, 'Test', 2, 2, 2, 1),
(29, 1366302639, 1366302639, 2, 2, NULL, NULL, 'RER E', 'Test tournan en brie', 0, 0, 'Test', 2, 2, 2, 1),
(30, 1366302702, 1366302702, 2, 2, NULL, NULL, 'RER E', 'Test tournan en brie', 0, 0, 'Test', 2, 2, 2, 1),
(31, 1366305478, 1366305478, 2, 2, NULL, NULL, 'RER MAISON', 'Test', 0, 0, 'Test', 1, 2, 2, 1),
(32, 1366305632, 1366305632, 2, 2, NULL, NULL, 'RER MAISON', 'Test', 0, 0, 'Test', 1, 2, 2, 1),
(33, 1366305679, 1366305679, 2, 2, NULL, NULL, 'RER MAISON', 'Test', 0, 0, 'Test', 1, 2, 2, 1),
(34, 1366305691, 1366305691, 2, 2, NULL, NULL, 'RER MAISON', 'Test', 0, 0, 'Test', 1, 2, 2, 1),
(35, 1366305706, 1366305706, 2, 2, NULL, NULL, 'RER MAISON', 'Test', 0, 0, 'Test', 1, 2, 2, 1),
(36, 1366305910, 1366305910, 2, 2, NULL, NULL, 'RER MAISON', 'Test', 0, 0, 'Test', 1, 2, 2, 1),
(37, 1366305962, 1366305962, 2, 2, NULL, NULL, 'RER MAISON', 'Test', 0, 0, 'Test', 1, 2, 2, 1),
(38, 1366305989, 1366305989, 2, 2, NULL, NULL, 'RER MAISON', 'Test', 0, 0, 'Test', 1, 2, 2, 1),
(39, 1366306129, 1366306129, 2, 2, NULL, NULL, 'RER MAISON', 'Test', 0, 0, 'Test', 1, 2, 2, 1),
(40, 1366306174, 1366306174, 2, 2, NULL, NULL, 'RER MAISON', 'Test', 0, 0, 'Test', 1, 2, 2, 1),
(41, 1366306265, 1366306265, 2, 2, NULL, NULL, 'Test', 'test', 0, 0, 'test vite', 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `eventsociallink`
--

CREATE TABLE IF NOT EXISTS `eventsociallink` (
  `eventsociallink_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) DEFAULT NULL,
  `sociallink_id` int(11) DEFAULT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`eventsociallink_id`),
  KEY `IDX_F62A1716D52B4B97` (`id_event`),
  KEY `IDX_F62A17164ADC872E` (`sociallink_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `language`
--

INSERT INTO `language` (`language_id`, `name`) VALUES
(1, 'Français'),
(2, 'Anglais');

-- --------------------------------------------------------

--
-- Structure de la table `sociallink`
--

CREATE TABLE IF NOT EXISTS `sociallink` (
  `sociallink_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sociallink_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `sociallink`
--

INSERT INTO `sociallink` (`sociallink_id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Viadéo');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `statut` (
  `statut_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`statut_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`statut_id`, `name`) VALUES
(1, 'Non publié'),
(2, 'Publié');

-- --------------------------------------------------------

--
-- Structure de la table `typography`
--

CREATE TABLE IF NOT EXISTS `typography` (
  `typography_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`typography_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `typography`
--

INSERT INTO `typography` (`typography_id`, `name`) VALUES
(1, 'Verdana regular'),
(2, 'Arial');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C21E5A74C` FOREIGN KEY (`id_owner`) REFERENCES `account` (`id_account`),
  ADD CONSTRAINT `FK_9474526CD52B4B97` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`),
  ADD CONSTRAINT `FK_9474526CFB643568` FOREIGN KEY (`id_modifier`) REFERENCES `account` (`id_account`);

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_3BAE0AA782F1BAF4` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`),
  ADD CONSTRAINT `FK_3BAE0AA7C4F51953` FOREIGN KEY (`typography_id`) REFERENCES `typography` (`typography_id`),
  ADD CONSTRAINT `FK_3BAE0AA7C9486A13` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `FK_3BAE0AA7F6203804` FOREIGN KEY (`statut_id`) REFERENCES `statut` (`statut_id`),
  ADD CONSTRAINT `FK_FA6F25A321E5A74C` FOREIGN KEY (`id_owner`) REFERENCES `account` (`id_account`);

--
-- Contraintes pour la table `eventsociallink`
--
ALTER TABLE `eventsociallink`
  ADD CONSTRAINT `FK_F62A17164ADC872E` FOREIGN KEY (`sociallink_id`) REFERENCES `sociallink` (`sociallink_id`),
  ADD CONSTRAINT `FK_F62A1716D52B4B97` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
