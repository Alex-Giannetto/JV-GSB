-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 07 Novembre 2017 à 11:52
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite_compl`
--

CREATE TABLE IF NOT EXISTS `activite_compl` (
  `AC_NUM` int(10) NOT NULL,
  `AC_DATE` date DEFAULT NULL,
  `AC_LIEU` char(10) DEFAULT NULL,
  `AC_THEME` char(20) DEFAULT NULL,
  PRIMARY KEY (`AC_NUM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activite_compl`
--

INSERT INTO `activite_compl` (`AC_NUM`, `AC_DATE`, `AC_LIEU`, `AC_THEME`) VALUES
(1, '2017-11-01', 'Plaisir', 'Vente'),
(2, '2017-11-02', 'Bordeau', 'Informations'),
(3, '2017-11-05', 'Havre', 'vente'),
(6, '2017-11-06', 'Clermont', 'vente'),
(5, '2017-11-07', 'Marseille', 'information');

-- --------------------------------------------------------

--
-- Structure de la table `inviter`
--

CREATE TABLE IF NOT EXISTS `inviter` (
  `PRA_CODE` char(5) NOT NULL,
  `AC_NUM` int(11) NOT NULL,
  `SPECIALISTE` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`PRA_CODE`,`AC_NUM`),
  KEY `FK_INVITER_INVITER2_ACTIVITE` (`AC_NUM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inviter`
--

INSERT INTO `inviter` (`PRA_CODE`, `AC_NUM`, `SPECIALISTE`) VALUES
('1', 2, 0),
('2', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE IF NOT EXISTS `medicament` (
  `MED_DEPOTLEGAL` char(5) NOT NULL,
  PRIMARY KEY (`MED_DEPOTLEGAL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `medicament`
--

INSERT INTO `medicament` (`MED_DEPOTLEGAL`) VALUES
('DOL1'),
('FERV2'),
('PARA7'),
('VITA1'),
('VITA2');

-- --------------------------------------------------------

--
-- Structure de la table `praticien`
--

CREATE TABLE IF NOT EXISTS `praticien` (
  `PRA_CODE` char(5) NOT NULL,
  PRIMARY KEY (`PRA_CODE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `praticien`
--

INSERT INTO `praticien` (`PRA_CODE`) VALUES
('1'),
('2'),
('3'),
('4'),
('5');

-- --------------------------------------------------------

--
-- Structure de la table `rapport_visite`
--

CREATE TABLE IF NOT EXISTS `rapport_visite` (
  `VISITEUR_MATRICULE` char(10) NOT NULL,
  `RAP_NUM` int(11) NOT NULL,
  `MED_DEPOTLEGAL` char(5) NOT NULL,
  `PRA_CODE` char(5) NOT NULL,
  `RAP_DATE` date DEFAULT NULL,
  `RAP_BILAN` char(20) DEFAULT NULL,
  `RAP_MOTIF` char(20) DEFAULT NULL,
  `OFF_QTE` int(11) DEFAULT NULL,
  PRIMARY KEY (`VISITEUR_MATRICULE`,`RAP_NUM`),
  KEY `FK_RAPPORT__ASSOCIATI_MEDICAME` (`MED_DEPOTLEGAL`),
  KEY `FK_RAPPORT__ASSOCIATI_PRATICIE` (`PRA_CODE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rapport_visite`
--

INSERT INTO `rapport_visite` (`VISITEUR_MATRICULE`, `RAP_NUM`, `MED_DEPOTLEGAL`, `PRA_CODE`, `RAP_DATE`, `RAP_BILAN`, `RAP_MOTIF`, `OFF_QTE`) VALUES
('1', 1, 'DOL1', '2', '2017-11-01', '', '', 20),
('2', 0, 'FERV2', '1', '2017-11-01', NULL, NULL, 10),
('3', 0, 'FERV2', '1', '2017-11-02', NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Structure de la table `realiser`
--

CREATE TABLE IF NOT EXISTS `realiser` (
  `AC_NUM` int(11) NOT NULL,
  `VISITEUR_MATRICULE` char(10) NOT NULL,
  PRIMARY KEY (`AC_NUM`,`VISITEUR_MATRICULE`),
  KEY `FK_REALISER_ASSOCIATI_VISITEUR` (`VISITEUR_MATRICULE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `realiser`
--

INSERT INTO `realiser` (`AC_NUM`, `VISITEUR_MATRICULE`) VALUES
(1, '2'),
(2, '5');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE IF NOT EXISTS `visiteur` (
  `VISITEUR_MATRICULE` char(10) NOT NULL,
  `Nom` char(10) DEFAULT NULL,
  PRIMARY KEY (`VISITEUR_MATRICULE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `visiteur`
--

INSERT INTO `visiteur` (`VISITEUR_MATRICULE`, `Nom`) VALUES
('1', 'STUPNICKI'),
('2', 'GIANNETTO'),
('3', 'VARIN'),
('4', 'TAVARES'),
('5', 'ROLLAND');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
