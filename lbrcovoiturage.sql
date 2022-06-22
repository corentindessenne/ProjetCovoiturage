-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 juin 2022 à 14:10
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lbrcovoiturage`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `IdCompte` int(10) NOT NULL,
  `Nom` varchar(40) DEFAULT NULL,
  `Prenom` varchar(40) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `telephone` int(10) DEFAULT NULL,
  `motDePasse` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `PhotoProfil` mediumblob DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `isVerif` tinyint(1) NOT NULL DEFAULT 0,
  `DateCreation` timestamp NOT NULL DEFAULT current_timestamp(),
  `lien_verif_mail` varchar(255) NOT NULL,
  `date_verif_mail` timestamp NULL DEFAULT NULL,
  `token_reset_password` varchar(255) NOT NULL,
  `expiration_reset_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`IdCompte`, `Nom`, `Prenom`, `Email`, `telephone`, `motDePasse`, `isAdmin`, `PhotoProfil`, `Description`, `isVerif`, `DateCreation`, `lien_verif_mail`, `date_verif_mail`, `token_reset_password`, `expiration_reset_password`) VALUES
(32, 'Dessenne', 'Corentin', 'dessennec@gmail.com', 627503059, '$2y$10$C1E8NSHpgK2LGj5PTJVCYeNq8YixMpRmkzrDPa5KSrMHNQCmaHFAe', 1, 0x33322e6a7067, NULL, 1, '2022-06-21 22:00:00', '4f4a9a6e085861fd65332c43a470767e', '2022-06-21 22:00:00', '', ''),
(33, 'Mareel', 'Adrien', 'cocodsn3@gmail.com', 612345678, '$2y$10$6iQz78Wx42E8HZQo0KfOzu8AlycZ923r2QNhRvDYy7Ls0C/s8DkBe', 0, NULL, NULL, 1, '2022-06-21 22:00:00', '8e6185740433cf0f8360f00b5d912797', '2022-06-21 22:00:00', '', ''),
(34, 'Mareel', 'Adri2', 'mareel.adri@yahoo.com', 612345678, '$2y$10$pvVmXuI65BdzbjXsslf7meLzQZFELhdtwnCd.Q4OIwFCAjJq47eKW', 0, 0x33342e6a7067, NULL, 1, '2022-06-21 22:00:00', '87f699e611b99c979a19366522c75dc4', '2022-06-21 22:00:00', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `edition`
--

CREATE TABLE `edition` (
  `AnnéeEdition` int(10) NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `HeureDebut` time(4) NOT NULL,
  `HeureFin` time(4) NOT NULL,
  `Lieu` varchar(50) NOT NULL,
  `Description` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `edition`
--

INSERT INTO `edition` (`AnnéeEdition`, `DateDebut`, `DateFin`, `HeureDebut`, `HeureFin`, `Lieu`, `Description`) VALUES
(2022, '2022-09-17', '2022-09-18', '00:00:00.0000', '21:00:00.0000', 'Wervicq-Sud', ' ');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(11) NOT NULL,
  `idTrajet` int(11) NOT NULL,
  `nbPassagersReservation` int(10) NOT NULL,
  `typeTrajet` varchar(15) NOT NULL,
  `anneeEdition` int(10) NOT NULL,
  `idCompteReservation` int(10) NOT NULL,
  `nomPassager1` varchar(50) NOT NULL,
  `nomPassager2` varchar(50) NOT NULL,
  `nomPassager3` varchar(50) NOT NULL,
  `nomPassager4` varchar(50) NOT NULL,
  `nomPassager5` varchar(50) NOT NULL,
  `nomPassager6` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `IdTrajet` int(10) NOT NULL,
  `TypeTrajet` varchar(50) NOT NULL,
  `isDemande` tinyint(1) DEFAULT NULL,
  `Description` varchar(255) NOT NULL DEFAULT '',
  `LieuDepart` varchar(50) NOT NULL DEFAULT 'Wervicq-Sud',
  `AdresseDepart` varchar(150) NOT NULL DEFAULT '21 Rue de Linselles',
  `LongitudeDepart` float DEFAULT 3.1134,
  `LatitudeDepart` float NOT NULL DEFAULT 50.7364,
  `LieuArrivee` varchar(50) NOT NULL DEFAULT 'Wervicq-Sud',
  `AdresseArrivee` varchar(150) NOT NULL DEFAULT '21 Rue de Linselles',
  `LongitudeArrivee` float NOT NULL DEFAULT 3.1134,
  `LatitudeArrivee` float NOT NULL DEFAULT 50.7364,
  `DateDepart` date NOT NULL,
  `DateArrivee` date DEFAULT NULL,
  `HeureDepart` time(4) DEFAULT NULL,
  `HeureArrivee` time(4) DEFAULT NULL,
  `DateAjout` date NOT NULL,
  `NbPassagers` int(10) NOT NULL,
  `PlacesRestantes` int(10) NOT NULL DEFAULT 0,
  `Prix` int(10) NOT NULL DEFAULT 0,
  `DisplayTel` tinyint(1) DEFAULT NULL,
  `AnneeEdition` int(10) NOT NULL,
  `IdCompte` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`IdTrajet`, `TypeTrajet`, `isDemande`, `Description`, `LieuDepart`, `AdresseDepart`, `LongitudeDepart`, `LatitudeDepart`, `LieuArrivee`, `AdresseArrivee`, `LongitudeArrivee`, `LatitudeArrivee`, `DateDepart`, `DateArrivee`, `HeureDepart`, `HeureArrivee`, `DateAjout`, `NbPassagers`, `PlacesRestantes`, `Prix`, `DisplayTel`, `AnneeEdition`, `IdCompte`) VALUES
(9, 'Aller', 1, '', 'Lille', '41 Boulevard Vauban', 3.04837, 50.6339, 'Wervicq-Sud', '21 Rue de Linselles', 3.1134, 50.7364, '2022-09-17', '2022-09-17', '02:30:00.0000', '02:30:00.0000', '2022-06-22', 1, 1, 0, 0, 2022, 32),
(10, 'Retour', 1, '', 'Wervicq-Sud', '21 Rue de Linselles', 3.1134, 50.7364, 'Lille', '41 Boulevard Vauban', 3.04837, 50.6339, '2022-09-18', '2022-09-18', '23:00:00.0000', '23:31:00.0000', '2022-06-22', 1, 1, 0, 0, 2022, 32),
(11, 'Aller', 0, 'Je propose un trajet le 17 septembre', 'Lille', '41 Boulevard Vauban', 3.04837, 50.6339, 'Wervicq-Sud', '21 Rue de Linselles', 3.1134, 50.7364, '2022-09-17', '2022-09-17', '18:00:00.0000', '18:29:00.0000', '2022-06-22', 3, 3, 5, 0, 2022, 34);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`IdCompte`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Index pour la table `edition`
--
ALTER TABLE `edition`
  ADD PRIMARY KEY (`AnnéeEdition`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`);

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`IdTrajet`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `IdCompte` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `IdTrajet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
