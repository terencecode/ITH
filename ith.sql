-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 23 jan. 2018 à 17:26
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ith`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartement`
--

DROP TABLE IF EXISTS `appartement`;
CREATE TABLE IF NOT EXISTS `appartement` (
  `id_habitation` int(11) NOT NULL,
  `num_bat` tinyint(11) NOT NULL,
  `etage_appart` smallint(11) NOT NULL,
  `id_immeuble` int(11) NOT NULL,
  PRIMARY KEY (`id_habitation`),
  KEY `APPARTEMENT_IMMEUBLE_FK` (`id_immeuble`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

DROP TABLE IF EXISTS `capteur`;
CREATE TABLE IF NOT EXISTS `capteur` (
  `id_ca` int(11) NOT NULL AUTO_INCREMENT,
  `type_Capteur` varchar(60) NOT NULL,
  `power_state` tinyint(1) NOT NULL,
  `id_piece` int(11) NOT NULL,
  PRIMARY KEY (`id_ca`),
  KEY `CAPTEUR_PIECE_FK` (`id_piece`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`id_ca`, `type_Capteur`, `power_state`, `id_piece`) VALUES
(5, 'Temperature', 1, 11);

-- --------------------------------------------------------

--
-- Structure de la table `co2`
--

DROP TABLE IF EXISTS `co2`;
CREATE TABLE IF NOT EXISTS `co2` (
  `id` int(11) NOT NULL,
  `id_ca` int(11) NOT NULL,
  `taux_CO2` tinyint(4) NOT NULL,
  `timestamp_co2` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `timestamp_co2` (`timestamp_co2`),
  KEY `CO2_CAPTEUR_FK` (`id_ca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employe_municipal`
--

DROP TABLE IF EXISTS `employe_municipal`;
CREATE TABLE IF NOT EXISTS `employe_municipal` (
  `id_u` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL,
  PRIMARY KEY (`id_u`) USING BTREE,
  KEY `EMPLOYE_MUNICIPAL_VILLE_FK` (`id_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fumee`
--

DROP TABLE IF EXISTS `fumee`;
CREATE TABLE IF NOT EXISTS `fumee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ca` int(11) NOT NULL,
  `fumee` tinyint(1) NOT NULL,
  `timestamp_fumee` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `timestamp_fumee` (`timestamp_fumee`),
  KEY `FUMEE_CAPTEUR_FK` (`id_ca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gardien`
--

DROP TABLE IF EXISTS `gardien`;
CREATE TABLE IF NOT EXISTS `gardien` (
  `id_u` int(11) NOT NULL,
  PRIMARY KEY (`id_u`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gerant`
--

DROP TABLE IF EXISTS `gerant`;
CREATE TABLE IF NOT EXISTS `gerant` (
  `id_gerant` int(11) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `id_habitation` int(11) DEFAULT NULL,
  `id_u` int(11) NOT NULL,
  PRIMARY KEY (`id_gerant`),
  KEY `GERANT_HABITATION_FK` (`id_habitation`),
  KEY `GERANT_UTILISATEUR_FK` (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gerant`
--

INSERT INTO `gerant` (`id_gerant`, `admin`, `id_habitation`, `id_u`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `habitation`
--

DROP TABLE IF EXISTS `habitation`;
CREATE TABLE IF NOT EXISTS `habitation` (
  `id_habitation` int(11) NOT NULL AUTO_INCREMENT,
  `pays_habitation` varchar(40) NOT NULL,
  `num_rue_habitation` smallint(6) NOT NULL,
  `rue_habitation` varchar(150) NOT NULL,
  `sup_habitation` smallint(6) NOT NULL,
  PRIMARY KEY (`id_habitation`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `habitation`
--

INSERT INTO `habitation` (`id_habitation`, `pays_habitation`, `num_rue_habitation`, `rue_habitation`, `sup_habitation`) VALUES
(1, 'france', 8, 'marguerite', 21),
(2, 'france', 12, 'marguerite', 25);

-- --------------------------------------------------------

--
-- Structure de la table `humidite`
--

DROP TABLE IF EXISTS `humidite`;
CREATE TABLE IF NOT EXISTS `humidite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ca` int(11) NOT NULL,
  `taux_humidite` tinyint(4) NOT NULL,
  `timestamp_humidite` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `timestamp_humidite` (`timestamp_humidite`),
  KEY `HUMIDITE_CAPTEUR_FK` (`id_ca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `immeuble`
--

DROP TABLE IF EXISTS `immeuble`;
CREATE TABLE IF NOT EXISTS `immeuble` (
  `id_immeuble` int(11) NOT NULL AUTO_INCREMENT,
  `id_quartier` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  PRIMARY KEY (`id_immeuble`),
  KEY `IMMEUBLE_QUARTIER_FK` (`id_quartier`),
  KEY `IMMEUBLE_UTILISATEUR_FK` (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ensemble d''appartements';

-- --------------------------------------------------------

--
-- Structure de la table `luminosite`
--

DROP TABLE IF EXISTS `luminosite`;
CREATE TABLE IF NOT EXISTS `luminosite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ca` int(11) NOT NULL,
  `taux_luminosite` tinyint(4) NOT NULL,
  `timestamp_luminosite` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `timestamp_luminosite` (`timestamp_luminosite`),
  KEY `LUMINOSITE_CAPTEUR_FK` (`id_ca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

DROP TABLE IF EXISTS `maison`;
CREATE TABLE IF NOT EXISTS `maison` (
  `id_habitation` int(11) NOT NULL,
  `nb_etage` tinyint(11) NOT NULL,
  `id_quartier` int(11) NOT NULL,
  PRIMARY KEY (`id_habitation`),
  KEY `MAISON_QUARTIER_FK` (`id_quartier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

DROP TABLE IF EXISTS `piece`;
CREATE TABLE IF NOT EXISTS `piece` (
  `id_piece` int(11) NOT NULL AUTO_INCREMENT,
  `type_piece` varchar(100) NOT NULL,
  `long_piece` smallint(11) NOT NULL,
  `largeur_piece` smallint(11) NOT NULL,
  `hauteur_piece` smallint(11) NOT NULL,
  `id_gerant` int(11) NOT NULL,
  `emplacement` varchar(535) DEFAULT NULL,
  PRIMARY KEY (`id_piece`),
  KEY `PIECE_GERANT_FK` (`id_gerant`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`id_piece`, `type_piece`, `long_piece`, `largeur_piece`, `hauteur_piece`, `id_gerant`, `emplacement`) VALUES
(10, 'Alexandre', 12, 12, 12, 1, '12'),
(11, 'dgf', 25, 25, 25, 1, 'sery');

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

DROP TABLE IF EXISTS `presence`;
CREATE TABLE IF NOT EXISTS `presence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ca` int(11) NOT NULL,
  `presence` tinyint(1) NOT NULL,
  `timestamp_temperature` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `timestamp_temperature` (`timestamp_temperature`),
  KEY `PRESENCE_CAPTEUR_FK` (`id_ca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `quartier`
--

DROP TABLE IF EXISTS `quartier`;
CREATE TABLE IF NOT EXISTS `quartier` (
  `id_quartier` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `id_ville` int(11) NOT NULL,
  PRIMARY KEY (`id_quartier`),
  KEY `QUARTIER_VILLE_FK` (`id_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(535) NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `response` varchar(535) NOT NULL,
  `id_question` int(11) NOT NULL,
  PRIMARY KEY (`id_reponse`),
  KEY `id_question` (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `temperature`
--

DROP TABLE IF EXISTS `temperature`;
CREATE TABLE IF NOT EXISTS `temperature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ca` int(11) NOT NULL,
  `valeur` tinyint(4) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `timestamp_temperature` (`timestamp`),
  KEY `TEMPERATURE_CAPTEUR_FK` (`id_ca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `email_u` varchar(150) NOT NULL,
  `prenom_u` varchar(100) NOT NULL,
  `nom_u` varchar(100) NOT NULL,
  `mdp_u` varchar(100) NOT NULL,
  PRIMARY KEY (`id_u`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_u`, `email_u`, `prenom_u`, `nom_u`, `mdp_u`) VALUES
(1, 'alex.lat@gmail.com', 'Alexandre', 'LAT', 'Alexandre789'),
(2, 'qfdg', 'qdsg', 'sdfg', 'sdfg');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id_ville` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartement`
--
ALTER TABLE `appartement`
  ADD CONSTRAINT `APPARTEMENT_HABITATION_PK_FK` FOREIGN KEY (`id_habitation`) REFERENCES `habitation` (`id_habitation`) ON DELETE CASCADE,
  ADD CONSTRAINT `APPARTEMENT_IMMEUBLE_FK` FOREIGN KEY (`id_immeuble`) REFERENCES `immeuble` (`id_immeuble`) ON DELETE CASCADE;

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `CAPTEUR_PIECE_FK` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id_piece`) ON DELETE CASCADE;

--
-- Contraintes pour la table `co2`
--
ALTER TABLE `co2`
  ADD CONSTRAINT `CO2_CAPTEUR_FK` FOREIGN KEY (`id_ca`) REFERENCES `capteur` (`id_ca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `employe_municipal`
--
ALTER TABLE `employe_municipal`
  ADD CONSTRAINT `EMPLOYE_MUNICIPAL_UTILISATEUR_FK` FOREIGN KEY (`id_u`) REFERENCES `utilisateur` (`id_u`) ON DELETE CASCADE,
  ADD CONSTRAINT `EMPLOYE_MUNICIPAL_VILLE_FK` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`) ON DELETE CASCADE;

--
-- Contraintes pour la table `fumee`
--
ALTER TABLE `fumee`
  ADD CONSTRAINT `FUMEE_CAPTEUR_FK` FOREIGN KEY (`id_ca`) REFERENCES `capteur` (`id_ca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `gardien`
--
ALTER TABLE `gardien`
  ADD CONSTRAINT `GARDIEN_UTILISATEUR_FK` FOREIGN KEY (`id_u`) REFERENCES `utilisateur` (`id_u`) ON DELETE CASCADE;

--
-- Contraintes pour la table `gerant`
--
ALTER TABLE `gerant`
  ADD CONSTRAINT `GERANT_HABITATION_FK` FOREIGN KEY (`id_habitation`) REFERENCES `habitation` (`id_habitation`) ON DELETE CASCADE,
  ADD CONSTRAINT `GERANT_UTILISATEUR_FK` FOREIGN KEY (`id_u`) REFERENCES `utilisateur` (`id_u`) ON DELETE CASCADE;

--
-- Contraintes pour la table `humidite`
--
ALTER TABLE `humidite`
  ADD CONSTRAINT `HUMIDITE_CAPTEUR_FK` FOREIGN KEY (`id_ca`) REFERENCES `capteur` (`id_ca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `immeuble`
--
ALTER TABLE `immeuble`
  ADD CONSTRAINT `IMMEUBLE_QUARTIER_FK` FOREIGN KEY (`id_quartier`) REFERENCES `quartier` (`id_quartier`) ON DELETE CASCADE,
  ADD CONSTRAINT `IMMEUBLE_UTILISATEUR_FK` FOREIGN KEY (`id_u`) REFERENCES `utilisateur` (`id_u`) ON DELETE CASCADE;

--
-- Contraintes pour la table `luminosite`
--
ALTER TABLE `luminosite`
  ADD CONSTRAINT `LUMINOSITE_CAPTEUR_FK` FOREIGN KEY (`id_ca`) REFERENCES `capteur` (`id_ca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `maison`
--
ALTER TABLE `maison`
  ADD CONSTRAINT `MAISON_HABITATION_PK_FK` FOREIGN KEY (`id_habitation`) REFERENCES `habitation` (`id_habitation`) ON DELETE CASCADE,
  ADD CONSTRAINT `MAISON_QUARTIER_FK` FOREIGN KEY (`id_quartier`) REFERENCES `quartier` (`id_quartier`) ON DELETE CASCADE;

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `PIECE_GERANT_FK` FOREIGN KEY (`id_gerant`) REFERENCES `gerant` (`id_gerant`) ON DELETE CASCADE;

--
-- Contraintes pour la table `presence`
--
ALTER TABLE `presence`
  ADD CONSTRAINT `PRESENCE_CAPTEUR_FK` FOREIGN KEY (`id_ca`) REFERENCES `capteur` (`id_ca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `quartier`
--
ALTER TABLE `quartier`
  ADD CONSTRAINT `QUARTIER_VILLE_FK` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `id_question` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `temperature`
--
ALTER TABLE `temperature`
  ADD CONSTRAINT `TEMPERATURE_CAPTEUR_FK` FOREIGN KEY (`id_ca`) REFERENCES `capteur` (`id_ca`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/* */