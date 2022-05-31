-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 31 mai 2022 à 07:59
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.1

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
  `Nom` varchar(10) NOT NULL,
  `Prénom` varchar(10) NOT NULL,
  `Email` varchar(10) NOT NULL,
  `téléphone` int(10) NOT NULL,
  `motDePasse` varchar(10) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `PhotoProfil` mediumblob NOT NULL,
  `Description` text NOT NULL,
  `DateCréation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Lieu` varchar(4) NOT NULL,
  `Description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `IdTrajet` int(10) NOT NULL,
  `TypeTrajet` varchar(50) NOT NULL,
  `isDemande` tinyint(1) DEFAULT NULL,
  `Description` varchar(255) NOT NULL,
  `LieuDépart` varchar(50) NOT NULL DEFAULT 'Wervicq-Sud',
  `LieuArrivée` varchar(50) NOT NULL DEFAULT 'Wervicq-Sud',
  `DateDépart` date NOT NULL,
  `DateArrivée` date DEFAULT NULL,
  `HeureDépart` time(4) DEFAULT NULL,
  `HeureArrivée` time(4) DEFAULT NULL,
  `DateAjout` date NOT NULL,
  `NbPassagers` int(10) NOT NULL,
  `NbReservations` int(10) NOT NULL DEFAULT '0',
  `Prix` int(10) NOT NULL DEFAULT '0',
  `DisplayTel` tinyint(1) DEFAULT NULL,
  `AnnéeEdition` int(10) NOT NULL,
  `IdCompte` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`IdTrajet`, `TypeTrajet`, `isDemande`, `Description`, `LieuDépart`, `LieuArrivée`, `DateDépart`, `DateArrivée`, `HeureDépart`, `HeureArrivée`, `DateAjout`, `NbPassagers`, `NbReservations`, `Prix`, `DisplayTel`, `AnnéeEdition`, `IdCompte`) VALUES
(1, 'Aller', 0, 'fucklessymboles', 'Lille', 'Wervicq-Sud', '2022-05-25', NULL, NULL, NULL, '2025-05-22', 2, 0, 5, 0, 2022, 0),
(2, 'Aller', 0, 'J\'aime le RGB', 'Lille', 'Wervicq-Sud', '2022-05-25', NULL, NULL, NULL, '2025-05-22', 3, 0, 5, 0, 2022, 0),
(3, 'Retour', 0, 'pitié', 'Lille', 'Wervicq-Sud', '2022-09-20', NULL, '13:02:00.0000', NULL, '2025-05-22', 3, 0, 2, 0, 2022, 0),
(4, 'Retour', 0, 'CA MARCHE BILLY', 'Wervicq-Sud', 'Charleville-Mézières', '2022-09-22', NULL, '17:20:00.0000', NULL, '2025-05-22', 3, 0, 30, 1, 2022, 0),
(5, 'Aller', 0, 'test', 'Lille', 'Wervicq-Sud', '2022-09-24', NULL, '09:04:00.0000', NULL, '2026-05-22', 1, 0, 5, 1, 2022, 0),
(6, 'Aller', 0, 'test', 'Charleville-Mézières', 'Wervicq-Sud', '2022-09-22', NULL, '10:15:00.0000', NULL, '2030-05-22', 4, 0, 25, 1, 2022, 0),
(7, 'Aller', 0, 'testv2', 'Charleville-Mézières', 'Wervicq-Sud', '2022-09-22', NULL, '10:15:00.0000', NULL, '2030-05-22', 4, 0, 23, 0, 2022, 0),
(8, 'Aller', 1, 'pitié', 'Charleville-Mézières', 'Wervicq-Sud', '2022-09-20', NULL, '15:24:00.0000', NULL, '2030-05-22', 3, 0, 0, 0, 2022, 0),
(9, 'Aller', 0, '?', 'Lille', 'Wervicq-Sud', '2022-09-17', NULL, '16:47:00.0000', NULL, '2030-05-22', 5, 0, 11, 0, 2022, 0),
(10, 'Aller', 0, 'zdz', 'Lille', 'Wervicq-Sud', '2022-09-22', NULL, '14:02:00.0000', NULL, '2030-05-22', 2, 0, 4, 0, 2022, 0),
(11, 'Aller', 0, 'zfdqfq', 'Charleville-Mézières', 'Wervicq-Sud', '2022-09-21', NULL, '13:03:00.0000', NULL, '2030-05-22', 2, 0, 4, 0, 2022, 0),
(12, 'Aller', 0, 'zfdqfq', 'Charleville-Mézières', 'Wervicq-Sud', '2022-09-21', NULL, '13:03:00.0000', NULL, '2030-05-22', 2, 0, 4, 0, 2022, 0),
(13, 'Retour', 0, 'TestV?', 'Wervicq-Sud', 'Charleville-Mézières', '2022-09-27', NULL, '18:00:00.0000', NULL, '2030-05-22', 1, 0, 27, 0, 2022, 0),
(14, 'Retour', 0, 'TestV??', 'Wervicq-Sud', 'Charleville-Mézières', '2022-09-27', NULL, '18:00:00.0000', NULL, '2030-05-22', 1, 0, 27, 0, 2022, 0),
(15, 'Retour', 0, 'TestV?????', 'Wervicq-Sud', 'Charleville-Mézières', '2022-09-27', NULL, '18:00:00.0000', NULL, '2030-05-22', 1, 0, 27, 0, 2022, 0),
(16, 'Retour', 0, '&lt;h1&gt;RATIO&lt;/h1&gt;', 'Wervicq-Sud', 'Rouen', '2022-09-29', NULL, '09:30:00.0000', NULL, '2030-05-22', 3, 0, 15, 0, 2022, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`IdCompte`);

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
  MODIFY `IdCompte` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `IdTrajet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
