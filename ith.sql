-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 08 jan. 2018 à 11:26
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ith`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartement`
--

CREATE TABLE `appartement` (
  `id_habitation` int(11) NOT NULL,
  `num_bat` tinyint(11) NOT NULL,
  `etage_appart` smallint(11) NOT NULL,
  `id_immeuble` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `id_ca` int(11) NOT NULL,
  `power_state` tinyint(1) NOT NULL,
  `powered_timestamp` int(11) NOT NULL,
  `shutdown_timestamp` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `co2`
--

CREATE TABLE `co2` (
  `id_ca` int(11) NOT NULL,
  `taux_CO2` tinyint(4) NOT NULL,
  `timestamp_co2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employe_municipal`
--

CREATE TABLE `employe_municipal` (
  `id_u` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employe_municipal`
--

INSERT INTO `employe_municipal` (`id_u`, `id_ville`) VALUES
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `fumee`
--

CREATE TABLE `fumee` (
  `id_ca` int(11) NOT NULL,
  `fumee` tinyint(1) NOT NULL,
  `timestamp_fumee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gardien`
--

CREATE TABLE `gardien` (
  `id_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gardien`
--

INSERT INTO `gardien` (`id_u`) VALUES
(3);

-- --------------------------------------------------------

--
-- Structure de la table `gerant`
--

CREATE TABLE `gerant` (
  `id_gerant` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `id_habitation` int(11) DEFAULT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gerant`
--

INSERT INTO `gerant` (`id_gerant`, `admin`, `id_habitation`, `id_u`) VALUES
(1, 1, NULL, 5);

-- --------------------------------------------------------

--
-- Structure de la table `habitation`
--

CREATE TABLE `habitation` (
  `id_habitation` int(11) NOT NULL,
  `pays_habitation` varchar(40) NOT NULL,
  `num_rue_habitation` smallint(6) NOT NULL,
  `rue_habitation` varchar(150) NOT NULL,
  `sup_habitation` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `humidite`
--

CREATE TABLE `humidite` (
  `id_ca` int(11) NOT NULL,
  `taux_humidite` tinyint(4) NOT NULL,
  `timestamp_humidite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `immeuble`
--

CREATE TABLE `immeuble` (
  `id_immeuble` int(11) NOT NULL,
  `id_quartier` int(11) NOT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ensemble d''appartements';

-- --------------------------------------------------------

--
-- Structure de la table `luminosite`
--

CREATE TABLE `luminosite` (
  `id_ca` int(11) NOT NULL,
  `taux_luminosite` tinyint(4) NOT NULL,
  `timestamp_luminosite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `id_habitation` int(11) NOT NULL,
  `nb_etage` tinyint(11) NOT NULL,
  `id_quartier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id_piece` int(11) NOT NULL,
  `type_piece` varchar(100) NOT NULL,
  `long_piece` smallint(11) NOT NULL,
  `largeur_piece` smallint(11) NOT NULL,
  `hauteur_piece` smallint(11) NOT NULL,
  `id_gerant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE `presence` (
  `id_ca` int(11) NOT NULL,
  `presence` tinyint(1) NOT NULL,
  `timestamp_temperature` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `quartier`
--

CREATE TABLE `quartier` (
  `id_quartier` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `id_ville` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `temperature`
--

CREATE TABLE `temperature` (
  `id_ca` int(11) NOT NULL,
  `temperature` tinyint(4) NOT NULL,
  `timestamp_temperature` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_u` int(11) NOT NULL,
  `email_u` varchar(150) NOT NULL,
  `prenom_u` varchar(100) NOT NULL,
  `nom_u` varchar(100) NOT NULL,
  `mdp_u` varchar(100) DEFAULT NULL,
  `clef_u` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_u`, `email_u`, `prenom_u`, `nom_u`, `mdp_u`, `clef_u`) VALUES
(1, 'henry.mthsn@gmail.com', 'Henry', 'Matheisen', 'blabla', 123456789),
(2, 'gerant@gmail.com', 'gerant', 'Lourtet', 'gerant', 234567891),
(3, 'gardien@gmail.com', 'gardien', 'Lathiere', 'gardien', 345678912),
(4, 'employe@gmail.com', 'employe', 'Lambert', 'employe', 456789123),
(5, 'admin@gmail.com', 'Amin', 'ROOT', 'admin', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id_ville` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id_ville`, `nom`) VALUES
(1, 'Paris');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appartement`
--
ALTER TABLE `appartement`
  ADD PRIMARY KEY (`id_habitation`),
  ADD KEY `APPARTEMENT_IMMEUBLE_FK` (`id_immeuble`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`id_ca`),
  ADD KEY `CAPTEUR_PIECE_FK` (`id_piece`);

--
-- Index pour la table `co2`
--
ALTER TABLE `co2`
  ADD PRIMARY KEY (`id_ca`),
  ADD UNIQUE KEY `timestamp_co2` (`timestamp_co2`);

--
-- Index pour la table `employe_municipal`
--
ALTER TABLE `employe_municipal`
  ADD PRIMARY KEY (`id_u`) USING BTREE,
  ADD KEY `EMPLOYE_MUNICIPAL_VILLE_FK` (`id_ville`);

--
-- Index pour la table `fumee`
--
ALTER TABLE `fumee`
  ADD PRIMARY KEY (`id_ca`),
  ADD UNIQUE KEY `timestamp_fumee` (`timestamp_fumee`);

--
-- Index pour la table `gardien`
--
ALTER TABLE `gardien`
  ADD PRIMARY KEY (`id_u`) USING BTREE;

--
-- Index pour la table `gerant`
--
ALTER TABLE `gerant`
  ADD PRIMARY KEY (`id_gerant`),
  ADD KEY `GERANT_HABITATION_FK` (`id_habitation`),
  ADD KEY `GERANT_UTILISATEUR_FK` (`id_u`);

--
-- Index pour la table `habitation`
--
ALTER TABLE `habitation`
  ADD PRIMARY KEY (`id_habitation`);

--
-- Index pour la table `humidite`
--
ALTER TABLE `humidite`
  ADD PRIMARY KEY (`id_ca`),
  ADD UNIQUE KEY `timestamp_humidite` (`timestamp_humidite`);

--
-- Index pour la table `immeuble`
--
ALTER TABLE `immeuble`
  ADD PRIMARY KEY (`id_immeuble`),
  ADD KEY `IMMEUBLE_QUARTIER_FK` (`id_quartier`),
  ADD KEY `IMMEUBLE_UTILISATEUR_FK` (`id_u`);

--
-- Index pour la table `luminosite`
--
ALTER TABLE `luminosite`
  ADD PRIMARY KEY (`id_ca`),
  ADD UNIQUE KEY `timestamp_luminosite` (`timestamp_luminosite`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`id_habitation`),
  ADD KEY `MAISON_QUARTIER_FK` (`id_quartier`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id_piece`),
  ADD KEY `PIECE_GERANT_FK` (`id_gerant`);

--
-- Index pour la table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`id_ca`),
  ADD UNIQUE KEY `timestamp_temperature` (`timestamp_temperature`);

--
-- Index pour la table `quartier`
--
ALTER TABLE `quartier`
  ADD PRIMARY KEY (`id_quartier`),
  ADD KEY `QUARTIER_VILLE_FK` (`id_ville`);

--
-- Index pour la table `temperature`
--
ALTER TABLE `temperature`
  ADD PRIMARY KEY (`id_ca`),
  ADD UNIQUE KEY `timestamp_temperature` (`timestamp_temperature`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_u`) USING BTREE;

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `id_ca` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `gerant`
--
ALTER TABLE `gerant`
  MODIFY `id_gerant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `habitation`
--
ALTER TABLE `habitation`
  MODIFY `id_habitation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `immeuble`
--
ALTER TABLE `immeuble`
  MODIFY `id_immeuble` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id_piece` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `quartier`
--
ALTER TABLE `quartier`
  MODIFY `id_quartier` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  ADD CONSTRAINT `CO2_CAPTEUR_FK` FOREIGN KEY (`id_ca`) REFERENCES `capteur` (`id_ca`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `FUMEE_CAPTEUR_FK` FOREIGN KEY (`id_ca`) REFERENCES `capteur` (`id_ca`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `HUMIDITE_CAPTEUR_FK` FOREIGN KEY (`id_ca`) REFERENCES `capteur` (`id_ca`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `LUMINOSITE_CAPTEUR_FK` FOREIGN KEY (`id_ca`) REFERENCES `capteur` (`id_ca`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `PRESENCE_CAPTEUR_FK` FOREIGN KEY (`id_ca`) REFERENCES `capteur` (`id_ca`) ON DELETE CASCADE;

--
-- Contraintes pour la table `quartier`
--
ALTER TABLE `quartier`
  ADD CONSTRAINT `QUARTIER_VILLE_FK` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`) ON DELETE CASCADE;

--
-- Contraintes pour la table `temperature`
--
ALTER TABLE `temperature`
  ADD CONSTRAINT `TEMPERATURE_CAPTEUR_FK` FOREIGN KEY (`id_ca`) REFERENCES `capteur` (`id_ca`) ON DELETE CASCADE;
