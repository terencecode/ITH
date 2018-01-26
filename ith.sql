-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 26 jan. 2018 à 14:26
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
  `nom_Capteur` varchar(64) NOT NULL,
  `power_state` tinyint(1) NOT NULL,
  `id_piece` int(11) NOT NULL,
  PRIMARY KEY (`id_ca`),
  KEY `CAPTEUR_PIECE_FK` (`id_piece`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`id_ca`, `type_Capteur`, `nom_Capteur`, `power_state`, `id_piece`) VALUES
(1, 'Temperature', 'Temperature1_offpiece1_rue1', 0, 1),
(2, 'Temperature', 'Temperature1_onpiece1_rue1', 1, 1),
(3, 'CO2', 'CO2_offpiece2_rue2', 0, 4),
(4, 'Humidite', 'Humidite_offpiece2_rue2', 0, 4);

-- --------------------------------------------------------

--
-- Structure de la table `co2`
--

DROP TABLE IF EXISTS `co2`;
CREATE TABLE IF NOT EXISTS `co2` (
  `id` int(11) NOT NULL,
  `id_ca` int(11) NOT NULL,
  `valeur` tinyint(4) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `timestamp_co2` (`timestamp`),
  KEY `CO2_CAPTEUR_FK` (`id_ca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fumee`
--

DROP TABLE IF EXISTS `fumee`;
CREATE TABLE IF NOT EXISTS `fumee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ca` int(11) NOT NULL,
  `valeur` tinyint(1) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `timestamp_fumee` (`timestamp`),
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gerant`
--

INSERT INTO `gerant` (`id_gerant`, `admin`, `id_habitation`, `id_u`) VALUES
(1, 1, NULL, 1),
(2, 0, NULL, 2),
(3, 0, 1, 2),
(6, 0, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `habitation`
--

DROP TABLE IF EXISTS `habitation`;
CREATE TABLE IF NOT EXISTS `habitation` (
  `id_habitation` int(11) NOT NULL AUTO_INCREMENT,
  `pays_habitation` varchar(40) NOT NULL,
  `ville` varchar(128) NOT NULL,
  `num_rue_habitation` smallint(6) NOT NULL,
  `rue_habitation` varchar(150) NOT NULL,
  `sup_habitation` smallint(6) NOT NULL,
  PRIMARY KEY (`id_habitation`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `habitation`
--

INSERT INTO `habitation` (`id_habitation`, `pays_habitation`, `ville`, `num_rue_habitation`, `rue_habitation`, `sup_habitation`) VALUES
(1, 'Pays_User', 'Ville_User', 8, 'Rue', 9),
(4, 'Pays2_user', 'Ville2_User', 9, 'Rue2', 10);

-- --------------------------------------------------------

--
-- Structure de la table `humidite`
--

DROP TABLE IF EXISTS `humidite`;
CREATE TABLE IF NOT EXISTS `humidite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ca` int(11) NOT NULL,
  `valeur` tinyint(4) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `timestamp_humidite` (`timestamp`),
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
  `valeur` tinyint(4) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `timestamp_luminosite` (`timestamp`),
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
  `emplacement` varchar(535) NOT NULL,
  PRIMARY KEY (`id_piece`),
  KEY `PIECE_GERANT_FK` (`id_gerant`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`id_piece`, `type_piece`, `long_piece`, `largeur_piece`, `hauteur_piece`, `id_gerant`, `emplacement`) VALUES
(1, 'Type_de_piece1rue', 1, 2, 3, 3, 'Emplacement1rue'),
(2, 'Type_de_piece2rue', 4, 5, 6, 3, 'Emplacement2rue'),
(3, 'Type_de_piece3rue2', 7, 8, 9, 6, 'Emplacement3rue2'),
(4, 'Type_de_piece4rue2', 10, 11, 12, 6, 'Emplacement4rue2');

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

DROP TABLE IF EXISTS `presence`;
CREATE TABLE IF NOT EXISTS `presence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ca` int(11) NOT NULL,
  `valeur` tinyint(1) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `timestamp_temperature` (`timestamp`),
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
  PRIMARY KEY (`id_quartier`)
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `question`) VALUES
(1, 'Je me pose une question 1'),
(2, 'Je me pose une question 2');

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
  `email_u` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `prenom_u` varchar(100) NOT NULL,
  `nom_u` varchar(100) NOT NULL,
  `mdp_u` varchar(100) NOT NULL,
  `telephone_u` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_u`) USING BTREE,
  UNIQUE KEY `email_u` (`email_u`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_u`, `email_u`, `prenom_u`, `nom_u`, `mdp_u`, `telephone_u`) VALUES
(1, 'admin@isep.fr', 'Admin_prenom', 'Admin_nom', '$2y$10$S1Pr3FwfMTkZRjVlkGBBhu2SSjxwkAwW.A9qC0PzXwbcdYyzqajD6', NULL),
(2, 'user@isep.fr', 'User_prenom', 'User_nom', '$2y$10$z0vVOgEFP.ly9trrIb7TNeQgJ5LQpJ0B/k9o.C4TSZYrRXm88FAGK', NULL);

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
