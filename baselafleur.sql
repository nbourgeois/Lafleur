-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 05 Mai 2011 à 18:19
-- Version du serveur: 5.1.41
-- Version de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `baselafleur1`
--
CREATE DATABASE `baselafleur` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `baselafleur`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `cat_code` char(3) NOT NULL DEFAULT '',
  `cat_libelle` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`cat_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`cat_code`, `cat_libelle`) VALUES
('arb', 'Arbres d''ornement'),
('bul', 'Bulbes'),
('mas', 'Plantes à massif'),
('ros', 'Rosiers');

-- --------------------------------------------------------
--
-- Structure de la table `clientconnu`
--

CREATE TABLE IF NOT EXISTS `clientconnu` (
  `clt_code` varchar(5) NOT NULL,
  `clt_nom` varchar(30) NOT NULL,
  `clt_adresse` varchar(50) NOT NULL,
  `clt_tel` varchar(20) DEFAULT NULL,
  `clt_email` varchar(50) NOT NULL,
  `clt_motPasse` varchar(10) NOT NULL,
  PRIMARY KEY (`clt_code`),
  UNIQUE KEY `u_clientconnu_email` (`clt_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `clientconnu`
--

INSERT INTO `clientconnu` (`clt_code`, `clt_nom`, `clt_adresse`, `clt_tel`, `clt_email`, `clt_motPasse`) VALUES
('c0001', 'Dupont', '12, rue haute 75001 Paris', '01 05 22 35 97', 'dupont@wanadoo.fr', 'aaa'),
('c0002', 'Dubois', '4, bld d''Alsace 75002 Paris', '01 44 97 62 54', 'dubois@club-internet.fr', 'bbb'),
('c0003', 'Durand', '5, allée des Ifs 80000 Amiens', '03 22 79 64 56', 'durand@free.fr', 'ccc');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `pdt_ref` char(3) NOT NULL DEFAULT '',
  `pdt_designation` varchar(50) NOT NULL DEFAULT '',
  `pdt_prix` decimal(5,2) NOT NULL DEFAULT '0.00',
  `pdt_image` varchar(50) NOT NULL DEFAULT '',
  `pdt_categorie` char(3) NOT NULL DEFAULT '',
  PRIMARY KEY (`pdt_ref`),
  KEY `pdt_categorie` (`pdt_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`pdt_ref`, `pdt_designation`, `pdt_prix`, `pdt_image`, `pdt_categorie`) VALUES
('b01', '3 bulbes de bégonias', '5.00', 'bulbes_begonia', 'bul'),
('b02', '10 bulbes de dahlias', '12.00', 'bulbes_dahlia', 'bul'),
('b03', '50 glaïeuls', '9.00', 'bulbes_glaieul', 'bul'),
('m01', 'Lot de 3 marguerites', '5.00', 'massif_marguerite', 'mas'),
('m02', 'Pour un bouquet de 6 pensées', '6.00', 'massif_pensee', 'mas'),
('m03', 'Mélange varié de 10 plantes à massif', '15.00', 'massif_melange', 'mas'),
('r01', '1 pied spécial grandes fleurs', '20.00', 'rosiers_gdefleur', 'ros'),
('r02', 'Une variété sélectionnée pour son parfum', '9.00', 'rosiers_parfum', 'ros'),
('r03', 'Rosier arbuste', '8.00', 'rosiers_arbuste', 'ros');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`pdt_categorie`) REFERENCES `categorie` (`cat_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
